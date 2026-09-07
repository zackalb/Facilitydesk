<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Dua Langkah (2FA) - FacilityDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-mono-code { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 antialiased">
    
    <a href="{{ route('login') }}" class="fixed top-6 left-6 text-gray-500 hover:text-gray-700 flex items-center text-sm font-medium transition-colors">
        <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Login
    </a>

    <div class="bg-white rounded-[24px] shadow-xl w-full max-w-md p-8 sm:p-10 border border-gray-100 relative overflow-hidden">
        
        <!-- Top decorative banner -->
        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800"></div>

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 mb-4 shadow-sm border border-blue-100/80">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <h1 class="text-xl font-bold text-[#0B3A82] mb-1">Verifikasi Dua Langkah</h1>
            <p id="challenge-desc" class="text-xs text-gray-500 max-w-xs mx-auto leading-relaxed">
                Buka aplikasi autentikator (Google Authenticator / Authy) Anda dan masukkan 6 digit kode keamanan.
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

        <form action="{{ route('two-factor.login.store') }}" method="POST" class="space-y-4" id="two-factor-form">
            @csrf

            <!-- TOTP Code Input (Default) -->
            <div id="totp-container">
                <label for="code" class="block text-xs font-semibold text-gray-700 mb-1.5 text-center">
                    Kode Autentikasi 6-Digit
                </label>
                <div class="relative">
                    <input 
                        type="text" 
                        name="code" 
                        id="code" 
                        inputmode="numeric" 
                        autocomplete="one-time-code" 
                        maxlength="7" 
                        autofocus
                        placeholder="000 000" 
                        class="w-full text-center font-mono-code text-2xl tracking-[0.3em] font-bold py-3.5 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 bg-gray-50/50 text-gray-800 transition-all placeholder-gray-300"
                    >
                </div>
            </div>

            <!-- Recovery Code Input (Hidden by default) -->
            <div id="recovery-container" class="hidden">
                <label for="recovery_code" class="block text-xs font-semibold text-gray-700 mb-1.5">
                    Kode Pemulihan Darurat (Recovery Code)
                </label>
                <div class="relative">
                    <input 
                        type="text" 
                        name="recovery_code" 
                        id="recovery_code" 
                        autocomplete="one-time-code" 
                        placeholder="xxxxx-xxxxx" 
                        class="w-full font-mono-code text-center text-base font-semibold py-3 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 bg-gray-50/50 text-gray-800 transition-all placeholder-gray-300 uppercase"
                    >
                </div>
            </div>

            <button type="submit" class="w-full bg-[#0B3A82] text-white py-3 rounded-xl hover:bg-blue-800 transition-all font-semibold shadow-md shadow-blue-900/10 text-sm flex items-center justify-center gap-2">
                <span>Verifikasi & Masuk</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </form>

        <div class="mt-6 pt-5 border-t border-gray-100 text-center">
            <button 
                type="button" 
                id="toggle-mode-btn"
                onclick="toggleAuthMode()"
                class="text-xs font-semibold text-[#0B3A82] hover:text-blue-800 transition-colors inline-flex items-center gap-1.5"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span id="toggle-btn-text">Gunakan Kode Pemulihan Darurat</span>
            </button>
        </div>

    </div>

    <script>
        let isRecoveryMode = false;
        
        function toggleAuthMode() {
            isRecoveryMode = !isRecoveryMode;
            const totpContainer = document.getElementById('totp-container');
            const recoveryContainer = document.getElementById('recovery-container');
            const codeInput = document.getElementById('code');
            const recoveryInput = document.getElementById('recovery_code');
            const toggleText = document.getElementById('toggle-btn-text');
            const desc = document.getElementById('challenge-desc');

            if (isRecoveryMode) {
                totpContainer.classList.add('hidden');
                recoveryContainer.classList.remove('hidden');
                codeInput.value = '';
                recoveryInput.focus();
                toggleText.innerText = 'Gunakan Kode Aplikasi Autentikator';
                desc.innerText = 'Masukkan salah satu dari 8 digit kode pemulihan cadangan Anda.';
            } else {
                recoveryContainer.classList.add('hidden');
                totpContainer.classList.remove('hidden');
                recoveryInput.value = '';
                codeInput.focus();
                toggleText.innerText = 'Gunakan Kode Pemulihan Darurat';
                desc.innerText = 'Buka aplikasi autentikator (Google Authenticator / Authy) Anda dan masukkan 6 digit kode keamanan.';
            }
        }

        // Auto format 6 digit code input
        document.getElementById('code')?.addEventListener('input', function(e) {
            let val = e.target.value.replace(/\D/g, '');
            if (val.length > 6) val = val.substring(0, 6);
            e.target.value = val;
            if (val.length === 6) {
                document.getElementById('two-factor-form').submit();
            }
        });
    </script>
</body>
</html>
