<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {

        // return view('website.home.home');
        return view('website.pages.hollywood');
        // return view('website.pages.extra_category');
        // return view('website.pages.details');
        return view('website.pages.deshnews');

    }

    public function archive()
    {

        return view('website.pages.arcrive');
    }

}
