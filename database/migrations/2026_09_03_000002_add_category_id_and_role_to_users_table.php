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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->after('status')
                ->constrained('categories')
                ->nullOnDelete();

            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->nullable()->after('status');
            }
        });

        // Sinkronisasi data awal role dari status jika ada
        if (Schema::hasColumn('users', 'status') && Schema::hasColumn('users', 'role')) {
            DB::statement('UPDATE users SET role = status WHERE role IS NULL');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');

            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
