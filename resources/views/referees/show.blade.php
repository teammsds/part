@extends('layouts.app')
@section('content')

    <<div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                    <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">

        <h1 >Referee Details</h1>
        <table class="table table-bordered table-hover">
            <tbody >
            <tr class="bg-info">
            <tr>
                <td>Referee Number</td>
                <td><?php echo ($referee['r_number']); ?></td>
            </tr>
            <tr>
                <td>Referee First Name</td>
                <td><?php echo ($referee['r_fname']); ?></td>
            </tr>
            <tr>
                <td>Referee Last Name</td>
                <td><?php echo ($referee['r_lname']); ?></td>
            </tr>
            <tr>
                <td>Referee Address</td>
                <td>
                    <table>
                <tr><td><?php echo ($referee['r_street']); ?></td></tr>
                <tr><td><?php echo ($referee['r_city']); ?></td></tr>
                <td><?php echo ($referee['r_state']); ?></td></tr>
                <td><?php echo ($referee['r_zip']); ?></td></tr>
                <td><?php echo ($referee['r_email']); ?></td></tr>
                <td><?php echo ($referee['r_phone']); ?></td></tr>
                    </table>
                </td>
            </tr>
            
            </tbody>
        </table>
    </div>



</div>
</div>
        </div>
</div>


@stop
