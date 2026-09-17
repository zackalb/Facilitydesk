<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Keamanan - SIPERFAS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-mono-code { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-800 flex flex-col h-screen overflow-hidden">

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-slate-100 flex flex-col h-full hidden md:flex shrink-0">
            <div class="p-6">
                <!-- Logo -->
                <div class="flex items-center space-x-3 mb-8">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                    <div>
                        <h1 class="text-sm font-bold text-slate-900 leading-tight">SIPERFAS</h1>
                        <p class="text-[10px] text-slate-500 font-medium">Sistem Informasi Pelaporan Fasilitas</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-1.5">
                    @if(in_array($role, ['admin', 'sarpras', 'admin_sarpras']))
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('admin.work-orders.index') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            <span>Perintah Kerja</span>
                        </a>
                        <a href="{{ route('admin.inventory.index') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span>Katalog Inventaris</span>
                        </a>
                        <a href="{{ route('admin.analytics.index') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span>Laporan & Analitik</span>
                        </a>
                    @elseif(in_array($role, ['petugas', 'teknisi', 'staf']))
                        <a href="{{ route('petugas.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            <span>Tugas Perbaikan</span>
                        </a>
                    @else
                        <a href="{{ route('pelapor.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Lapor Kerusakan</span>
                        </a>
                        <a href="{{ route('pelapor.tickets') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                            </svg>
                            <span>Tiket Saya</span>
                        </a>
                    @endif
                </nav>
            </div>

            <!-- Sidebar Footer / Settings & Logout -->
            <div class="mt-auto p-6 border-t border-slate-100">
                <div class="space-y-1.5">
                    <a href="{{ route('settings.security') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/50 text-blue-700 rounded-xl text-sm font-semibold border-l-2 border-blue-600 transition-all">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Pengaturan</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-xl text-sm font-medium transition-all">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col h-full overflow-hidden">
            <!-- Topbar: Responsif Mobile & Desktop -->
            <header class="bg-white border-b border-slate-100 flex items-center justify-between px-4 sm:px-8 py-3.5 z-20 shrink-0">
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="md:hidden text-slate-500 hover:text-slate-800 mr-1 p-1 rounded-lg hover:bg-slate-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    </a>
                    <div>
                        <h2 class="text-base sm:text-lg font-bold text-slate-800">Pengaturan Keamanan</h2>
                        <p class="text-[11px] sm:text-xs text-slate-500 hidden sm:block">Kelola Autentikasi Dua Faktor (2FA) dan perlindungan akun Anda</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 sm:space-x-4">
                    <button class="text-slate-500 hover:text-blue-600 transition-all relative p-1.5 rounded-lg hover:bg-slate-50">
                        <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </button>

                    <!-- Avatar Profile Info with Dropdown Toggle -->
                    <div class="relative pl-3 border-l border-slate-200" id="securityProfileContainer">
                        @php
                            $statusUser = strtolower($user->status ?? $user->role ?? '');
                            if ($statusUser === 'admin') {
                                $labelJabatan = 'Kepala Sarpras';
                            } elseif (in_array($statusUser, ['petugas', 'teknisi', 'staf'])) {
                                $labelJabatan = $user->category ? 'Teknisi ' . $user->category->name : 'Petugas Teknisi';
                            } else {
                                $labelJabatan = (str_contains(strtolower($user->nama ?? ''), 'guru') || str_contains(strtolower($user->email ?? ''), 'guru')) ? 'Guru Sekolah' : 'Siswa';
                            }
                        @endphp

                        <button type="button" onclick="toggleSecurityProfileDropdown()" class="flex items-center space-x-3 focus:outline-none cursor-pointer group">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-bold text-slate-900 leading-tight group-hover:text-blue-600 transition-colors">{{ $user->nama ?? 'Pengguna' }}</p>
                                <p class="text-[11px] text-slate-500 font-semibold">{{ $labelJabatan }}</p>
                            </div>
                            @if(($user->status ?? '') === 'admin' || ($user->role ?? '') === 'admin')
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full overflow-hidden border border-blue-200 shadow-xs flex items-center justify-center shrink-0 group-hover:ring-2 group-hover:ring-blue-400 transition-all">
                                    <svg class="w-full h-full" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="50" r="50" fill="#2563eb"/>
                                        <circle cx="50" cy="38" r="16" fill="#bfdbfe"/>
                                        <ellipse cx="50" cy="85" rx="33" ry="25" fill="#bfdbfe"/>
                                    </svg>
                                </div>
                            @else
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-blue-100 text-blue-700 font-bold text-sm sm:text-base flex items-center justify-center border border-blue-200 shadow-xs shrink-0 group-hover:ring-2 group-hover:ring-blue-400 transition-all">
                                    {{ strtoupper(substr($user->nama ?? 'U', 0, 1)) }}
                                </div>
                            @endif
                        </button>

                        <!-- Profile Popover / Dropdown Menu -->
                        <div id="securityProfileDropdown" class="hidden absolute right-0 mt-2.5 w-60 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 animate-in fade-in duration-150">
                            <div class="px-4 py-2.5 border-b border-slate-100">
                                <p class="text-xs font-bold text-slate-900 leading-tight">{{ $user->nama ?? 'Pengguna' }}</p>
                                <p class="text-[11px] text-slate-500 font-medium truncate mt-0.5">{{ $user->email ?? '' }}</p>
                                <span class="inline-block mt-1.5 px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded-md">
                                    {{ $labelJabatan }}
                                </span>
                            </div>
                            <div class="p-1.5">
                                <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Apakah Anda yakin ingin keluar?');">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center space-x-2.5 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 rounded-xl transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                        <span>Keluar</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content with Mobile Bottom Clearance -->
            <div class="flex-1 overflow-auto p-4 md:p-8 bg-[#f8fafc] pb-24 md:pb-8">
                <div class="max-w-4xl mx-auto space-y-6">

                    <!-- Notification Messages -->
                    @if (session('status') == 'two-factor-authentication-enabled')
                        <div class="p-4 bg-blue-50 border border-blue-200 text-blue-800 rounded-2xl flex items-start gap-3 shadow-sm">
                            <svg class="w-5 h-5 text-blue-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-semibold text-sm">Autentikasi Dua Faktor telah disiapkan!</p>
                                <p class="text-xs mt-0.5 text-blue-700">Silakan pindai kode QR di bawah menggunakan Google Authenticator atau Authy, lalu masukkan 6-digit kode OTP untuk menyelesaikan konfirmasi.</p>
                            </div>
                        </div>
                    @elseif (session('status') == 'two-factor-authentication-confirmed')
                        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-start gap-3 shadow-sm">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-bold">2FA Berhasil Diaktifkan!</h4>
                                <p class="text-xs mt-0.5 text-blue-700">Autentikasi dua faktor sekarang aktif untuk akun Anda. Harap simpan kode pemulihan (recovery codes) Anda di tempat yang aman.</p>
                            </div>
                        </div>
                    @elseif (session('status') == 'two-factor-authentication-disabled')
                        <div class="p-4 bg-slate-100 border border-slate-200 text-slate-700 rounded-2xl flex items-start gap-3">
                            <svg class="w-5 h-5 text-slate-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4 class="text-sm font-bold">2FA Telah Dinonaktifkan</h4>
                                <p class="text-xs mt-0.5">Perlindungan autentikasi dua faktor akun Anda telah dimatikan.</p>
                            </div>
                        </div>
                    @elseif (session('status') == 'recovery-codes-generated')
                        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-start gap-3 shadow-sm">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-sm">Kode Pemulihan Baru Berhasil Dibuat!</p>
                                <p class="text-xs mt-0.5 text-emerald-700">Kode pemulihan lama Anda telah digantikan dan tidak dapat digunakan lagi.</p>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl flex items-start gap-3">
                            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p class="font-medium">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- User Account Card -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center space-x-4">
                            @if(($user->status ?? '') === 'admin' || ($user->role ?? '') === 'admin')
                                <div class="w-12 h-12 rounded-2xl overflow-hidden shadow-md shadow-blue-900/10 shrink-0">
                                    <svg class="w-full h-full" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="50" r="50" fill="#2563eb"/>
                                        <circle cx="50" cy="38" r="16" fill="#bfdbfe"/>
                                        <ellipse cx="50" cy="85" rx="33" ry="25" fill="#bfdbfe"/>
                                    </svg>
                                </div>
                            @else
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#0B3A82] to-blue-600 text-white flex items-center justify-center font-bold text-lg shadow-md shadow-blue-900/10 shrink-0">
                                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <h3 class="text-base font-bold text-slate-800">{{ $user->nama }}</h3>
                                <p class="text-xs text-slate-500 font-mono-code">{{ $user->email }}</p>
                            </div>
                        </div>
                        
                        <div>
                            @if ($twoFactorEnabled)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    2FA Aktif & Terlindungi
                                </span>
                            @elseif ($twoFactorPending)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200/80">
                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                    Menunggu Konfirmasi Kode
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                    <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                    2FA Belum Aktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- 2FA Main Management Card -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        
                        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-slate-800">Autentikasi Dua Faktor (Two-Factor Authentication)</h3>
                                    <p class="text-xs text-slate-500">Menambahkan lapisan keamanan ekstra ke akun Anda menggunakan aplikasi authenticator.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 space-y-6">

                            {{-- KONDISI 1: 2FA BELUM AKTIF --}}
                            @if (! $twoFactorEnabled && ! $twoFactorPending)
                                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                                    <div class="max-w-xl">
                                        <h4 class="text-sm font-bold text-slate-800 mb-2">Mengapa Anda perlu mengaktifkan 2FA?</h4>
                                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                            Ketika Autentikasi Dua Faktor diaktifkan, Anda akan diminta memasukkan token 6-digit yang aman dan acak dari aplikasi ponsel (seperti <strong>Google Authenticator</strong>, <strong>Microsoft Authenticator</strong>, atau <strong>Authy</strong>) setiap kali Anda masuk ke sistem SIPERFAS.
                                        </p>

                                        <form method="POST" action="{{ route('two-factor.enable') }}">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center gap-2 bg-[#0B3A82] text-white px-5 py-2.5 rounded-xl hover:bg-blue-800 transition-all font-semibold shadow-md shadow-blue-900/10 text-xs">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                                <span>Aktifkan Autentikasi Dua Faktor</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            {{-- KONDISI 2: 2FA PENDING KONFIRMASI (QR CODE DITAMPILKAN) --}}
                            @if ($twoFactorPending)
                                <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100">
                                    <div class="flex items-center gap-2 text-blue-800 font-bold text-sm mb-4">
                                        <span class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs">1</span>
                                        <span>Pindai Kode QR dengan Aplikasi Authenticator</span>
                                    </div>

                                    <p class="text-xs text-slate-600 leading-relaxed mb-6">
                                        Buka aplikasi autentikator di ponsel Anda (misalnya <strong>Google Authenticator</strong>), pilih <strong>Scan a QR code</strong>, dan arahkan kamera ke barcode berikut:
                                    </p>

                                    <div class="flex flex-col sm:flex-row items-center gap-8 mb-6">
                                        <!-- QR Code Container -->
                                        <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-200 shrink-0">
                                            {!! $qrCodeSvg !!}
                                        </div>

                                        <!-- Manual Secret Key -->
                                        <div class="space-y-3 flex-1 text-center sm:text-left">
                                            <p class="text-xs font-semibold text-slate-700">Tidak bisa memindai barcode?</p>
                                            <p class="text-xs text-slate-500 leading-relaxed">
                                                Anda dapat memasukkan kode kunci manual (Setup Key) berikut ke aplikasi:
                                            </p>
                                            <div class="flex items-center gap-2 max-w-sm">
                                                <input 
                                                    type="text" 
                                                    readonly 
                                                    id="setup-key-input"
                                                    value="{{ $setupKey }}" 
                                                    class="w-full font-mono-code text-xs py-2 px-3 bg-white border border-slate-200 rounded-lg text-slate-700 font-semibold select-all"
                                                >
                                                <button 
                                                    type="button" 
                                                    onclick="copySetupKey()"
                                                    id="copy-key-btn"
                                                    class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-medium transition-colors shrink-0 flex items-center gap-1"
                                                >
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                    </svg>
                                                    <span id="copy-text">Salin</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-t border-blue-100 pt-6">
                                        <div class="flex items-center gap-2 text-blue-800 font-bold text-sm mb-3">
                                            <span class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs">2</span>
                                            <span>Konfirmasi Kode OTP 6-Digit</span>
                                        </div>

                                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                            Masukkan 6 digit angka yang muncul di aplikasi autentikator Anda untuk mengonfirmasi pengaktifan 2FA:
                                        </p>

                                        <form method="POST" action="{{ route('two-factor.confirm') }}" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 max-w-md">
                                            @csrf
                                            <input 
                                                type="text" 
                                                name="code" 
                                                inputmode="numeric" 
                                                autocomplete="one-time-code" 
                                                maxlength="6" 
                                                required 
                                                placeholder="000000" 
                                                class="font-mono-code text-center tracking-[0.2em] text-lg font-bold py-2.5 px-4 border border-blue-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 text-slate-800 placeholder-slate-300"
                                            >
                                            <button type="submit" class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl hover:bg-emerald-700 transition-all font-semibold shadow-md shadow-emerald-900/10 text-xs shrink-0 flex items-center justify-center gap-1.5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                <span>Verifikasi & Aktifkan</span>
                                            </button>
                                        </form>

                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('two-factor.disable') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs font-semibold text-slate-500 hover:text-red-600 transition-colors">
                                                    Batalkan Pengaturan 2FA
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- KONDISI 3: 2FA SUDAH AKTIF --}}
                            @if ($twoFactorEnabled)
                                <div class="space-y-6">
                                    
                                    <!-- Recovery Codes Box -->
                                    <div class="bg-slate-900 text-white rounded-2xl p-6 border border-slate-800 shadow-md">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                                    </svg>
                                                    <h4 class="text-sm font-bold text-white">Kode Pemulihan Darurat (Recovery Codes)</h4>
                                                </div>
                                                <p class="text-xs text-slate-400 mt-1">
                                                    Simpan kode-kode berikut di tempat yang aman. Anda dapat menggunakannya jika kehilangan akses ke perangkat autentikator.
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-2">
                                                <button 
                                                    type="button" 
                                                    onclick="copyAllRecoveryCodes()" 
                                                    class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-lg text-xs font-medium transition-colors flex items-center gap-1.5 border border-slate-700"
                                                >
                                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                    </svg>
                                                    <span id="copy-codes-text">Salin Semua</span>
                                                </button>

                                                <button 
                                                    type="button" 
                                                    onclick="downloadRecoveryCodes()" 
                                                    class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-lg text-xs font-medium transition-colors flex items-center gap-1.5 border border-slate-700"
                                                >
                                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                    </svg>
                                                    <span>Unduh .txt</span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Grid of Recovery Codes -->
                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 bg-slate-950/60 p-4 rounded-xl border border-slate-800/80 mb-4" id="recovery-codes-list">
                                            @foreach ($recoveryCodes as $code)
                                                <div class="font-mono-code text-xs text-emerald-400 bg-slate-900/80 px-3 py-2 rounded-lg text-center font-bold tracking-wider border border-slate-800/50">
                                                    {{ $code }}
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Regenerate Codes Button -->
                                        <div class="flex items-center justify-between pt-2">
                                            <p class="text-[11px] text-slate-400">Setiap kode pemulihan hanya dapat digunakan satu kali.</p>
                                            
                                            <form method="POST" action="{{ route('two-factor.regenerate-recovery-codes') }}" onsubmit="return confirm('Apakah Anda yakin ingin membuat ulang kode pemulihan? Kode lama Anda tidak akan berlaku lagi.');">
                                                @csrf
                                                <button type="submit" class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                                    </svg>
                                                    <span>Buat Ulang Kode Pemulihan</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Disable 2FA Danger Zone -->
                                    <div class="p-5 border border-red-100 bg-red-50/40 rounded-2xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                        <div>
                                            <h4 class="text-xs font-bold text-red-900">Nonaktifkan Autentikasi Dua Faktor</h4>
                                            <p class="text-xs text-red-700/80 mt-0.5">
                                                Menonaktifkan 2FA akan mengurangi tingkat keamanan akun Anda.
                                            </p>
                                        </div>

                                        <form method="POST" action="{{ route('two-factor.disable') }}" onsubmit="return confirm('Apakah Anda yakin ingin menonaktifkan Autentikasi Dua Faktor (2FA)? Akun Anda akan menjadi kurang aman.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl text-xs font-semibold shadow-sm transition-colors shrink-0">
                                                Nonaktifkan 2FA
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <script>
        function copySetupKey() {
            const copyText = document.getElementById("setup-key-input");
            navigator.clipboard.writeText(copyText.value);
            
            const btnText = document.getElementById("copy-text");
            btnText.innerText = "Tersalin!";
            setTimeout(() => {
                btnText.innerText = "Salin";
            }, 2000);
        }

        function copyAllRecoveryCodes() {
            const codes = @json($recoveryCodes);
            const textToCopy = "KODE PEMULIHAN 2FA SIPERFAS\nAkun: {{ $user->email }}\n\n" + codes.join("\n");
            
            navigator.clipboard.writeText(textToCopy);
            const btnText = document.getElementById("copy-codes-text");
            btnText.innerText = "Tersalin!";
            setTimeout(() => {
                btnText.innerText = "Salin Semua";
            }, 2000);
        }

        function downloadRecoveryCodes() {
            const codes = @json($recoveryCodes);
            const textContent = "KODE PEMULIHAN 2FA SIPERFAS\nAkun: {{ $user->email }}\nTanggal: " + new Date().toLocaleString('id-ID') + "\n\n" + codes.join("\n") + "\n\nCatatan: Setiap kode hanya dapat digunakan satu kali.";
            
            const blob = new Blob([textContent], { type: "text/plain;charset=utf-8" });
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "siperfas-kode-pemulihan.txt";
            link.click();
        }

        // Profile Dropdown Toggle
        function toggleSecurityProfileDropdown() {
            const menu = document.getElementById('securityProfileDropdown');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        document.addEventListener('click', function(e) {
            const container = document.getElementById('securityProfileContainer');
            const menu = document.getElementById('securityProfileDropdown');
            if (container && menu && !container.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

    @if(!in_array($role, ['admin']))
        <!-- Mobile Bottom Navigation Bar (Sesuai Role Pengguna) -->
        <nav class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200/90 shadow-[0_-4px_20px_rgba(0,0,0,0.06)] px-4 py-2 flex items-center justify-around safe-area-bottom">
            @if(in_array($role, ['petugas', 'teknisi', 'staf']))
                <!-- Role Petugas Teknisi -->
                <a href="{{ route('petugas.dashboard') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-slate-400 hover:text-slate-600 font-medium">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <span class="text-[10px] mt-1 tracking-tight">Tugas Perbaikan</span>
                </a>
                <a href="{{ route('settings.security') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-blue-600 font-bold">
                    <svg class="w-5 h-5 text-blue-600 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="text-[10px] mt-1 tracking-tight">Pengaturan</span>
                    <span class="w-1.5 h-1.5 bg-blue-600 rounded-full mt-0.5"></span>
                </a>
            @else
                <!-- Role Pelapor -->
                <a href="{{ route('pelapor.dashboard') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-slate-400 hover:text-slate-600 font-medium">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="text-[10px] mt-1 tracking-tight">Lapor Kerusakan</span>
                </a>
                <a href="{{ route('pelapor.tickets') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-slate-400 hover:text-slate-600 font-medium">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                    <span class="text-[10px] mt-1 tracking-tight">Tiket Saya</span>
                </a>
                <a href="{{ route('settings.security') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-blue-600 font-bold">
                    <svg class="w-5 h-5 text-blue-600 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="text-[10px] mt-1 tracking-tight">Pengaturan</span>
                    <span class="w-1.5 h-1.5 bg-blue-600 rounded-full mt-0.5"></span>
                </a>
            @endif
        </nav>
    @endif
</body>
</html>
