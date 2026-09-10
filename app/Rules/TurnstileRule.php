<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TurnstileRule implements ValidationRule
{
    /**
     * Jalankan validasi Cloudflare Turnstile token.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secretKey = config('services.turnstile.secret_key');

        // Jika secret key belum diset di konfigurasi atau environment, lewati validasi
        if (empty($secretKey)) {
            return;
        }

        // Token respons wajib ada
        if (empty($value)) {
            $fail('Silakan selesaikan verifikasi Cloudflare Turnstile terlebih dahulu.');
            return;
        }

        try {
            $client = Http::asForm()->timeout(10);

            // Pada Windows / environment local, bypass SSL verify agar tidak terkena error cURL 60 (unable to get local issuer certificate)
            if (app()->environment('local', 'testing') || config('app.debug')) {
                $client = $client->withoutVerifying();
            }

            $response = $client->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret'   => $secretKey,
                'response' => $value,
                'remoteip' => request()->ip(),
            ]);

            $body = $response->json();

            if (!$response->successful() || !($body['success'] ?? false)) {
                Log::warning('Cloudflare Turnstile verification failed', [
                    'response' => $body,
                    'ip' => request()->ip(),
                ]);
                $fail('Verifikasi keamanan Cloudflare gagal atau kedaluwarsa. Silakan muat ulang atau coba lagi.');
            }
        } catch (\Throwable $e) {
            Log::error('Error connecting to Cloudflare Turnstile: ' . $e->getMessage());
            // Jika koneksi gagal dan di local dev/timeout, beri peringatan
            $fail('Gagal memverifikasi keamanan dengan Cloudflare Turnstile. Periksa koneksi internet Anda.');
        }
    }
}
