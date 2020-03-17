<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    // show all user data

    public function userIndex()
    {
        $users =Admin::all();
        return view('admin.user.index',compact('users'));
        
    }

    //show create page

    public function userCreate()
    {
        return view('admin.user.user');
    }

    // store user

    public function userStore(Request $request)
    {
       
 
        $remember_token = rand(100000,900000);
        $request->validate(
           [
               'adminname' => 'required',
               'email' => 'required|email|unique:admins,email',
               'password' => 'required|confirmed|min:6',
           ],
           [
               'name.required' => 'Name must not be empty!',
               'email.required' => 'Email must not be empty!',
           ]

       );
       
       Admin::insert([
           'adminname' => $request->adminname,
           'email' => $request->email,
           'phone' => $request->phone,
           'designation' => $request->designation,
           'email_verified_at' => md5($request->email),
           'remember_token' => $remember_token,
           'verification_code' => $remember_token,
           'password' => bcrypt($request->password),
           'newspost'=>$request->newspost,
           'videonews'=>$request->videonewspost,
           'pages'=>$request->pages,
           'managesection'=>$request->managesection,
           'category'=>$request->category,
           'subcategory'=>$request->subcategory,
           'division'=>$request->division,
           'district'=>$request->district,
           'subdistrict'=>$request->subdistrict,
           'settings'=>$request->settings,
           'writter'=>$request->writters,
           'color'=>$request->color,
           'extra'=>$request->extra,
           'footer'=>$request->footer,
           'user'=>$request->user,
           'advertisement'=>$request->advertisement,
           'notice'=>$request->notice,
           'status'=>1,
           'created_at' => Carbon::now(),
           
       ]);
       $notification = array(
        'messege' => 'User Created Successfully!',
        'alert-type' => 'success'
    );
    return Redirect()->route('admin.user.index')->with($notification);
    }

    // edit user

    public function userEdit ($id)
    {
        $users =Admin::where('id',$id)->first();
        return view('admin.user.edit',compact('users'));
    }

    // updatte user

    public function userUpdate(Request $request)
    {
        
        $request->validate(
            [
                'adminname' => 'required',
                'email' => 'required|email|unique:admins,email,' .$request->id,
                'password' => 'confirmed',
            ],
            [
                'name.required' => 'Name must not be empty!',
                'email.required' => 'Email must not be empty!',
            ]
 
        );

        $remember_token = rand(100000,900000);
        
        $admin = Admin::findOrFail($request->id);
        $admin->update([
            'adminname' => $request->adminname,
           'email' => $request->email,
           'phone' => $request->phone,
           'designation' => $request->designation,
           'email_verified_at' => md5($request->email),
           'remember_token' => $remember_token,
           'verification_code' => $remember_token,
           'password' => bcrypt($request->password),
           'newspost'=>$request->newspost,
           'videonews'=>$request->videonewspost,
           'pages'=>$request->pages,
           'managesection'=>$request->managesection,
           'category'=>$request->category,
           'subcategory'=>$request->subcategory,
           'division'=>$request->division,
           'district'=>$request->district,
           'subdistrict'=>$request->subdistrict,
           'settings'=>$request->settings,
           'writter'=>$request->writters,
           'color'=>$request->color,
           'extra'=>$request->extra,
           'footer'=>$request->footer,
           'user'=>$request->user,
           'advertisement'=>$request->advertisement,
           'notice'=>$request->notice,
           'status'=>1,
        ]);

        $notification = array(
            'messege' => 'User Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.user.index')->with($notification);
    }

    // user deleted

    public function userDelete($id)
    {

        Admin::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'User Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.user.index')->with($notification);
    }


    // change user status

    public function userStatusUpdate ($id)
    {
        $statusChange = Admin::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'User Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'User Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    
}
