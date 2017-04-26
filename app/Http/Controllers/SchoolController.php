<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\School;

class SchoolController extends Controller
{
    public function index()
    {
        //
        $schools=School::all();
        return view('schools.index',compact('schools'));
    }

    public function show($id)
    {
        $school = School::findOrFail($id);
        return view('schools.show',compact('school'));
    }


    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $school= new School($request->all());
        $school->save();
        return redirect('schools');
    }

    public function edit($id)
    {
        $school=School::find($id);
        return view('schools.edit',compact('school'));
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
        $school= new School($request->all());
        $school=School::find($id);
        $school->update($request->all());
        return redirect('schools');
    }

    public function destroy($id)
    {
        School::find($id)->delete();
        return redirect('schools');
    }

    public function stringify($id)
    {
        // $school=School::where('id', $id)->select('school_id','name','address','city','state','zip','home_phone','cell_phone')->first();
        $school = School::where('id', $id)->select('id','s_number','s_name','s_street','s_city','s_state','s_zip','s_contact','s_email','s_phone')->first();

        $school = $school->toArray();
        return response()->json($school);
    }

}
