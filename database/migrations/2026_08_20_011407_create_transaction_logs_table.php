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
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_rab');
            $table->dateTime('tanggal_transaksi');
            $table->string('kategori');
            $table->decimal('jumlah_rp', 15, 2);
            $table->string('status_transaksi');
            $table->timestamps();

            $table->foreign('id_rab')->references('id_rab')->on('budget_proposals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
