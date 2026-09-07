<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            [
                'nama_fasilitas' => 'AC Daikin 2PK',
                'lokasi_detail'  => 'Gedung A, R.302',
                'kategori_area'  => 'Elektronik',
                'kondisi'        => 'Baik',
            ],
            [
                'nama_fasilitas' => 'Kursi Kuliah Informa',
                'lokasi_detail'  => 'Gedung B, Aula Utama',
                'kategori_area'  => 'Furnitur',
                'kondisi'        => 'Rusak',
            ],
            [
                'nama_fasilitas' => 'Proyektor Epson EB-X500',
                'lokasi_detail'  => 'Gedung C, Lab Komputer',
                'kategori_area'  => 'Elektronik',
                'kondisi'        => 'Dalam Perbaikan',
            ],
            [
                'nama_fasilitas' => 'Pintu Kaca Utama',
                'lokasi_detail'  => 'Gedung D, Lobi',
                'kategori_area'  => 'Struktur Gedung',
                'kondisi'        => 'Baik',
            ],
            [
                'nama_fasilitas' => 'Listrik & Stop Kontak Lab',
                'lokasi_detail'  => 'Gedung A, Lantai 1, Lab Komputer A',
                'kategori_area'  => 'Elektronik',
                'kondisi'        => 'Baik',
            ],
            [
                'nama_fasilitas' => 'Wastafel Otomatis',
                'lokasi_detail'  => 'Gedung B, Lantai 2, Toilet Pria',
                'kategori_area'  => 'Sanitasi',
                'kondisi'        => 'Rusak',
            ],
            [
                'nama_fasilitas' => 'Meja Rapat Oval',
                'lokasi_detail'  => 'Gedung A, Ruang Rapat Pimpinan',
                'kategori_area'  => 'Furnitur',
                'kondisi'        => 'Baik',
            ],
            [
                'nama_fasilitas' => 'Sound System Portable',
                'lokasi_detail'  => 'Gedung C, Ruang Kesenian',
                'kategori_area'  => 'Elektronik',
                'kondisi'        => 'Baik',
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::updateOrCreate(['nama_fasilitas' => $facility['nama_fasilitas']], $facility);
        }
    }
}
