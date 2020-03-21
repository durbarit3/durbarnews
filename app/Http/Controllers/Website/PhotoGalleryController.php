<?php

namespace App\Http\Controllers\Website;

use App\Gallery;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsPost;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $slideGalleries = Gallery::where('is_deleted', 0)->where('status', 1)->latest()->take(4)->get();
        $slideUnderGalleries = Gallery::with('category')->where('is_deleted', 0)->where('status', 1)->latest()->skip(4)->take(4)->get();
        $firstCategory = Category::where('is_deleted', 0)->where('status', 1)->first();
        $firstCategoryGalleries = Gallery::where('is_deleted', 0)->where('status', 1)->take(8)->get();
        return view('website.photo_gallery.index', compact('slideGalleries', 'slideUnderGalleries', 'firstCategory', 'firstCategoryGalleries'));
    }

    public function details($slug)
    {
        $latestNewsPosts = NewsPost::where('status', 1)->where('is_deleted', 0)->latest()->take(9)->get();
        $gallery = Gallery::with('category','subCategory', 'galleryPhotos')->where('slug', $slug)->firstOrFail();
        $firstCategory = Category::where('is_deleted', 0)->where('status', 1)->first();
        $firstCategoryGalleries = Gallery::where('is_deleted', 0)->where('status', 1)->take(8)->get();
        return view('website.photo_gallery.details', compact('gallery', 'latestNewsPosts', 'firstCategory', 'firstCategoryGalleries'));
    }
}
