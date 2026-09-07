<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Orders - FacilityDesk</title>
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
                <a href="{{ route('admin.work-orders.index') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/70 text-blue-700 rounded-xl text-sm font-bold transition-all shadow-xs">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <a href="{{ route('admin.technicians.index') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

        <!-- Sidebar Footer -->
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
                    @if($hasEmergency)
                        <span class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5 bg-red-600 rounded-full border-2 border-white animate-pulse"></span>
                    @endif
                </button>
                <button class="text-slate-500 hover:text-blue-600 transition-all">
                    <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Avatar Profile Info -->
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

            <!-- 1. 3 KPI Metric Cards (Screenshot 1) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <!-- TOTAL WO -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">TOTAL WO</p>
                        <h3 class="text-3xl font-black text-blue-900 mt-2 tracking-tight">{{ $totalWo }}</h3>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                </div>

                <!-- MENUNGGU PERBAIKAN -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">MENUNGGU PERBAIKAN</p>
                        <h3 class="text-3xl font-black text-blue-600 mt-2 tracking-tight">{{ $menungguPerbaikan }}</h3>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                </div>

                <!-- SELESAI (BULAN INI) -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">SELESAI (BULAN INI)</p>
                        <h3 class="text-3xl font-black text-[#7c2d12] mt-2 tracking-tight">{{ $selesaiBulanIni }}</h3>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#ea580c] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- 2. Search & Filter Bar (Screenshot 1) -->
            <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-wrap items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-3">
                    <!-- Search Input -->
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" id="searchInput" placeholder="Cari No. Tiket, Lokasi..." class="pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 w-56 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>

                    <!-- Filter Status -->
                    <select id="statusFilter" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="">Semua Status</option>
                        <option value="perbaikan">Perbaikan / Proses</option>
                        <option value="inspeksi">Inspeksi / Menunggu</option>
                        <option value="selesai">Selesai</option>
                    </select>

                    <!-- Filter Prioritas -->
                    <select id="priorityFilter" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="">Semua Prioritas</option>
                        <option value="berat">Berat</option>
                        <option value="sedang">Sedang</option>
                        <option value="ringan">Ringan</option>
                    </select>
                </div>

                <!-- Export Buttons Group -->
                <div class="flex items-center gap-2">
                    <button type="button" onclick="exportWoToExcel()" class="px-3.5 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 font-bold rounded-xl text-xs flex items-center gap-1.5 transition-all cursor-pointer border border-emerald-200 shadow-xs">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Export Excel</span>
                    </button>
                    <button type="button" onclick="window.print()" class="px-3.5 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold rounded-xl text-xs flex items-center gap-1.5 transition-all cursor-pointer border border-blue-200 shadow-xs">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        <span>Cetak / PDF</span>
                    </button>
                </div>
            </div>

            <!-- Print Header Dokumen Resmi (Hanya Muncul Saat Print/PDF) -->
            <div class="hidden print:block mb-6 border-b-2 border-slate-900 pb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-black text-slate-900 uppercase tracking-wide">FACILITYDESK - REKAPITULASI WORK ORDERS</h1>
                        <p class="text-xs text-slate-600 font-bold mt-0.5">Badan Pengelola Sarana, Prasarana & Manajemen Aset Sekolah</p>
                    </div>
                    <div class="text-right text-[11px] text-slate-500 font-medium">
                        <p>Tanggal Cetak: {{ now()->format('d F Y, H:i') }} WIB</p>
                        <p>Admin: {{ $user->nama ?? 'Budi Santoso' }}</p>
                    </div>
                </div>
            </div>

            <!-- 3. Work Orders Table (Screenshot 1) -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="text-slate-400 font-bold border-b border-slate-100">
                            <tr>
                                <th class="py-3 px-3">No work order</th>
                                <th class="py-3 px-3">Tanggal</th>
                                <th class="py-3 px-3">Pelapor</th>
                                <th class="py-3 px-3">Lokasi</th>
                                <th class="py-3 px-3">Fasilitas</th>
                                <th class="py-3 px-3 text-center">Prioritas</th>
                                <th class="py-3 px-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50" id="woTableBody">
                            @forelse($allReports as $rep)
                                @php
                                    $ticketCode = '#TK-' . ($rep->tanggal_waktu ? $rep->tanggal_waktu->format('Y') : '2023') . '-' . str_pad($rep->id_laporan, 3, '0', STR_PAD_LEFT);
                                    $dateFormatted = $rep->tanggal_waktu ? $rep->tanggal_waktu->format('d M Y') : '24 Okt 2023';
                                    $reporterName = $rep->user ? $rep->user->nama : 'Bpk. Budi Santoso';
                                    $locationName = $rep->facility ? ($rep->facility->lokasi_detail ?? $rep->facility->kategori_area ?? 'Lab Komputer A') : 'Lab Komputer A';
                                    $facilityName = $rep->facility ? $rep->facility->nama_fasilitas : 'Fasilitas Sekolah';
                                    
                                    // Prioritas Badge Mapping
                                    $urgency = strtolower($rep->tingkat_urgensi ?? 'sedang');
                                    if ($urgency === 'tinggi' || $rep->is_emergency) {
                                        $prioLabel = 'Berat';
                                        $prioClass = 'bg-red-50 text-red-600 border border-red-100';
                                    } elseif ($urgency === 'rendah') {
                                        $prioLabel = 'Ringan';
                                        $prioClass = 'bg-slate-100 text-slate-600';
                                    } else {
                                        $prioLabel = 'Sedang';
                                        $prioClass = 'bg-amber-50 text-amber-700 border border-amber-100';
                                    }

                                    // Status Badge Mapping
                                    $status = strtolower($rep->status_laporan ?? 'menunggu');
                                    if ($status === 'selesai') {
                                        $statusLabel = 'Selesai';
                                        $statusClass = 'bg-slate-100 text-slate-700';
                                    } elseif ($status === 'proses') {
                                        $statusLabel = 'Perbaikan';
                                        $statusClass = 'bg-blue-50 text-blue-700 border border-blue-100';
                                    } else {
                                        $statusLabel = 'Inspeksi';
                                        $statusClass = 'bg-indigo-50 text-indigo-700 border border-indigo-100';
                                    }
                                @endphp
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <!-- No work order -->
                                    <td class="py-3.5 px-3 font-bold text-blue-700">
                                        <a href="{{ route('admin.work-orders.show', $rep->id_laporan) }}" class="hover:underline">
                                            {{ $ticketCode }}
                                        </a>
                                    </td>

                                    <!-- Tanggal -->
                                    <td class="py-3.5 px-3 font-medium text-slate-600">
                                        {{ $dateFormatted }}
                                    </td>

                                    <!-- Pelapor -->
                                    <td class="py-3.5 px-3 font-medium text-slate-800">
                                        {{ $reporterName }}
                                    </td>

                                    <!-- Lokasi -->
                                    <td class="py-3.5 px-3 font-medium text-slate-600">
                                        {{ $locationName }}
                                    </td>

                                    <!-- Fasilitas -->
                                    <td class="py-3.5 px-3 font-medium text-slate-800">
                                        {{ $facilityName }}
                                    </td>

                                    <!-- Prioritas -->
                                    <td class="py-3.5 px-3 text-center">
                                        <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold inline-block {{ $prioClass }}">
                                            {{ $prioLabel }}
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="py-3.5 px-3 text-center">
                                        <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold inline-block {{ $statusClass }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 text-center text-slate-400 font-medium">
                                        Belum ada data work order.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer Pagination & Entry Count (Screenshot 1) -->
                <div class="mt-6 pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-semibold text-slate-500">
                    <p>Menampilkan 1 hingga {{ min(count($allReports), 10) }} dari {{ $totalWo }} entri</p>
                    
                    <div class="flex items-center gap-1.5">
                        <button class="w-7 h-7 rounded-lg border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-slate-50 transition-all">
                            ‹
                        </button>
                        <button class="w-7 h-7 rounded-lg bg-[#1e3a8a] text-white font-bold flex items-center justify-center shadow-xs">
                            1
                        </button>
                        <button class="w-7 h-7 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all">
                            2
                        </button>
                        <button class="w-7 h-7 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all">
                            3
                        </button>
                        <button class="w-7 h-7 rounded-lg border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-all">
                            ›
                        </button>
                    </div>
                <!-- Footer Tanda Tangan Resmi (Hanya Muncul Saat Cetak / Export PDF) -->
                <div class="hidden print:flex justify-between items-end mt-12 pt-8 text-xs font-semibold">
                    <div class="space-y-1">
                        <p class="text-slate-500">Status Rekapitulasi: Resmi & Terverifikasi</p>
                        <p class="text-slate-500">FacilityDesk Smart School Asset</p>
                    </div>
                    <div class="text-center w-64 space-y-16">
                        <p class="text-slate-800">Mengetahui,<br>Kepala Bagian Sarana & Prasarana</p>
                        <p class="font-extrabold text-slate-900 underline uppercase tracking-wider">( {{ $user->nama ?? 'Budi Santoso' }} )</p>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Client-side filter & Export helper -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const priorityFilter = document.getElementById('priorityFilter');
        const tableBody = document.getElementById('woTableBody');

        function filterTable() {
            const query = searchInput.value.toLowerCase();
            const statusVal = statusFilter.value.toLowerCase();
            const prioVal = priorityFilter.value.toLowerCase();

            const rows = tableBody.getElementsByTagName('tr');
            for (let row of rows) {
                const text = row.innerText.toLowerCase();
                const matchQuery = !query || text.includes(query);
                const matchStatus = !statusVal || text.includes(statusVal);
                const matchPrio = !prioVal || text.includes(prioVal);

                if (matchQuery && matchStatus && matchPrio) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
        priorityFilter.addEventListener('change', filterTable);

        function exportWoToExcel() {
            let csv = [];
            csv.push(['NO WORK ORDER', 'TANGGAL', 'PELAPOR', 'LOKASI', 'FASILITAS', 'PRIORITAS', 'STATUS'].join(','));

            const rows = tableBody.getElementsByTagName('tr');
            for (let row of rows) {
                if (row.style.display !== 'none') {
                    const cols = row.querySelectorAll('td');
                    if (cols.length >= 7) {
                        const rowData = [
                            `"${cols[0].innerText.trim()}"`,
                            `"${cols[1].innerText.trim()}"`,
                            `"${cols[2].innerText.trim()}"`,
                            `"${cols[3].innerText.trim()}"`,
                            `"${cols[4].innerText.trim()}"`,
                            `"${cols[5].innerText.trim()}"`,
                            `"${cols[6].innerText.trim()}"`
                        ];
                        csv.push(rowData.join(','));
                    }
                }
            }

            const csvContent = 'data:text/csv;charset=utf-8,\uFEFF' + encodeURIComponent(csv.join('\n'));
            const downloadLink = document.createElement('a');
            downloadLink.setAttribute('href', csvContent);
            downloadLink.setAttribute('download', 'Rekapitulasi_Work_Orders_' + new Date().toISOString().slice(0, 10) + '.csv');
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }
    </script>
</body>
</html>
