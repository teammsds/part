<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $fillable=[
        'wins',
        'losses',
        'draws',
        'gfor',
        'gaga',
        'points',
        't_name',

    ];



}
