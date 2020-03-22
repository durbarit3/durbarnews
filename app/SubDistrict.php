<?php

namespace App;

use App\District;
use App\Division;
use App\NewsPost;
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

    public function news_posts()
    {
        return $this->hasMany(NewsPost::class, 'id','subdistrict_id');
    }

}
