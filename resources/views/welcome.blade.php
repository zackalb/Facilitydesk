<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Akses Masuk - FacilityDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center antialiased">
    
    <div class="max-w-md w-full mx-4 bg-white rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 p-8">
        
        <!-- Icon & Header -->
        <div class="flex flex-col items-center text-center mb-8">
            <img src="{{ asset('logo.png') }}" alt="School Facility Helpdesk Logo" class="h-20 mb-5 object-contain">
            <h1 class="text-[22px] font-bold text-[#0B3A82] mb-2">Pilih Akses Masuk</h1>
            <p class="text-[13px] text-gray-500 max-w-[280px] leading-relaxed">
                Silakan pilih peran untuk mensimulasikan alur pengguna yang berbeda.
            </p>
        </div>

        <!-- Role Buttons -->
        <div class="space-y-4">
            
            <!-- Pelapor -->
            <a href="{{ route('login', ['role' => 'pelapor']) }}" class="group flex items-center px-4 py-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50/30 transition-all duration-200 cursor-pointer">
                <div class="flex-shrink-0 mr-4 h-10 w-10 bg-indigo-50 text-indigo-500 rounded-full flex items-center justify-center group-hover:bg-white group-hover:shadow-sm transition-all border border-indigo-100/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-[14px] font-bold text-gray-900 group-hover:text-blue-900 transition-colors">Masuk sebagai Pelapor</h3>
                    <p class="text-[12px] text-gray-500 mt-0.5">Siswa atau Staf Pengajar.</p>
                </div>
                <div class="text-gray-300 group-hover:text-blue-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <!-- Admin Sarpras -->
            <a href="{{ route('login', ['role' => 'admin']) }}" class="group flex items-center px-4 py-4 border border-gray-200 rounded-xl hover:border-blue-400 hover:bg-blue-50/30 transition-all duration-200 cursor-pointer">
                <div class="flex-shrink-0 mr-4 h-10 w-10 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center group-hover:bg-white group-hover:shadow-sm transition-all border border-blue-100/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-[14px] font-bold text-gray-900 group-hover:text-blue-900 transition-colors">Masuk sebagai Admin Sarpras</h3>
                    <p class="text-[12px] text-gray-500 mt-0.5">Tim Manajemen Fasilitas.</p>
                </div>
                <div class="text-gray-300 group-hover:text-blue-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <!-- Kepala Sekolah -->
            <a href="{{ route('login', ['role' => 'kepsek']) }}" class="group flex items-center px-4 py-4 border border-gray-200 rounded-xl hover:border-orange-300 hover:bg-orange-50/30 transition-all duration-200 cursor-pointer">
                <div class="flex-shrink-0 mr-4 h-10 w-10 bg-[#FFF2ED] text-[#E0643D] rounded-full flex items-center justify-center group-hover:bg-white group-hover:shadow-sm transition-all border border-orange-100/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-[14px] font-bold text-gray-900 group-hover:text-orange-800 transition-colors">Masuk sebagai Kepala Sekolah</h3>
                    <p class="text-[12px] text-gray-500 mt-0.5">Monitoring & Persetujuan RAB.</p>
                </div>
                <div class="text-gray-300 group-hover:text-orange-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-center">
            <p class="text-[11px] text-gray-400">
                Halaman ini hanya untuk keperluan navigasi prototipe.
            </p>
        </div>

    </div>

</body>
</html>
