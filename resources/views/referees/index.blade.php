@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                    <h4 style= "color: black;font-size:17px">Referees</h4>
                      <a href="{{url('/referees/create')}}" class="btn btn-primary btn-sm" style="font-size:17px">Add New Referee</a>
                      <div class="pull-right">
                       <a href="{{action('Excelcontroller@exportreferees')}}" class="btn btn-primary btn-sm" style="font-size:17px">Download</a>
                      </div>
                      </div>

    <table class="table table-responsive table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Referee Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>E-mail</th>
            <th>Phone</th>
            
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($referees as $referee)
            <tr>
            
                <td>{{ $referee->r_number }}</td>
                <td>{{ $referee->r_fname }}</td>
                 <td>{{ $referee->r_lname }}</td>
                <td>{{ $referee->r_street }}</td>
                <td>{{ $referee->r_city }}</td>
                <td>{{ $referee->r_state }}</td>
                <td>{{ $referee->r_zip }}</td>
                <td>{{ $referee->r_email }}</td>
                <td>{{ $referee->r_phone }}</td>
               

                <td><a href="{{url('referees',$referee->id)}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{route('referees.edit',$referee->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['referees.destroy', $referee->id],'onsubmit' => 'return confirm("Are you sure you want to delete?")']) !!}
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
