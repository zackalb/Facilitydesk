<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $role = $request->query('role', 'pelapor');
        
        $header = "Login Pelapor (Siswa / Guru)";
        $placeholder = "Masukkan Email Anda";
        $subtext = "Masuk untuk mengelola dan melaporkan fasilitas sekolah.";
        
        if ($role === 'admin') {
            $header = "Portal Admin Sarpras";
            $placeholder = "Masukkan Email Staf Admin";
            $subtext = "Masuk untuk mengelola laporan perbaikan, RAB, dan inventaris sekolah.";
        } elseif ($role === 'kepsek') {
            $header = "Portal Manajemen & Persetujuan RAB";
            $placeholder = "Masukkan Email Kepala Sekolah";
            $subtext = "Masuk untuk meninjau laporan, memberikan persetujuan RAB, dan memantau aset sekolah.";
        }
        
        return view('auth.login', compact('role', 'header', 'placeholder', 'subtext'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'identity' => 'required|string',
            'password' => 'required|string',
            'role'     => 'required|string'
        ]);

        // Catatan: Karena di ERD tabel users hanya memiliki kolom 'nama', 'email', 'status',
        // kita menggunakan 'email' sebagai field identity (NIS/NIP) untuk saat ini.
        $credentials = [
            'email' => $request->identity,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session(['active_role' => $request->role]);
            
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'identity' => 'Identitas Email atau Password yang anda masukkan salah.',
        ])->onlyInput('identity');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
