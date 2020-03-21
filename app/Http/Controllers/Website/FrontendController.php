<?php

namespace App\Http\Controllers\Website;

use App\Category;
use App\Http\Controllers\Controller;
use App\NewsPost;
use App\SubCategory;
use Illuminate\Http\Request;
use Harimayco\Menu\Facades\Menu;

use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
            
            return view('website.home.home');
            return view('website.pages.hollywood');
            // return view('website.pages.extra_category');
            // return view('website.pages.details');
            return view('website.pages.deshnews');
        
    }

    // site menu area start from here

    public function siteMenu()
    {
        return $public_menu = Menu::getByName('Public');    
    }


    // all category data show

    public function allCategory()
    {

       $categores =Category::where('is_deleted',0)->orderBy('id','DESC')->get();
       

        return view('website.category.allcategory',compact('categores'));
        
    }


    public function category($slug)
    {


        $categoreid =Category::where('is_deleted',0)->where('slug',$slug)->orderBy('id','DESC')->first()->id;
        

        $propolerpostsbig =NewsPost::where('cate_id',$categoreid)->where('is_deleted',0)->where('status',1)->whereNotNull('popular_news')->limit(1)->orderBy('popular_news','DESC')->first();

        $propolerpostssmall =NewsPost::where('cate_id',$categoreid)->where('is_deleted',0)->where('status',1)->whereNotNull('popular_news')->skip(1)->take(8)->orderBy('popular_news','DESC')->get();

        $propolerposts =NewsPost::where('cate_id',$categoreid)->where('is_deleted',0)->where('status',1)->whereNotNull('popular_news')->limit(9)->orderBy('popular_news','DESC')->get();

        $newsposts =NewsPost::where('cate_id',$categoreid)->where('is_deleted',0)->where('status',1)->orderBy('id','DESC')->simplePaginate(10);
        return view('website.category.category',compact('newsposts','slug','propolerposts','propolerpostsbig','propolerpostssmall',));
    }

    // details all news

    public function detailsNews($slug ,$id)
    {
        $news =NewsPost::where('id',$id)->where('is_deleted',0)->where('status',1)->orderBy('id','DESC')->where('slug',$slug)->first();

        $letestnewsbig = NewsPost::where('is_deleted',0)->where('status',1)->limit(1)->first();
        $letestnews = NewsPost::where('is_deleted',0)->where('status',1)->skip(1)->take(4)->get();

        $propolerposts =NewsPost::where('is_deleted',0)->where('status',1)->whereNotNull('popular_news')->limit(4)->orderBy('popular_news','DESC')->get();
        $selectednews =NewsPost::where('is_deleted',0)->where('status',1)->limit(4)->orderBy('id','DESC')->get();

        return view('website.news.news',compact('news','letestnews','propolerposts','letestnewsbig','selectednews'));
    }
}
