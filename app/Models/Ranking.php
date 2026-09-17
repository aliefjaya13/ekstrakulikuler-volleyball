<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'user_id',
        'period_month',
        'total_score',
        'rank_position',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
