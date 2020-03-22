<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
   

    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_tag',
        'meta_description',
    ];
}
