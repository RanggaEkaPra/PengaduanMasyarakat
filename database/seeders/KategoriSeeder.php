<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan kategori contoh
        Kategori::create([
            'name' => 'Layanan Publik',
        ]);
        Kategori::create([
            'name' => 'Kesehatan',
        ]);
        Kategori::create([
            'name' => 'Pendidikan',
        ]);
        Kategori::create([
            'name' => 'Lingkungan',
        ]);
        Kategori::create([
            'name' => 'Keamanan',
        ]);
    }
}
