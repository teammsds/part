<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use App\School;
use App\Team;
use App\Referee;
use App\Field;
use App\Tournament;
use App\Match;
use Excel;
use DB;

class Excelcontroller extends Controller

{
     public function exportschools()
    {
        //
        $schools=School::all();
        Excel::create('School data',function($excel) use($schools) {
            $excel->sheet('Sheet 1', function($sheet) use($schools){
                $sheet->fromArray($schools);
            });
        })->download('xlsx');   
    }
     public function exportteams()
    {
        //
        $teams=Team::all();
        Excel::create('Team data',function($excel) use($teams) {
            $excel->sheet('Sheet 1', function($sheet) use($teams){
                $sheet->fromArray($teams);
            });
        })->download('xlsx');   
    }
     public function exportplayers()
    {
        //
        $players=Player::all();
        Excel::create('Player data',function($excel) use($players) {
            $excel->sheet('Sheet 1', function($sheet) use($players){
                $sheet->fromArray($players);
            });
        })->download('xlsx');   
    }
    
    public function exportreferees()
    {
        //
        $referees=Referee::all();
        Excel::create('Referee data',function($excel) use($referees) {
            $excel->sheet('Sheet 1', function($sheet) use($referees){
                $sheet->fromArray($referees);
            });
        })->download('xlsx'); 

    }
    public function exportmatches()
    {
        //
        $matches=Referee::all();
        Excel::create('Match data',function($excel) use($matches) {
            $excel->sheet('Sheet 1', function($sheet) use($matches){
                $sheet->fromArray($matches);
            });
        })->download('xlsx'); 
    }

    public function exportfields()
    {
        //
        $fields=Field::all();
        Excel::create('Field data',function($excel) use($fields) {
            $excel->sheet('Sheet 1', function($sheet) use($fields){
                $sheet->fromArray($fields);
            });
        })->download('xlsx'); 
    }
     public function exporttournaments()
    {
        //
        $tournments=Field::all();
        Excel::create('Tournament data',function($excel) use($tournments) {
            $excel->sheet('Sheet 1', function($sheet) use($tournments){
                $sheet->fromArray($tournments);
            });
        })->download('xlsx'); 
    }
}
