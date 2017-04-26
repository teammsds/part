<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Referee;
use App\User;
use App\Role;

class RefereeController extends Controller
{
    public function index()
    {
        //
        $referees=Referee::all();
        return view('referees.index',compact('referees'));
    }

    public function show($id)
    {
        $referee = Referee::findOrFail($id);
        return view('referees.show',compact('referee'));
    }


    public function create()
    {
        $users=User::lists('email','id');
        return view('referees.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $referee= new Referee($request->all());
        $referee['user_id'] = $request['user_id'];
        $referee['r_number']=$request['r_number'];
        $referee['r_lname']=$request['r_lname'];
        $referee['r_fname']=$request['r_fname'];
        $referee['r_street']=$request['r_street'];
        $referee['r_city']=$request['r_city'];
        $referee['r_state']=$request['r_state'];
        $referee['r_zip']=$request['r_zip'];
        $referee['r_phone']=$request[ 'r_phone'];
        $user = User::findOrFail($request['user_id']);
        $referee['r_email'] = $user->email;
        $referee->save();
        return redirect('referees');
    }

    public function edit($id)
    {

        $referee=Referee::find($id);
        return view('referees.edit',compact('referee'));
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
        $referee= new Referee($request->all());
        $referee=Referee::find($id);
        $referee->update($request->all());
        return redirect('referees');
    }

    public function destroy($id)
    {
        Referee::find($id)->delete();
        return redirect('referees');
    }


}
