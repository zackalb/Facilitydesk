<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\PelaporController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $role = session('active_role', auth()->user()->status ?? 'pelapor');
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'kepsek') {
            return redirect()->route('kepsek.dashboard');
        }
        return redirect()->route('pelapor.dashboard');
    })->name('dashboard');

    // Pelapor Routes
    Route::get('/pelapor/dashboard', [PelaporController::class, 'dashboard'])->name('pelapor.dashboard');
    Route::get('/pelapor/tickets', [PelaporController::class, 'tickets'])->name('pelapor.tickets');
    Route::get('/pelapor/wo', [PelaporController::class, 'workOrders'])->name('pelapor.wo');
    Route::post('/pelapor/lapor', [PelaporController::class, 'store'])->name('pelapor.lapor');
    Route::post('/pelapor/darurat', [PelaporController::class, 'storeEmergency'])->name('pelapor.darurat');
    Route::post('/pelapor/track', [PelaporController::class, 'trackTicket'])->name('pelapor.track');
});
