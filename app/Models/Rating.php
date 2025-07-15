<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lokasi_nama',
        'deskripsi',
        'rating',
        'kategori',
        'lokasi_alamat',
        'gambar',
        'is_approved'
    ];

    protected $casts = [
        'rating' => 'integer',
        'gambar' => 'array',
        'is_approved' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the user who created this rating
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get approved ratings only
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Get ratings by location
     */
    public function scopeByLocation($query, $lokasiNama)
    {
        return $query->where('lokasi_nama', 'like', '%' . $lokasiNama . '%');
    }

    /**
     * Get average rating for a location
     */
    public static function getAverageRating($lokasiNama)
    {
        return self::approved()
            ->byLocation($lokasiNama)
            ->avg('rating');
    }

    /**
     * Get total reviews for a location
     */
    public static function getTotalReviews($lokasiNama)
    {
        return self::approved()
            ->byLocation($lokasiNama)
            ->count();
    }
}
