<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use App\User;
use Auth;

class PprofileController extends Controller
{
    public function index()
    {
        //
        $userid = Auth::user()->id;
        $player = Player::where('user_id', '=', $userid)->first();
        if (is_null($player)){return view('players.pperrorview');}
        else {
            return view('players.detail', compact('player'));
        }
    }


}
