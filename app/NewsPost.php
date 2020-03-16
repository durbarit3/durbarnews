<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{

	public function Cate()
    {
       return $this->belongsTo('App\Category', 'cate_id', 'id');
    }
    public function SubCate()
    {
       return $this->belongsTo('App\SubCategory', 'subcategory_id', 'id');
    }

    // public function division()
    // {
    //    return $this->belongsTo('App\Division', 'division_id', 'id');
    // }
    // public function district()
    // {
    //    return $this->belongsTo('App\District', 'division_id', 'id');
    // }
    // public function subdistrict()
    // {
    //    return $this->belongsTo('App\SubDistrict', 'division_id', 'id');
    // }
}
