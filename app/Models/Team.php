<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $hidden = [
        'laravel_through_key'
    ];
    public function roster()
    {
        return $this->hasMany(Roster::class, 'team_code', 'code');
    }

    public function player_totals()
    {
        return $this->hasOneThrough(PlayerTotal::class, Roster::class, 'team_code', 'player_id', 'code', 'id');
    }
}
