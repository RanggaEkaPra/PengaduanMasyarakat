<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    // Relasi dengan Pengaduan
    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
