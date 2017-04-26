<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;
use App\Match;
use App\Tournament;
use App\Field;
use App\Team;
use App\Referee;
use App\Leaderboard;

class MatchController extends Controller
{
    //
    public function index()
    {
        //
        $matches=Match::all();
        return view('matches.index',compact('matches'));
    }

    public function show($id)
    {

        $match = Match::findOrFail($id);

        return view('matches.show',compact('match'));
    }


    public function create()
    {

        $fields = Field::lists('f_name','id');
        $tournaments = Tournament::lists('to_name','id');
        $teams = Team::lists('tm_name','id');
        $referees = Referee::lists('r_fname','id');
        return view('matches.create', compact('fields','tournaments','teams','referees'));
    }

    public function detail(Request $request,$id)
    {
        $match = Match::findOrFail($id);
        $ids=$match->tournament_id;
        $tournament = Tournament::findOrFail($ids);
        return view('matches.detail',compact('match','tournament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $match= new Match($request->all());
        $match->save();
        $match->referees()->attach($request['id1']);
        $match->referees()->attach($request['id2']);
        $match->teams()->attach($request['m_homeid']);
        $match->teams()->attach($request['m_guestid']);

        if($request['m_homeg']>$request['m_guestg']) {
            $team = Team::findOrFail($request['m_homeid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 1;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 0;
                $leaderboard['gfor'] = $request['m_homeg'];
                $leaderboard['gaga'] = $request['m_guestg'];
                $leaderboard['points'] = 3;
                $leaderboard->save();
            } else {
                $leaderboard['wins'] = $leaderboard['wins'] + 1;
                $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'];
                $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'];
                $leaderboard['points'] = $leaderboard['points'] + 3;
                $leaderboard->save();
            }
            $team = Team::findOrFail($request['m_guestid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 1;
                $leaderboard['draws'] = 0;
                $leaderboard['gfor'] = $request['m_guestg'];
                $leaderboard['gaga'] = $request['m_homeg'];
                $leaderboard->save();
            } else {
                $leaderboard['losses'] = $leaderboard['losses'] + 1;
                $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'];
                $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'];
                $leaderboard->save();
            }
        }
        elseif
            ($request['m_guestg'] > $request['m_homeg']){
            $team = Team::findOrFail($request['m_guestid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 1;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 0;
                $leaderboard['points'] = 3;
                $leaderboard['gfor'] = $request['m_guestg'];
                $leaderboard['gaga'] = $request['m_homeg'];
                $leaderboard->save();
            } else {
                $leaderboard['wins'] = $leaderboard['wins'] + 1;
                $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'];
                $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'];
                $leaderboard['points'] = $leaderboard['points'] + 3;
                $leaderboard->save();
            }
            $team = Team::findOrFail($request['m_homeid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 1;
                $leaderboard['draws'] = 0;
                $leaderboard['gfor'] = $request['m_homeg'];
                $leaderboard['gaga'] = $request['m_guestg'];
                $leaderboard->save();
            } else {
                $leaderboard['losses'] = $leaderboard['losses'] + 1;
                $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'];
                $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'];
                $leaderboard->save();
            }
        }
        elseif
        ($request['m_guestg'] == $request['m_homeg']){
            $team = Team::findOrFail($request['m_guestid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 1;
                $leaderboard['gfor'] = $request['m_guestg'];
                $leaderboard['gaga'] = $request['m_homeg'];
                $leaderboard['points'] = 1;
                $leaderboard->save();
            } else {
                $leaderboard['draws'] = $leaderboard['draws'] + 1;
                $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'];
                $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'];
                $leaderboard['points'] = $leaderboard['points'] + 1;
                $leaderboard->save();
            }
            $team = Team::findOrFail($request['m_homeid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 1;
                $leaderboard['gfor'] = $request['m_homeg'];
                $leaderboard['gaga'] = $request['m_guestg'];
                $leaderboard['points'] = 1;
                $leaderboard->save();
            } else {
                $leaderboard['draws'] = $leaderboard['draws'] + 1;
                $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'];
                $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'];
                $leaderboard['points'] = $leaderboard['points'] + 3;
                $leaderboard->save();
            }
        }


        return redirect('matches');
    }

    public function edit($id)
    {
        $fields = Field::lists('f_name','id');
        $tournaments = Tournament::lists('to_name','id');
        $teams = Team::lists('tm_name','id');
        $referees = Referee::lists('r_fname','id');
        $match=Match::find($id);
        return view('matches.edit',compact('match','fields','tournaments','teams','referees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        //

        $match=Match::find($id);
        $homegpre=$match['m_homeg'];
        $guestgpre=$match['m_guestg'];
        if($request['m_homeg']>$request['m_guestg']) {
            $team = Team::findOrFail($request['m_homeid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 1;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 0;
                $leaderboard['gfor'] = $request['m_homeg'];
                $leaderboard['gaga'] = $request['m_guestg'];
                $leaderboard['points'] = 3;
                $leaderboard->save();
            } else {
                if($homegpre>$guestgpre) {
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard->save();
                }else if($guestgpre>$homegpre){
                    $leaderboard['wins'] = $leaderboard['wins'] + 1;
                    $leaderboard['losses'] = $leaderboard['losses'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['points'] = $leaderboard['points'] + 3;
                    $leaderboard->save();

                }else if($guestgpre==$homegpre){
                    $leaderboard['wins'] = $leaderboard['wins'] + 1;
                    $leaderboard['draws'] = $leaderboard['draws'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['points'] = $leaderboard['points'] + 2;
                    $leaderboard->save();

                }
            }
            $team = Team::findOrFail($request['m_guestid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 1;
                $leaderboard['draws'] = 0;
                $leaderboard['gfor'] = $request['m_guestg'];
                $leaderboard['gaga'] = $request['m_homeg'];
                $leaderboard->save();
            } else {
                if($homegpre>$guestgpre) {
                $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                $leaderboard->save();
                }else if($homegpre<$guestgpre){
                    $leaderboard['losses'] = $leaderboard['losses'] + 1;
                    $leaderboard['wins'] = $leaderboard['wins'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['points'] = $leaderboard['points'] - 3;
                    $leaderboard->save();
                }else if($guestgpre==$homegpre){
                    $leaderboard['losses'] = $leaderboard['losses'] + 1;
                    $leaderboard['draws'] = $leaderboard['draws'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['points'] = $leaderboard['points'] - 1;
                    $leaderboard->save();

                }
            }
        }
        elseif
        ($request['m_guestg'] > $request['m_homeg']){
            $team = Team::findOrFail($request['m_guestid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 1;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 0;
                $leaderboard['points'] = 3;
                $leaderboard['gfor'] = $request['m_guestg'];
                $leaderboard['gaga'] = $request['m_homeg'];
                $leaderboard->save();
            } else {
                if($homegpre>$guestgpre) {
                    $leaderboard['losses'] = $leaderboard['losses'] - 1;
                    $leaderboard['wins'] = $leaderboard['wins'] + 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['points'] = $leaderboard['points'] + 3;
                    $leaderboard->save();
                }else if($homegpre<$guestgpre){
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard->save();
                }else if($guestgpre==$homegpre){
                    $leaderboard['wins'] = $leaderboard['wins'] + 1;
                    $leaderboard['draws'] = $leaderboard['draws'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['points'] = $leaderboard['points'] + 2;
                    $leaderboard->save();

                }
            }
            $team = Team::findOrFail($request['m_homeid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 1;
                $leaderboard['draws'] = 0;
                $leaderboard['gfor'] = $request['m_homeg'];
                $leaderboard['gaga'] = $request['m_guestg'];
                $leaderboard->save();
            } else {
                if($homegpre>$guestgpre) {
                    $leaderboard['losses'] = $leaderboard['losses'] + 1;
                    $leaderboard['wins'] = $leaderboard['wins'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['points'] = $leaderboard['points'] - 3;
                    $leaderboard->save();
                }else if($guestgpre>$homegpre){
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard->save();

                }else if($guestgpre==$homegpre){
                    $leaderboard['losses'] = $leaderboard['losses'] + 1;
                    $leaderboard['draws'] = $leaderboard['draws'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['points'] = $leaderboard['points'] - 1;
                    $leaderboard->save();

                }
            }
        }
        elseif
        ($request['m_guestg'] == $request['m_homeg']){
            $team = Team::findOrFail($request['m_guestid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 1;
                $leaderboard['gfor'] = $request['m_guestg'];
                $leaderboard['gaga'] = $request['m_homeg'];
                $leaderboard['points'] = 1;
                $leaderboard->save();
            } else {
                if($homegpre>$guestgpre) {
                    $leaderboard['draws'] = $leaderboard['draws'] + 1;
                    $leaderboard['losses'] = $leaderboard['losses'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['points'] = $leaderboard['points'] + 1;
                    $leaderboard->save();
                }else if($homegpre<$guestgpre){
                    $leaderboard['draws'] = $leaderboard['draws'] + 1;
                    $leaderboard['wins'] = $leaderboard['wins'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['points'] = $leaderboard['points'] - 2;
                    $leaderboard->save();
                }else if($guestgpre==$homegpre){
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_homeg'] - $homegpre;
                    $leaderboard->save();

                }
            }
            $team = Team::findOrFail($request['m_homeid']);
            $leaderboard = Leaderboard::where('t_name', '=', $team->tm_name)->first();
            if (is_null($leaderboard)) {
                $leaderboard = new leaderboard();
                $leaderboard['t_name'] = $team->tm_name;
                $leaderboard['wins'] = 0;
                $leaderboard['losses'] = 0;
                $leaderboard['draws'] = 1;
                $leaderboard['gfor'] = $request['m_homeg'];
                $leaderboard['gaga'] = $request['m_guestg'];
                $leaderboard['points'] = 1;
                $leaderboard->save();
            } else {
                if($homegpre>$guestgpre) {
                    $leaderboard['draws'] = $leaderboard['draws'] + 1;
                    $leaderboard['wins'] = $leaderboard['wins'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['points'] = $leaderboard['points'] - 2;
                    $leaderboard->save();
                }else if($guestgpre>$homegpre){
                    $leaderboard['draws'] = $leaderboard['draws'] + 1;
                    $leaderboard['losses'] = $leaderboard['losses'] - 1;
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard['points'] = $leaderboard['points'] + 1;
                    $leaderboard->save();

                }else if($guestgpre==$homegpre){
                    $leaderboard['gfor'] = $leaderboard['gfor'] + $request['m_homeg'] - $homegpre;
                    $leaderboard['gaga'] = $leaderboard['gaga'] + $request['m_guestg'] - $guestgpre;
                    $leaderboard->save();

                }
            }
        }

        $match->update($request->all());
        $match->referees()->detach();
        $match->teams()->detach();
        $match->referees()->attach($request['id1']);
        $match->referees()->attach($request['id2']);
        $match->teams()->attach($request['m_homeid']);
        $match->teams()->attach($request['m_guestid']);



        return redirect('matches');
    }

    public function destroy($id)
    {
        Match::find($id)->delete();
        return redirect('matches');
    }

}
