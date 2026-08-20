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
        Schema::create('school_budgets', function (Blueprint $table) {
            $table->id('id_anggaran');
            $table->string('tahun_ajaran')->unique();
            $table->decimal('total_anggaran', 15, 2);
            $table->decimal('sisa_saldo', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_budgets');
    }
};
