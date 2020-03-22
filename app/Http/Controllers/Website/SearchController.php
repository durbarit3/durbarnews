<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\NewsPost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function keyWordSearch(Request $request)
    {
       if ($request->keyword === "") {
           return redirect()->back();
       }
       $searchNews = NewsPost::where('is_deleted', 0)->where('status', 1)->where('title', 'LIKE', "%$request->keyword%")->get();
       return view('website.search.search_result', compact('searchNews'));

    }

    public function searchPlaceWise(Request $request)
    {

        if ($request->division_id == "" AND $request->district_id == "" AND $request->subdistrict_id == "") {
            return Redirect()->back();
        }
        $searchNews = "";
        if ($request->division_id  && $request->district_id  && $request->subdistrict_id) {
            $searchNews = NewsPost::where('is_deleted', 0)
            ->where('status', 1)
            ->where('division_id', $request->division_id)
            ->where('district_id', $request->district_id)
            ->where('subdistrict_id', $request->subdistrict_id)
            ->get();
            return view('website.search.search_result', compact('searchNews'));
        }elseif ($request->division_id  && $request->district_id) {
            $searchNews = NewsPost::where('is_deleted', 0)
            ->where('status', 1)
            ->where('division_id', $request->division_id)
            ->where('district_id', $request->district_id)
            ->get();
            return view('website.search.search_result', compact('searchNews'));
        }elseif ($request->division_id) {
            $searchNews = NewsPost::where('is_deleted', 0)
            ->where('status', 1)
            ->where('division_id', $request->division_id)
            ->get();
            return view('website.search.search_result', compact('searchNews'));
        }
        return view('website.search.search_result', compact('searchNews'));

    }
}
