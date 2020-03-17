<?php

namespace App;

use App\Category;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function galleryPhotos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }
}
