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


    
    public function subcate()
    {
        return $this->hasMany(NewsPost::class,'cate_id','id');
    }

  

   
}
