<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;
use App\Field;



class FieldController extends Controller
{

    public function index()
    {
        //
        $fields=Field::all();
        return view('fields.index',compact('fields'));
    }

    public function show($id)
    {

        $field = Field::findOrFail($id);

        return view('fields.show',compact('field'));
    }


    public function create()
    {


        return view('fields.create', compact('fields'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {


        $field= new Field($request->all());
        $field->save();
        return redirect('fields');
    }

    public function edit($id)
    {
        $field=Field::find($id);
        return view('fields.edit',compact('field'));
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
        $field= new Field($request->all());
        $field=Field::find($id);
        $field->update($request->all());
        return redirect('fields');
    }

    public function destroy($id)
    {
        Field::find($id)->delete();
        return redirect('fields');
    }


    // public function stringify($id)
    // {
    //     // $field=Field::where('id', $id)->select('field_id','name','address','city','state','zip','home_phone','cell_phone')->first();
    //     $field = Field::where('id', $id)->select('id','s_number','s_name','s_street','s_city','s_state','s_zip','s_contact','s_email','s_phone')->first();

    //     $field = $field->toArray();
    //     return response()->json($field);
    // }


}
