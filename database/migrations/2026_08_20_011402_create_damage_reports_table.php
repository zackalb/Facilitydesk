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
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_fasilitas');
            $table->dateTime('tanggal_waktu');
            $table->text('deskripsi_kerusakan');
            $table->string('foto_bukti')->nullable();
            $table->boolean('is_emergency')->default(false);
            $table->string('status_laporan');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_fasilitas')->references('id_fasilitas')->on('facilities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('damage_reports');
    }
};
