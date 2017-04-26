<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=[
        's_number',
        's_name',
        's_street',
        's_city',
        's_state',
        's_zip',
        's_contact',
        's_email',
        's_phone',
    ];

    public function teams()
    {
        return $this->hasMany('App\Team');

    }

    public function players()
    {
        return $this->hasMany('App\Player');

    }
    //
}
