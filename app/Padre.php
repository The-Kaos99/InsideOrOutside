<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    protected $fillable=['nombre','apellidos','email','pass'];
}
