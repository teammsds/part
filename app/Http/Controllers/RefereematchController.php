<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Referee;
use App\Match;
use Auth;
class Refereematchcontroller extends Controller

{
    public function index()
    {
        $userid = Auth::user()->id;
        $referee = Referee::where('user_id', '=', $userid)->first();
        if (is_null($referee)){return view('referees.rmerrorview');}
        else {
            return view('referees.mymatch', compact('referee'));
        }

    }

}
