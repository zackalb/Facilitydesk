<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechnicianVendor;

class TechnicianVendorSeeder extends Seeder
{
    public function run(): void
    {
        $technicians = [
            [
                'nama_teknisi'  => 'Andi Saputra',
                'jenis_teknisi' => 'Teknisi AC & Listrik',
                'kontak'        => '081234567890',
            ],
            [
                'nama_teknisi'  => 'Budi Pratama',
                'jenis_teknisi' => 'Teknisi Bangunan & Mebel',
                'kontak'        => '081234567891',
            ],
            [
                'nama_teknisi'  => 'Dani Sanitasi',
                'jenis_teknisi' => 'Teknisi Pipa & Air',
                'kontak'        => '081234567892',
            ],
            [
                'nama_teknisi'  => 'Joko Perkasa',
                'jenis_teknisi' => 'Teknisi Kelistrikan & Jaringan',
                'kontak'        => '081234567893',
            ],
        ];

        foreach ($technicians as $tech) {
            TechnicianVendor::firstOrCreate(
                ['nama_teknisi' => $tech['nama_teknisi']],
                $tech
            );
        }
    }
}
