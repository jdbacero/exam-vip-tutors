<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $table = 'roster';

    public function player_totals()
    {
        return $this->hasOne(PlayerTotal::class, 'player_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_code', 'code');
    }
}
