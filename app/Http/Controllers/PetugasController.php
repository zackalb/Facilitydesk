<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\DamageReport;
use App\Models\Facility;
use App\Models\WorkOrder;
use App\Models\Verification;
use App\Models\TechnicianVendor;
use App\Models\BudgetProposal;
use App\Models\RabItem;
use App\Models\SchoolBudget;

class PetugasController extends Controller
{
    /**
     * Memastikan user yang login adalah Petugas.
     */
    private function checkPetugasAccess(): bool
    {
        $user = Auth::user();
        $status = strtolower(trim($user->status ?? ''));
        return in_array($status, ['petugas', 'teknisi', 'staf', 'admin']);
    }

    /**
     * Tampilkan Dashboard Petugas beserta daftar tugas perbaikan lapangan.
     */
    public function dashboard()
    {
        $user = Auth::user();
        $status = strtolower(trim($user->status ?? ''));

        if ($status === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($status === 'pelapor') {
            return redirect()->route('pelapor.dashboard');
        } elseif (!$this->checkPetugasAccess()) {
            return redirect()->route('dashboard');
        }

        // Cari teknisi vendor yang sesuai dengan nama/user petugas
        $tech = TechnicianVendor::where('nama_teknisi', 'like', '%' . explode(' ', $user->nama)[0] . '%')->first();
        $techId = $tech ? $tech->id_teknisi : null;

        // Ambil semua laporan yang ditugaskan kepada teknisi login (atau semua jika admin)
        $tasksQuery = DamageReport::with(['facility', 'user', 'category', 'technician', 'verification.workOrder.technicianVendor'])
            ->whereIn('status_laporan', ['darurat', 'menunggu', 'proses', 'proses_perbaikan', 'menunggu_rab', 'selesai']);

        if (!in_array($status, ['admin', 'sarpras', 'admin_sarpras'])) {
            $tasksQuery->where(function ($q) use ($user) {
                $q->where('technician_id', $user->id_user);
                if ($user->category_id) {
                    $q->orWhere('category_id', $user->category_id);
                }
            });
        }

        $allTasks = $tasksQuery->latest()->get();

        // Metrik tugas
        $totalAssigned = $allTasks->count();
        $inProgress    = $allTasks->whereIn('status_laporan', ['darurat', 'proses', 'proses_perbaikan'])->count();
        $pending       = $allTasks->whereIn('status_laporan', ['menunggu', 'menunggu_rab'])->count();
        $completed     = $allTasks->where('status_laporan', 'selesai')->count();

        // Notifikasi darurat HANYA untuk petugas tertentu yang ditugaskan
        $hasEmergency = DamageReport::where('is_emergency', true)
            ->whereIn('status_laporan', ['darurat', 'proses', 'proses_perbaikan'])
            ->where(function ($q) use ($user) {
                $q->where('technician_id', $user->id_user);
                if ($user->category_id) {
                    $q->orWhere(function ($sub) use ($user) {
                        $sub->whereNull('technician_id')
                            ->where('category_id', $user->category_id);
                    });
                }
            })
            ->exists();

        return view('petugas.dashboard', compact('user', 'allTasks', 'totalAssigned', 'inProgress', 'pending', 'completed', 'hasEmergency'));
    }

    /**
     * Tampilkan detail tugas perbaikan untuk Petugas.
     */
    public function showTask($id)
    {
        if (!$this->checkPetugasAccess()) {
            return redirect()->route('dashboard');
        }

        $user = Auth::user();
        $report = DamageReport::with([
            'facility', 
            'user', 
            'verification.workOrder.technicianVendor',
            'verification.budgetProposal.items'
        ])->findOrFail($id);

        $hasEmergency = DamageReport::where('is_emergency', true)
            ->whereIn('status_laporan', ['darurat', 'proses', 'proses_perbaikan'])
            ->where(function ($q) use ($user) {
                $q->where('technician_id', $user->id_user);
                if ($user->category_id) {
                    $q->orWhere(function ($sub) use ($user) {
                        $sub->whereNull('technician_id')
                            ->where('category_id', $user->category_id);
                    });
                }
            })
            ->exists();

        return view('petugas.detail', compact('user', 'report', 'hasEmergency'));
    }

    /**
     * Petugas mengajukan Rencana Anggaran Biaya (RAB) ke Admin.
     */
    public function submitRab(Request $request, $id)
    {
        if (!$this->checkPetugasAccess()) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'catatan_kebutuhan' => 'nullable|string|max:1000',
            'items'             => 'required|array|min:1',
            'items.*.nama'      => 'required|string|max:255',
            'items.*.qty'       => 'required|numeric|min:1',
            'items.*.satuan'    => 'required|string|max:50',
            'items.*.harga'     => 'required|numeric|min:0',
        ]);

