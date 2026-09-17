<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Kerusakan - SIPERFAS</title>
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
                    <h1 class="text-sm font-bold text-gray-900 leading-tight">SIPERFAS</h1>
                    <p class="text-[10px] text-gray-500 font-medium">Sistem Informasi Pelaporan Fasilitas</p>
                </div>
            </div>
            

            <nav class="space-y-1">
                <a href="{{ route('pelapor.dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50/50 text-blue-700 rounded-lg text-sm font-semibold border-l-2 border-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Lapor Kerusakan</span>
                </a>
                <a href="{{ route('pelapor.tickets') }}" class="flex items-center space-x-3 px-4 py-2.5 text-gray-600 hover:bg-gray-50 rounded-lg text-sm font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    <span>Tiket Saya</span>
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
                    <span>Pengaturan</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg text-sm font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Topbar: Responsif Mobile & Desktop -->
        <header class="bg-white border-b border-slate-100 flex items-center justify-between px-4 sm:px-8 py-3.5 z-20 shrink-0">
            <div class="flex items-center space-x-3">
                <!-- Mobile Logo & Nama Aplikasi -->
                <div class="flex items-center space-x-2.5 md:hidden">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-7 h-7 object-contain">
                    <div>
                        <h1 class="text-sm font-bold text-gray-900 leading-tight">SIPERFAS</h1>
                        <p class="text-[9px] text-gray-500 font-medium">Pelapor</p>
                    </div>
                </div>
                <h2 class="text-xl font-extrabold text-blue-950 tracking-tight hidden md:block">Pelapor</h2>
            </div>

            <!-- Notifications & Profile Dropdown -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <button class="text-slate-500 hover:text-blue-600 transition-all relative p-1.5 rounded-lg hover:bg-slate-50">
                    <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                    <span class="absolute 1 top-1 right-1 w-2 h-2 bg-blue-600 rounded-full border-2 border-white"></span>
                </button>

                <!-- Avatar Profile Info with Dropdown Toggle -->
                <div class="relative pl-3 border-l border-slate-200" id="pelaporProfileContainer">
                    <button type="button" onclick="togglePelaporProfileDropdown()" class="flex items-center space-x-3 focus:outline-none cursor-pointer group">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold text-slate-900 leading-tight group-hover:text-blue-600 transition-colors">{{ $user->nama ?? 'Pelapor' }}</p>
                            <p class="text-[11px] text-slate-500 font-semibold">{{ (str_contains(strtolower($user->nama ?? ''), 'guru') || str_contains(strtolower($user->email ?? ''), 'guru')) ? 'Guru Sekolah' : 'Siswa' }}</p>
                        </div>
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-blue-100 text-blue-700 font-bold text-sm sm:text-base flex items-center justify-center border border-blue-200 shadow-xs shrink-0 group-hover:ring-2 group-hover:ring-blue-400 transition-all">
                            {{ strtoupper(substr($user->nama ?? 'P', 0, 1)) }}
                        </div>
                    </button>

                    <!-- Profile Popover / Dropdown Menu -->
                    <div id="pelaporProfileDropdown" class="hidden absolute right-0 mt-2.5 w-60 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 animate-in fade-in duration-150">
                        <div class="px-4 py-2.5 border-b border-slate-100">
                            <p class="text-xs font-bold text-slate-900 leading-tight">{{ $user->nama ?? 'Pelapor' }}</p>
                            <p class="text-[11px] text-slate-500 font-medium truncate mt-0.5">{{ $user->email ?? '' }}</p>
                            <span class="inline-block mt-1.5 px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded-md">
                                {{ (str_contains(strtolower($user->nama ?? ''), 'guru') || str_contains(strtolower($user->email ?? ''), 'guru')) ? 'Guru Sekolah' : 'Siswa' }}
                            </span>
                        </div>
                        <div class="p-1.5">
                            <a href="{{ route('settings.security') }}" class="flex items-center space-x-2.5 px-3 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50 rounded-xl transition-colors">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>Pengaturan Akun</span>
                            </a>
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
        <div class="flex-1 overflow-auto p-4 md:p-8 pb-24 md:pb-8">
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
                            
                            <form action="{{ route('pelapor.lapor') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5" onsubmit="return validateReportForm(event)">
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
                                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Pilih Teknisi / Bidang Keahlian <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            </div>
                                            <select name="technician_id" id="form-technician" required onchange="onFormTechnicianChange(this)" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 pl-10 pr-4 text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer">
                                                <option value="" disabled selected>Pilih Teknisi Terlebih Dahulu...</option>
                                                @foreach($emergencyTechnicians as $tech)
                                                    @php
                                                        $cleanName = trim(preg_replace('/\s*\([^)]*Teknisi[^)]*\)/i', '', $tech->nama));
                                                        $catName = $tech->category->name ?? 'Umum';
                                                    @endphp
                                                    <option value="{{ $tech->id_user }}" data-category-id="{{ $tech->category_id }}" data-category-name="{{ $catName }}">
                                                        {{ $cleanName }} (Teknisi {{ $catName }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="category_id" id="form-category-id" value="">
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Lokasi Fasilitas & Ruangan <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            </div>
                                            <select name="id_fasilitas" id="form-facility" required onchange="onFormFacilityChange(this)" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 pl-10 pr-4 text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer">
                                                <option value="" disabled selected>Pilih Lokasi Fasilitas & Ruangan...</option>
                                                @foreach($facilities as $fac)
                                                    <option value="{{ $fac->id_fasilitas }}" data-category-id="{{ $fac->category_id }}">
                                                        {{ $fac->nama_fasilitas }} ({{ $fac->lokasi_detail ?? $fac->kategori_area }})
                                                    </option>
                                                @endforeach
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
                                    <div class="flex items-center justify-between gap-2 mb-2 flex-wrap">
                                        <label class="block text-[13px] font-bold text-gray-700">Lampiran Bukti Foto Kerusakan <span class="text-red-500 font-extrabold">* (Wajib Diisi)</span></label>
                                        <span class="text-xs text-gray-500 font-medium">Pilih salah satu cara pengambilan foto:</span>
                                    </div>

                                    <!-- Switcher Opsi 1 (Kamera Real-Time) vs Opsi 2 (Unggah File) -->
                                    <div class="grid grid-cols-2 gap-2 p-1 bg-gray-100/90 rounded-2xl mb-3 border border-gray-200/70">
                                        <button type="button" id="tab-btn-camera" onclick="switchPhotoTab('camera')" class="flex items-center justify-center gap-2 py-2 px-3 rounded-xl text-xs font-bold transition-all bg-white text-blue-700 shadow-xs cursor-pointer">
                                            <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><circle cx="12" cy="13" r="4" stroke-width="2"></circle></svg>
                                            <span class="truncate">Opsi 1: Kamera Real-Time</span>
                                        </button>
                                        <button type="button" id="tab-btn-upload" onclick="switchPhotoTab('upload')" class="flex items-center justify-center gap-2 py-2 px-3 rounded-xl text-xs font-bold transition-all text-gray-500 hover:text-gray-800 cursor-pointer">
                                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <span class="truncate">Opsi 2: Unggah File (JPG/PNG)</span>
                                        </button>
                                    </div>

                                    <!-- Shared Hidden File Input, Base64 Fallback & Canvas -->
                                    <input type="file" name="foto_bukti" id="file-upload" class="hidden" accept=".jpg,.jpeg,.png,image/jpeg,image/png" onchange="previewImage(this)">
                                    <input type="hidden" name="foto_kamera_base64" id="foto-kamera-base64" value="">
                                    <canvas id="camera-canvas" class="hidden"></canvas>

                                    <!-- PANEL OPSI 1: KAMERA REAL-TIME -->
                                    <div id="photo-panel-camera" class="block">
                                        <!-- Error Notification (jika izin kamera ditolak / tidak tersedia) -->
                                        <div id="camera-error-banner" class="hidden mb-3 p-3.5 bg-amber-50 border border-amber-200 rounded-xl flex items-start gap-2.5 text-xs text-amber-800">
                                            <svg class="w-4 h-4 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                            <div class="flex-1">
                                                <p class="font-bold" id="camera-error-text">Tidak dapat mengakses kamera perangkat.</p>
                                                <p class="text-[11px] text-amber-700 mt-0.5">Pastikan izin kamera diizinkan di peramban, atau gunakan Opsi 2 (Unggah File).</p>
                                            </div>
                                            <button type="button" onclick="switchPhotoTab('upload')" class="underline font-bold text-blue-700 text-xs shrink-0 cursor-pointer">Buka Opsi 2</button>
                                        </div>

                                        <!-- 1. Standby State (Belum Buka Kamera & Belum Ada Foto) -->
                                        <div id="camera-standby-state" class="border-2 border-dashed border-blue-200 bg-blue-50/20 rounded-2xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/40 transition-all flex flex-col items-center justify-center min-h-[190px]">
                                            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center mb-3 shadow-xs">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><circle cx="12" cy="13" r="4" stroke-width="2"></circle></svg>
                                            </div>
                                            <h4 class="text-sm font-bold text-gray-800 mb-1">Ambil Foto Langsung di Lokasi</h4>
                                            <p class="text-xs text-gray-500 max-w-sm mb-4">Gunakan kamera ponsel atau laptop untuk memotret fisik fasilitas secara langsung saat ini.</p>
                                            <button type="button" onclick="startCamera()" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold shadow-md shadow-blue-600/20 flex items-center gap-2 transition cursor-pointer active:scale-95">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                Nyalakan & Buka Kamera
                                            </button>
                                        </div>

                                        <!-- 2. Viewfinder State (Kamera Sedang Aktif Streaming) -->
                                        <div id="camera-viewfinder-state" class="hidden relative bg-black rounded-2xl overflow-hidden shadow-lg border border-gray-800">
                                            <video id="camera-video" autoplay playsinline muted class="w-full h-64 sm:h-80 object-cover"></video>
                                            
                                            <!-- Top Overlays -->
                                            <div class="absolute top-3 left-3 z-10">
                                                <span class="bg-red-600/90 text-white text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5 backdrop-blur-xs shadow-md">
                                                    <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                                                    LIVE KAMERA
                                                </span>
                                            </div>

                                            <div class="absolute top-3 right-3 z-10 flex items-center gap-2">
                                                <button type="button" onclick="switchCameraFacing()" title="Putar Kamera Depan / Belakang" class="bg-black/60 hover:bg-black/85 text-white text-xs font-semibold px-3 py-1.5 rounded-xl flex items-center gap-1.5 backdrop-blur-xs transition cursor-pointer">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"></path></svg>
                                                    <span>Putar</span>
                                                </button>
                                            </div>

                                            <!-- Bottom Shutter Action Bar -->
                                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent p-4 flex items-center justify-between z-10">
                                                <button type="button" onclick="stopCamera(true)" class="text-white/80 hover:text-white text-xs font-semibold px-3 py-2 rounded-lg hover:bg-white/10 transition cursor-pointer">
                                                    Batal
                                                </button>

                                                <!-- Big Shutter Button -->
                                                <button type="button" onclick="captureCameraPhoto()" class="w-14 h-14 rounded-full border-4 border-white bg-blue-600 hover:bg-blue-500 flex items-center justify-center text-white shadow-xl transform active:scale-90 transition cursor-pointer group" title="Ambil Foto">
                                                    <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><circle cx="12" cy="13" r="4" stroke-width="2"></circle></svg>
                                                </button>

                                                <span class="text-[11px] text-white/70 font-medium hidden sm:inline">Jepret Foto</span>
                                                <div class="sm:hidden w-8"></div>
                                            </div>
                                        </div>

                                        <!-- 3. Result State (Foto Berhasil Ditangkap) -->
                                        <div id="camera-result-state" class="hidden relative rounded-2xl overflow-hidden border border-emerald-200 shadow-sm bg-slate-900 group">
                                            <img id="camera-preview-img" src="" alt="Hasil Foto Kamera" class="w-full h-64 sm:h-80 object-cover">
                                            
                                            <!-- Top Success Badge -->
                                            <div class="absolute top-3 left-3 z-10">
                                                <span class="bg-emerald-600 text-white text-xs font-bold px-3 py-1.5 rounded-xl flex items-center gap-1.5 shadow-md">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                                    Foto Kamera Berhasil Diambil
                                                </span>
                                            </div>

                                            <!-- Bottom Actions -->
                                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/85 via-black/50 to-transparent p-4 flex items-center justify-between gap-2 z-10">
                                                <button type="button" onclick="retakeCameraPhoto()" class="px-4 py-2 bg-white/90 hover:bg-white text-gray-800 rounded-xl text-xs font-bold shadow-md flex items-center gap-1.5 transition cursor-pointer active:scale-95">
                                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"></path></svg>
                                                    Foto Ulang
                                                </button>

                                                <button type="button" onclick="clearCameraPhoto()" class="px-3 py-2 bg-red-600/90 hover:bg-red-700 text-white rounded-xl text-xs font-bold shadow-md flex items-center gap-1.5 transition cursor-pointer active:scale-95">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PANEL OPSI 2: UNGGAH FILE (JPG / PNG) -->
                                    <div id="photo-panel-upload" class="hidden">
                                        <div onclick="document.getElementById('file-upload').click()" class="border-2 border-dashed border-gray-200 rounded-2xl h-48 flex items-center justify-center text-center cursor-pointer hover:border-blue-400 hover:bg-blue-50/30 transition-all relative overflow-hidden group">
                                            <!-- Default State UI -->
                                            <div id="upload-default-state" class="space-y-1 p-6">
                                                <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <p class="text-sm font-bold text-gray-600">Klik untuk unggah foto</p>
                                                <p class="text-xs text-gray-400 font-medium">Maks. 5MB (Hanya format JPG dan PNG)</p>
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
                                </div>

                                <div class="flex items-center justify-end gap-3 pt-2">
                                    <button type="reset" class="px-5 py-2.5 text-sm font-bold text-gray-600 hover:text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors" onclick="resetReportForm()">Batal</button>
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
                                <h3 class="font-bold text-gray-900 text-base">Lacak Tiket</h3>
                            </div>
                            
                            <div class="p-5">
                                <p class="text-[13px] text-gray-500 font-medium mb-4 leading-relaxed">Masukkan ID Tiket Anda untuk melihat status penanganan terkini.</p>
                                
                                <form action="{{ route('pelapor.track') }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <input type="text" name="ticket_id" placeholder="CTH: TKT 0600" required class="flex-1 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm font-medium focus:ring-2 focus:ring-blue-500 focus:outline-none uppercase">
                                    <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition cursor-pointer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </button>
                                </form>

                                @if(session('track_error'))
                                    <div class="mt-3 p-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-xs font-semibold">
                                        {{ session('track_error') }}
                                    </div>
                                @endif

                                @if(session('tracked_ticket'))
                                    @php $tracked = session('tracked_ticket'); @endphp
                                    <div onclick="openTicketDetail({{ json_encode($tracked) }})" class="mt-5 bg-blue-50 p-4 rounded-xl border border-blue-100 cursor-pointer hover:bg-blue-100/50 transition-colors">
                                        @if($tracked->foto_bukti)
                                            <img src="{{ asset('storage/' . $tracked->foto_bukti) }}" class="w-full h-32 object-cover rounded-lg mb-3">
                                        @endif
                                        <div class="flex justify-between items-start mb-2">
                                            <span class="text-xs font-bold text-blue-800 bg-blue-200 px-2.5 py-0.5 rounded-full">TKT {{ str_pad($tracked->id_laporan, 4, '0', STR_PAD_LEFT) }}</span>
                                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-widest bg-blue-100 text-blue-700">{{ $tracked->status_laporan }}</span>
                                        </div>
                                        <h4 class="font-bold text-sm text-gray-900 line-clamp-1 truncate">{{ $tracked->facility->nama_fasilitas ?? 'Fasilitas' }}</h4>
                                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $tracked->deskripsi_kerusakan }}</p>
                                    </div>
                                @endif
                                
                                <div class="mt-6">
                                    <div class="bg-[#F8F9FA] rounded-xl p-4">
                                        <h4 class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-4">Laporan Terbaru Anda</h4>
                                        
                                        <div class="space-y-3">
                                            @forelse($myReports as $report)
                                            <div onclick="openTicketDetail({{ json_encode($report) }})" class="flex gap-3 bg-white p-3 rounded-lg border border-gray-100 shadow-sm relative overflow-hidden group hover:border-blue-200 transition-colors cursor-pointer">
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
                &copy; {{ date('Y') }} SIPERFAS - Sistem Informasi Pelaporan Fasilitas. All rights reserved.
            </footer>
        </div>
    </main>

    <!-- Modal Detail Tiket & Tracking Interaktif (Sama seperti halaman Tiket) -->
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

                        <!-- 4 or 5-Stage Stepper Grid -->
                        <div id="tracking-stepper-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 relative">
                            
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

                            <!-- Step 3: Persetujuan RAB (Khusus Urgensi Tinggi) -->
                            <div class="p-3.5 rounded-xl border relative overflow-hidden transition-all hidden" id="step-rab-card">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" id="step-rab-icon"></div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-purple-700 bg-purple-100/70 px-1.5 py-0.5 rounded" id="step-rab-badge">Tahap 3</span>
                                </div>
                                <h5 class="text-xs font-bold text-slate-800 leading-tight mb-1">Persetujuan RAB</h5>
                                <p class="text-[11px] text-slate-600 font-medium leading-snug mb-1" id="step-rab-desc">Menunggu persetujuan</p>
                                <span class="text-[10px] text-slate-400 font-semibold block" id="step-rab-time">-</span>
                            </div>

                            <!-- Step Pengerjaan Fisik (Tahap 3 biasa / Tahap 4 saat Urgensi Tinggi) -->
                            <div class="p-3.5 rounded-xl border relative overflow-hidden transition-all" id="step-3-card">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" id="step-3-icon"></div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400" id="step-3-badge">Tahap 3</span>
                                </div>
                                <h5 class="text-xs font-bold text-slate-800 leading-tight mb-1">Pengerjaan Fisik</h5>
                                <p class="text-[11px] text-slate-600 font-medium leading-snug mb-1" id="step-3-desc">Menunggu giliran</p>
                                <span class="text-[10px] text-slate-400 font-semibold block" id="step-3-time">-</span>
                            </div>

                            <!-- Step Perbaikan Selesai (Tahap 4 biasa / Tahap 5 saat Urgensi Tinggi) -->
                            <div class="p-3.5 rounded-xl border relative overflow-hidden transition-all" id="step-4-card">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold" id="step-4-icon"></div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400" id="step-4-badge">Tahap 4</span>
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
                    <span class="text-xs text-slate-400 font-medium hidden sm:inline">SIPERFAS - Sistem Informasi Pelaporan Fasilitas</span>
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

    <!-- Modal script -->
    <script>
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

        let currentActiveTicket = null;

        function openTicketDetail(elementOrData) {
            try {
                let ticket;
                if (elementOrData instanceof HTMLElement) {
                    ticket = JSON.parse(elementOrData.getAttribute('data-report'));
                } else if (typeof elementOrData === 'string') {
                    ticket = JSON.parse(elementOrData);
                } else {
                    ticket = elementOrData;
                }

                if (!ticket) return;

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
                const urgency = (ticket.tingkat_urgensi || '').toLowerCase();
                const proposal = ticket.verification?.budget_proposal || ticket.verification?.budgetProposal;
                const isHighUrgency = (urgency === 'tinggi') || !!proposal;

                const grid = document.getElementById('tracking-stepper-grid');
                const stepRabCard = document.getElementById('step-rab-card');
                const step3Badge = document.getElementById('step-3-badge');
                const step4Badge = document.getElementById('step-4-badge');

                // Sesuaikan kolom grid & nomor tahap berdasarkan urgensi
                if (grid) {
                    if (isHighUrgency) {
                        grid.classList.remove('lg:grid-cols-4');
                        grid.classList.add('lg:grid-cols-5');
                    } else {
                        grid.classList.remove('lg:grid-cols-5');
                        grid.classList.add('lg:grid-cols-4');
                    }
                }

                if (step3Badge) {
                    step3Badge.textContent = isHighUrgency ? 'Tahap 4' : 'Tahap 3';
                }
                if (step4Badge) {
                    step4Badge.textContent = isHighUrgency ? 'Tahap 5' : 'Tahap 4';
                }

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

                // 3. Step RAB: Persetujuan RAB (Tahap 3 Khusus Urgensi Tinggi)
                if (isHighUrgency && stepRabCard) {
                    stepRabCard.classList.remove('hidden');
                    const stepRabIcon = document.getElementById('step-rab-icon');
                    const stepRabTime = document.getElementById('step-rab-time');
                    const stepRabDesc = document.getElementById('step-rab-desc');

                    const isRabApproved = (proposal && proposal.status_persetujuan === 'disetujui') || ['proses', 'proses_perbaikan', 'selesai'].includes(status);
                    const isRabRejected = (proposal && proposal.status_persetujuan === 'ditolak');

                    if (isRabApproved) {
                        stepRabCard.className = 'p-3.5 rounded-xl border border-emerald-200 shadow-xs relative overflow-hidden bg-emerald-50/20';
                        if (stepRabIcon) {
                            stepRabIcon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-emerald-100 text-emerald-700';
                            stepRabIcon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                        }
                        if (stepRabDesc) {
                            stepRabDesc.textContent = proposal?.total_anggaran 
                                ? `Disetujui (Rp ${Number(proposal.total_anggaran).toLocaleString('id-ID')})`
                                : 'RAB Disetujui Admin Sarpras';
                        }
                        if (stepRabTime) stepRabTime.textContent = formatDateTimeID(proposal?.tanggal_persetujuan || proposal?.updated_at) || 'Telah disetujui';
                    } else if (isRabRejected) {
                        stepRabCard.className = 'p-3.5 rounded-xl border border-rose-200 shadow-xs relative overflow-hidden bg-rose-50/20';
                        if (stepRabIcon) {
                            stepRabIcon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-rose-100 text-rose-700';
                            stepRabIcon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
                        }
                        if (stepRabDesc) stepRabDesc.textContent = 'RAB ditolak / butuh revisi';
                        if (stepRabTime) stepRabTime.textContent = formatDateTimeID(proposal?.updated_at) || 'Ditolak Sarpras';
                    } else if (status === 'menunggu_rab' || (proposal && proposal.status_persetujuan === 'menunggu_persetujuan')) {
                        stepRabCard.className = 'p-3.5 rounded-xl border border-purple-200 shadow-xs relative overflow-hidden bg-purple-50/30';
                        if (stepRabIcon) {
                            stepRabIcon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-purple-600 text-white animate-pulse';
                            stepRabIcon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
                        }
                        if (stepRabDesc) {
                            stepRabDesc.textContent = proposal?.total_anggaran 
                                ? `Menunggu ACC (Rp ${Number(proposal.total_anggaran).toLocaleString('id-ID')})`
                                : 'Menunggu persetujuan Admin';
                        }
                        if (stepRabTime) stepRabTime.textContent = formatDateTimeID(proposal?.tanggal_pengajuan || proposal?.created_at) || 'Ditinjau Sarpras';
                    } else {
                        // Belum diajukan
                        stepRabCard.className = 'p-3.5 rounded-xl border border-slate-200 shadow-xs relative overflow-hidden bg-white';
                        if (stepRabIcon) {
                            stepRabIcon.className = 'w-6 h-6 rounded-lg flex items-center justify-center shrink-0 text-xs font-bold bg-slate-100 text-slate-400';
                            stepRabIcon.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>`;
                        }
                        if (stepRabDesc) stepRabDesc.textContent = 'Menunggu pengajuan RAB';
                        if (stepRabTime) stepRabTime.textContent = 'Dalam antrean';
                    }
                } else if (stepRabCard) {
                    stepRabCard.classList.add('hidden');
                }

                // 4. Step Fisik: Pengerjaan Fisik (Tahap 3 biasa / Tahap 4 saat Urgensi Tinggi)
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
                } else if (status === 'menunggu_rab' && !isHighUrgency) {
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
                    if (step3Desc) step3Desc.textContent = isHighUrgency ? 'Menunggu persetujuan RAB' : 'Menunggu giliran';
                    if (step3Time) step3Time.textContent = 'Belum dimulai';
                }

                // 5. Step Selesai (Tahap 4 biasa / Tahap 5 saat Urgensi Tinggi)
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
            const modal = document.getElementById('ticketModal');
            if (modal) modal.classList.add('hidden');
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
            const modal = document.getElementById('imageZoomModal');
            if (modal) modal.classList.add('hidden');
        }

        // Alias for backwards compatibility
        const openReportModal = openTicketDetail;
        const closeReportModal = closeTicketDetail;

        // Close on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const zoomModal = document.getElementById('imageZoomModal');
                if (zoomModal && !zoomModal.classList.contains('hidden')) {
                    closeImageZoom();
                } else {
                    closeTicketDetail();
                }
            }
        });

        const allFacilities = @json($facilities);

        function populateAllFacilities(selectEl, selectedId = null) {
            if (!selectEl) return;
            selectEl.innerHTML = '';
            selectEl.disabled = false;

            const defaultOpt = document.createElement('option');
            defaultOpt.value = '';
            defaultOpt.disabled = true;
            defaultOpt.selected = !selectedId;
            defaultOpt.textContent = 'Pilih Lokasi Fasilitas & Ruangan...';
            selectEl.appendChild(defaultOpt);

            allFacilities.forEach(fac => {
                const opt = document.createElement('option');
                opt.value = fac.id_fasilitas;
                opt.setAttribute('data-category-id', fac.category_id || '');
                opt.textContent = `${fac.nama_fasilitas} (${fac.lokasi_detail || fac.kategori_area})`;
                if (selectedId && String(fac.id_fasilitas) === String(selectedId)) {
                    opt.selected = true;
                }
                selectEl.appendChild(opt);
            });
        }

        function filterFacilitiesByCategoryId(catId, selectEl, defaultText, preserveFacId = null) {
            if (!selectEl) return;
            selectEl.innerHTML = '';
            
            if (!catId) {
                populateAllFacilities(selectEl, preserveFacId);
                return;
            }

            // Filter facilities matching category_id
            const matched = allFacilities.filter(f => {
                if (f.category_id) return String(f.category_id) === String(catId);
                const text = ((f.nama_fasilitas || '') + ' ' + (f.kategori_area || '') + ' ' + (f.lokasi_detail || '')).toLowerCase();
                if (String(catId) === '1' && /(listrik|lampu|stop\s*kontak|saklar|ac|kabel|panel|sound|elektronik)/i.test(text)) return true;
                if (String(catId) === '2' && /(air|wastafel|pipa|sanitasi|toilet|keran|kran|wc|tandon)/i.test(text)) return true;
                if (String(catId) === '3' && /(bangunan|struktur|furnitur|pintu|meja|kursi|plafon|atap|lantai|dinding|kaca)/i.test(text)) return true;
                if (String(catId) === '4' && /(komputer|pc|proyektor|laptop|server|layar|infocus|laboratorium|printer)/i.test(text)) return true;
                if (String(catId) === '6' && /(jaringan|wifi|internet|router|switch)/i.test(text)) return true;
                if (String(catId) === '7' && /(kendaraan|motor|mobil|bus|sepeda|parkir)/i.test(text)) return true;
                return false;
            });
            selectEl.disabled = false;

            let preservedFound = false;
            const defaultOpt = document.createElement('option');
            defaultOpt.value = '';
            defaultOpt.disabled = true;
            defaultOpt.textContent = defaultText || 'Pilih Fasilitas / Ruangan...';
            selectEl.appendChild(defaultOpt);

            if (matched.length === 0) {
                const emptyOpt = document.createElement('option');
                emptyOpt.value = '';
                emptyOpt.disabled = true;
                emptyOpt.selected = true;
                emptyOpt.textContent = 'Semua fasilitas untuk bidang ini sedang dalam penanganan perbaikan';
                selectEl.appendChild(emptyOpt);
            } else {
                matched.forEach(fac => {
                    const opt = document.createElement('option');
                    opt.value = fac.id_fasilitas;
                    opt.setAttribute('data-category-id', fac.category_id || '');
                    opt.textContent = `${fac.nama_fasilitas} (${fac.lokasi_detail || fac.kategori_area})`;
                    if (preserveFacId && String(fac.id_fasilitas) === String(preserveFacId)) {
                        opt.selected = true;
                        preservedFound = true;
                    }
                    selectEl.appendChild(opt);
                });
                if (!preservedFound) {
                    defaultOpt.selected = true;
                }
            }
        }

        function onFormTechnicianChange(select) {
            const opt = select.options[select.selectedIndex];
            const catId = opt.getAttribute('data-category-id');
            const catName = opt.getAttribute('data-category-name');
            
            const catIdInput = document.getElementById('form-category-id');
            if (catIdInput) catIdInput.value = catId || '';

            const facSelect = document.getElementById('form-facility');
            const currentFacId = facSelect ? facSelect.value : null;
            filterFacilitiesByCategoryId(catId, facSelect, `Pilih Fasilitas (${catName})...`, currentFacId);
        }

        function onFormFacilityChange(select) {
            const opt = select.options[select.selectedIndex];
            if (!opt) return;
            const catId = opt.getAttribute('data-category-id');
            if (!catId) return;

            const catIdInput = document.getElementById('form-category-id');
            if (catIdInput) catIdInput.value = catId;

            // Otomatis pilih teknisi yang sesuai bidang keahlian fasilitas
            const techSelect = document.getElementById('form-technician');
            if (techSelect) {
                for (let i = 0; i < techSelect.options.length; i++) {
                    const techOpt = techSelect.options[i];
                    if (String(techOpt.getAttribute('data-category-id')) === String(catId)) {
                        techSelect.selectedIndex = i;
                        break;
                    }
                }
            }
        }

        // --- REAL-TIME CAMERA & ATTACHMENT LOGIC ---
        let activePhotoTab = 'camera';
        let cameraStream = null;
        let cameraFacing = 'environment';

        function switchPhotoTab(tab) {
            activePhotoTab = tab;
            const btnCam = document.getElementById('tab-btn-camera');
            const btnUp = document.getElementById('tab-btn-upload');
            const panelCam = document.getElementById('photo-panel-camera');
            const panelUp = document.getElementById('photo-panel-upload');

            if (tab === 'camera') {
                if (btnCam) btnCam.className = 'flex items-center justify-center gap-2 py-2 px-3 rounded-xl text-xs font-bold transition-all bg-white text-blue-700 shadow-xs cursor-pointer';
                if (btnUp) btnUp.className = 'flex items-center justify-center gap-2 py-2 px-3 rounded-xl text-xs font-bold transition-all text-gray-500 hover:text-gray-800 cursor-pointer';
                if (panelCam) panelCam.classList.remove('hidden');
                if (panelUp) panelUp.classList.add('hidden');
            } else {
                if (btnUp) btnUp.className = 'flex items-center justify-center gap-2 py-2 px-3 rounded-xl text-xs font-bold transition-all bg-white text-blue-700 shadow-xs cursor-pointer';
                if (btnCam) btnCam.className = 'flex items-center justify-center gap-2 py-2 px-3 rounded-xl text-xs font-bold transition-all text-gray-500 hover:text-gray-800 cursor-pointer';
                if (panelUp) panelUp.classList.remove('hidden');
                if (panelCam) panelCam.classList.add('hidden');
                // Hentikan streaming kamera jika sedang berjalan saat beralih tab
                stopCamera(false);
            }
        }

        async function startCamera() {
            const standby = document.getElementById('camera-standby-state');
            const viewfinder = document.getElementById('camera-viewfinder-state');
            const result = document.getElementById('camera-result-state');
            const errorBanner = document.getElementById('camera-error-banner');
            const video = document.getElementById('camera-video');

            if (errorBanner) errorBanner.classList.add('hidden');

            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                showCameraError('Peramban Anda tidak mendukung akses kamera secara langsung. Silakan gunakan Opsi 2 (Unggah Berkas).');
                return;
            }

            try {
                // Hentikan stream yang ada sebelumnya bila ada
                stopCamera(false);

                let constraints = {
                    video: {
                        facingMode: { ideal: cameraFacing },
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    },
                    audio: false
                };

                try {
                    cameraStream = await navigator.mediaDevices.getUserMedia(constraints);
                } catch (e) {
                    // Fallback jika facingMode ditolak oleh peramban tertentu
                    cameraStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
                }

                if (video) {
                    video.srcObject = cameraStream;
                    await video.play();
                }

                if (standby) standby.classList.add('hidden');
                if (result) result.classList.add('hidden');
                if (viewfinder) viewfinder.classList.remove('hidden');
            } catch (err) {
                console.error('Camera access error:', err);
                let msg = 'Kamera tidak dapat diakses atau izin kamera belum diizinkan.';
                if (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError') {
                    msg = 'Izin kamera ditolak. Berikan izin kamera pada peramban Anda, atau gunakan Opsi 2 (Unggah File).';
                } else if (err.name === 'NotFoundError' || err.name === 'DevicesNotFoundError') {
                    msg = 'Kamera tidak ditemukan pada perangkat Anda.';
                }
                showCameraError(msg);
            }
        }

        function showCameraError(msg) {
            const errorBanner = document.getElementById('camera-error-banner');
            const errorText = document.getElementById('camera-error-text');
            if (errorText) errorText.textContent = msg;
            if (errorBanner) errorBanner.classList.remove('hidden');
        }

        function stopCamera(showStandby = true) {
            if (cameraStream) {
                cameraStream.getTracks().forEach(track => track.stop());
                cameraStream = null;
            }
            const video = document.getElementById('camera-video');
            if (video) {
                video.srcObject = null;
            }

            const viewfinder = document.getElementById('camera-viewfinder-state');
            if (viewfinder) viewfinder.classList.add('hidden');

            if (showStandby) {
                const standby = document.getElementById('camera-standby-state');
                const result = document.getElementById('camera-result-state');
                const previewImg = document.getElementById('camera-preview-img');
                if (previewImg && previewImg.src && previewImg.src.startsWith('data:image')) {
                    if (result) result.classList.remove('hidden');
                    if (standby) standby.classList.add('hidden');
                } else {
                    if (standby) standby.classList.remove('hidden');
                    if (result) result.classList.add('hidden');
                }
            }
        }

        function switchCameraFacing() {
            cameraFacing = (cameraFacing === 'environment') ? 'user' : 'environment';
            startCamera();
        }

        function captureCameraPhoto() {
            const video = document.getElementById('camera-video');
            const canvas = document.getElementById('camera-canvas');
            if (!video || !canvas) return;

            const width = video.videoWidth || 640;
            const height = video.videoHeight || 480;

            canvas.width = width;
            canvas.height = height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, width, height);

            const dataUrl = canvas.toDataURL('image/jpeg', 0.9);

            // Tampilkan foto di UI preview
            const previewImg = document.getElementById('camera-preview-img');
            if (previewImg) previewImg.src = dataUrl;

            // Simpan ke hidden input foto_kamera_base64
            const base64Input = document.getElementById('foto-kamera-base64');
            if (base64Input) base64Input.value = dataUrl;

            // Masukkan ke file-upload input melalui DataTransfer agar validasi Laravel multipart berjalan lancar
            canvas.toBlob(function(blob) {
                if (blob) {
                    try {
                        const file = new File([blob], "bukti_kamera_" + Date.now() + ".jpg", { type: "image/jpeg" });
                        const dt = new DataTransfer();
                        dt.items.add(file);
                        const fileInput = document.getElementById('file-upload');
                        if (fileInput) fileInput.files = dt.files;
                    } catch (e) {
                        console.warn('DataTransfer not available, relying on base64 fallback:', e);
                    }
                }
            }, 'image/jpeg', 0.9);

            // Hentikan stream kamera dan tampilkan state result
            stopCamera(false);
            const viewfinder = document.getElementById('camera-viewfinder-state');
            const result = document.getElementById('camera-result-state');
            const standby = document.getElementById('camera-standby-state');
            if (viewfinder) viewfinder.classList.add('hidden');
            if (standby) standby.classList.add('hidden');
            if (result) result.classList.remove('hidden');
        }

        function retakeCameraPhoto() {
            clearCameraPhoto();
            startCamera();
        }

        function clearCameraPhoto() {
            const previewImg = document.getElementById('camera-preview-img');
            if (previewImg) previewImg.src = '';

            const base64Input = document.getElementById('foto-kamera-base64');
            if (base64Input) base64Input.value = '';

            const fileInput = document.getElementById('file-upload');
            if (fileInput) fileInput.value = '';

            stopCamera(false);

            const result = document.getElementById('camera-result-state');
            const standby = document.getElementById('camera-standby-state');
            const viewfinder = document.getElementById('camera-viewfinder-state');
            if (result) result.classList.add('hidden');
            if (viewfinder) viewfinder.classList.add('hidden');
            if (standby) standby.classList.remove('hidden');
        }

        function resetReportForm() {
            clearCameraPhoto();
            resetImagePreview();
            switchPhotoTab('camera');
            const facSelect = document.getElementById('form-facility');
            if (facSelect) {
                populateAllFacilities(facSelect);
            }
            const catIdInput = document.getElementById('form-category-id');
            if (catIdInput) catIdInput.value = '';
        }

        function validateReportForm(e) {
            const fileInput = document.getElementById('file-upload');
            const base64Input = document.getElementById('foto-kamera-base64');
            const hasFile = fileInput && fileInput.files && fileInput.files.length > 0;
            const hasBase64 = base64Input && base64Input.value && base64Input.value.trim() !== '';

            if (!hasFile && !hasBase64) {
                if (e) e.preventDefault();
                alert('Foto bukti kerusakan wajib dilampirkan!\nSilakan gunakan Opsi 1 (Kamera Real-Time) untuk memotret atau Opsi 2 (Unggah File) untuk memilih foto bukti.');
                return false;
            }
            return true;
        }

        function previewImage(input) {
            const file = input.files && input.files[0];
            const defaultState = document.getElementById('upload-default-state');
            const previewState = document.getElementById('upload-preview-state');
            const imagePreview = document.getElementById('image-preview');
            const pdfIcon = document.getElementById('pdf-preview-icon');
            const fileName = document.getElementById('file-name');
            const hoverFileName = document.getElementById('hover-file-name');

            if (file) {
                const fName = file.name.toLowerCase();
                const isValidExt = fName.endsWith('.jpg') || fName.endsWith('.jpeg') || fName.endsWith('.png');
                const isValidMime = file.type === 'image/jpeg' || file.type === 'image/png' || file.type === 'image/jpg';

                if (!isValidExt || !isValidMime) {
                    alert('Format file tidak sesuai! Bukti lampiran hanya diperbolehkan format JPG dan PNG.');
                    resetImagePreview();
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal ukuran file adalah 5MB.');
                    resetImagePreview();
                    return;
                }

                // Bersihkan data foto kamera agar berkas file yang diunggah diprioritaskan
                const base64Input = document.getElementById('foto-kamera-base64');
                if (base64Input) base64Input.value = '';
                const cameraPreviewImg = document.getElementById('camera-preview-img');
                if (cameraPreviewImg) cameraPreviewImg.src = '';

                if (fileName) fileName.innerText = file.name;
                if (hoverFileName) hoverFileName.innerText = file.name;
                
                defaultState.classList.add('hidden');
                previewState.classList.remove('hidden');

                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    if (pdfIcon) pdfIcon.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                resetImagePreview();
            }
        }

        function resetImagePreview() {
            const input = document.getElementById('file-upload');
            if (input) input.value = "";
            
            const defState = document.getElementById('upload-default-state');
            const prevState = document.getElementById('upload-preview-state');
            if (defState) defState.classList.remove('hidden');
            if (prevState) prevState.classList.add('hidden');
            
            const imagePreview = document.getElementById('image-preview');
            if (imagePreview) {
                imagePreview.src = "#";
                imagePreview.classList.add('hidden');
            }
            
            const pdfIcon = document.getElementById('pdf-preview-icon');
            if (pdfIcon) pdfIcon.classList.add('hidden');
            const nameEl = document.getElementById('file-name');
            if (nameEl) nameEl.innerText = "";
            const hoverNameEl = document.getElementById('hover-file-name');
            if (hoverNameEl) hoverNameEl.innerText = "";
        }

        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.toggle('hidden');
            }
        }

        function onEmergencyTechnicianChange(select) {
            const opt = select.options[select.selectedIndex];
            const cat = opt.getAttribute('data-category') || '';
            const catId = opt.getAttribute('data-category-id') || '';

            const catIdInput = document.getElementById('emergency-category-id');
            if (catIdInput) catIdInput.value = catId;

            const descEl = document.getElementById('emergency-desc');
            if (descEl && (!descEl.value || descEl.value.startsWith('Insiden Darurat:'))) {
                descEl.value = 'Insiden Darurat: ' + cat;
            }

            const facSelect = document.getElementById('emergency-facility');
            filterFacilitiesByCategoryId(catId, facSelect, `Pilih Lokasi Kejadian (${cat})...`);
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
                        <p class="text-xs text-slate-500 font-medium">Petugas teknisi terkait akan langsung menerima peringatan siaga.</p>
                    </div>
                </div>
                <button type="button" onclick="toggleModal('modal-darurat')" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100 transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form action="{{ route('pelapor.darurat') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- 1. Pilih Teknisi / Kategori Insiden Terlebih Dahulu -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">1. Pilih Kategori Insiden / Petugas Penanganan</label>
                    <select name="technician_id" id="emergency-technician" required onchange="onEmergencyTechnicianChange(this)" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-3.5 text-sm font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 cursor-pointer">
                        <option value="" disabled selected>Pilih Kategori Insiden / Petugas...</option>
                        @foreach($emergencyTechnicians as $tech)
                            @php
                                $cleanName = trim(preg_replace('/\s*\([^)]*Teknisi[^)]*\)/i', '', $tech->nama));
                                $catName = $tech->category->name ?? 'Umum';
                            @endphp
                            <option value="{{ $tech->id_user }}" data-category-id="{{ $tech->category_id }}" data-category="{{ $catName }}">
                                {{ $catName }} — {{ $cleanName }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="category_id" id="emergency-category-id" value="">
                </div>

                <!-- 2. Pilih Fasilitas Sesuai Kategori Teknisi -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">2. Pilih Lokasi / Fasilitas Darurat</label>
                    <select name="id_fasilitas" id="emergency-facility" required disabled class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-3.5 text-sm font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 disabled:bg-slate-100 disabled:text-slate-400 disabled:cursor-not-allowed">
                        <option value="" disabled selected>-- Pilih Petugas / Teknisi terlebih dahulu --</option>
                    </select>
                </div>

                <!-- 3. Deskripsi Singkat -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">3. Deskripsi Singkat Kejadian</label>
                    <textarea name="deskripsi_kerusakan" id="emergency-desc" rows="2" required placeholder="Jelaskan secara singkat kondisi darurat yang terjadi..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 resize-none"></textarea>
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

    <!-- Mobile Bottom Navigation Bar (Khusus Layar Ponsel) -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200/90 shadow-[0_-4px_20px_rgba(0,0,0,0.06)] px-4 py-2 flex items-center justify-around safe-area-bottom">
        <!-- 1. Lapor Kerusakan (Aktif) -->
        <a href="{{ route('pelapor.dashboard') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-blue-600 font-bold">
            <svg class="w-5 h-5 text-blue-600 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="text-[10px] mt-1 tracking-tight">Lapor Kerusakan</span>
            <span class="w-1.5 h-1.5 bg-blue-600 rounded-full mt-0.5"></span>
        </a>

        <!-- 2. Tiket Saya -->
        <a href="{{ route('pelapor.tickets') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-slate-400 hover:text-slate-600 font-medium">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
            </svg>
            <span class="text-[10px] mt-1 tracking-tight">Tiket Saya</span>
        </a>

        <!-- 3. Pengaturan -->
        <a href="{{ route('settings.security') }}" class="flex flex-col items-center justify-center flex-1 py-1 transition-all text-slate-400 hover:text-slate-600 font-medium">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="text-[10px] mt-1 tracking-tight">Pengaturan</span>
        </a>
    </nav>

    <script>
        function togglePelaporProfileDropdown() {
            const menu = document.getElementById('pelaporProfileDropdown');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        document.addEventListener('click', function(e) {
            const container = document.getElementById('pelaporProfileContainer');
            const menu = document.getElementById('pelaporProfileDropdown');
            if (container && menu && !container.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
