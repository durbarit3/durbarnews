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
        $teams = Team::select('id','name','designation','email','phone','image','status')->get();
        return view('admin.team.team',compact('teams'));
    }

    // team store

    public function teamStore (Request $request)
    {
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'address'=>'required',
        ]);

        
        $team =Team::create($request->all());

        if($request->hasFile('image')){
            
            $image = $request->file('image');
            $imagename = time().'team'. '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(244,163)->save(base_path('public/admins/images/team/' . $imagename), 100);
            $team->image = $imagename;
            $team->save();
        }

        
        $notification = array(
            'messege' => 'Team Mamber Created Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // team edit

    public function teamEdit($id)
    {
        $team = Team::findOrFail($id);
        return response()->json($team);
    }

    // update team

    public function teamUpdate (Request $request)
    {
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'address'=>'required',
        ]);

        $id =$request->id;

        $team =Team::findOrFail($id);
        $team->update($request->except('id','image'));

        if($request->hasFile('image')){
            $link = public_path('admins/images/team/' . $team->image);
            unlink($link);

            $image = $request->file('image');
            $imagename = time().'team'. '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(244,163)->save(base_path('public/admins/images/team/' . $imagename), 100);
            $team->image = $imagename;
            $team->save();
        }

        $notification = array(
            'messege' => 'Team Mamber Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
        
    }

    // delete team


    public function teamDelete ($id)
    {
        Team::findOrFail($id)->delete();
        
        $notification = array(
            'messege' => 'Team Mamber Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    // status change

    public function teamStatus($id)
    {
        $statusChange = Team::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Team Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Team Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    // team multi delete

    public function teamMultiDelete (Request $request)
    {
        
        $id = $request->input('deleteId');

        if($id == NULL){

            $notification = array(
                'messege' => 'Noting to select!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);

        }else{

            Team::whereIn('id',$request->deleteId)->delete();
            $notification = array(
                'messege' => 'Team Mamber Mulit Delete Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

    }
}
