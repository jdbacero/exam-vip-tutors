<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerTotal extends Model
{
    use HasFactory;

    protected $table = 'player_totals';
    protected $hidden = [
        'laravel_through_key'
    ];
    public function roster()
    {
        return $this->belongsTo(Roster::class, 'player_id', 'id');
    }
}
