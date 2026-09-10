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
        if (!Schema::hasColumn('facilities', 'category_id')) {
            Schema::table('facilities', function (Blueprint $table) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->after('kategori_area')
                    ->constrained('categories')
                    ->nullOnDelete();
            });
        }

        // Backfill existing facilities to appropriate category_id:
        // Category 1: Listrik, 2: Air, 3: Bangunan, 4: IT, 6: Jaringan, 7: Kendaraan
        $facilities = DB::table('facilities')->get();
        foreach ($facilities as $f) {
            $catId = 1; // default Listrik
            $text = strtolower($f->nama_fasilitas . ' ' . $f->kategori_area . ' ' . $f->lokasi_detail);

            if (preg_match('/(listrik|lampu|stop\s*kontak|saklar|ac|kabel|panel|sound|elektronik)/i', $text)) {
                $catId = 1; // Listrik
            }
            if (preg_match('/(air|wastafel|pipa|sanitasi|toilet|keran|kran|wc|tandon)/i', $text)) {
                $catId = 2; // Air
            }
            if (preg_match('/(bangunan|struktur|furnitur|pintu|meja|kursi|plafon|atap|lantai|dinding|kaca)/i', $text)) {
                $catId = 3; // Bangunan
            }
            if (preg_match('/(komputer|pc|proyektor|laptop|server|layar|infocus|laboratorium|printer)/i', $text)) {
                $catId = 4; // IT
            }
            if (preg_match('/(jaringan|wifi|internet|router|switch)/i', $text)) {
                $catId = 6; // Jaringan
            }
            if (preg_match('/(kendaraan|motor|mobil|bus|sepeda|parkir)/i', $text)) {
                $catId = 7; // Kendaraan
            }

            DB::table('facilities')->where('id_fasilitas', $f->id_fasilitas)->update(['category_id' => $catId]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('facilities', 'category_id')) {
            Schema::table('facilities', function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            });
        }
    }
};
