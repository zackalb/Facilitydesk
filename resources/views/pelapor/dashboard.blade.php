<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Issue - FacilityDesk</title>
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
                <a href="{{ route('pelapor.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/50 text-blue-700 rounded-lg text-sm font-semibold border-l-2 border-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Report Issue</span>
                </a>
                <a href="{{ route('pelapor.tickets') }}" class="flex items-center space-x-3 px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg text-sm font-medium transition-colors">
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

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif
                
                @if(isset($errors) && $errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                        <ul class="list-disc pl-5 text-sm font-medium space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Red Banner Button (Triggers Emergency Modal) -->
                <div class="mb-6">
                    <button type="button" onclick="toggleModal('modal-darurat')" class="w-full bg-[#cc0000] rounded-2xl p-5 md:p-6 text-left flex items-center gap-5 hover:bg-red-700 transition shadow-md shadow-red-900/10 cursor-pointer active:scale-[0.99]">
                        <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shrink-0 shadow-sm animate-pulse">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-1 uppercase tracking-wider flex items-center gap-2">
                                <span>Lapor Darurat</span>
                                <span class="text-xs bg-white/20 text-white px-2.5 py-0.5 rounded-full font-bold">Fast-Track</span>
                            </h2>
                            <p class="text-red-100 text-sm font-medium">Tekan untuk melaporkan insiden kritis yang membutuhkan penanganan segera (Korsleting, Pipa Pecah, Bahaya).</p>
                        </div>
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column: Form -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 overflow-hidden relative">
                            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <h3 class="font-bold text-gray-900 text-[17px]">Buat Laporan Baru</h3>
                                </div>
                                <span class="bg-gray-100 text-gray-600 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Standard Form</span>
                            </div>
                            
                            <form action="{{ route('pelapor.lapor') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                                @csrf
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Nama Pelapor</label>
                                        <input type="text" value="{{ $user->nama }}" readonly class="w-full bg-blue-50/50 border-none rounded-xl py-3 px-4 text-sm text-blue-900 font-medium focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Tingkat Urgensi <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <select name="tingkat_urgensi" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                                                <option value="" disabled selected>Pilih tingkat urgensi</option>
                                                <option value="rendah">Rendah (Dapat ditunda - Langsung Proses)</option>
                                                <option value="sedang">Sedang (Mengganggu kenyamanan - Langsung Proses)</option>
                                                <option value="tinggi">Tinggi (Kritis / Butuh Pengajuan RAB Sarpras)</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Kategori Kerusakan <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                            </div>
                                            <select name="category_id" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 pl-10 pr-4 text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                                                <option value="" disabled selected>Pilih Kategori Kerusakan</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }} (Spesialisasi Teknisi {{ $cat->name }})</option>
                                                @endforeach
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Lokasi Fasilitas <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            </div>
                                            <select name="id_fasilitas" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 pl-10 pr-4 text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                                                <option value="" disabled selected>{{ $facilities->isEmpty() ? 'Tidak ada fasilitas yang berstatus Baik saat ini' : 'Pilih Fasilitas / Ruangan' }}</option>
                                                @forelse($facilities as $fac)
                                                    <option value="{{ $fac->id_fasilitas }}">{{ $fac->nama_fasilitas }} ({{ $fac->lokasi_detail }})</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Deskripsi Masalah</label>
                                    <textarea name="deskripsi_kerusakan" rows="4" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" placeholder="Jelaskan detail masalah yang terjadi..."></textarea>
                                </div>

                                <div>
                                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Lampiran Bukti (Opsional)</label>
                                    <div onclick="document.getElementById('file-upload').click()" class="border-2 border-dashed border-gray-200 rounded-xl h-48 flex items-center justify-center text-center cursor-pointer hover:border-blue-400 hover:bg-blue-50/30 transition-all relative overflow-hidden group">
                                        <input type="file" name="foto_bukti" id="file-upload" class="hidden" accept="image/*,application/pdf" onchange="previewImage(this)">
                                        
                                        <!-- Default State UI -->
                                        <div id="upload-default-state" class="space-y-1 p-6">
                                            <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <p class="text-sm font-bold text-gray-600">Klik untuk unggah foto</p>
                                            <p class="text-xs text-gray-400 font-medium">Maks. 5MB (JPG, PNG, PDF)</p>
                                        </div>

                                        <!-- Preview State UI -->
                                        <div id="upload-preview-state" class="hidden w-full h-full absolute inset-0">
                                            <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                                            <div id="pdf-preview-icon" class="hidden w-full h-full bg-red-50 text-red-500 flex flex-col items-center justify-center p-6">
                                                <svg class="w-10 h-10 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <p id="file-name" class="text-xs font-bold truncate max-w-xs"></p>
                                            </div>
                                            <!-- Hover Overlay -->
                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white p-4">
                                                <svg class="w-6 h-6 mb-1 text-gray-250" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"></path></svg>
                                                <p class="text-xs font-bold truncate max-w-xs mt-1" id="hover-file-name"></p>
                                                <p class="text-[10px] text-gray-300">Klik kembali untuk mengganti foto</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end gap-3 pt-2">
                                    <button type="reset" class="px-5 py-2.5 text-sm font-bold text-gray-600 hover:text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors" onclick="resetImagePreview()">Batal</button>
                                    <button type="submit" class="px-6 py-2.5 flex items-center gap-2 text-sm font-bold text-white bg-[#0B3A82] rounded-lg hover:bg-blue-800 transition-colors shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                        Kirim Laporan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Right Column: Tracking & Info -->
                    <div class="space-y-6">
                        
                        <!-- Tracking Card -->
                        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 overflow-hidden">
                            <div class="p-5 border-b border-gray-100 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <h3 class="font-bold text-gray-900 text-base">Lacak WO</h3>
                            </div>
                            
                            <div class="p-5">
                                <p class="text-[13px] text-gray-500 font-medium mb-4 leading-relaxed">Masukkan ID WO Anda untuk melihat status penanganan terkini.</p>
                                
                                <form action="{{ route('pelapor.track') }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <input type="text" name="ticket_id" placeholder="CTH: WO-2023-08X" class="flex-1 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm font-medium focus:ring-2 focus:ring-blue-500 focus:outline-none uppercase">
                                    <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </button>
                                </form>

                                @if(session('tracked_ticket'))
                                    @php $tracked = session('tracked_ticket'); @endphp
                                    <div onclick="openReportModal({{ json_encode($tracked) }})" class="mt-5 bg-blue-50 p-4 rounded-xl border border-blue-100 cursor-pointer hover:bg-blue-100/50 transition-colors">
                                        @if($tracked->foto_bukti)
                                            <img src="{{ asset('storage/' . $tracked->foto_bukti) }}" class="w-full h-32 object-cover rounded-lg mb-3">
                                        @endif
                                        <div class="flex justify-between items-start mb-2">
                                            <span class="text-xs font-bold text-blue-800 bg-blue-200 px-2.5 py-0.5 rounded-full">TKT-{{ str_pad($tracked->id_laporan, 4, '0', STR_PAD_LEFT) }}</span>
                                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-widest bg-blue-100 text-blue-700">{{ $tracked->status_laporan }}</span>
                                        </div>
                                        <h4 class="font-bold text-sm text-gray-900 line-clamp-1 truncate">{{ $tracked->facility->nama_fasilitas ?? 'Fasilitas' }}</h4>
                                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $tracked->deskripsi_kerusakan }}</p>
                                    </div>
                                @endif
                                
                                <div class="mt-6">
                                    <div class="bg-[#F8F9FA] rounded-xl p-4">
                                        <h4 class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-4">Laporan Terakhir Anda</h4>
                                        
                                        <div class="space-y-3">
                                            @forelse($myReports as $report)
                                            <div onclick="openReportModal({{ json_encode($report->load('facility')) }})" class="flex gap-3 bg-white p-3 rounded-lg border border-gray-100 shadow-sm relative overflow-hidden group hover:border-blue-200 transition-colors cursor-pointer">
                                                @if($report->foto_bukti)
                                                    <img src="{{ asset('storage/' . $report->foto_bukti) }}" class="w-10 h-10 rounded-lg object-cover">
                                                @else
                                                    <div class="w-10 h-10 rounded-lg shrink-0 flex items-center justify-center {{ $report->is_emergency ? 'bg-red-50 text-red-500' : 'bg-blue-50 text-blue-600' }}">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"></path></svg>
                                                    </div>
                                                @endif
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-center justify-between gap-2 mb-1">
                                                        <h4 class="text-sm font-bold text-gray-900 truncate">{{ $report->facility->nama_fasilitas ?? 'Fasilitas' }}</h4>
                                                        @php
                                                            $statusColor = match($report->status_laporan) {
                                                                'selesai' => 'bg-green-100 text-green-700',
                                                                'darurat' => 'bg-red-100 text-red-700',
                                                                'proses', 'proses_perbaikan', 'diproses' => 'bg-blue-100 text-blue-700',
                                                                'menunggu_rab' => 'bg-amber-100 text-amber-700',
                                                                default => 'bg-[#FFEDE1] text-[#E0643D]'
                                                            };
                                                        @endphp
                                                        <span class="text-[9px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider {{ $statusColor }}">
                                                            {{ $report->status_laporan }}
                                                        </span>
                                                    </div>
                                                    <p class="text-[11px] text-gray-500 font-medium">TKT-[{{ str_pad($report->id_laporan, 4, '0', STR_PAD_LEFT) }}] • {{ $report->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                            @empty
                                                <p class="text-xs text-gray-400 text-center py-2">Belum ada laporan.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Card -->
                        <div class="bg-[#f5f3ff] border border-[#ede9fe] rounded-[20px] p-5 flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#8b5cf6] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div>
                                <h4 class="text-[13px] font-bold text-[#5b21b6] mb-1">Jam Operasional Teknisi</h4>
                                <p class="text-xs text-[#7c3aed] leading-relaxed font-medium">Tim fasilitas beroperasi pukul 08:00 - 16:00. Laporan di luar jam tersebut akan diproses pada hari kerja berikutnya, kecuali bersifat darurat.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <footer class="mt-12 text-center text-[11px] font-medium text-gray-400 border-t border-gray-100 pt-6 pb-4">
                &copy; {{ date('Y') }} FacilityDesk Administrative Office. All rights reserved.
            </footer>
        </div>
    </main>

    <!-- Modal Detail Laporan -->
    <div id="reportModal" class="fixed inset-0 z-50 overflow-hidden hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background Overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeReportModal()"></div>

            <!-- Centered Card -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-6 pt-6 pb-4 sm:p-6 sm:pb-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-[#0B3A82]" id="modal-title">
                        Detail Tiket - <span id="modal-ticket-id"></span>
                    </h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="closeReportModal()">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="p-6 space-y-4">
                    <!-- Status & Info -->
                    <div class="flex justify-between items-center bg-gray-50 p-3 rounded-xl">
                        <div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Status Laporan</p>
                            <span class="inline-block text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wider mt-1 text-[#E0643D] bg-[#FFEDE1]" id="modal-status"></span>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Tanggal Laporan</p>
                            <p class="text-xs font-semibold text-gray-700 mt-1" id="modal-date"></p>
                        </div>
                    </div>

                    <!-- Info detail -->
                    <div>
                        <h5 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Fasilitas</h5>
                        <p class="text-sm font-bold text-gray-900 mt-1" id="modal-facility-name"></p>
                        <p class="text-xs text-gray-500 mt-0.5" id="modal-facility-location"></p>
                    </div>

                    <!-- deskripsi -->
                    <div>
                        <h5 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Deskripsi Kerusakan</h5>
                        <p class="text-sm text-gray-750 mt-1 leading-relaxed bg-gray-50/50 p-3 rounded-xl border border-gray-100" id="modal-description"></p>
                    </div>

                    <!-- Bukti Gambar -->
                    <div>
                        <h5 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Foto/Gambar Bukti</h5>
                        <div class="w-full bg-gray-50 rounded-xl overflow-hidden flex items-center justify-center border border-gray-200">
                            <img id="modal-img-bukti" src="" class="w-full max-h-64 object-contain hidden" alt="Bukti Kerusakan">
                            <div id="modal-no-img" class="text-xs text-gray-400 font-medium py-8 flex flex-col items-center justify-center">
                                <svg class="w-8 h-8 text-gray-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>Tidak ada lampiran foto/gambar bukti</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 flex justify-end">
                    <button type="button" class="w-full sm:w-auto px-5 py-2 text-sm font-bold text-gray-600 bg-white border border-gray-250 rounded-lg hover:bg-gray-100 hover:text-gray-950 transition-colors" onclick="closeReportModal()">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal script -->
    <script>
        function openReportModal(elementOrData) {
            let data;
            if (elementOrData instanceof HTMLElement) {
                data = JSON.parse(elementOrData.getAttribute('data-report'));
            } else {
                data = elementOrData;
            }
            
            if (!data) return;

            document.getElementById('modal-ticket-id').innerText = 'TKT-' + String(data.id_laporan).padStart(4, '0');
            
            // Format status badge
            const statusEl = document.getElementById('modal-status');
            statusEl.innerText = data.status_laporan;
            statusEl.className = 'inline-block text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wider mt-1 ';
            if (data.status_laporan === 'selesai') {
                statusEl.className += 'bg-green-100 text-green-700';
            } else if (data.status_laporan === 'darurat') {
                statusEl.className += 'bg-red-100 text-red-700';
            } else if (data.status_laporan === 'proses_perbaikan' || data.status_laporan === 'proses' || data.status_laporan === 'diproses') {
                statusEl.className += 'bg-blue-100 text-blue-700';
            } else if (data.status_laporan === 'menunggu_rab') {
                statusEl.className += 'bg-amber-100 text-amber-700';
            } else {
                statusEl.className += 'bg-[#FFEDE1] text-[#E0643D]';
            }

            // Format tanggal/waktu
            document.getElementById('modal-date').innerText = new Date(data.created_at).toLocaleDateString('id-ID', {
                year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
            });

            // Fasilitas info
            const facilityName = data.facility ? data.facility.nama_fasilitas : 'Fasilitas';
            const facilityLoc = data.facility ? data.facility.lokasi_detail : '';
            document.getElementById('modal-facility-name').innerText = facilityName;
            document.getElementById('modal-facility-location').innerText = facilityLoc;

            // Deskripsi
            document.getElementById('modal-description').innerText = data.deskripsi_kerusakan;

            // Image URL
            const imgEl = document.getElementById('modal-img-bukti');
            const noImgEl = document.getElementById('modal-no-img');

            if (data.foto_bukti) {
                imgEl.src = '/storage/' + data.foto_bukti;
                imgEl.classList.remove('hidden');
                noImgEl.classList.add('hidden');
            } else {
                imgEl.src = '';
                imgEl.classList.add('hidden');
                noImgEl.classList.remove('hidden');
            }

            document.getElementById('reportModal').classList.remove('hidden');
        }

        function closeReportModal() {
            document.getElementById('reportModal').classList.add('hidden');
        }

        function previewImage(input) {
            const file = input.files[0];
            const defaultState = document.getElementById('upload-default-state');
            const previewState = document.getElementById('upload-preview-state');
            const imagePreview = document.getElementById('image-preview');
            const pdfIcon = document.getElementById('pdf-preview-icon');
            const fileName = document.getElementById('file-name');
            const hoverFileName = document.getElementById('hover-file-name');

            if (file) {
                // Tampilkan nama file
                if (fileName) fileName.innerText = file.name;
                if (hoverFileName) hoverFileName.innerText = file.name;
                
                // Ubah status visibilitas
                defaultState.classList.add('hidden');
                previewState.classList.remove('hidden');

                // Jika image, tampilkan previewnya
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        pdfIcon.classList.add('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    // PDF or other documents
                    imagePreview.classList.add('hidden');
                    pdfIcon.classList.remove('hidden');
                }
            } else {
                resetImagePreview();
            }
        }

        function resetImagePreview() {
            const input = document.getElementById('file-upload');
            if (input) input.value = ""; // clear input file
            
            document.getElementById('upload-default-state').classList.remove('hidden');
            document.getElementById('upload-preview-state').classList.add('hidden');
            
            const imagePreview = document.getElementById('image-preview');
            imagePreview.src = "#";
            imagePreview.classList.add('hidden');
            
            document.getElementById('pdf-preview-icon').classList.add('hidden');
            document.getElementById('file-name').innerText = "";
            document.getElementById('hover-file-name').innerText = "";
        }
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.toggle('hidden');
            }
        }
    </script>

    <!-- Modal Lapor Darurat Cepat -->
    <div id="modal-darurat" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4 transition-all">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 lg:p-7 shadow-2xl border border-red-100 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between mb-5 border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Kirim Panggilan Darurat</h3>
                        <p class="text-xs text-slate-500 font-medium">Tim Sarpras akan langsung menerima peringatan siaga.</p>
                    </div>
                </div>
                <button type="button" onclick="toggleModal('modal-darurat')" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100 transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form action="{{ route('pelapor.darurat') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">1. Pilih Lokasi / Fasilitas Darurat</label>
                    <select name="id_fasilitas" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-3.5 text-sm font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500">
                        <option value="" disabled selected>Pilih Lokasi Kejadian...</option>
                        @foreach($facilities as $fac)
                            <option value="{{ $fac->id_fasilitas }}">{{ $fac->nama_fasilitas }} ({{ $fac->lokasi_detail }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">2. Kategori Insiden</label>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <label class="border border-slate-200 rounded-xl p-2.5 flex items-center gap-2 cursor-pointer hover:border-red-300 hover:bg-red-50/40 transition-all font-semibold text-slate-700">
                            <input type="radio" name="incident_type" value="Korsleting Listrik / Asap" checked onchange="document.getElementById('emergency-desc').value = this.value" class="text-red-600 focus:ring-red-500">
                            <span>⚡ Korsleting / Asap</span>
                        </label>
                        <label class="border border-slate-200 rounded-xl p-2.5 flex items-center gap-2 cursor-pointer hover:border-red-300 hover:bg-red-50/40 transition-all font-semibold text-slate-700">
                            <input type="radio" name="incident_type" value="Pipa Pecah / Banjir" onchange="document.getElementById('emergency-desc').value = this.value" class="text-red-600 focus:ring-red-500">
                            <span>💧 Pipa Pecah / Banjir</span>
                        </label>
                        <label class="border border-slate-200 rounded-xl p-2.5 flex items-center gap-2 cursor-pointer hover:border-red-300 hover:bg-red-50/40 transition-all font-semibold text-slate-700">
                            <input type="radio" name="incident_type" value="Kaca Pecah / Bahaya Fisik" onchange="document.getElementById('emergency-desc').value = this.value" class="text-red-600 focus:ring-red-500">
                            <span>🚪 Kaca / Pintu Rusak</span>
                        </label>
                        <label class="border border-slate-200 rounded-xl p-2.5 flex items-center gap-2 cursor-pointer hover:border-red-300 hover:bg-red-50/40 transition-all font-semibold text-slate-700">
                            <input type="radio" name="incident_type" value="Darurat Kritis Lainnya" onchange="document.getElementById('emergency-desc').value = this.value" class="text-red-600 focus:ring-red-500">
                            <span>⚠️ Bahaya Lainnya</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">3. Deskripsi Singkat Kejadian</label>
                    <textarea name="deskripsi_kerusakan" id="emergency-desc" rows="2" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 resize-none">Korsleting Listrik / Asap</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-3">
                    <button type="button" onclick="toggleModal('modal-darurat')" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">Batal</button>
                    <button type="submit" class="bg-[#cc0000] hover:bg-red-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold transition-all shadow-md flex items-center gap-2 cursor-pointer active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span>Kirim Sinyal Darurat</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
