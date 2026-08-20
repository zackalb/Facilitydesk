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
                'nama_fasilitas' => 'Listrik & Lampu Lab A',
                'lokasi_detail'  => 'Gedung A, Lantai 1, Lab Komputer A',
                'kategori_area'  => 'Laboratorium',
                'kondisi'        => 'Rusak Ringan',
            ],
            [
                'nama_fasilitas' => 'Wastafel Lt 2',
                'lokasi_detail'  => 'Gedung B, Lantai 2, Toilet Pria',
                'kategori_area'  => 'Sanitasi / Toilet',
                'kondisi'        => 'Bocor',
            ],
            [
                'nama_fasilitas' => 'AC Ruang Kelas 304',
                'lokasi_detail'  => 'Gedung A, Lantai 3, Ruang 304',
                'kategori_area'  => 'Ruang Kelas',
                'kondisi'        => 'Tidak Dingin',
            ],
            [
                'nama_fasilitas' => 'Proyektor Ruang Pertemuan',
                'lokasi_detail'  => 'Gedung C, Lantai 1, Aula Utama',
                'kategori_area'  => 'Aula / Fasilitas Umum',
                'kondisi'        => 'Mati Total',
            ],
            [
                'nama_fasilitas' => 'Pintu Kaca Perpustakaan',
                'lokasi_detail'  => 'Gedung D, Lantai 1, Perpustakaan',
                'kategori_area'  => 'Fasilitas Umum',
                'kondisi'        => 'Engsel Longgar',
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::firstOrCreate(['nama_fasilitas' => $facility['nama_fasilitas']], $facility);
        }
    }
}
