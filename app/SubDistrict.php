<?php

namespace App;

use App\District;
use App\Division;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
        'division_id',
        'district_id',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
