<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use App\School;
use App\Team;
use App\Foul;
use App\Match;
class Foulcontroller extends Controller

{
    public function index()
    {
        //
        $players = Player::lists('p_fname','id');
        $matches = Match::lists('m_number','id');
        return view('referees.fouls', compact('players','matches'));
    }

    public function store(Request $request)
    {
        $playerid = $request['player_id'];
        $foul = Foul::where('player_id', '=', $playerid)->where('match_id', '=', $request['match_id'])->first();
        if(is_null($foul)){
            $foul= new foul($request->all());
            $foul->save();
            return redirect('fouls');}
        else{
            $foul['y_card'] = $foul['y_card'] + $request['y_card'];
            $foul['r_card'] = $foul['r_card'] + $request['r_card'];
            $foul->save();
            return redirect('fouls');}

    }

    public function foullist()
    {
        //
        $fouls = Foul::all();
        return view('coaches.foullist', compact('fouls'));
    }

}
