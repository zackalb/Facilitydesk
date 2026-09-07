<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('2fa:reset {email? : Email user yang ingin di-reset 2FA-nya}', function ($email = null) {
    if ($email) {
        $user = \App\Models\User::where('email', $email)->first();
        if (!$user) {
            $this->error("User dengan email {$email} tidak ditemukan.");
            return;
        }
        $user->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ])->save();
        $this->info("2FA untuk {$email} berhasil dinonaktifkan!");
    } else {
        \App\Models\User::query()->update([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ]);
        $this->info("2FA untuk SEMUA user berhasil dinonaktifkan/direset!");
    }
})->purpose('Reset 2FA Two-Factor Authentication untuk user atau semua user');

Artisan::command('workorders:sync', function () {
    $reports = \App\Models\DamageReport::with(['facility', 'verification.workOrder'])->get();
    $count = 0;
    foreach ($reports as $r) {
        if (in_array($r->status_laporan, ['proses', 'selesai', 'darurat'])) {
            $v = $r->verification;
            if (!$v) {
                $v = \App\Models\Verification::create([
                    'id_laporan' => $r->id_laporan,
                    'tanggal_verifikasi' => $r->tanggal_waktu ?? now(),
                    'kategori_kerusakan' => $r->facility->kategori_area ?? 'Umum',
                    'catatan_inspeksi' => 'Penanganan perbaikan oleh teknisi lapangan.',
                ]);
            }
            if (!$v->workOrder) {
                \App\Models\WorkOrder::create([
                    'id_verifikasi' => $v->id_verifikasi,
                    'id_teknisi' => 1,
                    'prioritas' => $r->tingkat_urgensi === 'tinggi' ? 'Berat' : 'Sedang',
                    'tanggal_mulai' => $r->tanggal_waktu ?? now(),
                    'tanggal_selesai' => $r->status_laporan === 'selesai' ? now() : null,
                    'foto_after' => null,
                ]);
                $count++;
            }
        }
    }
    $this->info("Berhasil sinkronisasi {$count} data ke tabel verifications dan work_orders!");
})->purpose('Sinkronisasi data laporan kerusakan ke tabel verifications dan work_orders');

Artisan::command('db:cleanup-default-tables', function () {
    $tablesToDrop = [
        'cache',
        'cache_locks',
        'failed_jobs',
        'jobs',
        'job_batches',
        'passkeys',
        'password_reset_tokens',
        'sessions',
    ];

    foreach ($tablesToDrop as $table) {
        if (\Illuminate\Support\Facades\Schema::hasTable($table)) {
            \Illuminate\Support\Facades\Schema::dropIfExists($table);
        }
    }
    $this->info("Pembersihan tabel bawaan Laravel selesai!");
})->purpose('Hapus tabel bawaan Laravel yang tidak terpakai');

