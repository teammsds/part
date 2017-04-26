  @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

          <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
          <h3>Field Details</h3>
            <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Field Number</td>
                <td><?php echo ($field['f_number']); ?></td>
            </tr>
            <tr>
                <td>Field Name</td>
                <td><?php echo ($field['f_name']); ?></td>
            </tr>
            <tr>
                <td>Field Location</td>
                <td>
                    <table>
                        <tr><td><?php echo ($field['f_street']); ?></td></tr>
                        <tr><td><?php echo ($field['f_city']); ?></td></tr>
                        <tr><td><?php echo ($field['f_state']); ?></td></tr>
                        <tr><td><?php echo ($field['f_zip']); ?></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>Field Owner Organization</td>
                <td><?php echo ($field['f_oworg']); ?></td>
            </tr>
            <tr>
                <td>Contact Name</td>
                <td><?php echo ($field['f_conname']); ?></td>
            </tr>
            <tr>
                <td>Contact Email</td>
                <td><?php echo ($field['f_conemail']); ?></td>
            </tr>
            <tr>
                <td>Contact Phone</td>
                <td><?php echo ($field['f_conphone']); ?></td>
            </tr>
            <tr>
                <td>Notes</td>
                <td><?php echo ($field['f_notes']); ?></td>
            </tr>


            </tr>
            </tbody>
        </table>


</div>
</div>
</div>




@stop
