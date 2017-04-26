<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Player;
use App\School;
use App\Team;
use App\User;
class Playercontroller extends Controller

{
    public function index()
    {
        //
        $players=Player::all();
        return view('players.index',compact('players'));
    }

    public function show($id)
    {

        $player = Player::findOrFail($id);

        return view('players.show',compact('player'));
    }


    public function create()
    {
        $users = User::lists('email','id');
        $schools = School::pluck('s_name','id');
         $teams = Team::lists('tm_name','id');
         return view('players.create', compact('schools','teams','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function detail(Request $request,$id)
    {
        $player = Player::findOrFail($id);
        return view('players.detail',compact('player'));
    }
    public function store(Request $request)
    {

        $player= new Player($request->all());
        $player['user_id'] = $request['user_id'];
        $player['p_number']=$request['p_number'];
        $player['p_lname']=$request['p_lname'];
        $player['p_fname']=$request['p_fname'];
        $player['p_street']=$request['p_street'];
        $player['p_city']=$request['p_city'];
        $player['p_state']=$request['p_state'];
        $player['p_zip']=$request['p_zip'];
        $player['p_phone']=$request[ 'p_phone'];
        $player['p_estatus']=$request['p_estatus'];
        $player['team_id']=$request['team_id'];
        $player['school_id']=$request[ 'school_id'];
        $user = User::findOrFail($request['user_id']);
        $player['p_email'] = $user->email;
        $player->save();

        return redirect('players');
    }

    public function edit($id)
    {
        $player=Player::find($id);
        $schools = School::pluck('s_name','id');
        $teams = Team::lists('tm_name','id');
        return view('players.edit',compact('player','schools','teams'));
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
        $player= new Player($request->all());
        $player=Player::find($id);
        $player->update($request->all());
        return redirect('players');
    }

    public function destroy($id)
    {
        Player::find($id)->delete();
        return redirect('players');
    }
}
