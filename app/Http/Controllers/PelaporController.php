<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\DamageReport;
use App\Models\Facility;

class PelaporController extends Controller
{
    /**
     * Tampilkan dashboard pelapor beserta form laporan & riwayat tiket.
     */
    public function dashboard()
    {
        $user        = Auth::user();
        $facilities  = Facility::orderBy('nama_fasilitas')->get();
        $myReports   = DamageReport::where('id_user', $user->id_user)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('pelapor.dashboard', compact('user', 'facilities', 'myReports'));
    }

    /**
     * Simpan laporan kerusakan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_fasilitas'       => 'required|exists:facilities,id_fasilitas',
            'deskripsi_kerusakan'=> 'required|string|min:10',
            'tingkat_urgensi'    => 'nullable|in:rendah,sedang,tinggi,darurat',
            'foto_bukti'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'id_fasilitas.required'        => 'Lokasi fasilitas harus dipilih.',
            'deskripsi_kerusakan.required' => 'Deskripsi masalah wajib diisi.',
            'deskripsi_kerusakan.min'      => 'Deskripsi minimal 10 karakter.',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')->store('bukti-laporan', 'public');
        }

        DamageReport::create([
            'id_user'             => Auth::id() ?: Auth::user()->id_user,
            'id_fasilitas'        => $request->id_fasilitas,
            'tanggal_waktu'       => now(),
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'foto_bukti'          => $fotoPath,
            'is_emergency'        => $request->tingkat_urgensi === 'darurat',
            'status_laporan'      => 'menunggu',
        ]);

        return redirect()->route('pelapor.dashboard')
                         ->with('success', 'Laporan berhasil dikirim! Tim Sarpras akan segera menindaklanjuti.');
    }

    /**
     * Simpan laporan darurat (Emergency).
     */
    public function storeEmergency(Request $request)
    {
        $request->validate([
            'id_fasilitas'        => 'required|exists:facilities,id_fasilitas',
            'deskripsi_kerusakan' => 'required|string|min:5',
        ]);

        DamageReport::create([
            'id_user'             => Auth::user()->id_user,
            'id_fasilitas'        => $request->id_fasilitas,
            'tanggal_waktu'       => now(),
            'deskripsi_kerusakan' => '[DARURAT] ' . $request->deskripsi_kerusakan,
            'foto_bukti'          => null,
            'is_emergency'        => true,
            'status_laporan'      => 'darurat',
        ]);

        return redirect()->route('pelapor.dashboard')
                         ->with('success', 'Laporan Darurat berhasil dikirim! Tim akan segera merespons.');
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
                    ->with('facility')
                    ->first();

        return back()->with('tracked_ticket', $report);
    }

    /**
     * Tampilkan halaman daftar tiket pelapor.
     */
    public function tickets()
    {
        $user    = Auth::user();
        $tickets = DamageReport::where('id_user', $user->id_user)
                        ->with(['facility', 'user'])
                        ->latest()
                        ->get();

        return view('pelapor.tickets', compact('user', 'tickets'));
    }
}
