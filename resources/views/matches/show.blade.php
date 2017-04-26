  @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

          <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:Cambria;font-size:18px;">
          <h3>Match Details</h3>
            <table class="table table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Match Number</td>
                <td><?php echo ($match['m_number']); ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo ($match['m_date']); ?></td>
            </tr>
            <tr>
                <td>Time </td>
                <td><?php echo ($match['m_time']); ?></td>
            </tr>
            <tr>
                <td>Score</td>
                <td><?php echo ($match['m_score']); ?></td>
            </tr>


                @foreach ($match->referees as $referee)
                    <tr><td>Referee </td>
                    <td><?php echo ($referee['r_fname']); ?> </td></tr>
                    @endforeach

            <tr>
                <td>Referee Comments</td>
                <td><?php echo ($match['m_ref_com']); ?></td>
            </tr>
            <tr>
                <td>Home Goals</td>
                <td><?php echo ($match['m_homeg']); ?></td>
            </tr>
            <tr>
                <td>Guest Goals</td>
                <td><?php echo ($match['m_guestg']); ?></td>
            </tr>

            </tr>
            </tbody>
        </table>


</div>
</div>
</div>




@stop
