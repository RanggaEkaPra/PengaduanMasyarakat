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
        Schema::create('komentars', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('pengaduan_id'); // Foreign key ke tabel pengaduans
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('user_nik'); // Foreign key ke tabel users
            $table->text('komentar'); // Kolom untuk komentar
            $table->timestamps(); 

            // Foreign key constraints
            $table->foreign('pengaduan_id')->references('id')->on('pengaduans')->onDelete('cascade');
            $table->foreign('user_nik')->references('nik')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
