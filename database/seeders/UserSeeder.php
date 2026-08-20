<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Pelapor (Siswa/Guru)
        User::firstOrCreate(
            ['email' => 'pelapor@sekolah.com'],
            [
                'nama'     => 'Budi Santoso',
                'password' => Hash::make('password123'),
                'status'   => 'pelapor',
            ]
        );

        // Akun Admin Sarpras
        User::firstOrCreate(
            ['email' => 'admin@sekolah.com'],
            [
                'nama'     => 'Siti Admin',
                'password' => Hash::make('password123'),
                'status'   => 'admin',
            ]
        );

        // Akun Kepala Sekolah
        User::firstOrCreate(
            ['email' => 'kepsek@sekolah.com'],
            [
                'nama'     => 'Dr. Hendra Kepala',
                'password' => Hash::make('password123'),
                'status'   => 'kepsek',
            ]
        );
    }
}
