<?php

namespace App;

use App\District;
use App\SubDistrict;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

    protected $fillable = [
        'name_en',
        'name_bn',
        'slug',
        'status',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
    
    public function subDistricts()
    {
        return $this->hasMany(SubDistrict::class);
    }
}
