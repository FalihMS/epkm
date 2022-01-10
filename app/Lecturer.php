<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{
    protected $fillable = ['code','name'];

    public $timestamps = false;

    public function pkm()
    {
        return $this->hasMany('App\Pkm');
    }
}
