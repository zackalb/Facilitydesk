<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('damage_reports', 'pelapor_read_at')) {
            Schema::table('damage_reports', function (Blueprint $table) {
                $table->dateTime('pelapor_read_at')->nullable()->after('technician_read_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('damage_reports', 'pelapor_read_at')) {
            Schema::table('damage_reports', function (Blueprint $table) {
                $table->dropColumn('pelapor_read_at');
            });
        }
    }
};
