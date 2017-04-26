@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                    <h4 style= "color: black;font-size:17px">Tournaments</h4>
                    @if (Auth::check())
                        @role('admin')
                      <a href="{{url('/tournaments/create')}}" class="btn btn-primary btn-sm" style="font-size:17px">Add New Tournament</a>
                      <div class="pull-right">
                       <a href="{{action('Excelcontroller@exporttournaments')}}" class="btn btn-primary btn-sm" style="font-size:17px">Export to excel</a>
                      </div>
                      </div>
                @endrole
                @endif

    <table class="table table-responsive table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Tournament Number</th>
            <th>Tournament Name</th>
            <th>Start Date</th>
			<th>End Date</th>
            <th>Total teams</th>
            <th>Contact Name</th>
            <th>Contact Email</th>
			<th>Contact Phone</th>
            @if (Auth::check())
                @role('admin')
            <th colspan="3">Actions</th>
                @endrole
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($tournaments as $tournament)
            <tr>
                <td>{{ $tournament->to_number }}</td>
                <td>{{ $tournament->to_name }}</td>
                <td>{{ $tournament->to_sdate }}</td>
                <td>{{ $tournament->to_edate }}</td>
                <td>{{ $tournament->to_totteams }}</td>
                <td>{{ $tournament->to_cname }}</td>
                <td>{{ $tournament->to_cemail }}</td>
                <td>{{ $tournament->to_cphone }}</td>
                @if (Auth::check())
                    @role('admin')
                <td><a href="{{url('tournaments',$tournament->id)}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{route('tournaments.edit',$tournament->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['tournaments.destroy', $tournament->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
                    @endrole
                @endif

            </tr>
        @endforeach

        </tbody>

    </table>

        
            </div>
        </div>
    </div>
</div>
@endsection


