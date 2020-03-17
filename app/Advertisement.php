<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public function position()
    {
        return $this->belongsTo('App\AdvertisementPosition', 'position_id', 'id');

    }
}
