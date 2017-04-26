@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:18px;">
                    <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
        {!! Form::open(['url' => 'matches']) !!}
                        <h1> Match {{$match->m_number}}</h1>
        <table class="table table-responsive table-stripped">
            <tbody>
            <tr>

                @foreach ($match->teams as $team)
                    <td>
                        <table>

                            <tr><h1 style="color:darkgoldenrod"> Team : {{ $team->tm_name}}</h1></tr>
                            <tr> <h3 style="align:left"><u>Players</u></h3> </tr>

                                        @foreach ($match->matchplayers as $matchplayer)
                                            <?php $playerr = null;?>


                                             @if($matchplayer->team_id == $team->id)
                                                <?php $idp = $matchplayer->player_id; ?>
                                                @foreach($team->players as $player)
                                                    @if($player->id == $idp)
                                                        <?php $playerr = $player; ?>
                                                        <tr><h2><a href="{{url('/players/detail',$playerr->id)}}">{{ $playerr->p_fname}} </a></h2></tr>

                                                    @endif

                                                @endforeach

                                            @endif

                                        @endforeach

                            <tr> <h3 style="align:left"> <u style="color:black">Coach: </u> {{ $team->tm_coach}}</h3></tr>
                        </table>
                    </td>
                @endforeach


            </tr>

            <tr><td colspan="2"><h3 style="color:darkgoldenrod">Referees</h3></td></tr>
            <tr>
            @foreach ($match->referees as $referee)
                <td><h2 style="color:blue"><a href="#"> {{ $referee->r_fname}} </a></h2></td>
            @endforeach
            </tr>


            </tbody>
        </table>


    </div>
                </div>
            </div>
        </div>
    </div>







@stop
