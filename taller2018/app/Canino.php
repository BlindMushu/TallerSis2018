<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canino extends Model
{
    protected $table = 'caninos';

    //Muchos caninos 1 usuario
    public function user(){
        return $this->belongsTo('App\User');
    }
}