Artisan::command('rab:seed-demo', function () {
    $budget = \App\Models\SchoolBudget::firstOrCreate(
        ['tahun_ajaran' => '2026/2027'],
        ['total_anggaran' => 50000000, 'sisa_saldo' => 42000000]
    );

    $pelapor = \App\Models\User::where('status', 'pelapor')->first();
    $teknisi = \App\Models\TechnicianVendor::first();

    // 1. Proposal 1: Perbaikan Atap Aula Utama (Rp 15.500.000 / Rp 1.105.000)
    $fac1 = \App\Models\Facility::firstOrCreate(
        ['nama_fasilitas' => 'Atap & Plafon Aula Utama'],
        ['kategori_area' => 'Struktur Bangunan', 'kondisi' => 'Rusak', 'lokasi_detail' => 'Gedung A, Lantai 3, Ruang Kelas 302']
    );

    $rep1 = \App\Models\DamageReport::firstOrCreate(
        ['deskripsi_kerusakan' => 'Plafon jebol akibat rembesan air hujan dari atap. Rangka kayu sebagian lapuk dan perlu diganti. Kondisi membahayakan kegiatan belajar mengajar karena potensi runtuh susulan.'],
        [
            'id_user' => $pelapor ? $pelapor->id_user : 1,
            'id_fasilitas' => $fac1->id_fasilitas,
            'tanggal_waktu' => '2023-10-24 09:30:00',
            'foto_bukti' => null,
            'is_emergency' => true,
            'tingkat_urgensi' => 'tinggi',
            'status_laporan' => 'proses',
        ]
    );

    $ver1 = \App\Models\Verification::firstOrCreate(
        ['id_laporan' => $rep1->id_laporan],
        [
            'tanggal_verifikasi' => '2023-10-24 10:00:00',
            'kategori_kerusakan' => 'Struktur Bangunan',
            'catatan_inspeksi' => 'Rangka atap butuh penggantian material galvalum dan gypsum board.',
        ]
    );

    $prop1 = \App\Models\BudgetProposal::updateOrCreate(
        ['id_verifikasi' => $ver1->id_verifikasi],
        [
            'id_anggaran' => $budget->id_anggaran,
            'estimasi_biaya' => 1105000,
            'rincian_kebutuhan' => 'Pengadaan material gypsum, rangka galvalum, cat, dan ongkos tukang.',
            'status_persetujuan' => 'menunggu_persetujuan',
        ]
    );

    \App\Models\RabItem::where('id_rab', $prop1->id_rab)->delete();
    $items1 = [
        ['nama' => 'Gypsum Board 9mm (Gyproc)', 'qty' => 4, 'satuan' => 'lbr', 'harga' => 65000],
        ['nama' => 'Rangka Hollow 4x4 (Galvalum)', 'qty' => 6, 'satuan' => 'btg', 'harga' => 45000],
        ['nama' => 'Cat Tembok/Plafon Putih (Dulux 5kg)', 'qty' => 1, 'satuan' => 'gln', 'harga' => 175000],
        ['nama' => 'Jasa Tukang (Perbaikan & Pengecatan)', 'qty' => 2, 'satuan' => 'hr', 'harga' => 200000],
    ];
    foreach ($items1 as $it) {
        \App\Models\RabItem::create([
            'id_rab' => $prop1->id_rab,
            'nama_sarana_jasa' => $it['nama'],
            'qty' => $it['qty'],
            'satuan' => $it['satuan'],
            'harga_satuan' => $it['harga'],
            'subtotal' => $it['qty'] * $it['harga'],
        ]);
    }

    // 2. Proposal 2: Penggantian Pipa Saluran Air Bersih (Rp 3.200.000)
    $fac2 = \App\Models\Facility::firstOrCreate(
        ['nama_fasilitas' => 'Pipa Saluran Air Bersih'],
        ['kategori_area' => 'Pipa Air / Sanitasi', 'kondisi' => 'Rusak', 'lokasi_detail' => 'Gedung B, Lantai 1 Toilet']
    );

    $rep2 = \App\Models\DamageReport::firstOrCreate(
        ['deskripsi_kerusakan' => 'Pipa distribusi air bersih pecah di dinding toilet lantai 1. Mengakibatkan rembesan air dan tekanan air ke lantai 2 mati total.'],
        [
            'id_user' => $pelapor ? $pelapor->id_user : 1,
            'id_fasilitas' => $fac2->id_fasilitas,
            'tanggal_waktu' => '2023-10-23 14:15:00',
            'foto_bukti' => null,
            'is_emergency' => false,
            'tingkat_urgensi' => 'tinggi',
            'status_laporan' => 'proses',
        ]
    );

    $ver2 = \App\Models\Verification::firstOrCreate(
        ['id_laporan' => $rep2->id_laporan],
        [
            'tanggal_verifikasi' => '2023-10-23 15:00:00',
            'kategori_kerusakan' => 'Pipa Air',
            'catatan_inspeksi' => 'Pipa PVC pecah sepanjang 12 meter.',
        ]
    );

    $prop2 = \App\Models\BudgetProposal::updateOrCreate(
        ['id_verifikasi' => $ver2->id_verifikasi],
        [
            'id_anggaran' => $budget->id_anggaran,
            'estimasi_biaya' => 3200000,
            'rincian_kebutuhan' => 'Pengadaan pipa PVC AW 3/4, fitting, kran, dan jasa pembongkaran dinding.',
            'status_persetujuan' => 'menunggu_persetujuan',
        ]
    );

    \App\Models\RabItem::where('id_rab', $prop2->id_rab)->delete();
    $items2 = [
        ['nama' => 'Pipa PVC 3/4 inch (Wavin AW)', 'qty' => 10, 'satuan' => 'btg', 'harga' => 85000],
        ['nama' => 'Fitting, Knee, & Lem Pipa Heavy Duty', 'qty' => 1, 'satuan' => 'paket', 'harga' => 350000],
        ['nama' => 'Kran Air Stainless Steel 1/2 inch', 'qty' => 4, 'satuan' => 'pcs', 'harga' => 250000],
        ['nama' => 'Jasa Pembongkaran & Pemasangan Pipa', 'qty' => 2, 'satuan' => 'hr', 'harga' => 500000],
    ];
    foreach ($items2 as $it) {
        \App\Models\RabItem::create([
            'id_rab' => $prop2->id_rab,
            'nama_sarana_jasa' => $it['nama'],
            'qty' => $it['qty'],
            'satuan' => $it['satuan'],
            'harga_satuan' => $it['harga'],
            'subtotal' => $it['qty'] * $it['harga'],
        ]);
    }

    // 3. Proposal 3: Pengadaan Proyektor Ruang Kelas 10A (Rp 7.800.000)
    $fac3 = \App\Models\Facility::firstOrCreate(
        ['nama_fasilitas' => 'Proyektor Ruang Kelas 10A'],
        ['kategori_area' => 'Elektronik / Kelas', 'kondisi' => 'Rusak', 'lokasi_detail' => 'Gedung C, Ruang Kelas 10A']
    );

    $rep3 = \App\Models\DamageReport::firstOrCreate(
        ['deskripsi_kerusakan' => 'Lampu proyektor mati dan mainboard short circuit akibat lonjakan tegangan listrik.'],
        [
            'id_user' => $pelapor ? $pelapor->id_user : 1,
            'id_fasilitas' => $fac3->id_fasilitas,
            'tanggal_waktu' => '2023-10-22 11:00:00',
            'foto_bukti' => null,
            'is_emergency' => false,
            'tingkat_urgensi' => 'tinggi',
            'status_laporan' => 'proses',
        ]
    );

    $ver3 = \App\Models\Verification::firstOrCreate(
        ['id_laporan' => $rep3->id_laporan],
        [
            'tanggal_verifikasi' => '2023-10-22 12:00:00',
            'kategori_kerusakan' => 'Elektronik',
            'catatan_inspeksi' => 'Biaya perbaikan lebih tinggi daripada pengadaan unit baru garansi resmi.',
        ]
    );

    $prop3 = \App\Models\BudgetProposal::updateOrCreate(
        ['id_verifikasi' => $ver3->id_verifikasi],
        [
            'id_anggaran' => $budget->id_anggaran,
            'estimasi_biaya' => 7800000,
            'rincian_kebutuhan' => 'Pengadaan proyektor 3800 lumens, bracket gantung, kabel HDMI 20M, dan instalasi.',
            'status_persetujuan' => 'menunggu_persetujuan',
        ]
    );

    \App\Models\RabItem::where('id_rab', $prop3->id_rab)->delete();
    $items3 = [
        ['nama' => 'Projector InFocus XGA 3800 ANSI Lumens', 'qty' => 1, 'satuan' => 'unit', 'harga' => 6500000],
        ['nama' => 'Bracket Plafon Proyektor Universal Heavy Duty', 'qty' => 1, 'satuan' => 'unit', 'harga' => 350000],
        ['nama' => 'Kabel HDMI 20 Meter 4K Braided', 'qty' => 1, 'satuan' => 'pcs', 'harga' => 450000],
        ['nama' => 'Jasa Instalasi Plafon & Kalibrasi', 'qty' => 1, 'satuan' => 'paket', 'harga' => 500000],
    ];
    foreach ($items3 as $it) {
        \App\Models\RabItem::create([
            'id_rab' => $prop3->id_rab,
            'nama_sarana_jasa' => $it['nama'],
            'qty' => $it['qty'],
            'satuan' => $it['satuan'],
            'harga_sarana' => $it['harga'] ?? 0,
            'harga_satuan' => $it['harga'],
            'subtotal' => $it['qty'] * $it['harga'],
        ]);
    }

    $this->info("Berhasil membuat 3 proposal RAB demo yang cocok dengan desain!");
})->purpose('Seed 3 proposal RAB demo sesuai screenshot');


