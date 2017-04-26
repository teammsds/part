<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Referee;
use App\User;
use Auth;

class RprofileController extends Controller
{
    public function index()
    {
        //
        $userid = Auth::user()->id;
        $referee = Referee::where('user_id', '=', $userid)->first();
        return view('referees.show',compact('referee'));
    }


}
