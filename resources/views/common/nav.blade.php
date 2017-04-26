<nav class="navbar navbar-inverse navbar-static-top"  role= "navigation">
    <div class="container"> 
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <div class="pull-left"> <img src="images/ball1.png" style="height: 45px;width: 45px"></div>
            <a class="navbar-brand" href="{{ url('/') }}">
               Home
            </a>

            </div>
          <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!--  Buttons at navbar -->
             <ul class="nav navbar-nav" style="font-size:17px">
             
            <li><a  href="{{action('HomeController@display')}}">About MSA</a></li>
                 <li><a href="{{action('LeaderboardController@index')}}">Table</a></li>
                 <li><a href="{{action('StatisticController@index')}}">Stats</a></li>
        
            </ul>

        
            @if (Auth::check())
                    <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav" >
                
                {{-- Menu for Users with Administration Role Only --}}
                @role('admin')
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-btn fa-fw fa-cogs" ></i>Administration<span class="caret"></span></a>
                    <ul class="dropdown-menu multi level" role="menu" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                        <li><a href="{{ url('/users') }}"><i class="fa fa-btn fa-fw fa-user"></i>Users</a></li>
                        <li><a href="{{ url('/roles') }}"><i class="fa fa-btn fa-fw fa-users"></i>Roles</a></li>
                        <li><a href="{{ action('SchoolController@index') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>Schools</a></li>
                        <li><a href="{{ action('TeamController@index') }}"><i class="fa fa-btn fa-fw fa-users"></i>Teams & Coaches</a></li>
                        <li><a href="{{ action('PlayerController@index') }}"><i class="fa fa-btn fa-fw fa-user"></i>Players</a></li>
                        <li><a href="{{ action('FieldController@index') }}"><i class="fa fa-btn fa-fw fa-map-marker"></i>Fields</a>
                        <li><a href="{{ action('MatchController@index') }}"><i class="fa fa-btn fa-fw fa-map-marker"></i>Matches</a>
                        <li><a href="{{ action('TournamentController@index') }}"><i class="fa fa-btn fa-fw fa-map-marker"></i>Tournaments</a>
                        <li><a href="{{ action('RefereeController@index') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>Referees</a></li>

                       
                        {{--<li class="divider"></li>--}}
                        {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
                        
                    </ul>
                    </li>
                @endrole
                    </ul>
              {{-- Menu for Users with referee Role Only --}}   
                @role('referee')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-btn fa-fw fa-cogs"></i>Functions<span class="caret"></span></a>
                        <ul class="dropdown-menu multi level" role="menu" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                            <li><a href="{{ action('MatchController@index') }}"><i class="fa fa-btn fa-fw fa-map-marker"></i>Matches</a>
                            <li style="display:inline"><a href="{{ action('FoulController@index') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>Fouls</a></li>
                            <li style="display:inline"><a href="{{ action('RprofileController@index') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>Profile</a></li>
                            <li style="display:inline"><a href="{{ action('RefereematchController@index') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>My Matches</a></li>


                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
                        </ul>
                    </li>
                        {{--<li class="divider"></li>--}}
                        {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}


                @endrole

              {{-- Menu for Users with player Role Only --}}
                @role('player')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-btn fa-fw fa-cogs"></i>Functions<span class="caret"></span></a>
                    <ul class="dropdown-menu multi level" role="menu" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                        <li><a href="{{ action('PprofileController@index') }}"><i class="fa fa-btn fa-fw fa-user"></i>Profile</a></li>
                        <li style="display:inline"><a href="{{ action('PlayermatchController@index') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>My Matches</a></li>


                        {{--<li class="divider"></li>--}}
                        {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
                    </ul>
                </li>
                {{--<li class="divider"></li>--}}
                {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}


                @endrole
                        @role('coach')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-btn fa-fw fa-cogs"></i>Functions<span class="caret"></span></a>
                            <ul class="dropdown-menu multi level" role="menu" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                                <li><a href="{{ action('PlayerselectController@index') }}"><i class="fa fa-btn fa-fw fa-map-marker"></i>Players for Match</a>
                                <li style="display:inline"><a href="{{ action('FoulController@foullist') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>Fouls List</a></li>
                                <li style="display:inline"><a href="{{ action('TeamController@coachteam') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>My Team Matches</a></li>
                                <li style="display:inline"><a href="{{ action('PListController@index') }}"><i class="fa fa-btn fa-fw fa-graduation-cap" ></i>Players List</a></li>


                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
                            </ul>
                        </li>
                        {{--<li class="divider"></li>--}}
                        {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}


                        @endrole
            </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    {{--<li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-lg fa-fw fa-sign-in"></i>Login</a></li>--}}
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" >
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-fw fa-sign-out"></i>Logout</a></li>
                            <li><a href="{{ url('/change-password') }}"><i class="fa fa-btn fa-fw fa-lock"></i>Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/help') }}"><i class="fa fa-btn fa-fw fa-question-circle"></i>Help</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>    
               
    </div>
</nav>
