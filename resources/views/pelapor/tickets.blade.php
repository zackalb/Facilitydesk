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
                        <input type="text" id="searchInput" placeholder="Cari ID tiket atau kata kunci..." class="w-full bg-gray-50/50 border-none rounded-lg py-2.5 pl-10 pr-4 text-sm focus:ring-2 focus:ring-blue-500 placeholder-gray-400" onkeyup="filterTickets()">
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
                    <div class="ticket-card bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-200 cursor-pointer" 
                         data-status="{{ $ticket->status_laporan }}"
                         data-search="{{ strtolower($ticket->facility->nama_fasilitas . ' ' . $ticket->deskripsi_kerusakan) }}"
                         onclick="openTicketDetail({{ json_encode($ticket->load('facility', 'user')) }})">
                        
                        <!-- Ticket Header -->
                        <div class="p-4 border-b border-gray-100">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-xs font-bold text-gray-600 bg-gray-100 px-2.5 py-1 rounded-md">#TKT-{{ str_pad($ticket->id_laporan, 4, '0', STR_PAD_LEFT) }}</span>
                                @php
                                    $statusColors = [
                                        'menunggu' => 'bg-[#FFEDE1] text-[#E0643D]',
                                        'proses' => 'bg-blue-50 text-blue-700',
                                        'proses_perbaikan' => 'bg-blue-50 text-blue-700',
                                        'diproses' => 'bg-blue-50 text-blue-700',
                                        'menunggu_rab' => 'bg-amber-50 text-amber-700',
                                        'selesai' => 'bg-green-50 text-green-700',
                                        'darurat' => 'bg-red-50 text-red-700'
                                    ];
                                    $statusColor = $statusColors[$ticket->status_laporan] ?? 'bg-gray-100 text-gray-700';
                                @endphp
                                <span class="text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider {{ $statusColor }}">
                                    {{ str_replace('_', ' ', ucfirst($ticket->status_laporan)) }}
                                </span>
                            </div>
                            <h3 class="font-bold text-gray-900 text-base mb-1 truncate">{{ $ticket->facility->nama_fasilitas ?? 'Fasilitas' }}</h3>
                            <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $ticket->deskripsi_kerusakan }}</p>

                            @if($ticket->category || $ticket->technician)
                                <div class="flex items-center gap-2 mt-2 pt-2 border-t border-gray-100 text-xs">
                                    @if($ticket->category)
                                        <span class="bg-blue-50 text-blue-700 font-semibold px-2 py-0.5 rounded text-[10px]">
                                            {{ $ticket->category->name }}
                                        </span>
                                    @endif
                                    @if($ticket->technician)
                                        <span class="text-gray-500 text-[11px] truncate">
                                            Teknisi: <strong class="text-gray-700">{{ $ticket->technician->nama }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Ticket Body -->
                        <div class="p-4 bg-gray-50/50">
                            <div class="flex items-center text-xs text-gray-500 mb-2">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $ticket->created_at->format('d M Y, H:i') }}
                            </div>
                            <div class="flex items-center text-xs text-gray-500">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $ticket->facility->lokasi_detail ?? 'Lokasi tidak tersedia' }}
                            </div>
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

    <!-- Ticket Detail Modal -->
    <div id="ticketModal" class="fixed inset-0 z-50 overflow-hidden hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background Overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeTicketDetail()"></div>

            <!-- Centered Card -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                
                <!-- Modal Header -->
                <div class="bg-white px-6 pt-6 pb-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-[#0B3A82]" id="modal-title">
                        Detail Tiket - <span id="modal-ticket-id"></span>
                    </h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="closeTicketDetail()">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto">
                    
                    <!-- Status & Date -->
                    <div class="flex justify-between items-center bg-gray-50 p-4 rounded-xl">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Status</p>
                            <span id="modal-status" class="text-sm font-bold px-3 py-1 rounded-full"></span>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500 mb-1">Tanggal Lapor</p>
                            <p id="modal-date" class="text-sm font-bold text-gray-900"></p>
                        </div>
                    </div>

                    <!-- Facility Info -->
                    <div class="bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900 text-sm mb-1" id="modal-facility"></h4>
                                <p class="text-xs text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span id="modal-location"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 mb-2">Deskripsi Masalah</h4>
                        <p id="modal-description" class="text-sm text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-xl"></p>
                    </div>

                    <!-- Photo Evidence -->
                    <div id="modal-photo-container" class="hidden">
                        <h4 class="text-sm font-bold text-gray-900 mb-2">Bukti Foto</h4>
                        <img id="modal-photo" src="" alt="Bukti" class="w-full rounded-xl border border-gray-200">
                    </div>

                    <!-- Reporter Info -->
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Informasi Pelapor</h4>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold text-sm" id="modal-reporter-avatar"></div>
                            <div>
                                <p class="text-sm font-bold text-gray-900" id="modal-reporter-name"></p>
                                <p class="text-xs text-gray-500" id="modal-reporter-role"></p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2.5 text-sm font-bold text-gray-600 hover:text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 transition-colors" onclick="closeTicketDetail()">Tutup</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        let currentFilter = 'Semua';

        // Filter by status
        function filterByStatus(status) {
            currentFilter = status;
            
            // Update button styles
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
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.ticket-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const status = card.getAttribute('data-status');
                const searchData = card.getAttribute('data-search');
                
                const matchesStatus = currentFilter === 'Semua' 
                    || status.toLowerCase() === currentFilter.toLowerCase()
                    || (currentFilter.toLowerCase() === 'diproses' && (status === 'proses' || status === 'proses_perbaikan' || status === 'menunggu_rab'));
                const matchesSearch = searchData.includes(searchTerm);

                if (matchesStatus && matchesSearch) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            document.getElementById('noResults').classList.toggle('hidden', visibleCount > 0);
            document.getElementById('ticketsGrid').classList.toggle('hidden', visibleCount === 0);
        }

        // Open ticket detail modal
        function openTicketDetail(ticket) {
            const modal = document.getElementById('ticketModal');
            const ticketId = ticket.ticket_id || `TKT-${String(ticket.id_laporan).padStart(4, '0')}`;
            
            // Populate modal data
            document.getElementById('modal-ticket-id').textContent = '#' + ticketId;
            document.getElementById('modal-facility').textContent = ticket.facility?.nama_fasilitas || 'Fasilitas';
            document.getElementById('modal-location').textContent = ticket.facility?.lokasi_detail || 'Lokasi tidak tersedia';
            document.getElementById('modal-description').textContent = ticket.deskripsi_kerusakan;
            document.getElementById('modal-date').textContent = new Date(ticket.created_at).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            // Set status badge
            const statusColors = {
                'menunggu': 'bg-[#FFEDE1] text-[#E0643D]',
                'proses': 'bg-blue-50 text-blue-700',
                'proses_perbaikan': 'bg-blue-50 text-blue-700',
                'diproses': 'bg-blue-50 text-blue-700',
                'menunggu_rab': 'bg-amber-50 text-amber-700',
                'selesai': 'bg-green-50 text-green-700',
                'darurat': 'bg-red-50 text-red-700'
            };
            const statusBadge = document.getElementById('modal-status');
            const cleanStatus = (ticket.status_laporan || '').replace('_', ' ');
            statusBadge.textContent = cleanStatus.charAt(0).toUpperCase() + cleanStatus.slice(1);
            statusBadge.className = `text-sm font-bold px-3 py-1 rounded-full ${statusColors[ticket.status_laporan] || 'bg-gray-100 text-gray-700'}`;

            // Set reporter info
            document.getElementById('modal-reporter-name').textContent = ticket.user?.nama || 'Pelapor';
            document.getElementById('modal-reporter-role').textContent = ticket.user?.role || 'Pelapor';
            document.getElementById('modal-reporter-avatar').textContent = (ticket.user?.nama || 'U').charAt(0).toUpperCase();

            // Handle photo
            if (ticket.foto_bukti) {
                document.getElementById('modal-photo-container').classList.remove('hidden');
                document.getElementById('modal-photo').src = `/storage/${ticket.foto_bukti}`;
            } else {
                document.getElementById('modal-photo-container').classList.add('hidden');
            }

            // Show modal
            modal.classList.remove('hidden');
        }

        // Close ticket detail modal
        function closeTicketDetail() {
            document.getElementById('ticketModal').classList.add('hidden');
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeTicketDetail();
            }
        });
    </script>

</body>
</html>
