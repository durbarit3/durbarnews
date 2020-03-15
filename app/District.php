<?php

namespace App;


use App\Division;
use App\SubDistrict;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name_bn',
        'slug',
        'status',
        'division_id',
    ];

    public function division()
    {
        return $this->belongsTo('App\Division', 'division_id', 'id');

    }
    public function subDistricts()
    {
        return $this->hasMany(SubDistrict::class);
    }
}
