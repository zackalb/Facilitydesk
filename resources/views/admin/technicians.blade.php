<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas & Teknisi - FacilityDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-800 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-slate-100 flex flex-col h-full hidden md:flex shrink-0 z-20">
        <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                <div>
                    <h1 class="text-sm font-bold text-slate-900 leading-tight">facility management</h1>
                    <p class="text-[10px] text-slate-500 font-medium">Administrative Office</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-1.5">
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
                    <span>Work orders</span>
                </a>
                <a href="{{ route('admin.inventory.index') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span>Katalog Inventaris</span>
                </a>
                <!-- Menu Data Petugas (Aktif) -->
                <a href="{{ route('admin.technicians.index') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/70 text-blue-700 rounded-xl text-sm font-bold border-l-[3px] border-blue-600 transition-all shadow-xs">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span>Data Petugas</span>
                </a>
                <a href="{{ route('admin.analytics.index') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Laporan & Analitik</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer / Settings & Logout -->
        <div class="mt-auto p-6 border-t border-slate-100">
            <div class="space-y-1.5">
                <a href="{{ route('settings.security') }}" class="flex items-center space-x-3 px-4 py-2 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Settings</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-xl text-sm font-medium transition-all">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Topbar: Konsisten Admin SarPras -->
        <header class="bg-white border-b border-slate-100 flex items-center justify-between px-8 py-4 z-10 shrink-0">
            <h2 class="text-xl font-extrabold text-blue-950 tracking-tight">Admin SarPras</h2>

            <!-- Notifications & Profile -->
            <div class="flex items-center space-x-5">
                <button class="text-slate-500 hover:text-blue-600 transition-all relative">
                    <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                    @if($hasEmergency ?? false)
                        <span class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5 bg-red-600 rounded-full border-2 border-white animate-pulse"></span>
                    @endif
                </button>
                <button class="text-slate-500 hover:text-blue-600 transition-all">
                    <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Avatar Profile Info (Siluet Biru Khusus Admin) -->
                <div class="flex items-center space-x-3 border-l border-slate-200 pl-5">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-900 leading-tight">{{ $user->nama ?? 'Budi Santoso' }}</p>
                        <p class="text-[11px] text-slate-500 font-semibold">Kepala Sarpras</p>
                    </div>
                    <div class="w-10 h-10 rounded-full overflow-hidden border border-blue-200 shadow-xs flex items-center justify-center shrink-0">
                        <svg class="w-full h-full" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50" fill="#2563eb"/>
                            <circle cx="50" cy="38" r="16" fill="#bfdbfe"/>
                            <ellipse cx="50" cy="85" rx="33" ry="25" fill="#bfdbfe"/>
                        </svg>
                    </div>
                </div>
            </div>
        </header>

        <!-- Scrollable Page Content -->
        <div class="flex-1 overflow-auto p-8 space-y-6">

            <!-- Flash Success Message -->
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-bold flex items-center gap-2 shadow-xs">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Flash Error Message -->
            @if(session('error'))
                <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl text-sm font-bold flex items-center gap-2 shadow-xs">
                    <svg class="w-5 h-5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl text-sm font-bold space-y-1 shadow-xs">
                    @foreach($errors->all() as $err)
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $err }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- 1. Header Page & Add Button -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h3 class="text-2xl font-black text-blue-950 tracking-tight">Data Petugas & Teknisi Lapangan</h3>
                    <p class="text-xs text-slate-500 font-medium mt-1">Kelola data petugas, akun login, dan spesialisasi kategori penanganan perbaikan fasilitas.</p>
                </div>
                <button type="button" onclick="openAddModal()" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs flex items-center gap-2 transition-all shadow-md shadow-blue-600/20 cursor-pointer active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Tambah Petugas Teknisi</span>
                </button>
            </div>

            <!-- 2. KPI Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <!-- TOTAL TEKNISI -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">TOTAL PETUGAS</p>
                        <h3 class="text-3xl font-black text-blue-900 mt-2 tracking-tight">{{ $totalTechnicians }}</h3>
                        <p class="text-[11px] text-slate-400 font-semibold mt-1">Akun teknisi aktif di sistem</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- TUGAS AKTIF -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">TUGAS SEDANG BERJALAN</p>
                        <h3 class="text-3xl font-black text-amber-600 mt-2 tracking-tight">{{ $activeTasksTotal }}</h3>
                        <p class="text-[11px] text-amber-600 font-semibold mt-1">Dalam proses / inspeksi teknisi</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- TOTAL SELESAI -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">PERBAIKAN SELESAI</p>
                        <h3 class="text-3xl font-black text-emerald-600 mt-2 tracking-tight">{{ $completedTasksTotal }}</h3>
                        <p class="text-[11px] text-emerald-600 font-semibold mt-1">Tiket sukses diperbaiki</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- 3. Filter & Search Controls -->
            <form method="GET" action="{{ route('admin.technicians.index') }}" class="bg-white p-4 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex flex-1 flex-wrap items-center gap-3 w-full">
                    <!-- Search Input -->
                    <div class="relative flex-1 min-w-[240px]">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama teknisi atau email..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    </div>

                    <!-- Filter Kategori Spesialisasi -->
                    <select name="category_id" onchange="this.form.submit()" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                        <option value="">Semua Spesialisasi Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-2 w-full md:w-auto justify-end">
                    @if(request('search') || request('category_id'))
                        <a href="{{ route('admin.technicians.index') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl text-xs transition-all">
                            Reset Filter
                        </a>
                    @endif
                    <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white font-bold rounded-xl text-xs transition-all">
                        Terapkan
                    </button>
                </div>
            </form>

            <!-- 4. Technicians Grid Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($technicians as $tech)
                    @php
                        $catName = $tech->category ? $tech->category->name : 'Umum';
                        $catId = $tech->category_id;
                        
                        // Badge Spesialisasi Color & Icon
                        if ($catId == 1) { // Listrik
                            $badgeClass = 'bg-amber-50 text-amber-700 border-amber-200';
                            $icon = '⚡';
                        } elseif ($catId == 2) { // Air
                            $badgeClass = 'bg-sky-50 text-sky-700 border-sky-200';
                            $icon = '🚰';
                        } elseif ($catId == 3) { // Bangunan
                            $badgeClass = 'bg-orange-50 text-orange-700 border-orange-200';
                            $icon = '🏢';
                        } elseif ($catId == 4) { // IT
                            $badgeClass = 'bg-indigo-50 text-indigo-700 border-indigo-200';
                            $icon = '💻';
                        } else {
                            $badgeClass = 'bg-slate-100 text-slate-700 border-slate-200';
                            $icon = '🔧';
                        }
                    @endphp
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_8px_rgba(0,0,0,0.03)] p-6 flex flex-col justify-between hover:border-blue-200 hover:shadow-md transition-all group relative">
                        <div>
                            <!-- Card Header: Avatar & Spesialisasi -->
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex items-center space-x-3.5">
                                    <!-- Initial Letter Avatar -->
                                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 font-black text-lg flex items-center justify-center border border-blue-200 shadow-xs group-hover:scale-105 transition-transform shrink-0">
                                        {{ strtoupper(substr($tech->nama, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h4 class="text-base font-extrabold text-slate-900 leading-snug group-hover:text-blue-600 transition-colors">
                                            {{ $tech->nama }}
                                        </h4>
                                        <p class="text-xs text-slate-500 font-medium font-mono mt-0.5">{{ $tech->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Spesialisasi Badge -->
                            <div class="mt-4 pt-4 border-t border-slate-50 flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Spesialisasi:</span>
                                <span class="px-2.5 py-1 rounded-lg text-xs font-bold border flex items-center gap-1.5 {{ $badgeClass }}">
                                    <span>{{ $icon }}</span>
                                    <span>{{ $catName }}</span>
                                </span>
                            </div>

                            <!-- Tasks Workload Stats -->
                            <div class="grid grid-cols-2 gap-2 mt-3 bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                                <div class="text-center p-1.5 bg-white rounded-lg border border-slate-100">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase">Tugas Aktif</p>
                                    <p class="text-sm font-black text-amber-600 mt-0.5">{{ $tech->active_tasks_count }} Tiket</p>
                                </div>
                                <div class="text-center p-1.5 bg-white rounded-lg border border-slate-100">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase">Selesai</p>
                                    <p class="text-sm font-black text-emerald-600 mt-0.5">{{ $tech->completed_tasks_count }} Tiket</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Actions (Edit & Hapus) -->
                        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Siap Ditugaskan
                            </span>

                            <div class="flex items-center gap-1.5">
                                <button type="button" onclick="openEditModal({{ json_encode($tech) }})" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Edit Teknisi">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </button>
                                <button type="button" onclick="confirmDelete({{ $tech->id_user }}, '{{ addslashes($tech->nama) }}')" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus Teknisi">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-slate-100 p-8">
                        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-800">Belum ada data teknisi yang sesuai.</h4>
                        <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">Klik tombol di bawah untuk mendaftarkan akun petugas teknisi baru ke sistem.</p>
                        <button type="button" onclick="openAddModal()" class="mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs inline-flex items-center gap-2 transition-all">
                            <span>+ Tambah Teknisi Baru</span>
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Modal Tambah Teknisi Baru -->
    <div id="addModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-7 shadow-2xl border border-slate-100 transition-all transform animate-in fade-in zoom-in-95 duration-200">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-black text-slate-900">Tambah Petugas Teknisi</h3>
                        <p class="text-[11px] text-slate-400 font-medium">Daftarkan akun teknisi dan pilih bidang spesialisasi.</p>
                    </div>
                </div>
                <button type="button" onclick="closeAddModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.technicians.store') }}" class="mt-5 space-y-4">
                @csrf
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap Teknisi <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" required placeholder="Contoh: Joko Perkasa, S.T." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                </div>

                <!-- Email Login -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Email Login <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required placeholder="Contoh: joko.teknisi@sekolah.com" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                </div>

                <!-- Password Awal -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Password Awal <span class="text-red-500">*</span></label>
                    <input type="password" name="password" required value="password123" placeholder="Minimal 6 karakter" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <p class="text-[10px] text-slate-400 mt-1">Default: <code class="font-mono bg-slate-100 px-1 py-0.5 rounded">password123</code> (dapat diubah teknisi nanti).</p>
                </div>

                <!-- Kategori Spesialisasi -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Kategori Spesialisasi <span class="text-red-500">*</span></label>
                    <input type="text" name="kategori" list="category_suggestions" required placeholder="Contoh: Listrik, AC, Plumbing, Bangunan, IT, CCTV..." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <datalist id="category_suggestions">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">
                        @endforeach
                    </datalist>
                    <p class="text-[10px] text-slate-400 mt-1">Ketik nama spesialisasi bidang teknisi (bebas diisi sesuai kebutuhan).</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-3">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs transition-all shadow-md shadow-blue-600/20 cursor-pointer">
                        Simpan Teknisi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Teknisi -->
    <div id="editModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-7 shadow-2xl border border-slate-100 transition-all transform">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-black text-slate-900">Edit Data Teknisi</h3>
                        <p class="text-[11px] text-slate-400 font-medium">Perbarui profil dan spesialisasi petugas.</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="editForm" method="POST" action="" class="mt-5 space-y-4">
                @csrf
                @method('PUT')
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap Teknisi <span class="text-red-500">*</span></label>
                    <input type="text" id="edit_nama" name="nama" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                </div>

                <!-- Email Login -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Email Login <span class="text-red-500">*</span></label>
                    <input type="email" id="edit_email" name="email" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                </div>

                <!-- Password Baru (Opsional) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Password Baru (Opsional)</label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                </div>

                <!-- Kategori Spesialisasi -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Kategori Spesialisasi <span class="text-red-500">*</span></label>
                    <input type="text" id="edit_kategori" name="kategori" list="category_suggestions" required placeholder="Contoh: Listrik, AC, Plumbing, Bangunan, IT, CCTV..." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    <p class="text-[10px] text-slate-400 mt-1">Ketik nama spesialisasi bidang teknisi (bebas diisi sesuai kebutuhan).</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-3">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs transition-all shadow-md shadow-blue-600/20 cursor-pointer">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-slate-100 text-center">
            <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <h3 class="text-base font-black text-slate-900">Hapus Petugas Teknisi?</h3>
            <p class="text-xs text-slate-500 mt-1">Apakah Anda yakin ingin menghapus akun <span id="delete_tech_name" class="font-bold text-slate-800"></span> dari sistem?</p>

            <form id="deleteForm" method="POST" action="" class="mt-6 flex items-center justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="closeDeleteModal()" class="w-1/2 py-2 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                    Batal
                </button>
                <button type="submit" class="w-1/2 py-2 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl text-xs transition-all shadow-md shadow-red-600/20">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(tech) {
            document.getElementById('edit_nama').value = tech.nama;
            document.getElementById('edit_email').value = tech.email;
            document.getElementById('edit_kategori').value = tech.category ? tech.category.name : '';
            document.getElementById('editForm').action = "/admin/technicians/" + tech.id_user;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function confirmDelete(id, name) {
            document.getElementById('delete_tech_name').innerText = name;
            document.getElementById('deleteForm').action = "/admin/technicians/" + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</body>
</html>
