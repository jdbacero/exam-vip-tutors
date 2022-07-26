<?php

namespace App\Http\Controllers;

use App\Models\Roster;
use App\Models\Team;
use App\Providers\Array2XML;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\ArrayToXml\ArrayToXml;

class ExportController extends Controller
{
    //

    public function export(Request $req)
    {
        // return $req;
        $rosterView = $req->has('rosterView') ? $req->input('rosterView') : false;
        $team = $req->has('team') ? $req->input('team') : false;
        $player_stats = $req->has('player_stats') ? $req->input('player_stats') : false;
        $export_type = $req->input('exportType') ? $req->input('exportType') : 'csv';
        // $export_type = 'xml';
        $view = [];
        $heading = [];
        // $rosterView ? 
        $mydata = DB::table('team')->join('roster', 'team.code', '=', 'roster.team_code')
            ->join('player_totals', 'roster.id', '=', 'player_totals.player_id');

        if ($req->has('position')) {
            $mydata = $mydata->where('roster.pos', 'like', '%' . $req->input('position') . '%');
        }
        if ($req->has('player')) {
            $mydata = $mydata->where('roster.name', 'like', '%' . $req->input('player') . '%');
        }
        if ($req->has('teamname')) {
            $mydata = $mydata->where('team.name', 'like', '%' . $req->input('teamname') . '%');
        }
        if ($player_stats === "true") {
            // $mydata = $mydata->select("player_totals.*");
            array_push($view, "player_totals.*");
            array_push($heading, 'player_id', 'age', 'games', 'games_started', 'minutes_played', 'field_goals', 'field_goals_attempted', '3pt', '3pt_attempted', '2pt', '2pt_attempted', 'free_throws', 'free_throws_attempted', 'offensive_rebounds', 'defensive_rebounds', 'assists', 'steals', 'blocks', 'turnovers', 'personal_fouls');
        }
        if ($team === "true") {
            // $mydata = $mydata->select("team.*");
            array_push($view, "team.*");
            array_push($heading, 'code', 'name');
        }
        if ($rosterView === "true") {
            // $mydata = $mydata->select("roster.*");
            array_push($view, "roster.*");
            array_push($heading, 'id', 'team_code', 'number', 'name', 'pos', 'height', 'weight', 'dob', 'nationality', 'years_exp', 'college');
        }
        $mydata = $mydata->select($view)->get();

        if ($export_type == "csv") {
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="sample.csv"');
            $fp = fopen('php://output', 'wb');
            fputcsv($fp, $heading);
            foreach ($mydata as $fields) {
                fputcsv($fp, get_object_vars($fields));
            }

            fclose($fp);
        } else if ($export_type == "json") {
            header('Content-disposition: attachment; filename=jsonFile.json');
            header('Content-type: application/json');
            echo ($mydata);
        } else if ($export_type == "xml") {
            // return $mydata;

            header("Content-Type: text/xml;");
            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><rootTag/>');
            Array2XML::to_xml($xml, json_decode($mydata, true));
            // echo $xml;
            print $xml->asXML();
        }
    }
}
