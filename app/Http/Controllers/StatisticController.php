<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leaderboard;
use App\Statistic;
use App\Foul;
use App\Player;
use Auth;
use DB;
class StatisticController extends Controller

{
    public function index()
    {
        $leaderboard = Leaderboard::orderBy('gfor','desc')->first();

        if (is_null($leaderboard)){echo "No Entries in Leaderboard";}
        else{$tname=$leaderboard->t_name;}

        $maxfouls = Foul::orderBy('r_card','desc')->orderBy('y_card','desc')->orderBy('player_id','desc')->get();
        if (is_null($maxfouls)){echo "No Fouls Exists";}
        else {
            $i=0;
            $pid = 0;
            $playerid=0;
            foreach($maxfouls as $maxfoul){
                if($maxfoul['player_id']== $pid){
                $maxfoul.$i= $maxfoul.$i + $maxfoul['y_card'] + $maxfoul['r_card'];}
                else{
                    $i=$i+1;
                    $maxfoul.$i= $maxfoul['y_card'] + $maxfoul['r_card'];
                    $playerid.$i = $maxfoul['player_id'];
                    $pid=$maxfoul['player_id'];
                }
                $k = 1;
                $max = $maxfoul.$k;
                $playernum = $playerid.$k;
                for ($j = 1; $j <= $i; $j++) {
                    if ($maxfoul . $j > $maxfoul . $k) {
                        $max = $maxfoul . $j;
                        $playernum = $playerid.$j;
                    }
                }
            }
            Statistic::truncate();
            $id = $maxfoul->player_id;
            $player = Player::where('id','=',$playernum)->first();
                $statistic = new Statistic();
                $statistic['m_scored'] = $tname;
                $statistic['m_fouls'] = $player->p_fname;
                $statistic->save();
                return view('matches.statistics', compact('statistic'));


        }
    }

}
