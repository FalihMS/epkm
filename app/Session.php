<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    public $timestamps = false;

    public function term(){
        return $this->hasMany('App/Term');

//            pkmKC 2019/2020 - Ganjil
    }
}
