<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Image;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    // show all team mamber
    public function teamIndex()
    {
        $teams = Team::all();
        return view('admin.team.team',compact('teams'));
    }

    // team store

    public function teamStore (Request $request)
    {
        $team =Team::create($request->all());

        if($request->hasFile('image')){
            
            $image = $request->file('image');
            $imagename = time().'team'. '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(160, 80)->save(base_path('public/admins/images/team/' . $imagename), 100);
            $team->image = $imagename;
            $team->save();
        }

        
        $notification = array(
            'messege' => 'Team Mamber Created Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
