<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Work Order - FacilityDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] antialiased text-slate-800 flex flex-col h-screen overflow-hidden">

    <!-- Red Warning Banner for Emergency Reports -->
    @if($hasEmergency)
        <div class="bg-[#cc0000] text-white text-center py-2.5 px-4 font-bold text-xs uppercase tracking-wider flex items-center justify-center gap-2 shrink-0 animate-pulse">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <span>PERINGATAN: Laporan Darurat Baru Masuk!</span>
        </div>
    @endif

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-slate-100 flex flex-col h-full hidden md:flex shrink-0">
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
                    <a href="{{ route('admin.work-orders.index') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/50 text-blue-700 rounded-xl text-sm font-semibold border-l-2 border-blue-600 transition-all">
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

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full overflow-hidden">
            <!-- Topbar -->
            <header class="bg-white border-b border-slate-100 flex items-center justify-between px-8 py-4 z-10 shrink-0">
                <h2 class="text-xl font-extrabold text-blue-950 tracking-tight">Admin SarPras</h2>

                <!-- Notifications & Profile -->
                <div class="flex items-center space-x-5">
                    <button class="text-slate-500 hover:text-blue-600 transition-all relative">
                        <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
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

            <!-- Scrollable Content Container -->
            <div class="flex-1 overflow-auto p-8">
                <div class="max-w-6xl mx-auto space-y-6">

                    <!-- Back Button & Page Header -->
                    <div class="space-y-2">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-xs font-semibold text-blue-600 hover:text-blue-700 hover:underline gap-1.5 transition-all">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            <span>Kembali ke Daftar Tiket</span>
                        </a>

                        <div class="flex items-center gap-4">
                            <h3 class="text-2xl font-bold text-slate-900">
                                Detail Work Orders #@if($report->verification && $report->verification->workOrder)WO-{{ $report->tanggal_waktu->format('Y') }}-{{ str_pad($report->verification->workOrder->id_wo, 3, '0', STR_PAD_LEFT) }}@else TKT-{{ $report->tanggal_waktu->format('Y') }}-{{ str_pad($report->id_laporan, 3, '0', STR_PAD_LEFT) }}@endif
                            </h3>
                            
                            @if($report->status_laporan === 'darurat')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-red-700 border border-red-100">
                                    Darurat
                                </span>
                            @elseif($report->status_laporan === 'menunggu')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                    Inspeksi
                                </span>
                            @elseif($report->status_laporan === 'proses')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                    Perbaikan
                                </span>
                            @elseif($report->status_laporan === 'selesai')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700 border border-green-100">
                                    Selesai
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Split Layout Content -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                        
                        <!-- Left Column: Report Card Detail -->
                        <div class="lg:col-span-5 bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">
                            <!-- Image section -->
                            <div class="relative h-64 bg-slate-100 flex items-center justify-center overflow-hidden">
                                @if($report->foto_bukti)
                                    <img src="{{ asset('storage/' . $report->foto_bukti) }}" alt="Foto Before" class="w-full h-full object-cover">
                                @else
                                    <div class="text-center text-slate-400 p-6">
                                        <svg class="w-16 h-16 mx-auto mb-2 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p class="text-xs font-semibold">Tidak ada Lampiran Foto Sebelum</p>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4 bg-red-600/90 backdrop-blur-sm text-white text-[11px] font-bold px-3 py-1 rounded-full tracking-wider uppercase">
                                    Foto 'Before'
                                </div>
                            </div>

                            <!-- Text Details -->
                            <div class="p-6 space-y-6">
                                <div>
                                    <h4 class="text-xl font-bold text-slate-900 mb-2">{{ $report->facility->nama_fasilitas }}</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed font-medium">
                                        {{ $report->deskripsi_kerusakan }}
                                    </p>
                                </div>

                                <div class="border-t border-slate-50 pt-5 space-y-4 text-sm font-semibold text-slate-700">
                                    <!-- Location Info -->
                                    <div class="flex items-start gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        </div>
                                        <div>
                                            <div class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-0.5">Lokasi</div>
                                            <div class="text-slate-800">{{ $report->facility->lokasi_detail }}</div>
                                        </div>
                                    </div>

                                    <!-- Date Info -->
                                    <div class="flex items-start gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <div class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-0.5">Tanggal Dilaporkan</div>
                                            <div class="text-slate-800">{{ $report->tanggal_waktu->format('d F Y, H:i') }} WIB</div>
                                        </div>
                                    </div>

                                    <!-- Reporter Info -->
                                    <div class="flex items-start gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                        <div>
                                            <div class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-0.5">Pelapor</div>
                                            <div class="text-slate-800">{{ $report->user->nama }} ({{ ucfirst($report->user->status) }})</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Admin Management & Dispatch Form -->
                        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-100 shadow-sm p-8 flex flex-col space-y-6">
                            
                            <!-- Header Form Administrator -->
                            <div class="flex items-center justify-between border-b border-slate-100 pb-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-slate-900">Manajemen & Penugasan SarPras</h4>
                                        <p class="text-xs text-slate-500 font-medium">Disposisi tugas perbaikan ke teknisi lapangan & pantau status.</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold rounded-xl border border-slate-200">
                                    Role: Admin SarPras
                                </span>
                            </div>

                            @if($errors->any())
                                <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm font-semibold">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @php
                                $wo = $report->verification ? $report->verification->workOrder : null;
                                $hasFotoAfter = $wo && $wo->foto_after;
                                $hasRab = $report->verification && $report->verification->budgetProposal;
                                $assignedTeknisi = $wo ? $wo->id_teknisi : '';
                                
                                $currentPriority = 'Sedang';
                                if ($wo && $wo->prioritas) {
                                    $currentPriority = $wo->prioritas;
                                } elseif ($report->tingkat_urgensi === 'tinggi' || $report->is_emergency) {
                                    $currentPriority = 'Berat';
                                } elseif ($report->tingkat_urgensi === 'rendah') {
                                    $currentPriority = 'Ringan';
                                }
                            @endphp

                            <!-- Status Hasil Pengerjaan Teknisi Lapangan (Bukti Foto After & RAB) -->
                            <div class="p-5 bg-slate-50/80 border border-slate-200/70 rounded-2xl space-y-4">
                                <h5 class="text-xs font-bold text-slate-700 uppercase tracking-wider flex items-center justify-between">
                                    <span>Laporan Lapangan dari Petugas Teknisi</span>
                                    @if($wo && $wo->teknisi)
                                        <span class="text-blue-700 normal-case font-semibold">Petugas: {{ $wo->teknisi->nama_teknisi }} ({{ $wo->teknisi->jenis_teknisi }})</span>
                                    @else
                                        <span class="text-amber-600 normal-case font-semibold">Belum Ada Petugas Ditugaskan</span>
                                    @endif
                                </h5>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
                                    <!-- Foto After dari Teknisi -->
                                    <div class="bg-white p-3 rounded-xl border border-slate-200/80 shadow-xs flex flex-col items-center text-center">
                                        <p class="text-[11px] font-bold text-slate-500 mb-2">Foto Bukti Perbaikan ('After')</p>
                                        @if($hasFotoAfter)
                                            <div class="w-full h-32 rounded-lg overflow-hidden border border-slate-100 mb-1">
                                                <img src="{{ asset('storage/' . $wo->foto_after) }}" alt="Foto After" class="w-full h-full object-cover">
                                            </div>
                                            <span class="text-[10px] font-bold text-emerald-600">✓ Telah Diunggah Teknisi</span>
                                        @else
                                            <div class="w-full h-32 rounded-lg bg-slate-50 flex flex-col items-center justify-center text-slate-400 border border-dashed border-slate-200 mb-1">
                                                <svg class="w-8 h-8 text-slate-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <span class="text-[11px] font-medium">Belum ada foto perbaikan</span>
                                            </div>
                                            <span class="text-[10px] font-medium text-slate-400">Diunggah petugas saat selesai</span>
                                        @endif
                                    </div>

                                    <!-- Status Proposal RAB (Jika Ada) -->
                                    <div class="bg-white p-3 rounded-xl border border-slate-200/80 shadow-xs flex flex-col justify-between">
                                        <div>
                                            <p class="text-[11px] font-bold text-slate-500 mb-2">Pengajuan Biaya / RAB</p>
                                            @if($hasRab)
                                                @php $rab = $report->verification->budgetProposal; @endphp
                                                <div class="p-2.5 bg-blue-50/50 rounded-lg border border-blue-100">
                                                    <p class="text-xs font-bold text-blue-900">Rp {{ number_format($rab->estimasi_biaya, 0, ',', '.') }}</p>
                                                    <p class="text-[10px] text-slate-500 mt-0.5">Status: <span class="font-bold text-blue-700 capitalize">{{ str_replace('_', ' ', $rab->status_persetujuan) }}</span></p>
                                                </div>
                                            @else
                                                <p class="text-xs text-slate-500 font-medium py-4 text-center">Tidak ada pengajuan RAB untuk tiket ini.</p>
                                            @endif
                                        </div>
                                        <a href="{{ route('admin.dashboard') }}" class="text-[11px] font-bold text-blue-600 hover:underline inline-flex items-center gap-1 mt-2">
                                            <span>Lihat di Dashboard RAB</span>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulir Penugasan & Tindakan Administrator Sarpras -->
                            <form id="form-work-order" action="{{ route('admin.work-orders.update', $report->id_laporan) }}" method="POST" class="space-y-6">
                                @csrf

                                <!-- 1. Prioritas Work Order -->
                                <div>
                                    <label class="block text-sm font-bold text-slate-800 mb-2.5">1. Tingkat Prioritas Penanganan</label>
                                    <div class="grid grid-cols-3 gap-3">
                                        <!-- Ringan -->
                                        <label class="border-2 rounded-2xl p-3 flex flex-col justify-between transition-all cursor-pointer {{ $currentPriority === 'Ringan' ? 'border-blue-600 bg-blue-50/50' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                                            <input type="radio" name="tingkat_kerusakan" value="Ringan" class="hidden" {{ $currentPriority === 'Ringan' ? 'checked' : '' }}>
                                            <div class="font-bold text-slate-900 text-xs">Ringan</div>
                                            <p class="text-[10px] text-slate-500 font-medium mt-1">Penanganan rutin &lt; 1 hari</p>
                                        </label>

                                        <!-- Sedang -->
                                        <label class="border-2 rounded-2xl p-3 flex flex-col justify-between transition-all cursor-pointer {{ $currentPriority === 'Sedang' ? 'border-blue-600 bg-blue-50/50' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                                            <input type="radio" name="tingkat_kerusakan" value="Sedang" class="hidden" {{ $currentPriority === 'Sedang' ? 'checked' : '' }}>
                                            <div class="font-bold text-slate-900 text-xs">Sedang</div>
                                            <p class="text-[10px] text-slate-500 font-medium mt-1">Perlu perbaikan khusus</p>
                                        </label>

                                        <!-- Berat -->
                                        <label class="border-2 rounded-2xl p-3 flex flex-col justify-between transition-all cursor-pointer {{ $currentPriority === 'Berat' ? 'border-blue-600 bg-blue-50/50' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                                            <input type="radio" name="tingkat_kerusakan" value="Berat" class="hidden" {{ $currentPriority === 'Berat' ? 'checked' : '' }}>
                                            <div class="font-bold text-slate-900 text-xs">Berat</div>
                                            <p class="text-[10px] text-slate-500 font-medium mt-1">Butuh RAB / Penggantian</p>
                                        </label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- 2. Tugaskan Petugas Teknisi -->
                                    <div>
                                        <label for="id_teknisi" class="block text-sm font-bold text-slate-800 mb-2">2. Tugaskan Petugas Teknisi</label>
                                        <div class="relative">
                                            <select name="id_teknisi" id="id_teknisi" onchange="updateTechContact()" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer">
                                                <option value="" disabled {{ !$assignedTeknisi ? 'selected' : '' }}>Pilih Petugas Teknisi...</option>
                                                @foreach($technicians as $tech)
                                                    <option value="{{ $tech->id_teknisi }}" data-kontak="{{ $tech->kontak }}" data-nama="{{ $tech->nama_teknisi }}" data-jenis="{{ $tech->jenis_teknisi }}" {{ $assignedTeknisi == $tech->id_teknisi ? 'selected' : '' }}>
                                                        {{ $tech->nama_teknisi }} ({{ $tech->jenis_teknisi }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-slate-400">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>

                                        <!-- Quick WhatsApp Contact Box -->
                                        <div id="tech-contact-box" class="hidden mt-2 p-2.5 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center justify-between transition-all">
                                            <div>
                                                <p class="text-[10px] font-bold uppercase text-emerald-800 tracking-wider">Kontak Petugas</p>
                                                <p class="text-xs font-semibold text-emerald-950 mt-0.5" id="tech-contact-number">-</p>
                                            </div>
                                            <a id="tech-wa-btn" href="#" target="_blank" class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold transition-all shadow-xs">
                                                <span>WA</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- 3. Status Work Order -->
                                    <div>
                                        <label for="status_laporan" class="block text-sm font-bold text-slate-800 mb-2">3. Status Work Order</label>
                                        <div class="relative">
                                            <select name="status_laporan" id="status_laporan" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer">
                                                <option value="menunggu" {{ $report->status_laporan === 'menunggu' ? 'selected' : '' }}>Inspeksi (Menunggu)</option>
                                                <option value="proses" {{ $report->status_laporan === 'proses' ? 'selected' : '' }}>Perbaikan (Sedang Dikerjakan)</option>
                                                <option value="selesai" {{ $report->status_laporan === 'selesai' ? 'selected' : '' }}>Selesai (Tuntas)</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-slate-400">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="border-t border-slate-100 pt-5 flex items-center justify-end gap-4">
                                    <a href="{{ route('admin.work-orders.index') }}" class="text-xs font-bold text-slate-400 hover:text-slate-600 transition-colors">
                                        Kembali
                                    </a>
                                    <button type="submit" class="bg-[#0f172a] hover:bg-slate-800 text-white font-bold py-2.5 px-5 rounded-xl text-xs shadow-sm transition-all flex items-center gap-2 cursor-pointer active:scale-95">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        <span>Perbarui Penugasan & Status</span>
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript block for interactive form actions -->
    <script>
        const isFormLocked = {{ isset($isLocked) && $isLocked ? 'true' : 'false' }};
        const isEmergency = {{ ($report->is_emergency || $report->status_laporan === 'darurat' || $report->tingkat_urgensi === 'darurat') ? 'true' : 'false' }};
        const namaFasilitas = @json($report->facility->nama_fasilitas ?? 'Fasilitas');
        const lokasiFasilitas = @json($report->facility->lokasi_detail ?? 'Sekolah');
        const deskripsiKerusakan = @json($report->deskripsi_kerusakan ?? '');

        function selectTingkat(val) {
            if (isFormLocked) return;
            document.querySelectorAll('.tingkat-card').forEach(card => {
                card.classList.remove('border-blue-600', 'bg-blue-50/50');
                card.classList.add('border-slate-200', 'bg-white');
            });
            const selectedCard = document.getElementById('card-' + val.toLowerCase());
            if (selectedCard) {
                selectedCard.classList.remove('border-slate-200', 'bg-white');
                selectedCard.classList.add('border-blue-600', 'bg-blue-50/50');
            }
            
            // Trigger UI update dynamically
            updateFormUI();
        }

        function updateTechContact() {
            const techSelect = document.getElementById('id_teknisi');
            const contactBox = document.getElementById('tech-contact-box');
            const contactNumberEl = document.getElementById('tech-contact-number');
            const waBtn = document.getElementById('tech-wa-btn');

            if (!techSelect || !contactBox) return;

            const selectedOption = techSelect.options[techSelect.selectedIndex];
            const kontak = selectedOption ? selectedOption.getAttribute('data-kontak') : null;
            const nama = selectedOption ? selectedOption.getAttribute('data-nama') : null;

            if (kontak && techSelect.value) {
                contactBox.classList.remove('hidden');
                if (contactNumberEl) {
                    contactNumberEl.innerText = `${nama} • ${kontak}`;
                }

                // Format standard phone number for Indonesian WA (replace 08 with 628)
                let cleanPhone = kontak.replace(/[^0-9]/g, '');
                if (cleanPhone.startsWith('0')) {
                    cleanPhone = '62' + cleanPhone.substring(1);
                }

                const msg = isEmergency 
                    ? `Halo ${nama}, ada PANGGILAN DARURAT dari Sarpras untuk ${namaFasilitas} di ${lokasiFasilitas}. Deskripsi: "${deskripsiKerusakan}". Mohon segera menuju lokasi.`
                    : `Halo ${nama}, ada penugasan perbaikan ${namaFasilitas} di ${lokasiFasilitas}. Deskripsi: "${deskripsiKerusakan}".`;

                if (waBtn) {
                    waBtn.href = `https://wa.me/${cleanPhone}?text=${encodeURIComponent(msg)}`;
                }
            } else {
                contactBox.classList.add('hidden');
            }
        }

        function updateFormUI() {
            // Get currently selected priority (Tingkat Kerusakan)
            const priorityInput = document.querySelector('input[name="tingkat_kerusakan"]:checked') || document.getElementById('hidden_tingkat');
            const priority = priorityInput ? priorityInput.value : 'Ringan';

            // Get currently selected status
            const statusSelect = document.getElementById('status_laporan');
            const status = statusSelect ? statusSelect.value : 'menunggu';

            // Get the submit button elements
            const submitBtn = document.getElementById('submit-button');
            const btnText = document.getElementById('submit-button-text');
            const btnIcon = document.getElementById('submit-button-icon');

            // Get the technician select element
            const techSelect = document.getElementById('id_teknisi');

            if (priority === 'Berat') {
                // Style as Orange button "Buat Pengajuan RAB"
                if (submitBtn) {
                    submitBtn.className = "bg-[#c2410c] hover:bg-orange-800 text-white font-bold py-3 px-6 rounded-xl text-sm shadow-sm transition-all flex items-center gap-2 font-semibold";
                }
                if (btnText) btnText.innerText = "Buat Pengajuan RAB";
                if (btnIcon) {
                    btnIcon.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>`;
                }

                // Lock/disable technician vendor input
                if (techSelect) {
                    techSelect.disabled = true;
                    if (!isFormLocked) {
                        techSelect.value = "";
                    }
                    techSelect.classList.add('bg-slate-100', 'text-slate-400');
                    techSelect.classList.remove('bg-slate-50', 'text-slate-700');
                }
                updateTechContact();
            } else {
                // Style as default Dark Slate button
                if (submitBtn) {
                    if (isEmergency && status === 'proses') {
                        submitBtn.className = "bg-[#cc0000] hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl text-sm shadow-sm transition-all flex items-center gap-2 font-semibold";
                    } else {
                        submitBtn.className = "bg-[#0f172a] hover:bg-slate-800 text-white font-bold py-3 px-6 rounded-xl text-sm shadow-sm transition-all flex items-center gap-2 font-semibold";
                    }
                }
                if (btnIcon) {
                    btnIcon.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>`;
                }
                
                // Button text dynamically based on status:
                let text = "Simpan Hasil Inspeksi";
                if (status === 'proses') {
                    text = isEmergency ? "⚡ Tugaskan Teknisi Darurat" : "Simpan Perbaikan";
                } else if (status === 'selesai') {
                    text = "Simpan Selesai";
                }
                if (btnText) btnText.innerText = text;

                // Unlock/enable technician vendor input if NOT locked
                if (techSelect && !isFormLocked) {
                    techSelect.disabled = false;
                    techSelect.classList.remove('bg-slate-100', 'text-slate-400', 'opacity-60', 'cursor-not-allowed');
                    techSelect.classList.add('bg-slate-50', 'text-slate-700');
                }
                updateTechContact();
            }
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('upload-default-state').classList.add('hidden');
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('image-preview').classList.remove('hidden');
                    document.getElementById('upload-preview-state').classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function quickDispatchEmergency() {
            // 1. Set priority to Sedang
            selectTingkat('Sedang');
            
            // 2. Set status to proses
            const statusSelect = document.getElementById('status_laporan');
            if (statusSelect) {
                statusSelect.value = 'proses';
            }
            
            // 3. Ensure a technician is selected
            const techSelect = document.getElementById('id_teknisi');
            if (techSelect && !techSelect.value && techSelect.options.length > 1) {
                techSelect.selectedIndex = 1;
            }
            updateTechContact();
            updateFormUI();

            // 4. Buka WhatsApp teknisi di tab baru jika nomor tersedia
            const waBtn = document.getElementById('tech-wa-btn');
            if (waBtn && waBtn.href && waBtn.href !== '#' && waBtn.href !== window.location.href) {
                window.open(waBtn.href, '_blank');
            }

            // 5. Submit form
            document.getElementById('form-work-order').submit();
        }

        function quickResolveEmergency() {
            selectTingkat('Ringan');
            const statusSelect = document.getElementById('status_laporan');
            if (statusSelect) {
                statusSelect.value = 'selesai';
            }
            updateFormUI();
            document.getElementById('form-work-order').submit();
        }

        // Run on page load and listen to status changes
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status_laporan');
            if (statusSelect) {
                statusSelect.addEventListener('change', updateFormUI);
            }
            updateFormUI();
            updateTechContact();
        });
    </script>

</body>
</html>
