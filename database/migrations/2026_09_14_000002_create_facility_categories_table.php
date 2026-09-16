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
        Schema::create('facility_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });

        // Seed initial default categories and map to technician domain categories
        $defaults = [
            ['name' => 'Elektronik', 'category_id' => 1],      // Listrik
            ['name' => 'Furnitur', 'category_id' => 3],        // Bangunan
            ['name' => 'Sanitasi', 'category_id' => 2],        // Air
            ['name' => 'Struktur Gedung', 'category_id' => 3], // Bangunan
            ['name' => 'Laboratorium', 'category_id' => 4],    // IT
            ['name' => 'Fasilitas Umum', 'category_id' => 3],  // Bangunan
            ['name' => 'Transportasi', 'category_id' => 7],    // Kendaraan
        ];

        foreach ($defaults as $item) {
            DB::table('facility_categories')->updateOrInsert(
                ['name' => $item['name']],
                ['category_id' => $item['category_id'], 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_categories');
    }
};
