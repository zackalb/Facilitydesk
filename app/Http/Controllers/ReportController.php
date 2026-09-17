<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DamageReport;
use App\Models\Facility;
use App\Models\Category;
use App\Models\User;

class ReportController extends Controller
{
    /**
     * Store a newly created damage report.
     * Logic:
     * - Auto assign technician where role = 'petugas' and category_id matches report category.
     * - If urgency is 'rendah' or 'sedang', status becomes 'proses_perbaikan'.
     * - If urgency is 'tinggi', status becomes 'menunggu_rab' (flow for technician to submit RAB form).
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_fasilitas'        => 'required|exists:facilities,id_fasilitas',
            'category_id'         => 'required|exists:categories,id',
            'tingkat_urgensi'     => 'required|string|in:rendah,sedang,tinggi,darurat,Rendah,Sedang,Tinggi,Darurat',
            'deskripsi_kerusakan' => 'required|string|min:10',
            'foto_bukti'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'foto_bukti.required' => 'Foto bukti kerusakan wajib dilampirkan.',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')->store('bukti-laporan', 'public');
        }

        $urgensi = strtolower(trim($request->tingkat_urgensi));

        // 1. Pencarian teknisi otomatis berdasarkan role 'petugas' & category_id yang cocok
        $technician = User::where(function ($q) {
                $q->where('role', 'petugas')->orWhere('status', 'petugas');
            })
            ->where('category_id', $request->category_id)
            ->first();

        // 2. Tentukan status laporan:
        // - Jika Darurat -> status 'darurat' (Fast-Track: langsung eksekusi perbaikan tanpa RAB)
        // - Jika urgensi Tinggi -> status 'menunggu_rab' (KHUSUS Tinggi yang butuh pengajuan RAB ke Admin Sarpras)
        // - Jika urgensi Rendah / Sedang -> status 'menunggu' (menunggu konfirmasi petugas menekan sedang dikerjakan)
        if ($urgensi === 'darurat') {
            $statusLaporan = 'darurat';
        } elseif ($urgensi === 'tinggi') {
            $statusLaporan = 'menunggu_rab';
        } else {
            $statusLaporan = 'menunggu';
        }

        $report = DamageReport::create([
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
        } elseif ($statusLaporan === 'menunggu_rab') {
            $statusMsg = 'Laporan Urgensi Tinggi: Menunggu pengajuan & persetujuan RAB material ke Admin Sarpras.';
        } else {
            $statusMsg = 'Laporan berhasil dibuat. Menunggu konfirmasi petugas teknisi untuk memulai pengerjaan.';
        }

        return redirect()->route('pelapor.dashboard')
                         ->with('success', "Laporan berhasil dikirim dan otomatis ditugaskan ke {$techName}! {$statusMsg}");
    }
}
