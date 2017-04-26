@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
<h3>Team details</h3>
        <table class="table table-bordered table-hover">
                        <tr class="bg-info">
            <tr>
                <td>Team Number</td>
                <td><?php echo ($team['tm_number']); ?></td>
            </tr>
            <tr>
                <td>Team Name</td>
                <td><?php echo ($team['tm_name']); ?></td>
            </tr>
            <tr>
                <td>Team Coach</td>
                <td><?php echo ($team['tm_coach']); ?></td>
            </tr>
            <tr>
                <td>Team Coach email</td>
                <td><?php echo ($team['tm_coachemail']); ?></td>
            </tr>
            <tr>
                <td>Team Coach Phone</td>
                <td><?php echo ($team['tm_coachphone']); ?></td>
            </tr>
            </tr>
            </tbody>
        </table>

        <div>
   <a href="{{url('/teams')}}" class="btn btn-primary">Back</a>
        </div>
    </div>

</div>
</div>
</div>

@stop
