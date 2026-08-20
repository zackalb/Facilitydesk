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
        Schema::create('rab_items', function (Blueprint $table) {
            $table->id('id_item');
            $table->unsignedBigInteger('id_rab');
            $table->string('nama_sarana_jasa');
            $table->integer('qty');
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();

            $table->foreign('id_rab')->references('id_rab')->on('budget_proposals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rab_items');
    }
};
