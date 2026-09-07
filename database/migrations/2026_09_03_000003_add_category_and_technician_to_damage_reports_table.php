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
        Schema::table('damage_reports', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->after('id_fasilitas')
                ->constrained('categories')
                ->nullOnDelete();

            $table->unsignedBigInteger('technician_id')
                ->nullable()
                ->after('id_user');

            $table->foreign('technician_id')
                ->references('id_user')
                ->on('users')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('damage_reports', function (Blueprint $table) {
            $table->dropForeign(['technician_id']);
            $table->dropColumn('technician_id');

            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
