@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
<h3> New Referee</h3>
    {!! Form::open(['url' => 'referees']) !!}

                    <div class="form-group">
                        {!! Form::Label('user', 'Select User Email') !!}<br>
                        {!! Form::select('user_id', $users) !!}
                    </div>
    <div class="form-group">
        {!! Form::label('r_number', 'Referee Id:') !!}

        {!! Form::text('r_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('r_fname', 'First Name:') !!}
        {!! Form::text('r_fname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('r_lname', 'Last Name:') !!}
        {!! Form::text('r_lname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('r_street', 'Street:') !!}
        {!! Form::text('r_street',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('r_city', 'City:') !!}
        {!! Form::text('r_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('r_state', 'State') !!}
        {!! Form::text('r_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('r_zip', 'Zip') !!}
        {!! Form::text('r_zip',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('r_phone', 'Phone') !!}
        {!! Form::text('r_phone',null,['class'=>'form-control']) !!}
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
