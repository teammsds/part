<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leaderboard;
use Auth;
class Leaderboardcontroller extends Controller

{
    public function index()
    {

        $leaderboards=Leaderboard::all();
        return view('matches.leaderboard', compact('leaderboards'));
    }

}
