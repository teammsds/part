<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;
use App\Tournament;
use App\Field;


class TournamentController extends Controller
{
    //
    public function index()
    {
        //
        $tournaments=Tournament::all();
        return view('tournaments.index',compact('tournaments'));
    }

    public function show($id)
    {

        $tournament = Tournament::findOrFail($id);

        return view('tournaments.show',compact('tournament'));
    }


    public function create()
    {

        $fields = Field::lists('f_name','id');
        return view('tournaments.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $tournament= new Tournament($request->all());
        $tournament->save();

        return redirect('tournaments');
    }

    public function edit($id)
    {
        $tournament=Tournament::find($id);
        return view('tournaments.edit',compact('tournament'));
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
        $tournament= new Tournament($request->all());
        $tournament=Tournament::find($id);
        $tournament->update($request->all());
        return redirect('tournaments');
    }

    public function destroy($id)
    {
        Tournament::find($id)->delete();
        return redirect('tournaments');
    }

}
