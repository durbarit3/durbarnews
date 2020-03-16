<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function galleryPhotos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }
}
