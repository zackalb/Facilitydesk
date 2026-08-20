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
        Schema::create('functional_test_handovers', function (Blueprint $table) {
            $table->id('id_serah_terima');
            $table->unsignedBigInteger('id_wo')->unique();
            $table->dateTime('tanggal_pengujian');
            $table->string('hasil_pengujian');
            $table->string('bukti_tanda_tangan');
            $table->timestamps();

            $table->foreign('id_wo')->references('id_wo')->on('work_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('functional_test_handovers');
    }
};
