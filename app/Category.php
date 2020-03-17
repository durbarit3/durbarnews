<?php

namespace App;

use App\Gallery;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
