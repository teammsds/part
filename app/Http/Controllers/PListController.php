<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use App\Team;
use App\Foul;
class PListController extends Controller

{
    public function index()
    {
        //

        $players = Player::all();
        $fouls=Foul::all();
        $teams=Team::all();
        return view('coaches.list', compact('players','teams','fouls'));
    }
    public function detail(Request $request,$id)
    {
        $team = Team::findOrFail($id);
        return view('coaches.playerlist',compact('team'));
    }
}