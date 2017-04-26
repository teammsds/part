@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                    <h4 style= "color: black;font-size:19px">Teams</h4>
                      <a href="{{url('/teams/create')}}" class="btn btn-primary btn-sm" style= "font-size:17px">Add New Team</a>
                      <div class="pull-right">
                      <a href="{{action('Excelcontroller@exportteams')}}" class="btn btn-primary btn-sm" style= "font-size:17px">Download</a>
                      </div>
                      </div>

    <table class="table table-responsive table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>School Name</th>
            <th>Team Number</th>    
            <th>Team Name</th>
            <th>Team Coach</th>
            <th>Team Coach E-Mail</th>
            <th>Team Coach Phone</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($teams as $team)


                <td>{{ $team->school->s_name }}</td>
                <td>{{ $team->tm_number }}</td>
                <td>{{ $team->tm_name }}</td>
                <td>{{ $team->tm_coach }}</td>
                <td>{{ $team->tm_coachemail }}</td>
                <td>{{ $team->tm_coachphone }}</td>
                <td><a href="{{url('teams',$team->id)}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{route('teams.edit',$team->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['teams.destroy', $team->id],'onsubmit' => 'return confirm("Are you sure you want to delete?")']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    
            </div>
        </div>
    </div>
</div>
@endsection
