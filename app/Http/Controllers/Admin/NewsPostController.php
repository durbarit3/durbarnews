<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Division;
use App\District;
use App\SubDistrict;

class NewsPostController extends Controller
{
     public function __construct(){

	   }
	   // 
	   public function index(){
	   	return view('admin.newspost.index');
	   }

	   // create
	   public function create(){
	   	$allcategory=Category::where('is_deleted',0)->where('status',1)->get();
	   	$alldivision=Division::where('is_deleted',0)->where('status',1)->get();
	   	return view('admin.newspost.create',compact('allcategory','alldivision'));
	   }
	   // get subcate ajax
	   public function getsubcate($cate_id){
	   		$data=SubCategory::where('is_deleted',0)->where('status',1)->where('cate_id',$cate_id)->get();
	   		return json_encode($data);
	   }
	   // get district
	   public function getdistrict($division_id){
	   		$data=District::where('is_deleted',0)->where('status',1)->where('division_id',$division_id)->get();
	   		return json_encode($data);
	   }
	   //get sub district
	   public function getsubdistrict($district_id){
	   		$data=SubDistrict::where('is_deleted',0)->where('status',1)->where('district_id',$district_id)->get();
	   		return json_encode($data);
	   }
	   // store news
	   public function store(Request $request){
	   		$this->validate($request,[
                'title' => 'required',
             
                 ],[

                 ]);
	   }
}
