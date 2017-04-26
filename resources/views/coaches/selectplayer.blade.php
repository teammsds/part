@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                <div class="panel-heading">
                    <h4 style= "color: black">Select Players for Match</h4>
                      </div>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="bg-info">
                        <th>Name </th>
                        <th>Status</th>
                        <th colspan="3">Actions</th>

                    </tr>
                    </thead>

                <tbody>

               @foreach ($team->players as $player)
                <tr style="font-size:11px">
                <td>{{ $player->p_fname }}  {{ $player->p_lname }}</td>

                <td>{{ $player->p_estatus }}</td>



                    <td>
                        {!! Form::open(['method' => 'GET', 'action'=>['PlayerselectController@add', $match->id,$team->id,$player->id,1]]) !!}
                        {!! Form::submit( 'Add to Match', ['class' => 'btn btn-danger btn-sm'])!!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'GET', 'action'=>['PlayerselectController@add', $match->id,$team->id,$player->id,2]]) !!}
                        {!! Form::submit( 'Remove from Match', ['class' => 'btn btn-danger btn-sm'])!!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                    <?php $idp = $player->id; ?>

                        @foreach($match->matchplayers as $select)
                            @if($idp == $select->player_id)

                                    <?php echo "Playing" ?>
                            @endif
                        @endforeach

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
