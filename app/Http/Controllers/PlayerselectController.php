<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use App\Team;
use App\Tournament;
use App\Foul;
use App\Match;
use App\Matchplayer;
use Auth;
class PlayerselectController extends Controller

{
    public function index()
    {
        //
        $tournaments = Tournament::all();
        return view('coaches.index', compact('tournaments'));
    }

    public function select(Request $request,$id)
    {
        //
        $tournament = Tournament::findOrFail($id);
        $user = Auth::user();
        $team = Team::where('tm_coachemail', '=', $user->email)->first();
        return view('coaches.select', compact('tournament','team'));
    }

    public function selectplayer(Request $request,$id)
    {
        //
        $user = Auth::user();
        $team = Team::where('tm_coachemail', '=', $user->email)->first();
        $match = Match::findOrFail($id);
        return view('coaches.selectplayer', compact('match','team'));
    }

    public function add(Request $request,$id1,$id2,$id3,$id4)
    {
        if ($id4==1) {
            $matchplayers = new Matchplayer();
            $matchplayers['match_id'] = $id1;
            $matchplayers['team_id'] = $id2;
            $matchplayers['player_id'] = $id3;

            $matchplayers->save();
            $match = Match::findOrFail($id1);
            return redirect()->action('PlayerselectController@selectplayer', ['id' => $id1]);
        }else if($id4==2){
            $matchplayer = Matchplayer::where([
                ['match_id', '=', $id1],
                ['team_id', '=', $id2],
                ['player_id', '=', $id3],
            ])->first();
            echo $matchplayer;
            $id = $matchplayer->id;
            Matchplayer::find($id)->delete();
            //$match = Match::findOrFail($id1);

            return redirect()->action('PlayerselectController@selectplayer', ['id' => $id1]);
        }

    }


}