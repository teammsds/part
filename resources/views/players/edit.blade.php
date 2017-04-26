@extends('layouts.app')
@section('content')
    <h1>Update Player</h1>
    {!! Form::model($player,['method' => 'PATCH','route'=>['players.update',$player->id]]) !!}

    <div class="form-group">

        {!! Form::Label('school', 'Select School') !!}<br>
        {!! Form::select('school_id', $schools) !!}

    </div>
    <div class="form-group">
        {!! Form::Label('team', 'Select Team') !!}<br>
        {!! Form::select('team_id', $teams) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_number', 'Player Number:') !!}
        {!! Form::text('p_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_lname', 'Player Last Name:') !!}
        {!! Form::text('p_lname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_fname', 'Player First Name:') !!}
        {!! Form::text('p_fname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_street', 'Player Street Address:') !!}
        {!! Form::text('p_street',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_city', 'Player City:') !!}
        {!! Form::text('p_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_state', 'Player State:') !!}
        {!! Form::text('p_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_zip', 'Player Zip Code:') !!}
        {!! Form::text('p_zip',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_phone', 'Player Phone No:') !!}
        {!! Form::text('p_phone',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_estatus', 'Player Eligibility Status:') !!}
        {!! Form::text('p_estatus',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
