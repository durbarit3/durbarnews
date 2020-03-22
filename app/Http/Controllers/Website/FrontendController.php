<?php

namespace App\Http\Controllers\Website;

use App\Gallery;
use App\Category;
use App\District;
use App\Division;
use App\NewsPost;
use Carbon\Carbon;
use App\SubCategory;
use App\SubDistrict;
use Illuminate\Http\Request;
use Harimayco\Menu\Facades\Menu;
use Illuminate\Support\Facades\DB;

use App\Division;
use App\District;
use App\Page;
use App\SubDistrict;
use App\Team;
use Carbon\Carbon;


use App\Http\Controllers\Controller;




class FrontendController extends Controller
{


    public function ourteam(){
        $team=Team::where('status',1)->get();
        return view('website.team.ourteam',compact('team'));
    }
    public function ourteamprofice($id){
        $data=Team::where('id',$id)->first();
        return view('website.team.teamdetails',compact('data'));
    }

    public function map(){
        return view('website.pages.deshnews');
    }

     public function mapnews($id){
         $dis=District::where('id',$id)->first();
        return view('website.pages.divisionnews',compact('dis'));
    }

    public function subdisnews($id){
        //return $id;
        $dis=SubDistrict::where('id',$id)->first();
        return view('website.pages.subdistrictnews',compact('dis'));
    }





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
    		$firstcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->first();
    		$secondcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(1)->first();
    		$division=Division::get();

            $thirdcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(2)->first();
            $forthcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(3)->first();
            $fivecate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(4)->first();
            $sixcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(5)->first();
            $sevencate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(6)->first();

            $eightcate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(7)->first();
            $ninecate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(8)->first();
            $tencate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(9)->first();
            $elevencate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(10)->first();
            $twelevecate=Category::where('is_deleted',0)->where('status',1)->select(['name','id','slug'])->skip(11)->first();

           


        

       


        $slideGalleries = Gallery::where('is_deleted', 0)->where('status', 1)->latest()->take(4)->get();
        $slideUnderGalleries = Gallery::with('category')->where('is_deleted', 0)->where('status', 1)->latest()->skip(4)->take(4)->get();

        $latestNewsPosts = NewsPost::where('status', 1)->where('is_deleted', 0)->latest()->take(6)->get();
        return view('website.home.home', compact('bigthumpost',
        'smallpost',
        'smallsecondpost',
        'smalltherdpost',
        'smallforthpost',
        'videopostlatest',
        'videopostpopular',
        'videopostla',
        'firstcate',
        'secondcate',
        'division',
        'thirdcate',
        'forthcate',
        'fivecate',
        'sixcate',
        'sevencate',
        'eightcate',
        'ninecate',
        'tencate',
        'elevencate',
        'twelevecate',
        'slideGalleries',
        'slideUnderGalleries',
        'latestNewsPosts'
        ));

    }


    // site menu area start from here

    public function siteMenu()
    {
        return $public_menu = Menu::getByName('Public');
    }


    // all category data show

    public function allCategory()
    {

        $categores = Category::where('is_deleted', 0)->orderBy('id', 'DESC')->get();


        return view('website.category.allcategory', compact('categores'));
    }


    // single category start from here

    public function category($slug)
    {


        $categoreid = Category::where('is_deleted', 0)->where('slug', $slug)->orderBy('id', 'DESC')->first()->id;


        $propolerpostsbig = NewsPost::where('cate_id', $categoreid)->where('is_deleted', 0)->where('status', 1)->whereNotNull('popular_news')->limit(1)->orderBy('popular_news', 'DESC')->first();

        $propolerpostssmall = NewsPost::where('cate_id', $categoreid)->where('is_deleted', 0)->where('status', 1)->whereNotNull('popular_news')->skip(1)->take(8)->orderBy('popular_news', 'DESC')->get();

        $propolerposts = NewsPost::where('cate_id', $categoreid)->where('is_deleted', 0)->where('status', 1)->whereNotNull('popular_news')->limit(9)->orderBy('popular_news', 'DESC')->get();


        $newsposts =NewsPost::where('cate_id',$categoreid)->where('is_deleted',0)->where('status',1)->orderBy('id','DESC')->simplePaginate(10);
        return view('website.category.category',compact('newsposts','slug','propolerposts','propolerpostsbig','propolerpostssmall'));

    }

    // subcategory start from here
    public function subcategory($cat, $subcat)
    {
         
        $subcates = SubCategory::where('slug',$subcat)->where('status',1)->where('is_deleted',0)->first();
        $subcatid=$subcates->id;
        $catid=$subcates->cate_id;

        $newspostsfirst =NewsPost::where('cate_id',$catid)->where('subcategory_id',$subcatid)->where('is_deleted',0)->where('status',1)->orderBy('id','DESC')->limit(1)->first();

        $newsposts =NewsPost::where('cate_id',$catid)->where('subcategory_id',$subcatid)->where('is_deleted',0)->where('status',1)->skip(1)->orderBy('id','DESC')->simplePaginate(10);

        return view('website.category.subcategory',compact('newsposts','newspostsfirst','cat','subcat'));
    }

    // details all news

    public function detailsNews($slug, $id)
    {
        $news = NewsPost::where('id', $id)->where('is_deleted', 0)->where('status', 1)->orderBy('id', 'DESC')->where('slug', $slug)->first();

        $letestnewsbig = NewsPost::where('is_deleted', 0)->where('status', 1)->limit(1)->first();
        $letestnews = NewsPost::where('is_deleted', 0)->where('status', 1)->skip(1)->take(4)->get();

        $propolerposts = NewsPost::where('is_deleted', 0)->where('status', 1)->whereNotNull('popular_news')->limit(4)->orderBy('popular_news', 'DESC')->get();
        $selectednews = NewsPost::where('is_deleted', 0)->where('status', 1)->limit(4)->orderBy('id', 'DESC')->get();



        return view('website.news.news', compact('news', 'letestnews', 'propolerposts', 'letestnewsbig', 'selectednews'));
    }

    // get district
    public function getdistrict($division_id)
    {
        $data = District::where('division_id', $division_id)->get();
        return json_encode($data);
    }
    // get district
    public function getsubdistrict($district_id)
    {
        $data = SubDistrict::where('district_id', $district_id)->get();
        return json_encode($data);
    }

    public function newssearch(Request $request)
    {
        return $request;
    }


    // division
    public function division()
    {
        return view('website.pages.divisionnews');
    }


    public function videodetails($slug, $id)
    {
        $videopost = NewsPost::where('id', $id)->first();
        $video = NewsPost::where('post_type', 2)->OrderBy('id', 'DESC')->limit(4)->get();
        $braking = NewsPost::where('is_deleted', 0)->where('status', 1)->where('braking_news', 1)->OrderBy('id', 'DESC')->limit(6)->get();
        $allnews = NewsPost::where('is_deleted', 0)->where('status', 1)->OrderBy('id', 'DESC')->limit(10)->get();
        return view('website.pages.videodetails', compact('videopost', 'video', 'braking', 'allnews'));
    }


    // pages details

public function pageDetails ($slug)
{
    $sub_pages =Page::where('slug',$slug)->first();
    return view('website.pages.sub_page',compact('sub_pages'));
}


}

