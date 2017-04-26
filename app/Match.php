<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable=[
        'user_id',
        'm_number',
        'm_time',
        'm_date',
        'm_score',
        'm_homeid',
        'm_guestid',
        'm_ref_com',
        'm_homeg',
        'm_guestg',
        'field_id',
        'tournament_id',
    ];

    public function field()
    {
        return $this->belongsTo('App\Field');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }

    public function referees()
    {
        return $this->belongsToMany('App\Referee');
    }

    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }
    public function fouls()
    {
        return $this->hasMany('App\Foul');

    }
    public function matchplayers()
    {
        return $this->hasMany('App\Matchplayer');

    }

}
