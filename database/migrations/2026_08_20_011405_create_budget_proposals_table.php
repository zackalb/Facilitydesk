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
        Schema::create('budget_proposals', function (Blueprint $table) {
            $table->id('id_rab');
            $table->unsignedBigInteger('id_verifikasi')->unique();
            $table->unsignedBigInteger('id_anggaran');
            $table->decimal('estimasi_biaya', 15, 2);
            $table->text('rincian_kebutuhan');
            $table->string('status_persetujuan');
            $table->timestamps();

            $table->foreign('id_verifikasi')->references('id_verifikasi')->on('verifications')->onDelete('cascade');
            $table->foreign('id_anggaran')->references('id_anggaran')->on('school_budgets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_proposals');
    }
};
