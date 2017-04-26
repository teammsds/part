<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable=[
        'm_scored',
        'm_fouls',
        'm_passes',
        'm_saves',
        'm_assists',
    ];



}
