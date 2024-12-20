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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('judul');
            $table->string('user_nik');
            $table->unsignedBigInteger('kategori_id'); // Menambahkan kolom kategori_id
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_nik')->references('nik')->on('users'); // Menambahkan relasi ke tabel users
            $table->date('tanggal_pengaduan');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->enum('status', ['belum_diproses', 'proses', 'selesai']); // Status yang lebih konsisten
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
