<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchplayer extends Model
{
    protected $fillable=[
        'match_id',
        'team_id',
        'player_id',
    ];

    public function match()
    {
        return $this->belongsTo('App\Match');
    }

}
