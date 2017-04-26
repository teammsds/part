@extends('layouts.app')
@section('content')
    <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
        <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
    <h1>Update Referee</h1>
    {!! Form::model($referee,['method' => 'PATCH','route'=>['referees.update',$referee->id]]) !!}

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
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
        </div>
    </div>
@stop
