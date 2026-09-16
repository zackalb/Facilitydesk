<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Saya - FacilityDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 antialiased text-gray-800 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col h-full hidden md:flex">
        <div class="p-6">
            <div class="flex items-center space-x-3 mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                <div>
                    <h1 class="text-sm font-bold text-gray-900 leading-tight">facility management</h1>
                    <p class="text-[10px] text-gray-500 font-medium">Administrative Office</p>
                </div>
            </div>
            
            <nav class="space-y-1">
                <a href="{{ route('pelapor.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg text-sm font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Report Issue</span>
                </a>
                <a href="{{ route('pelapor.tickets') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/50 text-blue-700 rounded-lg text-sm font-semibold border-l-2 border-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    <span>Tickets</span>
                </a>
            </nav>
        </div>

        <div class="mt-auto p-6 border-t border-gray-100">
            <div class="space-y-1">
                <a href="{{ route('settings.security') }}" class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg text-sm font-medium transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Settings</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg text-sm font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Topbar: Konsisten seperti Admin SarPras -->
        <header class="bg-white border-b border-slate-100 flex items-center justify-between px-8 py-4 z-10 shrink-0">
            <h2 class="text-xl font-extrabold text-blue-950 tracking-tight">Pelapor SarPras</h2>

            <!-- Notifications & Profile -->
            <div class="flex items-center space-x-5">
                <button class="text-slate-500 hover:text-blue-600 transition-all relative">
                    <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                    <span class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5 bg-blue-600 rounded-full border-2 border-white"></span>
                </button>
                <button class="text-slate-500 hover:text-blue-600 transition-all">
                    <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Avatar Profile Info -->
                <div class="flex items-center space-x-3 border-l border-slate-200 pl-5">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-900 leading-tight">{{ $user->nama ?? 'Siswa / Guru' }}</p>
                        <p class="text-[11px] text-slate-500 font-semibold">{{ (str_contains(strtolower($user->nama ?? ''), 'guru') || str_contains(strtolower($user->email ?? ''), 'guru')) ? 'Guru Sekolah' : 'Siswa' }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 font-bold text-base flex items-center justify-center border border-blue-200 shadow-xs shrink-0">
                        {{ strtoupper(substr($user->nama ?? 'P', 0, 1)) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto p-4 md:p-8">
            <div class="max-w-6xl mx-auto">

                <!-- Header Section -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Tiket Saya</h1>
                    <p class="text-sm text-gray-500">Pantau status laporan perbaikan fasilitas Anda.</p>
                </div>

                <!-- Search & Filter Bar -->
                <div class="bg-white rounded-xl border border-gray-100 p-4 mb-6 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" id="searchInput" placeholder="Cari ID tiket (Cth: TKT 0600) atau kata kunci..." class="w-full bg-gray-50/50 border-none rounded-lg py-2.5 pl-10 pr-4 text-sm focus:ring-2 focus:ring-blue-500 placeholder-gray-400" onkeyup="filterTickets()">
                    </div>
                    <div class="flex gap-2 overflow-x-auto">
                        <button onclick="filterByStatus('Semua')" class="filter-btn active px-4 py-2.5 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors whitespace-nowrap">Semua</button>
                        <button onclick="filterByStatus('Menunggu')" class="filter-btn px-4 py-2.5 text-sm font-semibold rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors whitespace-nowrap">Menunggu</button>
                        <button onclick="filterByStatus('Diproses')" class="filter-btn px-4 py-2.5 text-sm font-semibold rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors whitespace-nowrap">Diproses</button>
                        <button onclick="filterByStatus('Selesai')" class="filter-btn px-4 py-2.5 text-sm font-semibold rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors whitespace-nowrap">Selesai</button>
                    </div>
                </div>

                <!-- Tickets Grid -->
                <div id="ticketsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    
                    @forelse($tickets as $ticket)
                    <div class="ticket-card bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-xs hover:shadow-lg hover:border-blue-300 hover:-translate-y-1 transition-all duration-200 cursor-pointer group flex flex-col justify-between" 
                         onclick="openTicketDetail({{ $ticket->id_laporan }})"
                         data-status="{{ $ticket->status_laporan }}"
                         data-search="{{ strtolower('tkt ' . str_pad($ticket->id_laporan, 4, '0', STR_PAD_LEFT) . ' tkt-' . str_pad($ticket->id_laporan, 4, '0', STR_PAD_LEFT) . ' ' . $ticket->id_laporan . ' ' . ($ticket->facility->nama_fasilitas ?? '') . ' ' . ($ticket->facility->lokasi_detail ?? '') . ' ' . ($ticket->technician->nama ?? '') . ' ' . $ticket->deskripsi_kerusakan) }}">
                        
                        <!-- Ticket Header -->
                        <div class="p-5 border-b border-gray-100">
                            <div class="flex justify-between items-start mb-2.5">
                                <span class="text-xs font-extrabold text-blue-900 bg-blue-50 px-2.5 py-1 rounded-lg border border-blue-100/80">TKT {{ str_pad($ticket->id_laporan, 4, '0', STR_PAD_LEFT) }}</span>
                                @php
                                    $statusColors = [
                                        'menunggu' => 'bg-amber-50 text-amber-700 border-amber-200',
                                        'proses' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'proses_perbaikan' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'diproses' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'menunggu_rab' => 'bg-purple-50 text-purple-700 border-purple-200',
                                        'selesai' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                        'darurat' => 'bg-red-50 text-red-700 border-red-200'
                                    ];
                                    $statusColor = $statusColors[$ticket->status_laporan] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                                @endphp
                                <span class="text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider border {{ $statusColor }}">
                                    {{ str_replace('_', ' ', ucfirst($ticket->status_laporan)) }}
                                </span>
                            </div>
                            <h3 class="font-bold text-gray-900 text-base mb-1.5 truncate group-hover:text-blue-600 transition-colors">{{ $ticket->facility->nama_fasilitas ?? 'Fasilitas' }}</h3>
                            <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $ticket->deskripsi_kerusakan }}</p>

                            <div class="flex flex-wrap items-center gap-2 mt-3 pt-3 border-t border-gray-100 text-xs">
                                @if($ticket->category)
                                    <span class="bg-slate-100 text-slate-700 font-semibold px-2 py-0.5 rounded text-[10px]">
                                        {{ $ticket->category->name }}
                                    </span>
                                @endif
                                @if($ticket->technician)
                                    <span class="text-gray-500 text-[11px] truncate flex items-center gap-1">
                                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        Teknisi: <strong class="text-gray-800">{{ $ticket->technician->nama }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Ticket Body Info -->
                        <div class="p-4 bg-gray-50/50 space-y-2">
                            <div class="flex items-center text-xs text-gray-500">
                                <svg class="w-4 h-4 mr-1.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>{{ $ticket->created_at->format('d M Y, H:i') }} WIB</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-500">
                                <svg class="w-4 h-4 mr-1.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="truncate">{{ $ticket->facility->lokasi_detail ?? 'Lokasi tidak tersedia' }}</span>
                            </div>
                        </div>

                        <!-- Card Action Footer -->
                        <div class="px-4 py-2.5 bg-blue-50/40 border-t border-blue-50/60 flex items-center justify-between text-xs font-semibold text-blue-700 group-hover:bg-blue-600 group-hover:text-white transition-all">
                            <span>Lihat Rincian & Pelacakan</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>

                    </div>
                    @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Tiket</h3>
                        <p class="text-sm text-gray-500">Anda belum memiliki laporan tiket.</p>
                    </div>
                    @endforelse

                </div>

                <!-- No Results Message -->
                <div id="noResults" class="hidden text-center py-12">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Tidak Ada Hasil</h3>
                    <p class="text-sm text-gray-500">Coba kata kunci atau filter lain.</p>
                </div>

            </div>
            
            <footer class="mt-12 text-center text-[11px] font-medium text-gray-400 border-t border-gray-100 pt-6 pb-4">
                &copy; {{ date('Y') }} FacilityDesk Administrative Office. All rights reserved.
            </footer>
        </div>
    </main>

    <!-- Modal Detail Tiket & Tracking Interaktif -->
    <div id="ticketModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background Overlay (Strictly behind modal) -->
        <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-xs transition-opacity" onclick="closeTicketDetail()"></div>

        <!-- Centered Modal Wrapper -->
        <div class="relative min-h-screen flex items-center justify-center p-3 sm:p-6 z-10 pointer-events-none">
            <!-- Modal Content Card: Solid White, Crisp, No Fog/Blur -->
            <div class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl border border-slate-200 pointer-events-auto my-6 flex flex-col max-h-[92vh] overflow-hidden animate-in fade-in zoom-in-95 duration-150">
                
                <!-- Modal Top Header -->
                <div class="shrink-0 bg-white px-6 sm:px-8 py-5 border-b border-slate-100 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center font-black text-sm border border-blue-100 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-lg sm:text-xl font-bold text-slate-900" id="modal-ticket-id">Detail Tiket</h3>
                                <span id="modal-status-badge" class="text-xs font-bold px-2.5 py-0.5 rounded-full border"></span>
                                <span id="modal-urgency-badge" class="text-xs font-bold px-2.5 py-0.5 rounded-full border"></span>
                            </div>
                            <p class="text-xs text-slate-500 mt-0.5">Rincian formulir laporan pelapor, dokumentasi perbaikan teknisi, dan linimasa pelacakan.</p>
                        </div>
                    </div>
                    <button type="button" class="text-slate-400 hover:text-slate-700 hover:bg-slate-100 p-2 rounded-xl transition-colors cursor-pointer" onclick="closeTicketDetail()">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <!-- Modal Scrollable Body -->
                <div class="flex-1 overflow-y-auto p-6 sm:p-8 space-y-6 bg-slate-50/50">
                    
                    <!-- 1. Linimasa Pelacakan Progres Laporan (Real-time Stepper) -->
                    <div class="bg-white p-5 sm:p-6 rounded-2xl border border-slate-200 shadow-xs">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600 animate-pulse"></span>
                                <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider">Linimasa Progres Pelacakan</h4>
                            </div>
                            <span class="text-[11px] text-slate-500 font-medium" id="modal-tracking-summary">Diperbarui otomatis oleh sistem</span>
                        </div>

                        <!-- 4-Stage Stepper Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 relative">
                            
                            <!-- Step 1: Terkirim -->
                            <div class="p-3.5 rounded-xl border relative overflow-hidden transition-all" id="step-1-card">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" id="step-1-icon">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tahap 1</span>
                                </div>
                                <h5 class="text-xs font-bold text-slate-800 leading-tight mb-1">Laporan Terkirim</h5>
                                <p class="text-[11px] text-slate-600 font-medium leading-snug mb-1" id="step-1-desc">Laporan masuk sistem</p>
                                <span class="text-[10px] text-slate-400 font-semibold block" id="step-1-time">-</span>
                            </div>

                            <!-- Step 2: Dibaca Teknisi -->
                            <div class="p-3.5 rounded-xl border relative overflow-hidden transition-all" id="step-2-card">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" id="step-2-icon"></div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tahap 2</span>
                                </div>
                                <h5 class="text-xs font-bold text-slate-800 leading-tight mb-1">Dibaca Teknisi</h5>
                                <p class="text-[11px] text-slate-600 font-medium leading-snug mb-1" id="step-2-desc">Menunggu dibaca</p>
                                <span class="text-[10px] text-slate-400 font-semibold block" id="step-2-time">-</span>
                            </div>

                            <!-- Step 3: Pengerjaan Fisik -->
                            <div class="p-3.5 rounded-xl border relative overflow-hidden transition-all" id="step-3-card">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" id="step-3-icon"></div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tahap 3</span>
                                </div>
                                <h5 class="text-xs font-bold text-slate-800 leading-tight mb-1">Pengerjaan Fisik</h5>
                                <p class="text-[11px] text-slate-600 font-medium leading-snug mb-1" id="step-3-desc">Menunggu giliran</p>
                                <span class="text-[10px] text-slate-400 font-semibold block" id="step-3-time">-</span>
                            </div>

                            <!-- Step 4: Perbaikan Selesai -->
                            <div class="p-3.5 rounded-xl border relative overflow-hidden transition-all" id="step-4-card">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" id="step-4-icon"></div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tahap 4</span>
                                </div>
                                <h5 class="text-xs font-bold text-slate-800 leading-tight mb-1">Perbaikan Selesai</h5>
                                <p class="text-[11px] text-slate-600 font-medium leading-snug mb-1" id="step-4-desc">Menunggu perbaikan</p>
                                <span class="text-[10px] text-slate-400 font-semibold block" id="step-4-time">-</span>
                            </div>

                        </div>
                    </div>

                    <!-- 2. Dua Kolom Komparasi: Laporan Pelapor (Sebelum) vs Penanganan Teknisi (Sesudah) -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        
                        <!-- KOLOM KIRI: Laporan Asli dari Pelapor (Kondisi Awal) -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-xs flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xs">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </span>
                                        <div>
                                            <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider">Laporan Pengajuan Pelapor</h4>
                                            <p class="text-[11px] text-slate-400 font-medium">Data formulir & bukti kondisi awal</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-slate-100 text-slate-600 uppercase">Kondisi Awal</span>
                                </div>

                                <!-- Detail Form Pelapor -->
                                <div class="space-y-3 text-xs mb-4">
                                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 space-y-2">
                                        <div class="flex justify-between items-start gap-2">
                                            <span class="text-slate-400 font-semibold shrink-0">Nama Fasilitas:</span>
                                            <span class="font-bold text-slate-900 text-right" id="modal-facility">-</span>
                                        </div>
                                        <div class="flex justify-between items-start gap-2">
                                            <span class="text-slate-400 font-semibold shrink-0">Lokasi / Ruangan:</span>
                                            <span class="font-bold text-slate-700 text-right" id="modal-location">-</span>
                                        </div>
                                        <div class="flex justify-between items-center gap-2">
                                            <span class="text-slate-400 font-semibold shrink-0">Kategori:</span>
                                            <span class="font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded text-[11px]" id="modal-category">-</span>
                                        </div>
                                        <div class="flex justify-between items-center gap-2">
                                            <span class="text-slate-400 font-semibold shrink-0">Waktu Lapor:</span>
                                            <span class="font-semibold text-slate-600" id="modal-date">-</span>
                                        </div>
                                    </div>

                                    <div>
                                        <span class="text-slate-400 font-semibold block mb-1">Deskripsi Masalah / Keluhan:</span>
                                        <div class="bg-amber-50/50 p-3 rounded-xl border border-amber-200/60 text-xs text-amber-950 font-medium leading-relaxed" id="modal-description">
                                            -
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Foto Bukti dari Pelapor -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        Foto Bukti Pelapor (Sebelum)
                                    </span>
                                    <span class="text-[10px] text-slate-400 font-medium">Klik untuk perbesar</span>
                                </div>

                                <div id="container-photo-before" class="relative rounded-xl overflow-hidden bg-slate-100 border border-slate-200 min-h-[170px] flex items-center justify-center group cursor-pointer" onclick="zoomPhoto('before')">
                                    <img id="img-photo-before" src="" alt="Foto Bukti Pelapor" class="w-full h-48 object-cover hidden">
                                    
                                    <!-- Zoom Hover Overlay -->
                                    <div id="overlay-photo-before" class="hidden absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-xs font-bold gap-1.5 backdrop-blur-xs">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        <span>Perbesar Foto Bukti</span>
                                    </div>

                                    <!-- Empty Placeholder -->
                                    <div id="empty-photo-before" class="p-5 text-center text-slate-400">
                                        <svg class="w-9 h-9 mx-auto mb-1.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p class="text-xs font-bold text-slate-500">Tidak ada lampiran foto bukti</p>
                                        <p class="text-[10px] text-slate-400 mt-0.5">Pelapor membuat laporan ini tanpa mengunggah foto</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- KOLOM KANAN: Dokumentasi & Hasil Kerja Teknisi (Kondisi Sesudah) -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-xs flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </span>
                                        <div>
                                            <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider">Dokumentasi & Tindakan Teknisi</h4>
                                            <p class="text-[11px] text-slate-400 font-medium">Penanganan petugas & foto hasil kerja</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 uppercase">Kondisi Sesudah</span>
                                </div>

                                <!-- Detail Teknisi -->
                                <div class="space-y-3 text-xs mb-4">
                                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 space-y-2">
                                        <div class="flex justify-between items-center gap-2">
                                            <span class="text-slate-400 font-semibold shrink-0">Teknisi Bertugas:</span>
                                            <div class="flex items-center gap-1.5 font-bold text-slate-900" id="modal-technician">-</div>
                                        </div>
                                        <div class="flex justify-between items-center gap-2">
                                            <span class="text-slate-400 font-semibold shrink-0">Status Pengerjaan:</span>
                                            <span class="font-bold" id="modal-action-status">-</span>
                                        </div>
                                    </div>

                                    <!-- Catatan Tindakan Teknisi -->
                                    <div>
                                        <span class="text-slate-400 font-semibold block mb-1">Catatan Tindakan / Inspeksi:</span>
                                        <div class="bg-blue-50/50 p-3 rounded-xl border border-blue-100 text-xs text-blue-950 font-medium leading-relaxed" id="modal-technician-notes">
                                            Belum ada catatan tindakan dari teknisi.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Foto Hasil Perbaikan dari Teknisi -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Foto Hasil Perbaikan (Sesudah)
                                    </span>
                                    <span class="text-[10px] text-slate-400 font-medium">Klik untuk perbesar</span>
                                </div>

                                <div id="container-photo-after" class="relative rounded-xl overflow-hidden bg-slate-100 border border-slate-200 min-h-[170px] flex items-center justify-center group cursor-pointer" onclick="zoomPhoto('after')">
                                    <img id="img-photo-after" src="" alt="Foto Hasil Perbaikan" class="w-full h-48 object-cover hidden">
                                    
                                    <!-- Zoom Hover Overlay -->
                                    <div id="overlay-photo-after" class="hidden absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-xs font-bold gap-1.5 backdrop-blur-xs">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        <span>Perbesar Foto Hasil</span>
                                    </div>

                                    <!-- Empty Placeholder -->
                                    <div id="empty-photo-after" class="p-5 text-center text-slate-400">
                                        <svg class="w-9 h-9 mx-auto mb-1.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <p class="text-xs font-bold text-slate-500" id="empty-photo-after-title">Menunggu dokumentasi teknisi</p>
                                        <p class="text-[10px] text-slate-400 mt-0.5" id="empty-photo-after-desc">Foto hasil perbaikan akan diunggah setelah perbaikan selesai dilakukan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="shrink-0 bg-white px-6 sm:px-8 py-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs text-slate-400 font-medium hidden sm:inline">FacilityDesk Pelaporan Sarana & Prasarana</span>
                    <button type="button" class="px-5 py-2 text-sm font-bold text-slate-700 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors cursor-pointer ml-auto" onclick="closeTicketDetail()">Tutup</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Lightbox Zoom Modal (Untuk Foto Sebelum & Sesudah) -->
    <div id="imageZoomModal" class="fixed inset-0 z-60 overflow-hidden hidden" aria-hidden="true">
        <div class="flex items-center justify-center min-h-screen p-4 text-center">
            <div class="fixed inset-0 bg-black/85 backdrop-blur-sm transition-opacity" onclick="closeImageZoom()"></div>
            <div class="relative inline-block max-w-4xl w-full bg-slate-900 rounded-3xl overflow-hidden shadow-2xl z-10 border border-slate-800">
                <div class="p-4 flex items-center justify-between border-b border-slate-800 text-white">
                    <span class="text-sm font-bold tracking-wide" id="zoom-title">Foto Dokumentasi</span>
                    <button type="button" onclick="closeImageZoom()" class="text-slate-400 hover:text-white p-1 rounded-lg hover:bg-slate-800 transition-colors cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <div class="p-4 flex items-center justify-center bg-black/50 max-h-[75vh]">
                    <img id="zoom-img" src="" alt="Zoom Foto" class="max-h-[70vh] max-w-full object-contain rounded-xl">
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentFilter = 'Semua';

        // Data tiket lengkap yang disiapkan secara terstruktur
        const ticketsData = @json($tickets->keyBy('id_laporan'));

        let currentActiveTicket = null;

        // Filter by status
        function filterByStatus(status) {
            currentFilter = status;
            
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
            event.target.classList.remove('bg-gray-100', 'text-gray-700');
            event.target.classList.add('active', 'bg-blue-600', 'text-white');
            
            filterTickets();
        }

        // Search and filter tickets
        function filterTickets() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
            const cards = document.querySelectorAll('.ticket-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const status = card.getAttribute('data-status');
                const searchData = card.getAttribute('data-search') || '';
                
                const matchesStatus = currentFilter === 'Semua' 
                    || status.toLowerCase() === currentFilter.toLowerCase()
                    || (currentFilter.toLowerCase() === 'diproses' && (status === 'proses' || status === 'proses_perbaikan' || status === 'menunggu_rab' || status === 'darurat'));
                
                const matchesSearch = !searchTerm || searchData.includes(searchTerm);

                if (matchesStatus && matchesSearch) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            document.getElementById('noResults').classList.toggle('hidden', visibleCount > 0);
            document.getElementById('ticketsGrid').classList.toggle('hidden', visibleCount === 0);
        }

        function formatDateTimeID(dateStr) {
            if (!dateStr) return null;
            const d = new Date(dateStr);
            if (isNaN(d.getTime())) return null;
            return d.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            }) + ' WIB';
        }

        // Buka modal detail tiket lengkap
        function openTicketDetail(ticketId) {
            try {
                const ticket = ticketsData[ticketId];
                if (!ticket) {
                    console.warn('Data tiket tidak ditemukan untuk ID:', ticketId);
                    return;
                }

                currentActiveTicket = ticket;
                const wo = ticket.verification ? (ticket.verification.work_order || ticket.verification.workOrder) : null;
                const fotoAfter = wo ? wo.foto_after : null;

                // 1. Header Information
                const tktNumber = String(ticket.id_laporan).padStart(4, '0');
                const tktIdEl = document.getElementById('modal-ticket-id');
                if (tktIdEl) tktIdEl.textContent = `Tiket #TKT-${tktNumber}`;
                
                // Status Badge
                const statusBadge = document.getElementById('modal-status-badge');
                if (statusBadge) {
                    const cleanStatus = (ticket.status_laporan || '').replace('_', ' ');
                    statusBadge.textContent = cleanStatus.charAt(0).toUpperCase() + cleanStatus.slice(1);
                    
                    const statusStyles = {
                        'menunggu': 'bg-amber-50 text-amber-700 border-amber-200',
                        'proses': 'bg-blue-50 text-blue-700 border-blue-200',
                        'proses_perbaikan': 'bg-blue-50 text-blue-700 border-blue-200',
                        'diproses': 'bg-blue-50 text-blue-700 border-blue-200',
                        'menunggu_rab': 'bg-purple-50 text-purple-700 border-purple-200',
                        'selesai': 'bg-emerald-50 text-emerald-700 border-emerald-200',
                        'darurat': 'bg-red-50 text-red-700 border-red-200'
                    };
                    statusBadge.className = `text-xs font-bold px-2.5 py-0.5 rounded-full border ${statusStyles[ticket.status_laporan] || 'bg-gray-100 text-gray-700 border-gray-200'}`;
                }

                // Urgency Badge
                const urgBadge = document.getElementById('modal-urgency-badge');
                const urg = (ticket.tingkat_urgensi || 'Sedang').toLowerCase();
                if (urgBadge) {
                    const urgStyles = {
                        'darurat': 'bg-red-50 text-red-700 border-red-200',
                        'tinggi': 'bg-amber-50 text-amber-700 border-amber-200',
                        'sedang': 'bg-blue-50 text-blue-700 border-blue-200',
                        'rendah': 'bg-slate-100 text-slate-700 border-slate-200'
                    };
                    urgBadge.textContent = `Urgensi: ${urg.charAt(0).toUpperCase() + urg.slice(1)}`;
                    urgBadge.className = `text-xs font-bold px-2.5 py-0.5 rounded-full border ${urgStyles[urg] || 'bg-slate-100 text-slate-700 border-slate-200'}`;
                }

                // 2. Formulir Data Laporan
                const facEl = document.getElementById('modal-facility');
                if (facEl) facEl.textContent = ticket.facility?.nama_fasilitas || 'Fasilitas Tidak Diketahui';

                const locEl = document.getElementById('modal-location');
                if (locEl) locEl.textContent = ticket.facility?.lokasi_detail || 'Lokasi tidak tersedia';

                const catEl = document.getElementById('modal-category');
                if (catEl) catEl.textContent = ticket.category?.name || ticket.facility?.kategori_area || 'Umum';
                
                const techName = ticket.technician?.nama || 'Petugas Umum Sarpras';
                const techEl = document.getElementById('modal-technician');
                if (techEl) {
                    techEl.innerHTML = `
                        <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-[10px] font-bold shrink-0">
                            ${techName.charAt(0)}
                        </span>
                        <span>${techName}</span>
                    `;
                }

                const createdTime = formatDateTimeID(ticket.created_at || ticket.tanggal_waktu);
                const dateEl = document.getElementById('modal-date');
                if (dateEl) dateEl.textContent = createdTime || '-';

                const descEl = document.getElementById('modal-description');
                if (descEl) descEl.textContent = ticket.deskripsi_kerusakan || '-';

                // 3. Status Stepper Tracking Timeline
                renderTrackingTimeline(ticket, wo);

                // 4. Dokumentasi Foto Sebelum & Sesudah
                // Foto Sebelum (Pelapor)
                const imgBefore = document.getElementById('img-photo-before');
                const overlayBefore = document.getElementById('overlay-photo-before');
                const emptyBefore = document.getElementById('empty-photo-before');
                if (imgBefore && overlayBefore && emptyBefore) {
                    if (ticket.foto_bukti) {
                        imgBefore.src = `/storage/${ticket.foto_bukti}`;
                        imgBefore.classList.remove('hidden');
                        overlayBefore.classList.remove('hidden');
                        emptyBefore.classList.add('hidden');
                    } else {
                        imgBefore.src = '';
                        imgBefore.classList.add('hidden');
                        overlayBefore.classList.add('hidden');
                        emptyBefore.classList.remove('hidden');
                    }
                }

                // Foto Sesudah (Teknisi)
                const imgAfter = document.getElementById('img-photo-after');
                const overlayAfter = document.getElementById('overlay-photo-after');
                const emptyAfter = document.getElementById('empty-photo-after');
                const emptyAfterTitle = document.getElementById('empty-photo-after-title');
                const emptyAfterDesc = document.getElementById('empty-photo-after-desc');

                if (imgAfter && overlayAfter && emptyAfter) {
                    if (fotoAfter) {
                        imgAfter.src = `/storage/${fotoAfter}`;
                        imgAfter.classList.remove('hidden');
                        overlayAfter.classList.remove('hidden');
                        emptyAfter.classList.add('hidden');
                    } else {
                        imgAfter.src = '';
                        imgAfter.classList.add('hidden');
                        overlayAfter.classList.add('hidden');
                        emptyAfter.classList.remove('hidden');
                        
                        if (emptyAfterTitle && emptyAfterDesc) {
                            if (ticket.status_laporan === 'selesai') {
                                emptyAfterTitle.textContent = 'Perbaikan Selesai';
                                emptyAfterDesc.textContent = 'Tugas selesai tanpa lampiran foto dokumentasi penanganan teknisi.';
                            } else {
                                emptyAfterTitle.textContent = 'Menunggu Dokumentasi Teknisi';
                                emptyAfterDesc.textContent = 'Foto hasil perbaikan akan diunggah setelah teknisi menyelesaikan pekerjaan di lokasi.';
                            }
                        }
                    }
                }

                // Status Tindakan Teknisi
                const actionStatusEl = document.getElementById('modal-action-status');
                if (actionStatusEl) {
                    if (ticket.status_laporan === 'selesai') {
                        actionStatusEl.textContent = 'Perbaikan Selesai';
                        actionStatusEl.className = 'font-bold text-emerald-600';
                    } else if (['proses', 'proses_perbaikan', 'darurat'].includes(ticket.status_laporan)) {
                        actionStatusEl.textContent = 'Sedang Dikerjakan di Lokasi';
                        actionStatusEl.className = 'font-bold text-blue-600';
                    } else if (ticket.status_laporan === 'menunggu_rab') {
                        actionStatusEl.textContent = 'Pengajuan RAB Material';
                        actionStatusEl.className = 'font-bold text-purple-600';
                    } else {
                        actionStatusEl.textContent = 'Menunggu Konfirmasi Teknisi';
                        actionStatusEl.className = 'font-bold text-amber-600';
                    }
                }

                // Catatan Inspeksi / Tindakan Teknisi
                const techNotesText = document.getElementById('modal-technician-notes');
                if (techNotesText) {
                    const notes = ticket.verification?.catatan_inspeksi;
                    if (notes) {
                        techNotesText.textContent = notes;
                    } else {
                        techNotesText.textContent = 'Belum ada catatan tindakan dari teknisi.';
                    }
                }

                // Tampilkan Modal
                const modal = document.getElementById('ticketModal');
                if (modal) modal.classList.remove('hidden');
            } catch (err) {
                console.error('Error openTicketDetail:', err);
                const modal = document.getElementById('ticketModal');
                if (modal) modal.classList.remove('hidden');
            }
        }

        // Render Stepper Linimasa
        function renderTrackingTimeline(ticket, wo) {
            try {
                const status = ticket.status_laporan;
                const techName = ticket.technician?.nama || 'Teknisi Lapangan';

                // 1. Step 1: Laporan Terkirim
                const step1Card = document.getElementById('step-1-card');
                const step1Icon = document.getElementById('step-1-icon');
                const step1Time = document.getElementById('step-1-time');
                const step1Desc = document.getElementById('step-1-desc');

                if (step1Card) step1Card.className = 'p-3.5 rounded-xl border border-emerald-200 shadow-xs relative overflow-hidden bg-emerald-50/20';
                if (step1Icon) {
                    step1Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-emerald-100 text-emerald-700';
                    step1Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                }
                if (step1Desc) step1Desc.textContent = 'Laporan berhasil dibuat';
                if (step1Time) step1Time.textContent = formatDateTimeID(ticket.created_at || ticket.tanggal_waktu) || 'Terkirim';

                // 2. Step 2: Dibaca Teknisi
                const step2Card = document.getElementById('step-2-card');
                const step2Icon = document.getElementById('step-2-icon');
                const step2Time = document.getElementById('step-2-time');
                const step2Desc = document.getElementById('step-2-desc');

                const isRead = ticket.technician_read_at || ['proses', 'proses_perbaikan', 'menunggu_rab', 'selesai'].includes(status);

                if (isRead) {
                    if (step2Card) step2Card.className = 'p-3.5 rounded-xl border border-emerald-200 shadow-xs relative overflow-hidden bg-emerald-50/20';
                    if (step2Icon) {
                        step2Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-emerald-100 text-emerald-700';
                        step2Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>`;
                    }
                    if (step2Desc) step2Desc.textContent = `Dibaca oleh ${techName}`;
                    if (step2Time) step2Time.textContent = formatDateTimeID(ticket.technician_read_at) || 'Telah ditinjau';
                } else {
                    if (step2Card) step2Card.className = 'p-3.5 rounded-xl border border-slate-200 shadow-xs relative overflow-hidden bg-white';
                    if (step2Icon) {
                        step2Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-slate-100 text-slate-400';
                        step2Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                    }
                    if (step2Desc) step2Desc.textContent = `Menunggu dibaca ${techName}`;
                    if (step2Time) step2Time.textContent = 'Dalam antrean';
                }

                // 3. Step 3: Dalam Pengerjaan
                const step3Card = document.getElementById('step-3-card');
                const step3Icon = document.getElementById('step-3-icon');
                const step3Time = document.getElementById('step-3-time');
                const step3Desc = document.getElementById('step-3-desc');

                if (status === 'selesai') {
                    if (step3Card) step3Card.className = 'p-3.5 rounded-xl border border-emerald-200 shadow-xs relative overflow-hidden bg-emerald-50/20';
                    if (step3Icon) {
                        step3Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-emerald-100 text-emerald-700';
                        step3Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                    }
                    if (step3Desc) step3Desc.textContent = 'Pengerjaan tuntas';
                    if (step3Time) step3Time.textContent = formatDateTimeID(wo?.tanggal_mulai) || 'Selesai dikerjakan';
                } else if (['proses', 'proses_perbaikan', 'darurat'].includes(status)) {
                    if (step3Card) step3Card.className = 'p-3.5 rounded-xl border border-blue-300 shadow-xs relative overflow-hidden bg-blue-50/30';
                    if (step3Icon) {
                        step3Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-blue-600 text-white animate-pulse';
                        step3Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>`;
                    }
                    if (step3Desc) step3Desc.textContent = 'Sedang dikerjakan di lokasi';
                    if (step3Time) step3Time.textContent = formatDateTimeID(wo?.tanggal_mulai) || 'Sedang Berjalan';
                } else if (status === 'menunggu_rab') {
                    if (step3Card) step3Card.className = 'p-3.5 rounded-xl border border-purple-200 shadow-xs relative overflow-hidden bg-purple-50/30';
                    if (step3Icon) {
                        step3Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-purple-100 text-purple-700';
                        step3Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>`;
                    }
                    if (step3Desc) step3Desc.textContent = 'Pengajuan RAB Material';
                    if (step3Time) step3Time.textContent = 'Menunggu ACC Sarpras';
                } else {
                    if (step3Card) step3Card.className = 'p-3.5 rounded-xl border border-slate-200 shadow-xs relative overflow-hidden bg-white';
                    if (step3Icon) {
                        step3Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-slate-100 text-slate-400';
                        step3Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                    }
                    if (step3Desc) step3Desc.textContent = 'Menunggu tindakan';
                    if (step3Time) step3Time.textContent = 'Belum dimulai';
                }

                // 4. Step 4: Selesai
                const step4Card = document.getElementById('step-4-card');
                const step4Icon = document.getElementById('step-4-icon');
                const step4Time = document.getElementById('step-4-time');
                const step4Desc = document.getElementById('step-4-desc');

                if (status === 'selesai') {
                    if (step4Card) step4Card.className = 'p-3.5 rounded-xl border border-emerald-200 shadow-xs relative overflow-hidden bg-emerald-50/20';
                    if (step4Icon) {
                        step4Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-emerald-600 text-white';
                        step4Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                    }
                    if (step4Desc) step4Desc.textContent = 'Fasilitas berfungsi normal';
                    if (step4Time) step4Time.textContent = formatDateTimeID(wo?.tanggal_selesai || ticket.updated_at) || 'Tuntas';
                } else {
                    if (step4Card) step4Card.className = 'p-3.5 rounded-xl border border-slate-200 shadow-xs relative overflow-hidden bg-white';
                    if (step4Icon) {
                        step4Icon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-slate-100 text-slate-400';
                        step4Icon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                    }
                    if (step4Desc) step4Desc.textContent = 'Menunggu perbaikan usai';
                    if (step4Time) step4Time.textContent = 'Belum selesai';
                }
            } catch (err) {
                console.error('Error renderTrackingTimeline:', err);
            }
        }

        function closeTicketDetail() {
            document.getElementById('ticketModal').classList.add('hidden');
            currentActiveTicket = null;
        }

        // Lightbox Zoom
        function zoomPhoto(type) {
            if (!currentActiveTicket) return;
            const wo = currentActiveTicket.verification ? (currentActiveTicket.verification.work_order || currentActiveTicket.verification.workOrder) : null;
            const zoomModal = document.getElementById('imageZoomModal');
            const zoomImg = document.getElementById('zoom-img');
            const zoomTitle = document.getElementById('zoom-title');

            if (type === 'before' && currentActiveTicket.foto_bukti) {
                zoomImg.src = `/storage/${currentActiveTicket.foto_bukti}`;
                zoomTitle.textContent = 'Foto Kondisi Awal (Sebelum Perbaikan - Oleh Pelapor)';
                zoomModal.classList.remove('hidden');
            } else if (type === 'after' && wo && wo.foto_after) {
                zoomImg.src = `/storage/${wo.foto_after}`;
                zoomTitle.textContent = 'Foto Hasil Perbaikan (Setelah Perbaikan - Oleh Teknisi)';
                zoomModal.classList.remove('hidden');
            }
        }

        function closeImageZoom() {
            document.getElementById('imageZoomModal').classList.add('hidden');
        }

        // Close on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const zoomModal = document.getElementById('imageZoomModal');
                if (!zoomModal.classList.contains('hidden')) {
                    closeImageZoom();
                } else {
                    closeTicketDetail();
                }
            }
        });
    </script>

</body>
</html>
