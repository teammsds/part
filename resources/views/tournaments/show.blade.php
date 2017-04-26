  @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

          <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
          <h3>Tournament Details</h3>
            <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Tournament Number</td>
                <td><?php echo ($tournament['to_number']); ?></td>
            </tr>
            <tr>
                <td>Tournament Name</td>
                <td><?php echo ($tournament['to_name']); ?></td>
            </tr>
            <tr>
                <td>Tournament Start Date</td>
                <td><?php echo ($tournament['to_sdate']); ?></td>
            </tr>
            <tr>
                <td>Tournament End Date </td>
                <td><?php echo ($tournament['to_edate']); ?></td>
            </tr>
            <tr>
                <td>Total Teams</td>
                <td><?php echo ($tournament['to_totteams']); ?></td>
            </tr>
            <tr>
                <td>Contact Name</td>
                <td><?php echo ($tournament['to_cname']); ?></td>
            </tr>
            <tr>
                <td>Contact Email</td>
                <td><?php echo ($tournament['to_cemail']); ?></td>
            </tr>
            <tr>
                <td>Contact Phone</td>
                <td><?php echo ($tournament['to_cphone']); ?></td>
            </tr>


            </tr>
            </tbody>
        </table>


</div>
</div>
</div>




@stop
