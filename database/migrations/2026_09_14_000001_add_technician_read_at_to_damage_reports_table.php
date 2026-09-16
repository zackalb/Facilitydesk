<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('damage_reports', 'technician_read_at')) {
            Schema::table('damage_reports', function (Blueprint $table) {
                $table->dateTime('technician_read_at')->nullable()->after('status_laporan');
            });
        }

        // Backfill existing reports that are already in progress or completed
        $reports = DB::table('damage_reports')->whereNull('technician_read_at')->get();
        foreach ($reports as $rep) {
            if (in_array($rep->status_laporan, ['proses', 'proses_perbaikan', 'menunggu_rab', 'selesai', 'darurat'])) {
                // Gunakan tanggal verifikasi jika ada, atau created_at + 15 menit
                $verification = DB::table('verifications')->where('id_laporan', $rep->id_laporan)->first();
                $readTime = $verification && $verification->created_at 
                    ? $verification->created_at 
                    : date('Y-m-d H:i:s', strtotime($rep->tanggal_waktu ?? $rep->created_at) + 600);

                DB::table('damage_reports')->where('id_laporan', $rep->id_laporan)->update([
                    'technician_read_at' => $readTime
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('damage_reports', 'technician_read_at')) {
            Schema::table('damage_reports', function (Blueprint $table) {
                $table->dropColumn('technician_read_at');
            });
        }
    }
};
