<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'xsis_movie';

    protected $guarded = ['id'];
}
