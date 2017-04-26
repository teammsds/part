 @extends('layouts.app')

@section('content')
<head>
        <style>
            body {
                background-color: lavender;
                background-image: url("http://www.vactualpapers.com/web/wallpapers/the-kick-soccer-football-sports-qhd-wallpaper/2560x2560.jpg");
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                  background color: #CCA64C;
                  
            }
        </style>
    </head>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-">
        
            <div class="page-header">
            <h1 style= "color: red ;font-size: 50px"></style>  Missouri Soccer Association </h1>
                       
        </div>
        <div class="col-lg-8 col-md-8 wow bounceInRight">
                <i class="fa fa-futbol-o" style="font-size: 30px;color:red"></i>
           <a style= "color: white;text-shadow: 2px 2px 4px #000000" href="{{ action('MatchController@index')}}" class="glow">Visit ongoing matches</a>
           <br>
           <br>
           <i class="fa fa-futbol-o" style="font-size: 30px;color:Green"></i>
           <a style= "color: white;text-shadow: 2px 2px 4px #000000" href="{{ action('TournamentController@index')}}" class="glow">Tournament List</a>
             </div>
          <div class="col-md-4 col-md-offset-2">
            
                 </div>
         
                 </div> 
            </div>
        </div>
    </div>
</div>
</header>
@endsection
