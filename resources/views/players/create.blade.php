@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
<h3> New Player</h3>
    {!! Form::open(['url' => 'players']) !!}

                    <div class="form-group">
                        {!! Form::Label('user', 'Select User Email') !!}<br>
                        {!! Form::select('user_id', $users) !!}
                    </div>
    <div class="form-group">

        {!! Form::Label('school', 'Select School') !!}<br>
        {!! Form::select('school_id', $schools) !!}

    </div>
    
    <div class="form-group">
        {!! Form::Label('team', 'Select Team') !!}<br>
        {!! Form::select('team_id', $teams) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_number', 'Player Id:') !!}
        {!! Form::text('p_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_fname', 'First Name:') !!}
        {!! Form::text('p_fname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_lname', 'Last Name:') !!}
        {!! Form::text('p_lname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_street', 'Street:') !!}
        {!! Form::text('p_street',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_city', 'City:') !!}
        {!! Form::text('p_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_state', 'State') !!}
        {!! Form::text('p_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_zip', 'Zip') !!}
        {!! Form::text('p_zip',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('p_phone', 'Phone') !!}
        {!! Form::text('p_phone',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('p_estatus', 'Status') !!}
        {!! Form::text('p_estatus',null,['class'=>'form-control']) !!}
    </div>
    

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>

@stop
