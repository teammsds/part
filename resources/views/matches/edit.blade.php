@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:18px;">
<h3>Update Match Details</h3>
{!! Form::model($match,['method' => 'PATCH','route'=>['matches.update',$match->id]]) !!}
                    @if (Auth::check())
                        @role(['admin','referee'])
                        <div class="form-group">
                            {!! Form::Label('school', 'Select Field') !!}<br>
                            {!! Form::select('field_id', $fields) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::Label('school', 'Select Tournament') !!}<br>
                            {!! Form::select('tournament_id', $tournaments) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::Label('school', 'Select Home Team') !!}<br>
                            {!! Form::select('m_homeid', $teams) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::Label('school', 'Select Guest Team') !!}<br>
                            {!! Form::select('m_guestid', $teams) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::Label('school', 'Select First Referee') !!}<br>
                            {!! Form::select('id1', $referees) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::Label('school', 'Select Second Referee') !!}<br>
                            {!! Form::select('id2', $referees) !!}
                        </div>
                        @endrole
                    @endif
                        @if (Auth::check())
                            @role('admin')
                    <div class="form-group">
                        {!! Form::label('m_number', 'Match Number:') !!}
                        {!! Form::text('m_number',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('m_date', 'Date:') !!}
                        {!! Form::text('m_date',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('m_time', 'Time:') !!}
                        {!! Form::text('m_time',null,['class'=>'form-control']) !!}
                    </div>
                        @endrole
                    @endif
                    <div class="form-group">
                        {!! Form::label('m_score', 'Score:') !!}
                        {!! Form::text('m_score',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('m_ref_com', 'Referee Comments:') !!}
                        {!! Form::text('m_ref_com',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('m_homeg', 'Home Goals:') !!}
                        {!! Form::text('m_homeg',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('m_guestg', 'Guest Goals:') !!}
                        {!! Form::text('m_guestg',null,['class'=>'form-control']) !!}

                    </div>


<div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
{!! Form::close() !!}
@stop
