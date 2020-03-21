<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsPost;
use App\Category;
use App\Division;
use App\District;
use App\SubDistrict;
use Carbon\Carbon;


class FrontendController extends Controller
{
    public function index()
    {
        
    		$bigthumpost=NewsPost::OrderBy('id','DESC')->where('is_deleted',0)->where('status',1)->first();
    		$smallpost=NewsPost::OrderBy('id','DESC')->where('is_deleted',0)->where('status',1)->skip(1)->limit(2)->get();
    		$smallsecondpost=NewsPost::OrderBy('id','DESC')->where('is_deleted',0)->where('status',1)->skip(3)->limit(3)->get();
    		$smalltherdpost=NewsPost::OrderBy('id','DESC')->where('is_deleted',0)->where('status',1)->skip(6)->limit(3)->get();
    		$smallforthpost=NewsPost::OrderBy('id','DESC')->where('is_deleted',0)->where('status',1)->skip(9)->limit(3)->get();
    		$latestnews=NewsPost::OrderBy('id','DESC')->where('is_deleted',0)->where('status',1)->limit(10)->get();
    		$popularnews=NewsPost::where('popular_news',1)->where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->limit(10)->get();
    		$videopostlatest=NewsPost::where('post_type',2)->where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->first();
    		$videopostpopular=NewsPost::where('post_type',2)->where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->limit(3)->get();
    		$videopostla=NewsPost::where('post_type',2)->where('popular_news',1)->where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->limit(3)->get();
    		$firstcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->first();
    		$secondcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(1)->first();
    		$division=Division::get();

            $thirdcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(2)->first();
            $forthcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(3)->first();
            $fivecate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(4)->first();
            $sixcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(5)->first();
            $sevencate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(6)->first();

            $eightcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(7)->first();
            $ninecate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(8)->first();
            $tencate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(9)->first();
            $elevencate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(10)->first();
            $twelevecate=Category::where('is_deleted',0)->where('status',1)->select(['name','id'])->skip(11)->first();

            return view('website.home.home',compact('bigthumpost','smallpost','smallsecondpost','smalltherdpost','smallforthpost','latestnews','popularnews','videopostlatest','videopostpopular','videopostla','firstcate','secondcate','division','thirdcate','forthcate','fivecate','sixcate','sevencate','eightcate','ninecate','tencate','elevencate','twelevecate'));

            //return view('website.pages.hollywood');
            // return view('website.pages.extra_category');
            // return view('website.pages.details');
            //return view('website.pages.deshnews');
        
    }

    // get district
    public function getdistrict($division_id){
    	$data=District::where('division_id',$division_id)->get();
        return json_encode($data);
    }
     // get district
    public function getsubdistrict($district_id){
        $data=SubDistrict::where('district_id',$district_id)->get();
        return json_encode($data);
    }

    public function newssearch(Request $request){
        return $request;
    }
   
   // division
    public function division(){
        return view('website.pages.divisionnews');
    }

    public function videodetails($slug,$id){
        $videopost=NewsPost::where('id',$id)->first();
        $video=NewsPost::where('post_type',2)->OrderBy('id','DESC')->limit(4)->get();
        $braking=NewsPost::where('is_deleted',0)->where('status',1)->where('braking_news',1)->OrderBy('id','DESC')->limit(6)->get();
        $allnews=NewsPost::where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->limit(10)->get();
        return view('website.pages.videodetails',compact('videopost','video','braking','allnews'));
    }
}
