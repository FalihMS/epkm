<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassLecturer extends Model
{
    protected $fillable = ['class','lecturer_id'];

    public $timestamps = false;
}
