@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">

                <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">

                    <h1 style= "color: black">Team : {{$team->tm_name}}</h1>
                    {!! Form::open(['url' => 'teamlist']) !!}







                                @foreach ($team->players  as $player)

                        <fieldset style="color:white;border: 1px solid silver;background-color:white; width: 200px;align-content: center">



                                <h2><a href="{{url('/players/detail',$player->id)}}">{{ $player->p_fname}} </a></h2>

                        </fieldset>

                                    </br></br>


                                @endforeach


                </div>
                </div>





        </div>
        </div>
    </div>
    </div>
</div>
@endsection
