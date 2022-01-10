<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    //
    protected $fillable = ['idPkm','session_id','comment','file','last_upload'];
    public $timestamps = false;
}
