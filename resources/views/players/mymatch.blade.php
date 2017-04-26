@extends('layouts.app')
@section('content')

    <div class="container">

        <h1 style="color:gainsboro">My Matches</h1>
        <table class="table table-bordered table-hover">
            <thead>
            <th> <h3>Match Number</h3></th>
            <th>  <h3>Tournament Name</h3></th>
            </thead>
            <tbody style="background-color: darkseagreen">
            <tr class="bg-info">
                @foreach ($team->matches as $match)
                    <tr>
                    <td>{{ $match->m_number}}</td>
                    <td>{{$match->tournament->to_name}}</td>
                    </tr>
            @endforeach

            
            </tbody>
        </table>
    </div>






@stop
