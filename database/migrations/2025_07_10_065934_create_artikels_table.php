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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('dokumentasi')->nullable();      // File gambar utama
            $table->string('fotografer')->nullable();        // Nama fotografer
            $table->string('penulis');
            $table->string('redaktur');
            $table->date('tanggal_posting');                // Tanggal posting
            $table->text('isi');                            // Isi lengkap artikel
            $table->enum('kategori', [
                'Pemerintahan',
                'Infrastruktur',
                'Lingkungan Hidup',
                'Pertanian',
                'Pendidikan',
                'Kesehatan',
                'Kebencanaan',
                'Ekonomi & Sosial',
                'Politik dan Hukum',
                'Wisata & Kuliner',
                'Komoditas',
                'Seni & Budaya'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