        $report = DamageReport::with(['facility', 'verification'])->findOrFail($id);

        DB::beginTransaction();
        try {
            // 1. Buat / ambil verifikasi
            $verification = $report->verification;
            if (!$verification) {
                $verification = Verification::create([
                    'id_laporan'         => $report->id_laporan,
                    'tanggal_verifikasi' => now(),
                    'kategori_kerusakan' => $report->facility->kategori_area ?? 'Umum',
                    'catatan_inspeksi'   => 'Membutuhkan pengadaan suku cadang / material (RAB diajukan).',
                ]);
            }

            // 2. Pastikan ada WorkOrder
            $wo = $verification->workOrder;
            if (!$wo) {
                $wo = WorkOrder::create([
                    'id_verifikasi'   => $verification->id_verifikasi,
                    'id_teknisi'      => $this->resolveTechnicianId(),
                    'prioritas'       => 'Berat',
                    'tanggal_mulai'   => now(),
                    'tanggal_selesai' => null,
                    'foto_after'      => null,
                ]);
            }

            // 3. Ambil anggaran aktif
            $budget = SchoolBudget::firstOrCreate(
                ['tahun_ajaran' => '2026/2027'],
                ['total_anggaran' => 50000000, 'sisa_saldo' => 50000000]
            );

            // 4. Hitung total estimasi
            $totalEstimasi = 0;
            foreach ($request->items as $item) {
                $totalEstimasi += ($item['qty'] * $item['harga']);
            }

            // 5. Simpan Proposal RAB
            $proposal = BudgetProposal::updateOrCreate(
                ['id_verifikasi' => $verification->id_verifikasi],
                [
                    'id_anggaran'        => $budget->id_anggaran,
                    'estimasi_biaya'     => $totalEstimasi,
                    'rincian_kebutuhan'  => $request->catatan_kebutuhan ?? 'Kebutuhan suku cadang & material perbaikan darurat/tinggi.',
                    'status_persetujuan' => 'menunggu_persetujuan',
                ]
            );

            // 6. Simpan item RAB
            RabItem::where('id_rab', $proposal->id_rab)->delete();
            foreach ($request->items as $item) {
                RabItem::create([
                    'id_rab'           => $proposal->id_rab,
                    'nama_sarana_jasa' => $item['nama'],
                    'qty'              => $item['qty'],
                    'satuan'           => $item['satuan'],
                    'harga_satuan'     => $item['harga'],
                    'subtotal'         => $item['qty'] * $item['harga'],
                ]);
            }

            // 7. Update status laporan ke 'proses'
            $report->status_laporan = 'proses';
            $report->save();

            DB::commit();

            return back()->with('success', 'RAB sebesar Rp ' . number_format($totalEstimasi, 0, ',', '.') . ' berhasil diajukan ke Admin Sarpras!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengajukan RAB: ' . $e->getMessage());
        }
    }

    /**
     * Petugas mulai mengerjakan perbaikan lapangan.
     */
    public function startTask($id)
    {
        if (!$this->checkPetugasAccess()) {
            return redirect()->route('dashboard');
        }

        $report = DamageReport::with(['facility', 'verification.workOrder'])->findOrFail($id);
        $report->status_laporan = 'proses';
        $report->save();

        // 1. Buat atau perbarui Verification jika belum ada
        $verification = $report->verification;
        if (!$verification) {
            $verification = Verification::create([
                'id_laporan'         => $report->id_laporan,
                'tanggal_verifikasi' => now(),
                'kategori_kerusakan' => $report->facility->kategori_area ?? 'Umum',
                'catatan_inspeksi'   => 'Pengerjaan dimulai oleh teknisi lapangan.',
            ]);
        }

        // 2. Buat atau perbarui WorkOrder
        $wo = $verification->workOrder;
        if (!$wo) {
            $wo = WorkOrder::create([
                'id_verifikasi'   => $verification->id_verifikasi,
                'id_teknisi'      => $this->resolveTechnicianId(),
                'prioritas'       => $report->tingkat_urgensi === 'tinggi' ? 'Berat' : 'Sedang',
                'tanggal_mulai'   => now(),
                'tanggal_selesai' => null,
                'foto_after'      => null,
            ]);
        } else {
            $wo->tanggal_mulai = now();
            $wo->save();
        }

        return back()->with('success', 'Status perbaikan berhasil diubah: Sedang Dikerjakan di Lapangan.');
    }

    /**
     * Petugas menunda pengerjaan perbaikan (status dikembalikan ke 'menunggu').
     */
    public function pauseTask($id)
    {
        if (!$this->checkPetugasAccess()) {
            return redirect()->route('dashboard');
        }

        $report = DamageReport::findOrFail($id);
        $report->status_laporan = 'menunggu';
        $report->save();

        return back()->with('success', 'Status pengerjaan berhasil ditunda (status kembali: Perlu Ditangani).');
    }

    /**
     * Petugas menyelesaikan tugas & mengunggah bukti foto 'After'.
     */
    public function completeTask(Request $request, $id)
    {
        if (!$this->checkPetugasAccess()) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'foto_after'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'catatan_perbaikan' => 'nullable|string|max:1000',
        ]);

        $report = DamageReport::with(['facility', 'verification.workOrder'])->findOrFail($id);

        // Upload foto after jika ada
        $fotoAfterPath = null;
        if ($request->hasFile('foto_after')) {
            $fotoAfterPath = $request->file('foto_after')->store('bukti-selesai', 'public');
        }

        // Buat atau perbarui Verification jika belum ada
        $verification = $report->verification;
        if (!$verification) {
            $verification = Verification::create([
                'id_laporan' => $report->id_laporan,
                'tanggal_verifikasi' => now(),
                'kategori_kerusakan' => $report->facility->kategori_area ?? 'Umum',
                'catatan_inspeksi' => $request->catatan_perbaikan ?? 'Perbaikan telah diselesaikan oleh teknisi.',
            ]);
        } elseif ($request->filled('catatan_perbaikan')) {
            $verification->catatan_inspeksi = $request->catatan_perbaikan;
            $verification->save();
        }

        // Cari atau buat WorkOrder
        $wo = $verification->workOrder;
        if (!$wo) {
            $wo = WorkOrder::create([
                'id_verifikasi'   => $verification->id_verifikasi,
                'id_teknisi'      => $this->resolveTechnicianId(),
                'prioritas'       => $report->tingkat_urgensi === 'tinggi' ? 'Berat' : 'Sedang',
                'tanggal_mulai'   => now(),
                'tanggal_selesai' => now(),
                'foto_after'      => $fotoAfterPath,
            ]);
        } else {
            if ($fotoAfterPath) {
                $wo->foto_after = $fotoAfterPath;
            }
            $wo->tanggal_selesai = now();
            $wo->save();
        }

        // Perbarui status laporan
        $report->status_laporan = 'selesai';
        $report->save();

        // Kembalikan status fasilitas menjadi Baik
        if ($report->facility) {
            $report->facility->kondisi = 'Baik';
            $report->facility->save();
        }

        return redirect()->route('petugas.dashboard')
            ->with('success', 'Perbaikan berhasil diselesaikan! Fasilitas telah kembali ke kondisi Baik.');
    }

    /**
     * Dapatkan id_teknisi yang valid dari technician_vendors untuk user petugas saat ini.
     */
    private function resolveTechnicianId(): int
    {
        $user = Auth::user();
        if ($user) {
            // 1. Cek kecocokan nama depan di tabel technician_vendors
            $firstName = explode(' ', trim($user->nama))[0];
            $tech = TechnicianVendor::where('nama_teknisi', 'like', '%' . $firstName . '%')->first();
            if ($tech) {
                return $tech->id_teknisi;
            }

            // 2. Jika belum ada di technician_vendors, buatkan otomatis sesuai profil petugas
            $newTech = TechnicianVendor::firstOrCreate(
                ['nama_teknisi' => $user->nama],
                [
                    'jenis_teknisi' => 'Teknisi ' . ($user->category->name ?? 'Fasilitas Sekolah'),
                    'kontak'        => '08' . str_pad((string)$user->id_user, 9, '0', STR_PAD_LEFT),
                ]
            );

            if ($newTech && $newTech->id_teknisi) {
                return $newTech->id_teknisi;
            }
        }

        // 3. Fallback ke teknisi pertama yang tersedia di database
        $firstTech = TechnicianVendor::first();
        if ($firstTech) {
            return $firstTech->id_teknisi;
        }

        // 4. Jika tabel kosong sama sekali, buatkan satu teknisi default
        $defaultTech = TechnicianVendor::create([
            'nama_teknisi'  => 'Teknisi Sekolah',
            'jenis_teknisi' => 'Teknisi Umum',
            'kontak'        => '081234567890',
        ]);

        return $defaultTech->id_teknisi;
    }
}
