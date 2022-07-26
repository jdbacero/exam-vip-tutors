<?php

namespace App\Http\Controllers;

use App\Models\PlayerTotal;
use App\Models\Roster;
use App\Models\Team;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    //
    protected $hidden = [
        'laravel_through_key'
    ];
    public function allPlayers()
    {
        // Supposed to use eager ORM but not working because Eloquent wouldn't retrieve the right ID??
        $players = DB::table('roster')->join('team', 'team.code', '=', 'roster.team_code')
            ->select('roster.*', 'team.name as teamname')
            ->get();

        return view('nba', [
            'players' => $players
        ]);
    }

    public function player($id)
    {
        // My supposed code but not working because Eloquent wouldn't retrieve the right ID??
        // return Team::with('roster', 'player_totals')->whereHas('roster', function (Builder $query) use ($id) {
        //     $query->where('id', $id);
        // })->get();

        return $player = DB::table('team')->join('roster', 'team.code', '=', 'roster.team_code')->join('player_totals', 'roster.id', '=', 'player_totals.player_id')->where('roster.id', $id)->select('roster.*')->select('player_totals.*', 'roster.*', 'team.*', 'roster.name as playername')->get()->toArray();
    }
}
