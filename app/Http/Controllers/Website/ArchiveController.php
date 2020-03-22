<?php

namespace App\Http\Controllers\Website;

use App\Category;
use App\District;
use App\Division;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsPost;
use App\SubDistrict;

class ArchiveController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_deleted', 0)->where('status', 1)->select(['id', 'name'])->get();
        $subCategories = SubCategory::where('is_deleted', 0)->where('status', 1)->select(['id', 'name'])->get();
        $divisions = Division::select('id', 'name_bn')->get();
        $newsPosts = NewsPost::with('Cate')
        ->where('is_deleted', 0)
        ->where('status', 1)
        ->select(['id', 'cate_id', 'title', 'slug', 'image', 'post_type', 'created_at'])
        ->paginate(20);

        return view('website.pages.arcrive', compact('categories', 'subCategories', 'divisions', 'newsPosts'));
    }

    public function archiveSearch(Request $request)
    {
        $categories = Category::where('is_deleted', 0)->where('status', 1)->select(['id', 'name'])->get();
        $divisions = Division::select('id', 'name_bn')->get();
        $searchNews = '';

        if ($request->category_id === "" AND $request->keyword === "" AND $request->division_id === "" AND $request->district_id === "" AND $request->sub_district_id === "") {
            return Redirect()->back();
        }

        if ($request->category_id && $request->keyword && $request->division_id && $request->district_id && $request->sub_district_id) {
            $searchNews = NewsPost::where('cate_id', $request->category_id)
            ->where('division_id', $request->division_id)
            ->where('district_id', $request->district_id)
            ->where('subdistrict_id', $request->sub_district_id)
            ->where('title', 'LIKE', "%$request->keyword%")
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif ($request->category_id && $request->keyword && $request->division_id && $request->district_id) {
            $searchNews = NewsPost::where('cate_id', $request->category_id)
            ->where('division_id', $request->division_id)
            ->where('title', 'LIKE', "%$request->keyword%")
            ->where('district_id', $request->district_id)
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif ($request->category_id && $request->keyword && $request->division_id) {
            $searchNews = NewsPost::where('cate_id', $request->category_id)
            ->where('division_id', $request->division_id)
            ->where('title', 'LIKE', "%$request->keyword%")
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif($request->division_id && $request->district_id && $request->sub_district_id) {
            $searchNews = NewsPost::where('division_id', $request->division_id)
            ->where('district_id', $request->district_id)
            ->where('subdistrict_id', $request->sub_district_id)
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif($request->division_id && $request->district_id) {
            $searchNews = NewsPost::where('division_id', $request->division_id)
            ->where('district_id', $request->district_id)
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif ($request->category_id && $request->keyword) {
            $searchNews = NewsPost::where('cate_id', $request->category_id)
            ->where('title', 'LIKE', "%$request->keyword%")
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif($request->division_id) {
            $searchNews = NewsPost::where('division_id', $request->division_id)
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif($request->category_id) {
            $searchNews = NewsPost::where('cate_id', $request->category_id)
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }elseif($request->keyword) {
            $searchNews = NewsPost::where('title', 'LIKE', "%$request->keyword%")
            ->where('is_deleted', 0)
            ->where('status', 1)
            ->get();
            return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
        }

        return view('website.pages.arcrive', compact('searchNews', 'categories', 'divisions'));
    }

    public function getDistrictByDivisionIdByAjax($divisionId)
    {

        $districts = District::where('division_id', $divisionId)->get();
        return response()->json($districts);
    }
    public function getSubDistrictByDistrictIdByAjax($districtId)
    {

        $subDistricts = SubDistrict::where('district_id', $districtId)->get();
        return response()->json($subDistricts);
    }


}
