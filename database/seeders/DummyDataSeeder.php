<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Facility;
use App\Models\DamageReport;
use App\Models\Verification;
use App\Models\WorkOrder;
use App\Models\TechnicianVendor;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tambah Teknisi / Vendor jika belum ada
        $teknisiList = [
            [
                'nama_teknisi' => 'Budi Listrik Pratama',
                'jenis_teknisi' => 'Listrik',
                'kontak' => '081234567890',
            ],
            [
                'nama_teknisi' => 'Andi AC Service',
                'jenis_teknisi' => 'AC / Pendingin',
                'kontak' => '081234567891',
            ],
            [
                'nama_teknisi' => 'Dani Pipa Bocor',
                'jenis_teknisi' => 'Pipa Air',
                'kontak' => '081234567892',
            ],
            [
                'nama_teknisi' => 'Joko Mebel Perkasa',
                'jenis_teknisi' => 'Mebel / Kayu',
                'kontak' => '081234567893',
            ],
        ];

        $teknisiIds = [];
        foreach ($teknisiList as $tek) {
            $t = TechnicianVendor::firstOrCreate(['nama_teknisi' => $tek['nama_teknisi']], $tek);
            $teknisiIds[$tek['jenis_teknisi']] = $t->id_teknisi;
        }

        // Ambil User Pelapor
        $pelapor = User::where('status', 'pelapor')->first();
        if (!$pelapor) {
            $pelapor = User::create([
                'nama' => 'Budi Santoso',
                'email' => 'pelapor@sekolah.com',
                'password' => Hash::make('password123'),
                'status' => 'pelapor',
            ]);
        }

        // Ambil Fasilitas
        $facilities = Facility::all();
        if ($facilities->isEmpty()) {
            $this->call(FacilitySeeder::class);
            $facilities = Facility::all();
        }

        $fac1 = $facilities->first(); // Listrik & Lampu Lab A
        $fac2 = $facilities->skip(1)->first(); // Wastafel Lt 2
        $fac3 = $facilities->skip(2)->first(); // AC Ruang Kelas 304
        $fac4 = $facilities->skip(3)->first(); // Proyektor Ruang Pertemuan

        // 2. Buat Laporan Kerusakan
        
        // Laporan 1: Menunggu Inspeksi (Bukan Darurat)
        $rep1 = DamageReport::firstOrCreate([
            'deskripsi_kerusakan' => 'Hubungan singkat arus listrik di komputer nomor 5. Stop kontak terbakar dan mengeluarkan asap.',
        ], [
            'id_user' => $pelapor->id_user,
            'id_fasilitas' => $fac1->id_fasilitas,
            'tanggal_waktu' => '2023-10-24 08:15:00',
            'foto_bukti' => null,
            'is_emergency' => false,
            'tingkat_urgensi' => 'rendah',
            'status_laporan' => 'menunggu',
        ]);

        // Laporan 2: Menunggu Inspeksi (Belum Diverifikasi)
        $rep2 = DamageReport::firstOrCreate([
            'deskripsi_kerusakan' => 'Wastafel toilet pria tersumbat and air meluap membasahi lantai toilet.',
        ], [
            'id_user' => $pelapor->id_user,
            'id_fasilitas' => $fac2->id_fasilitas,
            'tanggal_waktu' => '2023-10-23 14:30:00',
            'foto_bukti' => null,
            'is_emergency' => false,
            'tingkat_urgensi' => 'sedang',
            'status_laporan' => 'menunggu',
        ]);

        // Laporan 3: Dalam Perbaikan (Sudah Diverifikasi & Ada Work Order Aktif)
        $rep3 = DamageReport::firstOrCreate([
            'deskripsi_kerusakan' => 'AC tidak mengeluarkan udara dingin sama sekali, hanya hembusan angin saja kelas terasa sangat gerah.',
        ], [
            'id_user' => $pelapor->id_user,
            'id_fasilitas' => $fac3->id_fasilitas,
            'tanggal_waktu' => '2023-10-23 09:00:00',
            'foto_bukti' => null,
            'is_emergency' => false,
            'tingkat_urgensi' => 'sedang',
            'status_laporan' => 'proses',
        ]);

        $ver3 = Verification::firstOrCreate([
            'id_laporan' => $rep3->id_laporan,
        ], [
            'tanggal_verifikasi' => '2023-10-23 10:00:00',
            'kategori_kerusakan' => 'AC / Pendingin',
            'catatan_inspeksi' => 'Kondensor AC kotor dan freon berkurang drastis.',
        ]);

        $wo3 = WorkOrder::firstOrCreate([
            'id_verifikasi' => $ver3->id_verifikasi,
        ], [
            'id_teknisi' => $teknisiIds['AC / Pendingin'],
            'prioritas' => 'sedang',
            'tanggal_mulai' => '2023-10-23 11:00:00',
            'tanggal_selesai' => null,
            'foto_after' => null,
        ]);

        // Laporan 4: Selesai (Sudah Diverifikasi & Work Order Selesai)
        $rep4 = DamageReport::firstOrCreate([
            'deskripsi_kerusakan' => 'Proyektor mati total saat digunakan rapat. Lampu indikator merah berkedip terus.',
        ], [
            'id_user' => $pelapor->id_user,
            'id_fasilitas' => $fac4->id_fasilitas,
            'tanggal_waktu' => '2023-10-22 11:20:00',
            'foto_bukti' => null,
            'is_emergency' => false,
            'tingkat_urgensi' => 'tinggi',
            'status_laporan' => 'selesai',
        ]);

        $ver4 = Verification::firstOrCreate([
            'id_laporan' => $rep4->id_laporan,
        ], [
            'tanggal_verifikasi' => '2023-10-22 13:00:00',
            'kategori_kerusakan' => 'Listrik',
            'catatan_inspeksi' => 'Power supply terbakar, perlu diganti dengan modul baru.',
        ]);

        $wo4 = WorkOrder::firstOrCreate([
            'id_verifikasi' => $ver4->id_verifikasi,
        ], [
            'id_teknisi' => $teknisiIds['Listrik'],
            'prioritas' => 'tinggi',
            'tanggal_mulai' => '2023-10-22 14:00:00',
            'tanggal_selesai' => '2023-10-22 16:30:00',
            'foto_after' => 'bukti-selesai/proyektor-ok.jpg',
        ]);
        
        // Buat beberapa record selesai lainnya untuk menaikkan statistik selesai bulan ini jika total laporan kurang dari 15
        if (DamageReport::count() < 10) {
            for ($i = 0; $i < 10; $i++) {
                $repDone = DamageReport::create([
                    'id_user' => $pelapor->id_user,
                    'id_fasilitas' => $facilities->random()->id_fasilitas,
                    'tanggal_waktu' => now()->subDays(rand(1, 15)),
                    'deskripsi_kerusakan' => 'Laporan contoh selesai nomor ' . ($i + 1),
                    'foto_bukti' => null,
                    'is_emergency' => false,
                    'status_laporan' => 'selesai',
                ]);
                
                $verDone = Verification::create([
                    'id_laporan' => $repDone->id_laporan,
                    'tanggal_verifikasi' => now()->subDays(rand(1, 15)),
                    'kategori_kerusakan' => 'Fasilitas Umum',
                    'catatan_inspeksi' => 'Perbaikan diselesaikan dengan baik.',
                ]);
                
                WorkOrder::create([
                    'id_verifikasi' => $verDone->id_verifikasi,
                    'id_teknisi' => $teknisiIds['Listrik'],
                    'prioritas' => 'rendah',
                    'tanggal_mulai' => now()->subDays(rand(1, 15)),
                    'tanggal_selesai' => now(),
                    'foto_after' => null,
                ]);
            }
        }
    }
}
