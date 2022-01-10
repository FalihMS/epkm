<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereDate(string $toDateString, string $string, string $string1)
 * @method static select(string $string)
 */
class Term extends Model
{
    public $timestamps = false;
    public function term(){
        return $this->belongsTo('App/Session');

//            pkmKC 2019/2020 - Ganjil
    }
}
