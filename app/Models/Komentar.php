<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'user_nik',
        'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class,'pengaduan_id');
    }
}
