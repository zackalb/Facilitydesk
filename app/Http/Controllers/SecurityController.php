<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;

class SecurityController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        $twoFactorEnabled = $user->hasEnabledTwoFactorAuthentication();
        $twoFactorPending = !is_null($user->two_factor_secret) && is_null($user->two_factor_confirmed_at);
        
        $qrCodeSvg = null;
        $setupKey = null;
        $recoveryCodes = [];

        if ($twoFactorPending || $twoFactorEnabled) {
            try {
                $qrCodeSvg = $user->twoFactorQrCodeSvg();
                $setupKey = Fortify::currentEncrypter()->decrypt($user->two_factor_secret);
            } catch (\Exception $e) {
                // Ignore decryption errors if secret was invalid
            }
        }

        if ($twoFactorEnabled) {
            try {
                $recoveryCodes = $user->recoveryCodes() ?? [];
            } catch (\Exception $e) {
                $recoveryCodes = [];
            }
        }

        $role = strtolower(trim($user->status ?? 'pelapor'));
        session(['active_role' => $role]);

        return view('settings.security', compact(
            'user',
            'twoFactorEnabled',
            'twoFactorPending',
            'qrCodeSvg',
            'setupKey',
            'recoveryCodes',
            'role'
        ));
    }
}
