@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                    <h4 style= "color: black;font-size:20px">Players</h4>
                    @if (Auth::check())
                        @role('admin')
                      <a href="{{url('/players/create')}}" class="btn btn-primary btn-sm" style="font-size:17px">Add New Player</a>
                     <div class="pull-right">
                     <a href="{{action('Excelcontroller@exportplayers')}}" class="btn btn-primary btn-sm" style="font-size:17px">Download</a>
                     </div>
                        @endrole
                    @endif
                      </div>

    <table class="table table-responsive table-bordered table-hover">
        <thead >
        <tr class="bg-info">
            <th>Player Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street</th>
            <th>City</th>   
            <th>State</th>
            <th>Zip</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Status</th>
            <th>School Id</th>
            <th>Team Id</th>

            @if (Auth::check())
                @role('admin')
            <th colspan="3">Actions</th>
                @endrole
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)

                <td>{{ $player->p_number }}</td>
                <td>{{ $player->p_fname }}</td>
                 <td>{{ $player->p_lname }}</td>
                <td>{{ $player->p_street }}</td>
                <td>{{ $player->p_city }}</td>
                <td>{{ $player->p_state }}</td>
                <td>{{ $player->p_zip }}</td>
                <td>{{ $player->p_email }}</td>
                <td>{{ $player->p_phone }}</td>
                <td>{{ $player->p_estatus }}</td>
                <td>{{ $player->school->s_name }}</td>
                <td>{{ $player->team->tm_name }}</td>





                    @if (Auth::check())
                        @role('admin')

                <td><a href="{{url('players',$player->id)}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{route('players.edit',$player->id)}}" class="btn btn-warning btn-sm">update</a></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['players.destroy', $player->id],'onsubmit' => 'return confirm("Are you sure you want to delete?")']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
