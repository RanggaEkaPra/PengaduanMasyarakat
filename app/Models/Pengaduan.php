<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'user_nik', 'deskripsi', 'kategori_id', 'tanggal_pengaduan', 'gambar', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'pengaduan_id');
    }
}
