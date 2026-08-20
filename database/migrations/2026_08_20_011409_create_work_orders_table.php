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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id('id_wo');
            $table->unsignedBigInteger('id_verifikasi')->unique();
            $table->unsignedBigInteger('id_teknisi');
            $table->string('prioritas');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->string('foto_after')->nullable();
            $table->timestamps();

            $table->foreign('id_verifikasi')->references('id_verifikasi')->on('verifications')->onDelete('cascade');
            $table->foreign('id_teknisi')->references('id_teknisi')->on('technician_vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
