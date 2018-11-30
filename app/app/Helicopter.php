<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helicopter extends Model
{
    protected $fillable = [
        'type','name','speed','color'
    ];
}
