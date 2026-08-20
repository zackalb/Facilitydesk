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
        Schema::create('verifications', function (Blueprint $table) {
            $table->id('id_verifikasi');
            $table->unsignedBigInteger('id_laporan')->unique();
            $table->dateTime('tanggal_verifikasi');
            $table->string('kategori_kerusakan');
            $table->text('catatan_inspeksi')->nullable();
            $table->timestamps();

            $table->foreign('id_laporan')->references('id_laporan')->on('damage_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
