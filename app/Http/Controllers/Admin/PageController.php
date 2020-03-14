<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use Carbon\Carbon;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Show Page list
    public function index()
    {
        $pages =Page::all();
        return view('admin.page.all',compact('pages'));
    }

    // create page

    public function create()
    {
        return view('admin.page.create');
    }

    // store page
    public function store(PageRequest $request)
    {
        $request->validated();
        Page::insert([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'messege' => 'Page Create successfully:)',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    // show single page

    public function show ($id)
    {
        $page =Page::findOrFail($id);
        return view('admin.page.show',compact('page'));
    }

    // edit page

    public function edit($id)
    {
        $page =Page::findOrFail($id);
        return view('admin.page.edit',compact('page'));
    }

    // update page

    public function update ($id, PageRequest $request)
    {
        $request->validated();
        Page::findOrFail($id)->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);

        $notification = array(
            'messege' => 'Page Update successfully:)',
            'alert-type' => 'success'
        );
        return back()->with($notification);

        
    }

    // delete page

    public function destroy ($id)
    {
        Page::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Page Delete successfully:)',
            'alert-type' => 'success'
        );
        return back()->with($notification);
        
    }

    // multi page delete

    public function multiDelete(Request $request)
    {
        $pages = $request->input('multidelete');
        if($pages >0){
            foreach($pages as $page){
                Page::findOrFail($page)->delete();
            }
        }

        $notification = array(
            'messege' => 'All Page Delete successfully:)',
            'alert-type' => 'success'
        );
        return back()->with($notification);
        
    }
    
}
