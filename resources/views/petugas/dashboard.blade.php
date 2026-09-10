<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas Teknisi - FacilityDesk</title>
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
                        <p class="text-[10px] text-slate-500 font-medium">Petugas Teknisi</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-1.5">
                    <a href="{{ route('petugas.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/50 text-blue-700 rounded-xl text-sm font-semibold border-l-2 border-blue-600 transition-all">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span>Tugas Perbaikan</span>
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
            <!-- Topbar: Konsisten seperti Admin SarPras -->
            <header class="bg-white border-b border-slate-100 flex items-center justify-between px-8 py-4 z-10 shrink-0">
                <h2 class="text-xl font-extrabold text-blue-950 tracking-tight">Petugas Teknisi</h2>

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

                    <!-- Avatar Profile Info -->
                    <div class="flex items-center space-x-3 border-l border-slate-200 pl-5">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold text-slate-900 leading-tight">{{ $user->nama ?? 'Andi Saputra' }}</p>
                            <p class="text-[11px] text-slate-500 font-semibold">{{ $user->category ? 'Teknisi ' . $user->category->name : 'Petugas Teknisi' }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 font-bold text-base flex items-center justify-center border border-blue-200 shadow-xs shrink-0">
                            {{ strtoupper(substr($user->nama ?? 'T', 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Scrollable Page Content -->
            <div class="flex-1 overflow-auto p-8 space-y-6">

                <!-- Flash Success Message -->
                @if(session('success'))
                    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-semibold flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- KPI Metric Cards (Mirip Admin Sarpras) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <!-- Total Tugas -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Total Tugas</p>
                            <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $totalAssigned }}</h3>
                            <div class="text-xs mt-1.5 flex items-center gap-1 font-medium text-slate-500">
                                <span>Semua laporan</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        </div>
                    </div>

                    <!-- Perlu Ditangani -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Perlu Ditangani</p>
                            <h3 class="text-2xl font-bold text-amber-600 mt-1">{{ $pending }}</h3>
                            <div class="text-xs mt-1.5 flex items-center gap-1 font-medium text-amber-600">
                                <span>Belum dikerjakan</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>

                    <!-- Sedang Dikerjakan -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Sedang Dikerjakan</p>
                            <h3 class="text-2xl font-bold text-indigo-600 mt-1">{{ $inProgress }}</h3>
                            <div class="text-xs mt-1.5 flex items-center gap-1 font-medium text-indigo-600">
                                <span>Proses perbaikan</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                    </div>

                    <!-- Telah Selesai -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Telah Selesai</p>
                            <h3 class="text-2xl font-bold text-emerald-600 mt-1">{{ $completed }}</h3>
                            <div class="text-xs mt-1.5 flex items-center gap-1 font-medium text-emerald-600">
                                <span>Fasilitas pulih</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Work Orders / Task Table (Sama persis dengan Admin Sarpras) -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_1px_3px_rgba(0,0,0,0.02)] overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h3 class="text-base font-bold text-slate-800">Daftar Instruksi Kerja Teknisi</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Semua laporan perbaikan yang perlu ditangani di lapangan</p>
                        </div>

                        <!-- Status Filter Tabs -->
                        <div class="flex items-center gap-1.5 bg-slate-50 p-1 rounded-xl border border-slate-100">
                            <button onclick="filterTasks('all')" class="task-filter-btn px-3 py-1.5 text-xs font-semibold rounded-lg bg-white text-slate-800 shadow-xs transition-all" id="btn-filter-all">Semua</button>
                            <button onclick="filterTasks('menunggu')" class="task-filter-btn px-3 py-1.5 text-xs font-medium rounded-lg text-slate-500 hover:text-slate-800 transition-all" id="btn-filter-menunggu">Perlu Ditangani</button>
                            <button onclick="filterTasks('proses')" class="task-filter-btn px-3 py-1.5 text-xs font-medium rounded-lg text-slate-500 hover:text-slate-800 transition-all" id="btn-filter-proses">Diproses</button>
                            <button onclick="filterTasks('darurat')" class="task-filter-btn px-3 py-1.5 text-xs font-medium rounded-lg text-slate-500 hover:text-slate-800 transition-all" id="btn-filter-darurat">Darurat</button>
                            <button onclick="filterTasks('selesai')" class="task-filter-btn px-3 py-1.5 text-xs font-medium rounded-lg text-slate-500 hover:text-slate-800 transition-all" id="btn-filter-selesai">Selesai</button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-[#f8fafc] text-slate-400 font-semibold text-xs border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4">Fasilitas / Masalah</th>
                                    <th class="px-6 py-4">Pelapor & Lokasi</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-center">Aksi Pengerjaan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($allTasks as $task)
                                    <tr class="hover:bg-slate-50/50 transition-colors task-row" data-status="{{ $task->status_laporan }}">
                                        <!-- Facility & Description -->
                                        <td class="px-6 py-4.5">
                                            <div class="font-bold text-slate-800 text-sm">{{ $task->facility->nama_fasilitas ?? 'Fasilitas Sekolah' }}</div>
                                            <div class="text-xs text-slate-500 mt-0.5 line-clamp-1 max-w-xs">{{ $task->deskripsi_kerusakan }}</div>
                                        </td>

                                        <!-- Reporter & Location -->
                                        <td class="px-6 py-4.5">
                                            <div class="font-semibold text-slate-800">{{ $task->user->nama ?? 'Warga Sekolah' }}</div>
                                            <div class="text-xs text-slate-400 mt-1 flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 text-slate-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="truncate max-w-[200px]">{{ $task->facility->lokasi_detail ?? '-' }}</span>
                                            </div>
                                        </td>

                                        <!-- Category -->
                                        <td class="px-6 py-4.5">
                                            <div class="inline-flex items-center gap-1.5 text-slate-700 font-medium">
                                                @if(\Illuminate\Support\Str::contains(strtolower($task->facility->kategori_area ?? ''), 'listrik'))
                                                    <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                                                @elseif(\Illuminate\Support\Str::contains(strtolower($task->facility->kategori_area ?? ''), ['toilet', 'sanitasi', 'pipa']))
                                                    <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                                                @elseif(\Illuminate\Support\Str::contains(strtolower($task->facility->kategori_area ?? ''), 'kelas'))
                                                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                                @else
                                                    <span class="w-2 h-2 rounded-full bg-indigo-400"></span>
                                                @endif
                                                <span>{{ $task->facility->kategori_area ?? 'Umum' }}</span>
                                            </div>
                                        </td>

                                        <!-- Status Pill -->
                                        <td class="px-6 py-4.5">
                                            @if($task->status_laporan === 'darurat')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-700 border border-red-100">
                                                    Darurat
                                                </span>
                                            @elseif($task->status_laporan === 'menunggu')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                                    Perlu Ditangani
                                                </span>
                                            @elseif($task->status_laporan === 'menunggu_rab')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-orange-50 text-orange-700 border border-orange-200">
                                                    Menunggu RAB
                                                </span>
                                            @elseif(in_array($task->status_laporan, ['proses', 'proses_perbaikan']))
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                                    Sedang Dikerjakan
                                                </span>
                                            @elseif($task->status_laporan === 'selesai')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700 border border-green-100">
                                                    Selesai
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-slate-50 text-slate-700 border border-slate-200">
                                                    {{ ucfirst(str_replace('_', ' ', $task->status_laporan)) }}
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Action Button -->
                                        <td class="px-6 py-4.5 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                @if($task->status_laporan === 'darurat')
                                                    <a href="{{ route('petugas.tasks.show', $task->id_laporan) }}" class="inline-flex items-center justify-center gap-1.5 bg-red-600 hover:bg-red-700 text-white font-bold py-1.5 px-3.5 rounded-xl text-xs shadow-sm shadow-red-500/30 transition-all animate-pulse">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                                        <span>Respon Cepat</span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('petugas.tasks.show', $task->id_laporan) }}" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded-xl text-xs shadow-sm transition-all">
                                                        {{ $task->status_laporan === 'selesai' ? 'Detail' : 'Eksekusi' }}
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-slate-400 font-medium">
                                            Tidak ada instruksi kerja perbaikan saat ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        function filterTasks(status) {
            document.querySelectorAll('.task-filter-btn').forEach(btn => {
                btn.className = 'task-filter-btn px-3 py-1.5 text-xs font-medium rounded-lg text-slate-500 hover:text-slate-800 transition-all';
            });
            const activeBtn = document.getElementById('btn-filter-' + status);
            if (activeBtn) {
                activeBtn.className = 'task-filter-btn px-3 py-1.5 text-xs font-semibold rounded-lg bg-white text-slate-800 shadow-xs transition-all';
            }

            const rows = document.querySelectorAll('.task-row');
            rows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                if (status === 'all') {
                    row.classList.remove('hidden');
                } else if (status === 'menunggu') {
                    if (rowStatus === 'menunggu' || rowStatus === 'menunggu_rab') row.classList.remove('hidden');
                    else row.classList.add('hidden');
                } else if (status === 'darurat') {
                    if (rowStatus === 'darurat') row.classList.remove('hidden');
                    else row.classList.add('hidden');
                } else if (status === 'proses') {
                    if (rowStatus === 'proses' || rowStatus === 'proses_perbaikan') row.classList.remove('hidden');
                    else row.classList.add('hidden');
                } else if (status === 'selesai') {
                    if (rowStatus === 'selesai') row.classList.remove('hidden');
                    else row.classList.add('hidden');
                }
            });
        }
    </script>
</body>
</html>
