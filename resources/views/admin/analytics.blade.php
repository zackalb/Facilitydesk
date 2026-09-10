<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan & Analitik - FacilityDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        @keyframes drawPath {
            0% {
                stroke-dashoffset: 1500;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }

        .animate-chart-line {
            stroke-dasharray: 1500;
            stroke-dashoffset: 1500;
            animation: drawPath 1.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        .animate-chart-area {
            animation: chartFadeIn 1.5s ease-out 0.6s forwards;
            opacity: 0;
        }

        @keyframes chartFadeIn {
            to { opacity: 1; }
        }

        .progress-bar-animated {
            transition: width 1.5s cubic-bezier(0.25, 1, 0.5, 1);
        }
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
                <a href="{{ route('admin.technicians.index') }}" class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm font-medium transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span>Data Petugas</span>
                </a>
                <a href="{{ route('admin.analytics.index') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/70 text-blue-700 rounded-xl text-sm font-bold border-l-[3px] border-blue-600 transition-all shadow-xs">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            <!-- 1. Page Header & Export Buttons -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h3 class="text-2xl font-black text-blue-950 tracking-tight">Laporan & Analitik Strategis</h3>
                    <p class="text-xs text-slate-500 font-medium mt-1">Tinjauan komprehensif alokasi dan realisasi pengeluaran anggaran fasilitas sekolah secara *real-time*.</p>
                </div>
                <div class="flex items-center gap-2.5">
                    <button type="button" onclick="exportAnalyticsToExcel()" class="px-4 py-2 bg-[#1d4ed8] hover:bg-[#1e40af] text-white font-bold rounded-xl text-xs flex items-center gap-2 transition-all shadow-xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Export Excel</span>
                    </button>
                </div>
            </div>

            <!-- Print Header Dokumen Resmi -->
            <div class="hidden print:block mb-6 border-b-2 border-slate-900 pb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-black text-slate-900 uppercase tracking-wide">FACILITYDESK - LAPORAN KEUANGAN & ANALITIK SARPRAS</h1>
                        <p class="text-xs text-slate-600 font-bold mt-0.5">Badan Pengelola Sarana, Prasarana & Manajemen Aset Sekolah</p>
                    </div>
                    <div class="text-right text-[11px] text-slate-500 font-medium">
                        <p>Tahun Ajaran: {{ $tahunAjaran }}</p>
                        <p>Tanggal Cetak: {{ now()->format('d F Y, H:i') }} WIB</p>
                    </div>
                </div>
            </div>

            <!-- 2. Period Filter Tabs (Fungsional: Tahun Berjalan, Triwulan, Semester, Tanggal Kustom) -->
            <div class="flex items-center gap-1 bg-white border border-slate-100 p-1.5 rounded-2xl w-fit shadow-xs">
                <a href="{{ route('admin.analytics.index', ['period' => 'tahun']) }}" class="px-4 py-1.5 {{ ($period ?? 'tahun') === 'tahun' ? 'bg-slate-800 text-white font-bold shadow-xs' : 'text-slate-500 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition-colors">
                    Tahun Berjalan
                </a>
                <a href="{{ route('admin.analytics.index', ['period' => 'triwulan']) }}" class="px-4 py-1.5 {{ ($period ?? '') === 'triwulan' ? 'bg-slate-800 text-white font-bold shadow-xs' : 'text-slate-500 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition-colors">
                    Triwulan
                </a>
                <a href="{{ route('admin.analytics.index', ['period' => 'semester']) }}" class="px-4 py-1.5 {{ ($period ?? '') === 'semester' ? 'bg-slate-800 text-white font-bold shadow-xs' : 'text-slate-500 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition-colors">
                    Semester
                </a>
                <button type="button" onclick="openCustomDateModal()" class="px-4 py-1.5 {{ ($period ?? '') === 'custom' ? 'bg-blue-600 text-white font-bold shadow-xs' : 'text-slate-500 hover:text-slate-800 font-semibold' }} rounded-xl text-xs transition-colors flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5 {{ ($period ?? '') === 'custom' ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>
                        @if(($period ?? '') === 'custom' && !empty($startDate) && !empty($endDate))
                            {{ \Carbon\Carbon::parse($startDate)->format('d M') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                        @else
                            tanggal kustom
                        @endif
                    </span>
                </button>
            </div>

            <!-- 3. 3 Financial KPI Cards (Hanya SATU Tombol: "Atur Anggaran") -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <!-- Total Anggaran Card (HANYA SATU TOMBOL "Atur Anggaran") -->
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_2px_8px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition-all">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider">TOTAL ANGGARAN (DIALOKASIKAN)</p>
                            <h3 class="text-2xl font-black text-slate-900 mt-2 tracking-tight flex items-baseline gap-1">
                                <span>Rp</span>
                                <span id="num_total_anggaran" data-target="{{ $totalAnggaran }}">{{ number_format($totalAnggaran, 0, ',', '.') }}</span>
                            </h3>
                        </div>
                        <div class="flex flex-col items-end gap-2 shrink-0">
                            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <!-- SATU-SATUNYA TOMBOL PENGATURAN ANGGARAN -->
                            <button type="button" onclick="openBudgetModal()" class="px-3 py-1.5 bg-blue-50 hover:bg-blue-600 hover:text-white text-blue-700 font-bold text-xs rounded-xl transition-all flex items-center gap-1.5 border border-blue-200 shadow-2xs cursor-pointer group/btn" title="Klik untuk mengatur atau mengubah pagu anggaran">
                                <svg class="w-3.5 h-3.5 text-blue-600 group-hover/btn:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                <span>Atur Anggaran</span>
                            </button>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-50">
                        <p class="text-[11px] text-slate-400 font-semibold">Tahun Ajaran <span class="text-slate-700 font-bold">{{ $tahunAjaran }}</span></p>
                    </div>
                </div>

                <!-- Pengeluaran Terealisasi Card -->
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_2px_8px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition-all">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider">PENGELUARAN TEREALISASI</p>
                            <h3 class="text-2xl font-black text-slate-900 mt-2 tracking-tight flex items-baseline gap-1">
                                <span>Rp</span>
                                <span id="num_pengeluaran" data-target="{{ $pengeluaranTerealisasi }}">{{ number_format($pengeluaranTerealisasi, 0, ',', '.') }}</span>
                            </h3>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between text-[11px] font-bold text-blue-700 mt-3 mb-1.5">
                            <span><span id="num_persen">{{ $persenTerpakai }}</span>% Terpakai</span>
                            <span class="text-slate-400 font-medium text-[10px]">Real Database RAB</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                            <div id="progress_terpakai" class="bg-[#1d4ed8] h-1.5 rounded-full progress-bar-animated" style="width: 0%"></div>
                        </div>
                    </div>
                </div>

                <!-- Sisa Saldo (Solid Blue Card) -->
                <div class="bg-gradient-to-br from-[#1d4ed8] to-[#1e40af] text-white p-6 rounded-2xl shadow-lg shadow-blue-900/10 flex flex-col justify-between hover:shadow-xl transition-all">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[11px] font-extrabold text-blue-200 uppercase tracking-wider">SISA SALDO ANGGARAN</p>
                            <h3 class="text-2xl font-black text-white mt-2 tracking-tight flex items-baseline gap-1">
                                <span>Rp</span>
                                <span id="num_sisa" data-target="{{ $sisaSaldo }}">{{ number_format($sisaSaldo, 0, ',', '.') }}</span>
                            </h3>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-white/10 text-white flex items-center justify-center shrink-0 backdrop-blur-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between">
                        <p class="text-[11px] text-blue-100 font-medium">Sisa saldo aman untuk operasional</p>
                        <span class="text-[10px] bg-white/20 px-2 py-0.5 rounded-full font-bold">100% Real-Time</span>
                    </div>
                </div>
            </div>

            <!-- 4. 2-Column Analytics Charts (Garis Kurva Dinamis Bounded + Animasi Halus Tanpa Loncat) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                <!-- Left: Tren Biaya Pemeliharaan (7 of 12) -->
                <div class="lg:col-span-8 bg-white rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] p-6 overflow-hidden">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-sm font-extrabold text-slate-900">Tren Realisasi Biaya Pemeliharaan (6 Bulan Terakhir)</h3>
                            <p class="text-[11px] text-slate-400 font-medium mt-0.5">Berdasarkan tanggal persetujuan proposal RAB fasilitas sekolah.</p>
                        </div>
                        <span class="text-[10px] font-bold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-lg border border-blue-100">
                            Grafik Riil Dinamis
                        </span>
                    </div>

                    @php
                        // Koordinat x bounded dengan jarak aman dari tepi (35 .. 435 pada lebar viewBox 500)
                        $xStep = [35, 115, 195, 275, 355, 435];
                        $scaleMax = max(5000000, $maxTrenValue);
                        $chartPoints = [];
                        foreach ($trenBiaya as $idx => $t) {
                            $x = $xStep[$idx];
                            $ratio = $scaleMax > 0 ? min(1, $t['nominal'] / $scaleMax) : 0;
                            // y dari 160 (dasar grafik) ke 35 (puncak grafik)
                            $y = 160 - round($ratio * 125);
                            $chartPoints[] = [
                                'x' => $x,
                                'y' => $y,
                                'nominal' => $t['nominal'],
                                'bulan' => $t['bulan'],
                                'label' => $t['label'],
                            ];
                        }

                        // Formula cubic bezier path
                        $linePath = "M {$chartPoints[0]['x']} {$chartPoints[0]['y']}";
                        for ($i = 0; $i < count($chartPoints) - 1; $i++) {
                            $x0 = $chartPoints[$i]['x'];
                            $y0 = $chartPoints[$i]['y'];
                            $x1 = $chartPoints[$i+1]['x'];
                            $y1 = $chartPoints[$i+1]['y'];
                            $cx = ($x0 + $x1) / 2;
                            $linePath .= " C {$cx} {$y0}, {$cx} {$y1}, {$x1} {$y1}";
                        }
                        $areaPath = "{$linePath} L {$chartPoints[5]['x']} 165 L {$chartPoints[0]['x']} 165 Z";
                    @endphp

                    <!-- Line Chart SVG Graphic -->
                    <div class="relative h-60 w-full flex flex-col justify-between pt-2">
                        <!-- Y-Axis labels & Grid lines -->
                        <div class="absolute inset-0 flex flex-col justify-between pointer-events-none text-[10px] text-slate-400 font-semibold">
                            <div class="flex items-center">
                                <span class="w-10">Rp {{ number_format($scaleMax / 1000000, 1) }}jt</span>
                                <div class="flex-1 border-b border-dashed border-slate-100 ml-2"></div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10">Rp {{ number_format(($scaleMax * 0.75) / 1000000, 1) }}jt</span>
                                <div class="flex-1 border-b border-dashed border-slate-100 ml-2"></div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10">Rp {{ number_format(($scaleMax * 0.5) / 1000000, 1) }}jt</span>
                                <div class="flex-1 border-b border-dashed border-slate-100 ml-2"></div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10">Rp {{ number_format(($scaleMax * 0.25) / 1000000, 1) }}jt</span>
                                <div class="flex-1 border-b border-dashed border-slate-100 ml-2"></div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10">Rp 0</span>
                                <div class="flex-1 border-b border-slate-200 ml-2"></div>
                            </div>
                        </div>

                        <!-- SVG Curve Graphic -->
                        <svg class="w-full h-full pl-10 pb-6 overflow-hidden" viewBox="0 0 500 180" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="blueGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#2563eb" stop-opacity="0.25"/>
                                    <stop offset="100%" stop-color="#2563eb" stop-opacity="0.0"/>
                                </linearGradient>
                            </defs>
                            
                            <!-- Area Fill with Fade In Animation -->
                            <path d="{{ $areaPath }}" fill="url(#blueGradient)" class="animate-chart-area"/>
                            
                            <!-- Line Stroke with Smooth Draw Animation -->
                            <path d="{{ $linePath }}" fill="none" stroke="#2563eb" stroke-width="3" stroke-linecap="round" class="animate-chart-line"/>
                            
                            <!-- Interactive Data Points (Bounded, Tanpa CSS Transform Scale yang Bikin Keluar) -->
                            @foreach($chartPoints as $idx => $pt)
                                @php
                                    // Hitung posisi tooltip agar selalu berada di dalam area grafik
                                    $tipW = 96;
                                    if ($idx >= 4) {
                                        $tipX = $pt['x'] - $tipW - 10; // Letakkan di sebelah kiri titik
                                    } elseif ($idx <= 1) {
                                        $tipX = $pt['x'] + 10;         // Letakkan di sebelah kanan titik
                                    } else {
                                        $tipX = $pt['x'] - ($tipW / 2); // Di tengah
                                    }
                                    $tipY = max(8, $pt['y'] - 28);
                                @endphp
                                <g class="group/point cursor-pointer">
                                    <!-- Area Target Hover yang Cukup Luas -->
                                    <circle cx="{{ $pt['x'] }}" cy="{{ $pt['y'] }}" r="14" fill="transparent" class="cursor-pointer" />
                                    
                                    @if($loop->last && $pt['nominal'] > 0)
                                        <!-- Animasi Ring Berdenyut Menggunakan Native SVG Animate (Dijamin 100% Tidak Keluar Koordinat) -->
                                        <circle cx="{{ $pt['x'] }}" cy="{{ $pt['y'] }}" r="5" fill="#3b82f6" opacity="0.6">
                                            <animate attributeName="r" values="5;12;5" dur="2.4s" repeatCount="indefinite" />
                                            <animate attributeName="opacity" values="0.6;0;0.6" dur="2.4s" repeatCount="indefinite" />
                                        </circle>
                                    @endif

                                    <!-- Lingkaran Luar yang Muncul Saat Hover (Tanpa Loncat) -->
                                    <circle cx="{{ $pt['x'] }}" cy="{{ $pt['y'] }}" r="8" fill="none" stroke="#2563eb" stroke-width="2" opacity="0" class="group-hover/point:opacity-100 transition-opacity duration-150" />

                                    <!-- Titik Utama Lingkaran -->
                                    <circle cx="{{ $pt['x'] }}" cy="{{ $pt['y'] }}" r="4.5" fill="#1d4ed8" stroke="#ffffff" stroke-width="2" class="group-hover/point:fill-blue-600 transition-colors duration-150" />
                                    
                                    <!-- Tooltip SVG yang Aman di Dalam Batas Grafik -->
                                    <g class="opacity-0 group-hover/point:opacity-100 transition-opacity duration-200 pointer-events-none">
                                        <rect x="{{ $tipX }}" y="{{ $tipY }}" width="{{ $tipW }}" height="22" rx="6" fill="#0f172a" opacity="0.95"/>
                                        <text x="{{ $tipX + ($tipW / 2) }}" y="{{ $tipY + 15 }}" fill="#ffffff" font-size="9.5" font-weight="bold" text-anchor="middle">
                                            {{ $pt['bulan'] }}: {{ $pt['label'] }}
                                        </text>
                                    </g>
                                </g>
                            @endforeach
                        </svg>

                        <!-- X-Axis Months (Rata dan Pas dengan Titik Sumbu X) -->
                        <div class="flex justify-between pl-12 pr-6 pt-2 text-[11px] font-bold text-slate-500">
                            @foreach($trenBiaya as $tb)
                                <span class="{{ $loop->last ? 'text-blue-700 font-black' : '' }}">{{ $tb['bulan'] }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Distribusi Pengeluaran Riil (5 of 12) -->
                <div class="lg:col-span-4 bg-white rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-sm font-extrabold text-slate-900">Distribusi Pengeluaran</h3>
                            <p class="text-[11px] text-slate-400 font-medium mt-0.5">Proporsi biaya riil per kategori fasilitas.</p>
                        </div>
                        <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded-md">Real Data</span>
                    </div>

                    <div class="space-y-4">
                        @forelse($distribusiPengeluaran as $dist)
                            <div>
                                <div class="flex items-center justify-between text-xs font-semibold mb-1.5">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full shrink-0" style="background-color: {{ $dist['color'] }}"></span>
                                        <span class="text-slate-800 font-bold">{{ $dist['nama'] }}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-black text-slate-900">{{ $dist['persen'] }}%</span>
                                        <span class="text-[10px] text-slate-400 font-medium ml-1">({{ 'Rp ' . number_format($dist['nominal'], 0, ',', '.') }})</span>
                                    </div>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                                    <div class="h-2 rounded-full progress-bar-animated" style="width: {{ $dist['persen'] }}%; background-color: {{ $dist['color'] }}"></div>
                                </div>
                            </div>
                        @empty
                            <p class="text-xs text-slate-400 italic text-center py-6">Belum ada pengeluaran terealisasi di database.</p>
                        @endforelse
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 font-medium">
                        <span>Total Realisasi:</span>
                        <span class="font-extrabold text-blue-900">Rp {{ number_format($pengeluaranTerealisasi, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- 5. Bottom Table: Log Transaksi Utama Terkini (Real Data) -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-extrabold text-slate-900">Log Transaksi & Pengajuan Anggaran Terkini</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Daftar riwayat pengeluaran dari proposal RAB dan penanganan sarpras.</p>
                    </div>
                    <a href="{{ route('admin.work-orders.index') }}" class="text-xs font-bold text-blue-700 hover:underline">Lihat Semua Work Orders →</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="text-slate-400 font-bold border-b border-slate-100">
                            <tr>
                                <th class="py-3 px-3">TANGGAL</th>
                                <th class="py-3 px-3">DESKRIPSI PROPOSAL</th>
                                <th class="py-3 px-3">KATEGORI</th>
                                <th class="py-3 px-3">STATUS</th>
                                <th class="py-3 px-3 text-right">JUMLAH (RP)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($logTransaksi as $trx)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <td class="py-3.5 px-3 font-medium text-slate-600">
                                        {{ $trx['tanggal'] }}
                                    </td>
                                    <td class="py-3.5 px-3 font-bold text-slate-800">
                                        {{ $trx['deskripsi'] }}
                                    </td>
                                    <td class="py-3.5 px-3">
                                        <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-semibold text-[11px] inline-flex items-center gap-1.5">
                                            <span>{{ $trx['kategori_icon'] }}</span>
                                            <span>{{ $trx['kategori'] }}</span>
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-3">
                                        @if($trx['status'] === 'Terbayar')
                                            <span class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-[11px] border border-emerald-100">
                                                ✓ {{ $trx['status'] }}
                                            </span>
                                        @elseif($trx['status'] === 'Ditolak')
                                            <span class="px-2.5 py-1 rounded-lg bg-red-50 text-red-700 font-bold text-[11px] border border-red-100">
                                                ✕ {{ $trx['status'] }}
                                            </span>
                                        @else
                                            <span class="px-2.5 py-1 rounded-lg bg-amber-50 text-amber-700 font-bold text-[11px] border border-amber-100">
                                                ⏳ {{ $trx['status'] }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-3 text-right font-black text-slate-900">
                                        Rp {{ number_format($trx['jumlah'], 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-slate-400 italic">
                                        Belum ada data transaksi pengeluaran tercatat.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Print Footer Tanda Tangan Resmi -->
            <div class="hidden print:block mt-12 pt-8 border-t border-slate-200">
                <div class="flex justify-between items-start text-xs text-slate-700">
                    <div>
                        <p class="font-bold">Mengetahui,</p>
                        <p class="text-slate-500 mb-16">Kepala Sekolah</p>
                        <p class="font-extrabold text-slate-900 underline uppercase tracking-wider">( .................................................. )</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold">Dibuat Oleh,</p>
                        <p class="text-slate-500 mb-16">Koordinator Sarana & Prasarana</p>
                        <p class="font-extrabold text-slate-900 underline uppercase tracking-wider">( {{ $user->nama ?? 'Budi Santoso' }} )</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Modal Atur Alokasi Total Anggaran (RAPBS) -->
    <div id="budgetModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-7 shadow-2xl border border-slate-100 transition-all transform">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-xs">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-black text-slate-900">Atur Alokasi Anggaran Sekolah</h3>
                        <p class="text-[11px] text-slate-400 font-medium">Tetapkan pagu total anggaran pemeliharaan sarpras.</p>
                    </div>
                </div>
                <button type="button" onclick="closeBudgetModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.budget.update') }}" class="mt-5 space-y-4">
                @csrf

                <!-- Tahun Ajaran -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tahun Ajaran <span class="text-red-500">*</span></label>
                    <input type="text" name="tahun_ajaran" value="{{ $tahunAjaran }}" required placeholder="Contoh: 2026/2027" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                </div>

                <!-- Nominal Total Anggaran -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Total Nominal Anggaran (Rp) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-xs font-black text-slate-400">Rp</span>
                        <input type="text" id="input_nominal_anggaran" name="total_anggaran" value="{{ number_format($totalAnggaran, 0, ',', '.') }}" required oninput="formatAndCalculate(this)" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-black text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    </div>
                    
                    <!-- Quick Nominal Preset Pills -->
                    <div class="flex items-center gap-1.5 mt-2 flex-wrap">
                        <button type="button" onclick="setBudgetPreset(25000000)" class="px-2.5 py-1 bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-slate-600 rounded-lg text-[10px] font-bold transition-colors">Rp 25 Jt</button>
                        <button type="button" onclick="setBudgetPreset(50000000)" class="px-2.5 py-1 bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-slate-600 rounded-lg text-[10px] font-bold transition-colors">Rp 50 Jt</button>
                        <button type="button" onclick="setBudgetPreset(75000000)" class="px-2.5 py-1 bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-slate-600 rounded-lg text-[10px] font-bold transition-colors">Rp 75 Jt</button>
                        <button type="button" onclick="setBudgetPreset(100000000)" class="px-2.5 py-1 bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-slate-600 rounded-lg text-[10px] font-bold transition-colors">Rp 100 Jt</button>
                        <button type="button" onclick="setBudgetPreset(200000000)" class="px-2.5 py-1 bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-slate-600 rounded-lg text-[10px] font-bold transition-colors">Rp 200 Jt</button>
                    </div>
                </div>

                <!-- Proyeksi Perhitungan Riil Card -->
                <div class="p-3.5 bg-blue-50/60 border border-blue-100 rounded-2xl space-y-1.5">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-slate-500 font-medium">Realisasi Pengeluaran:</span>
                        <span class="font-bold text-red-600">- Rp {{ number_format($pengeluaranTerealisasi, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs pt-1.5 border-t border-blue-200/50">
                        <span class="text-slate-700 font-bold">Proyeksi Sisa Saldo:</span>
                        <span id="preview_sisa_saldo" class="font-black text-blue-900">Rp {{ number_format($sisaSaldo, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-3">
                    <button type="button" onclick="closeBudgetModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs transition-all shadow-md shadow-blue-600/20 cursor-pointer">
                        Simpan Alokasi Anggaran
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Filter Tanggal Kustom -->
    <div id="customDateModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-slate-100 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-black text-slate-900">Filter Tanggal Kustom</h3>
                </div>
                <button type="button" onclick="closeCustomDateModal()" class="text-slate-400 hover:text-slate-600 p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <form method="GET" action="{{ route('admin.analytics.index') }}" class="mt-4 space-y-3">
                <input type="hidden" name="period" value="custom">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Dari Tanggal <span class="text-red-500">*</span></label>
                    <input type="date" name="start_date" value="{{ $startDate ?? now()->subMonth()->format('Y-m-d') }}" required class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Sampai Tanggal <span class="text-red-500">*</span></label>
                    <input type="date" name="end_date" value="{{ $endDate ?? now()->format('Y-m-d') }}" required class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>
                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-50">
                    <button type="button" onclick="closeCustomDateModal()" class="px-3.5 py-1.5 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-xl">Batal</button>
                    <button type="submit" class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs shadow-xs cursor-pointer">Terapkan Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Animations & Interactions -->
    <script>
        const realPengeluaran = {{ $pengeluaranTerealisasi }};

        // Modal Budget Controls
        function openBudgetModal() {
            document.getElementById('budgetModal').classList.remove('hidden');
        }

        function closeBudgetModal() {
            document.getElementById('budgetModal').classList.add('hidden');
        }

        // Modal Custom Date Controls
        function openCustomDateModal() {
            document.getElementById('customDateModal').classList.remove('hidden');
        }

        function closeCustomDateModal() {
            document.getElementById('customDateModal').classList.add('hidden');
        }

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeBudgetModal();
                closeCustomDateModal();
            }
        });

        function setBudgetPreset(amount) {
            const input = document.getElementById('input_nominal_anggaran');
            input.value = amount.toLocaleString('id-ID');
            formatAndCalculate(input);
        }

        function formatAndCalculate(input) {
            let val = input.value.replace(/[^0-9]/g, '');
            if (!val) val = '0';
            const num = parseInt(val, 10);
            input.value = num.toLocaleString('id-ID');

            const sisa = Math.max(0, num - realPengeluaran);
            document.getElementById('preview_sisa_saldo').innerText = 'Rp ' + sisa.toLocaleString('id-ID');
        }

        // CountUp Animation
        function animateCounter(id, target, duration = 1200) {
            const element = document.getElementById(id);
            if (!element) return;
            const startTime = performance.now();

            function update(now) {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                // Ease out expo
                const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                const current = Math.floor(easeProgress * target);
                element.innerText = current.toLocaleString('id-ID');

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    element.innerText = target.toLocaleString('id-ID');
                }
            }
            requestAnimationFrame(update);
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Animate Numbers
            const totalTarget = parseInt(document.getElementById('num_total_anggaran')?.dataset?.target || '0', 10);
            const pengeluaranTarget = parseInt(document.getElementById('num_pengeluaran')?.dataset?.target || '0', 10);
            const sisaTarget = parseInt(document.getElementById('num_sisa')?.dataset?.target || '0', 10);

            animateCounter('num_total_anggaran', totalTarget, 1400);
            animateCounter('num_pengeluaran', pengeluaranTarget, 1400);
            animateCounter('num_sisa', sisaTarget, 1400);

            // Animate Progress Bar
            setTimeout(() => {
                const pBar = document.getElementById('progress_terpakai');
                if (pBar) {
                    pBar.style.width = '{{ $persenTerpakai }}%';
                }
            }, 300);
        });

        // Export Excel CSV
        function exportAnalyticsToExcel() {
            const data = @json($logTransaksi);
            let csv = [];
            csv.push(['TANGGAL', 'DESKRIPSI TRANSAKSI', 'KATEGORI', 'STATUS', 'JUMLAH (RP)'].join(','));

            data.forEach(item => {
                csv.push([
                    `"${item.tanggal}"`,
                    `"${item.deskripsi}"`,
                    `"${item.kategori}"`,
                    `"${item.status}"`,
                    `"${item.jumlah}"`
                ].join(','));
            });

            const csvContent = 'data:text/csv;charset=utf-8,\uFEFF' + encodeURIComponent(csv.join('\n'));
            const downloadLink = document.createElement('a');
            downloadLink.setAttribute('href', csvContent);
            downloadLink.setAttribute('download', 'Laporan_Keuangan_Sarpras_' + new Date().toISOString().slice(0, 10) + '.csv');
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }
    </script>
</body>
</html>
