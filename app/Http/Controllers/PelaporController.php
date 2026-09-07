<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\DamageReport;
use App\Models\Facility;
use App\Models\Category;
use App\Models\User;

class PelaporController extends Controller
{
    /**
     * Tampilkan dashboard pelapor beserta form laporan & riwayat tiket.
     */
    public function dashboard()
    {
        $user = Auth::user();
        $status = strtolower(trim($user->status ?? 'pelapor'));

        if (in_array($status, ['admin', 'sarpras', 'admin_sarpras'])) {
            return redirect()->route('admin.dashboard');
        } elseif (in_array($status, ['petugas', 'teknisi', 'staf'])) {
            return redirect()->route('petugas.dashboard');
        }

        // Hanya tampilkan fasilitas yang kondisinya Baik dan tidak sedang dalam penanganan laporan aktif
        $facilities = Facility::where(function ($query) {
                $query->where('kondisi', 'Baik')
                      ->orWhere('kondisi', 'Normal');
            })
            ->whereDoesntHave('damageReports', function ($query) {
                $query->whereIn('status_laporan', ['menunggu', 'darurat', 'proses', 'proses_perbaikan', 'menunggu_rab']);
            })
            ->orderBy('nama_fasilitas')
            ->get();

        $categories = Category::orderBy('name')->get();

        $myReports = DamageReport::where('id_user', $user->id_user)
            ->with(['facility', 'category', 'technician'])
            ->latest()
            ->take(5)
            ->get();

        return view('pelapor.dashboard', compact('user', 'facilities', 'categories', 'myReports'));
    }

