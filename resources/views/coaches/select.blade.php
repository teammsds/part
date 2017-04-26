@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                <div class="panel-heading">
                    <h4 style= "color: black;text-align:center">Select Match</h4>
                      </div>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i></i>Select Match<span class="caret"></span></a>
                    <ul class="dropdown-menu multi level" role="menu">
                        @foreach($tournament->matches as $match)
                            @foreach($match->teams as $teamm)
                                @if ($teamm->id == $team->id)
                                    <li style="text-align:center;margin-left:auto;margin-right:auto"><a href="{{url('/selectplayer',$match->id)}}"><i class="fa fa-btn fa-fw fa-map-marker"></i>{{$match->m_number}}</a>
                                @endif
                            @endforeach
                        @endforeach
                        {{--<li class="divider"></li>--}}
                        {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
                    </ul>
                </li>



            </div>
        </div>
    </div>
</div>
@endsection
