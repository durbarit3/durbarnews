<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unique extends Model
{
    protected $guarded =['id'];

    protected $casts = [
        'info' => 'object'
    ];

   
}
