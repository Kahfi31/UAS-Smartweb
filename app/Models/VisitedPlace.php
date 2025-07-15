<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitedPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tempat',
        'lokasi',
        'kategori',
        'deskripsi',
        'gambar',
        'rating',
        'jumlah_rating',
        'ulasan',
        'gambar_ulasan',
        'user_id'
    ];

    protected $casts = [
        'rating' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
