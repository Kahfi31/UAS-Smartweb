<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportSearch extends Model
{
    use HasFactory;

    protected $table = 'transport_search_history';

    protected $fillable = [
        'asal',
        'tujuan',
        'rute_data',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'rute_data' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the most popular destinations
     */
    public function scopePopularDestinations($query, $limit = 10)
    {
        return $query->select('tujuan')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('tujuan')
            ->orderBy('count', 'desc')
            ->limit($limit);
    }

    /**
     * Get recent searches
     */
    public function scopeRecent($query, $limit = 5)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
    }
}
