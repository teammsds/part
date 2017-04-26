@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">

                <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">

                    <h1 style= "color: black">Teams</h1>
                    {!! Form::open(['url' => 'teamlist']) !!}







                                @foreach ($teams as $team)

                        <fieldset style="color:white;border: 0px solid silver; display: inline-block;">

                                    <h3 style="color:darkgoldenrod"> <a href="{{url('/playerlist',$team->id)}}"> {{ $team->tm_name}}</a></h3>
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
