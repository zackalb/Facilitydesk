<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kata Sandi - FacilityDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 antialiased">

    <div class="bg-white rounded-[24px] shadow-xl w-full max-w-md p-8 sm:p-10 border border-gray-100 relative overflow-hidden">
        
        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-600 to-indigo-600"></div>

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 mb-4 shadow-sm border border-amber-100">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h1 class="text-xl font-bold text-gray-900 mb-1">Konfirmasi Kata Sandi</h1>
            <p class="text-xs text-gray-500 max-w-xs mx-auto leading-relaxed">
                Ini adalah area aman aplikasi. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-5 p-3.5 bg-red-50 border border-red-200 text-red-700 text-xs rounded-xl flex items-start gap-2.5">
                <svg class="w-4 h-4 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    @foreach ($errors->all() as $error)
                        <p class="font-medium">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <form action="{{ route('password.confirm.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="password" class="block text-xs font-semibold text-gray-700 mb-1.5">
                    Kata Sandi Anda
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    autofocus
                    placeholder="Masukkan kata sandi" 
                    class="w-full py-3 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 bg-gray-50/50 text-sm font-medium text-gray-800 transition-all placeholder-gray-400"
                >
            </div>

            <div class="flex items-center gap-3 pt-2">
                <a href="{{ url()->previous() }}" class="w-1/2 py-2.5 px-4 text-center border border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 font-medium text-xs transition-colors">
                    Batal
                </a>
                <button type="submit" class="w-1/2 bg-[#0B3A82] text-white py-2.5 px-4 rounded-xl hover:bg-blue-800 transition-all font-semibold shadow-md shadow-blue-900/10 text-xs">
                    Konfirmasi
                </button>
            </div>
        </form>

    </div>

</body>
</html>