    /**
     * Simpan laporan kerusakan baru ke database dengan auto-assign teknisi berdasarkan kategori.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_fasilitas'        => 'required|exists:facilities,id_fasilitas',
            'category_id'         => 'required|exists:categories,id',
            'tingkat_urgensi'     => 'required|string|in:rendah,sedang,tinggi,darurat,Rendah,Sedang,Tinggi,Darurat',
            'deskripsi_kerusakan' => 'required|string|min:10',
            'foto_bukti'          => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'id_fasilitas.required'        => 'Lokasi fasilitas harus dipilih.',
            'category_id.required'         => 'Kategori kerusakan harus dipilih.',
            'tingkat_urgensi.required'     => 'Tingkat urgensi harus dipilih.',
            'deskripsi_kerusakan.required' => 'Deskripsi masalah wajib diisi.',
            'deskripsi_kerusakan.min'      => 'Deskripsi minimal 10 karakter.',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')->store('bukti-laporan', 'public');
        }

        $urgensi = strtolower(trim($request->tingkat_urgensi));

        // 1. Pencarian teknisi otomatis: cari user dengan role = 'petugas' yang category_id cocok
        $technician = User::where(function ($q) {
                $q->where('role', 'petugas')->orWhere('status', 'petugas');
            })
            ->where('category_id', $request->category_id)
            ->first();

        // 2. Tentukan status laporan:
        // - Jika Darurat -> status 'darurat' (Fast-Track: langsung eksekusi perbaikan tanpa RAB)
        // - Jika urgensi Rendah / Sedang -> status 'proses_perbaikan' (langsung eksekusi perbaikan)
        // - Jika urgensi Tinggi -> status 'menunggu_rab' (KHUSUS Tinggi yang butuh pengajuan RAB ke Admin Sarpras)
        if ($urgensi === 'darurat') {
            $statusLaporan = 'darurat';
        } elseif (in_array($urgensi, ['rendah', 'sedang'])) {
            $statusLaporan = 'proses_perbaikan';
        } else {
            $statusLaporan = 'menunggu_rab';
        }

        DamageReport::create([
            'id_user'             => Auth::id() ?: Auth::user()->id_user,
            'technician_id'       => $technician ? $technician->id_user : null,
            'id_fasilitas'        => $request->id_fasilitas,
            'category_id'         => $request->category_id,
            'tanggal_waktu'       => now(),
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'foto_bukti'          => $fotoPath,
            'is_emergency'        => $urgensi === 'darurat',
            'tingkat_urgensi'     => $urgensi,
            'status_laporan'      => $statusLaporan,
        ]);

        // Perbarui kondisi fasilitas menjadi Rusak
        $facility = Facility::find($request->id_fasilitas);
        if ($facility) {
            $facility->kondisi = 'Rusak';
            $facility->save();
        }

        $techName = $technician ? $technician->nama : 'Petugas Sarpras';
        if ($statusLaporan === 'darurat') {
            $statusMsg = 'Laporan Darurat: Langsung eksekusi perbaikan di lapangan tanpa syarat RAB.';
        } elseif ($statusLaporan === 'proses_perbaikan') {
            $statusMsg = 'Status langsung: Proses Perbaikan.';
        } else {
            $statusMsg = 'Menunggu teknisi mengajukan form RAB ke Admin Sarpras.';
        }

        return redirect()->route('pelapor.dashboard')
                         ->with('success', "Laporan berhasil dikirim dan otomatis ditugaskan ke {$techName}! {$statusMsg}");
    }

    /**
     * Simpan laporan darurat (Emergency).
     */
    public function storeEmergency(Request $request)
    {
        $request->validate([
            'id_fasilitas'        => 'required|exists:facilities,id_fasilitas',
            'category_id'         => 'nullable|exists:categories,id',
            'deskripsi_kerusakan' => 'required|string|min:5',
        ]);

        // Auto assign teknisi jika kategori dipilih, atau cari teknisi pertama
        $categoryId = $request->category_id;
        $technician = null;
        if ($categoryId) {
            $technician = User::where(function ($q) {
                    $q->where('role', 'petugas')->orWhere('status', 'petugas');
                })
                ->where('category_id', $categoryId)
                ->first();
        } else {
            $technician = User::where(function ($q) {
                $q->where('role', 'petugas')->orWhere('status', 'petugas');
            })->first();
        }

        DamageReport::create([
            'id_user'             => Auth::user()->id_user,
            'technician_id'       => $technician ? $technician->id_user : null,
            'id_fasilitas'        => $request->id_fasilitas,
            'category_id'         => $categoryId,
            'tanggal_waktu'       => now(),
            'deskripsi_kerusakan' => '[DARURAT] ' . $request->deskripsi_kerusakan,
            'foto_bukti'          => null,
            'is_emergency'        => true,
            'tingkat_urgensi'     => 'darurat',
            'status_laporan'      => 'darurat',
        ]);

        // Perbarui kondisi fasilitas menjadi Rusak
        $facility = Facility::find($request->id_fasilitas);
        if ($facility) {
            $facility->kondisi = 'Rusak';
            $facility->save();
        }

        return redirect()->route('pelapor.dashboard')
                         ->with('success', 'Laporan Darurat berhasil dikirim! Tim teknisi akan segera merespons.');
    }

    /**
     * Cari tiket berdasarkan ID (format TKT-XXXX).
     */
    public function trackTicket(Request $request)
    {
        $request->validate(['ticket_id' => 'required|string']);

        $id     = ltrim(str_replace('TKT-', '', strtoupper($request->ticket_id)));
        $report = DamageReport::where('id_laporan', $id)
                    ->where('id_user', Auth::user()->id_user)
                    ->with(['facility', 'category', 'technician'])
                    ->first();

        return back()->with('tracked_ticket', $report);
    }

    /**
     * Tampilkan halaman daftar tiket pelapor.
     */
    public function tickets()
    {
        $user = Auth::user();
        $status = strtolower(trim($user->status ?? 'pelapor'));

        if (in_array($status, ['admin', 'sarpras', 'admin_sarpras'])) {
            return redirect()->route('admin.work-orders.index');
        } elseif (in_array($status, ['petugas', 'teknisi', 'staf'])) {
            return redirect()->route('petugas.dashboard');
        }

        $tickets = DamageReport::where('id_user', $user->id_user)
                        ->with(['facility', 'user', 'category', 'technician'])
                        ->latest()
                        ->get();

        return view('pelapor.tickets', compact('user', 'tickets'));
    }
}
