@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:18px;">
                    <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
        {!! Form::open(['url' => 'table']) !!}
                        <h3 style="text-align:center"> Team Standings </h3>
        <table class="table tabel-sm table-hover tabel-responsive" style="background-color: #ffe0b3;box-shadow: 2px 2px 2px #999;border-radius: 5px;">
            <thead>
            <tr >
                <th> </th>
                <th> W </th>
                <th> L </th>
                <th> D </th>
                <th> GF  </th>
                <th> GA </th>
                <th> Points </th>
            </tr>
            </thead>

            <tbody>


            @foreach ($leaderboards as $leaderboard)
                <tr>
                    <td>{{ $leaderboard->t_name }}</td>
                    <td>{{ $leaderboard->wins }}</td>
                    <td>{{ $leaderboard->losses }}</td>
                    <td>{{ $leaderboard->draws }}</td>
                    <td>{{ $leaderboard->gfor }}</td>
                    <td>{{ $leaderboard->gaga }}</td>
                    <td>{{ $leaderboard->points }}</td>
                </tr>
            @endforeach




            </tbody>
        </table>
       

    </div>
                </div>
            </div>
        </div>
    </div>







@stop
