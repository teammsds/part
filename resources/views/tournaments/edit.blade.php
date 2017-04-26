@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
<h3>Update Tournament Details</h3>
{!! Form::model($tournament,['method' => 'PATCH','route'=>['tournaments.update',$tournament->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('to_number', 'Tournament Number:') !!}
                        {!! Form::text('to_number',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('to_name', 'Tournament Name:') !!}
                        {!! Form::text('to_name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('to_sdate', 'Start Date:') !!}
                        {!! Form::text('to_sdate',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('to_edate', 'End Date:') !!}
                        {!! Form::text('to_edate',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('to_totteams', 'Total Teams:') !!}
                        {!! Form::text('to_totteams',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('to_cname', 'Contact Name:') !!}
                        {!! Form::text('to_cname',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('to_cemail', 'Contact Email:') !!}
                        {!! Form::text('to_cemail',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('to_cphone', 'Contact Phone:') !!}
                        {!! Form::text('to_cphone',null,['class'=>'form-control']) !!}
                    </div>

<div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
{!! Form::close() !!}
@stop
