<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable=[
    'to_number',
    'to_name',
    'to_sdate',
    'to_edate',
    'to_totteams',
    'to_cname',
    'to_cemail',
    'to_cphone',
    ];

    public function matches()
    {
        return $this->hasMany('App\Match');

    }


}
