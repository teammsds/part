<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable=[
        'f_number',
        'f_name',
        'f_street',
        'f_city',
        'f_state',
        'f_zip',
        'f_oworg',
        'f_conname',
        'f_conemail',
        'f_conphone',
        'f_notes',
    ];

    public function matches()
    {
        return $this->hasMany('App\Match');

    }

}
