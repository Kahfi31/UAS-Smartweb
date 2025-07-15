<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    protected $table = 'search_history';

    protected $fillable = [
        'user_query',
        'ai_response',
        'recommendations',
        'category',
        'is_success',
        'error_message',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'recommendations' => 'array',
        'is_success' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Scope untuk mendapatkan query yang sering ditanyakan
     */
    public function scopePopular($query, $limit = 3)
    {
        return $query->select('user_query')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('user_query')
            ->orderBy('count', 'desc')
            ->limit($limit);
    }

    /**
     * Scope untuk mendapatkan query terbaru
     */
    public function scopeRecent($query, $limit = 2)
    {
        return $query->select('user_query')
            ->orderBy('created_at', 'desc')
            ->limit($limit);
    }
}
