<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'slug', 'poster', 'title', 'synopsis'
    ];
    
}
