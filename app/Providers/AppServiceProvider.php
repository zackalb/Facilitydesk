<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\DamageReport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                if (!Schema::hasTable('damage_reports')) {
                    $view->with([
                        'pelaporNotifications' => collect(),
                        'pelaporNotificationCount' => 0,
                        'petugasNotifications' => collect(),
                        'petugasNotificationCount' => 0,
                    ]);
                    return;
                }

                if (Auth::check()) {
                    $user = Auth::user();
                    $role = strtolower(trim($user->status ?? $user->role ?? 'pelapor'));

                    if ($role === 'pelapor') {
                        // Notifikasi Pelapor: HANYA ketika tugas/laporan yang kita berikan ke teknisi sudah SELESAI
                        $pelaporNotifications = DamageReport::where(function ($q) use ($user) {
                                $q->where('id_user', $user->id_user);
                                if (in_array($user->email, ['siswa@sekolah.com', 'pelapor@sekolah.com'])) {
                                    $q->orWhereIn('id_user', [1, 4]);
                                }
                            })
                            ->where('status_laporan', 'selesai')
                            ->with(['facility', 'technician', 'verification'])
                            ->latest('updated_at')
                            ->take(10)
                            ->get();

                        $view->with([
                            'pelaporNotifications' => $pelaporNotifications,
                            'pelaporNotificationCount' => $pelaporNotifications->count(),
                            'petugasNotifications' => collect(),
                            'petugasNotificationCount' => 0,
                        ]);
                    } elseif (in_array($role, ['petugas', 'teknisi', 'staf', 'admin'])) {
                        // Notifikasi Petugas: HANYA ketika ada laporan masuk dari pelapor
                        $incomingQuery = DamageReport::with(['facility', 'user', 'category', 'technician'])
                            ->whereIn('status_laporan', ['menunggu', 'menunggu_rab', 'darurat']);

                        if (!in_array($role, ['admin', 'sarpras', 'admin_sarpras'])) {
                            $incomingQuery->where(function ($q) use ($user) {
                                $q->where('technician_id', $user->id_user);
                                if ($user->category_id) {
                                    $q->orWhere(function ($sub) use ($user) {
                                        $sub->whereNull('technician_id')
                                            ->where('category_id', $user->category_id);
                                    });
                                }
                            });
                        }

                        $petugasNotifications = $incomingQuery->latest('created_at')->take(10)->get();

                        $view->with([
                            'pelaporNotifications' => collect(),
                            'pelaporNotificationCount' => 0,
                            'petugasNotifications' => $petugasNotifications,
                            'petugasNotificationCount' => $petugasNotifications->count(),
                        ]);
                    } else {
                        $view->with([
                            'pelaporNotifications' => collect(),
                            'pelaporNotificationCount' => 0,
                            'petugasNotifications' => collect(),
                            'petugasNotificationCount' => 0,
                        ]);
                    }
                } else {
                    $view->with([
                        'pelaporNotifications' => collect(),
                        'pelaporNotificationCount' => 0,
                        'petugasNotifications' => collect(),
                        'petugasNotificationCount' => 0,
                    ]);
                }
            } catch (\Throwable $e) {
                $view->with([
                    'pelaporNotifications' => collect(),
                    'pelaporNotificationCount' => 0,
                    'petugasNotifications' => collect(),
                    'petugasNotificationCount' => 0,
                ]);
            }
        });
    }
}
