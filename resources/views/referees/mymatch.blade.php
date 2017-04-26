@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">

        <h1 style="color:gainsboro">My Matches</h1>
        <table class="table table-bordered table-hover">
            <thead>
            <th> <h3>Match Number</h3></th>
            <th>  <h3>Tournament Name</h3></th>
            </thead>
            <tbody >
            <tr class="bg-info">
                @foreach ($referee->matches as $match)
                    <tr>
                    <td>{{ $match->m_number}}</td>
                    <td>{{$match->tournament->to_name}}</td>
                    </tr>
            @endforeach

            
            </tbody>
        </table>
    </div>
    </div>






@stop
