@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                    <h4 style= "color: black;font-size:20px">Schools</h4>
                      <a href="{{url('/schools/create')}}" class="btn btn-primary btn-sm" style="font-family:cambria;font-size:17px">Add New School</a>
                      <div class="pull-right">
                      <a href="{{action('Excelcontroller@exportschools')}}" class="btn btn-primary btn-sm" style="font-family:cambria;font-size:17px">Download</a>
                      </div>
                      </div>

    <table class="table  table-bordered table-hover table-responsive" style="font-size:20px">
        <thead style="font-size:18px">
        <tr class="bg-info">
            <th>School Id</th>
            <th>Name</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Phone</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody style="font-size:18px">
        @foreach ($schools as $school)

                <tr style="font-size:18px">
                <td>{{ $school->s_number }}</td>
                <td>{{ $school->s_name }}</td>
                <td>{{ $school->s_street }}</td>
                <td>{{ $school->s_city }}</td>
                <td>{{ $school->s_state }}</td>
                <td>{{ $school->s_zip }}</td>
                <td>{{ $school->s_contact }}</td>
                <td>{{ $school->s_email }}</td>
                <td>{{ $school->s_phone }}</td>
                <td><a href="{{url('schools',$school->id)}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{route('schools.edit',$school->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['schools.destroy', $school->id],'onsubmit' => 'return confirm("Are you sure you want to delete?")']) !!}
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


