<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Referee;
use App\Player;
use App\Match;
use App\Team;
use Auth;
class Playermatchcontroller extends Controller

{
    public function index()
    {
        $userid = Auth::user()->id;
        $player = Player::where('user_id', '=', $userid)->first();
        if (is_null($player)){return view('players.pperrorview');}

        $id=$player->team_id;
        $team = Team::findOrFail($id);
        $matches=$team->matches;
        if (is_null($player)){return view('players.pmerrorview');}
        else {
            return view('players.mymatch', compact('player','team'));
        }

    }

}
