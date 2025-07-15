<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kategori',
        'kategori_display',
        'lokasi',
        'latitude',
        'longitude',
        'jam_operasional',
        'gambar',
        'status',
        'created_by'
    ];
}

