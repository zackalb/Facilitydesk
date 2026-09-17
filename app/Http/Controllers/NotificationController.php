<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DamageReport;

class NotificationController extends Controller
{
    /**
     * Tandai semua notifikasi telah dibaca untuk peran pelapor atau petugas.
     */
    public function markAllRead(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $role = strtolower(trim($user->status ?? $user->role ?? 'pelapor'));

        if ($role === 'pelapor') {
            // Pelapor: Tandai semua tugas perbaikan yang telah selesai sebagai dibaca
            DamageReport::where(function ($q) use ($user) {
                    $q->where('id_user', $user->id_user);
                    if (in_array($user->email, ['siswa@sekolah.com', 'pelapor@sekolah.com'])) {
                        $q->orWhereIn('id_user', [1, 4]);
                    }
                })
                ->where('status_laporan', 'selesai')
                ->whereNull('pelapor_read_at')
                ->update(['pelapor_read_at' => now()]);
        } elseif (in_array($role, ['petugas', 'teknisi', 'staf', 'admin'])) {
            // Petugas: Tandai semua laporan masuk dari pelapor sebagai dibaca
            $query = DamageReport::whereIn('status_laporan', ['menunggu', 'menunggu_rab', 'darurat'])
                ->whereNull('technician_read_at');

            if (!in_array($role, ['admin', 'sarpras', 'admin_sarpras'])) {
                $query->where(function ($q) use ($user) {
                    $q->where('technician_id', $user->id_user);
                    if ($user->category_id) {
                        $q->orWhere(function ($sub) use ($user) {
                            $sub->whereNull('technician_id')
                                ->where('category_id', $user->category_id);
                        });
                    }
                });
            }

            $query->update(['technician_read_at' => now()]);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Semua notifikasi telah ditandai sebagai dibaca.'
            ]);
        }

        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }

    /**
     * Tandai satu notifikasi telah dibaca.
     */
    public function markSingleRead($id)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $role = strtolower(trim($user->status ?? $user->role ?? 'pelapor'));
        $report = DamageReport::find($id);

        if ($report) {
            if ($role === 'pelapor') {
                $report->pelapor_read_at = now();
                $report->save();
            } elseif (in_array($role, ['petugas', 'teknisi', 'staf', 'admin'])) {
                $report->technician_read_at = now();
                $report->save();
            }
        }

        return response()->json(['success' => true]);
    }
}
