@extends('layouts.app')

@section('content')
<div class="container" style="background-color: lightgoldenrodyellow">
    <div class="row">
        <div class="col-md-20 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px;" >

                    <h4 style= "color: black;font-size:20px">Matches</h4>
                    @if (Auth::check())
                        @role('admin')
                        <a href="{{url('/matches/create')}}" class="btn btn-primary btn-sm" style="font-size:20px">Add New Match </a>
                        @endrole
                        <div class="pull-right">
                            <a href="{{action('Excelcontroller@exportmatches')}}" class="btn btn-primary btn-sm" style="font-size:20px">Download</a>
                        </div>
                    @endif



    <table class="table tabel-sm table-hover tabel-responsive" >
        <thead>
        <tr class="bg-info">
            <th>Match Number</th>
            <th>Home Team ID</th>
            <th>Guest Team ID</th>
            <th>Date</th>
			<th>Time</th>
            <th>Score</th>
            <th>Referee 1</th>
            <th>Referee 2</th>
            <th>Referee Comments</th>
            <th>Home Team Goals</th>
            <th>Guest Team Goals</th>
			<th>Field Name</th>
			<th>Tournament Name</th>
            @if (Auth::check())
                @role(['admin','referee'])
            <th colspan="3">Actions</th>
                @endrole
            @endif
        </tr>
        </thead>

        @foreach ($matches as $match)


               <td><a href="{{url('/matches/detail',$match->id)}}">{{ $match->m_number }}</a></td>
                   <td>{{$match->m_homeid}}</td>
                   <td>{{$match->m_guestid}}</td>
                <td>{{ $match->m_date }}</td>
                <td>{{ $match->m_time }}</td>
                <td>{{ $match->m_score }}</td>
                @foreach ($match->referees as $referee)
                        <td>{{ $referee->r_fname}}</td>
                 @endforeach
                <td>{{ $match->m_ref_com }}</td>
                <td>{{ $match->m_homeg }}</td>
                <td>{{ $match->m_guestg }}</td>
				<td>{{ $match->field->f_name }}</td>
				<td>{{ $match->tournament->to_name }}</td>
                @if (Auth::check())
                    @role(['admin','referee'])

                <td><a style="font-size:10px" href="{{url('matches',$match->id)}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a style="font-size:10px" href="{{route('matches.edit',$match->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                <td >
                    {!! Form::open(['method' => 'DELETE', 'route'=>['matches.destroy', $match->id]]) !!}
                    {!! Form::submit( 'Delete', ['class' => 'btn btn-danger btn-sm'])!!}
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


