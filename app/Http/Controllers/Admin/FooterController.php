<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Logo;
use App\OurSay;
use App\Unique;
use Illuminate\Http\Request;
use Image;

class FooterController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Update contact information

    public function contactInformation(Request $request)
    {

        $contact = Unique::where('key','contact')->select('info')->first();

        return view('admin.footer.contact_info',compact('contact'));
    }


    // contact info update

    public function contactInformationupdate(Request $request)
    {

        

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phoneone'=>'required',
            'phonetwo'=>'required',
            'telephone'=>'required',
            'email'=>'required',
        ]);

        Unique::where('key','contact')->first()->update([
            'info'=>$request->except('_token'),
        ]);

        $notification = array(
            'messege' => 'Contract Information Update successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // seo setting area start


    public function seoSetting ()
    {
        $seo = Unique::where('key','seo')->select('info')->first();
        return view('admin.setting.seo_setting',compact('seo'));
    }

    // update setting

    public function seoSettingUpdate(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'keyword'=>'required',
            'description'=>'required',
        ]);


        Unique::where('key','seo')->first()->update([
            'info'=>$request->except('_token'),
        ]);

        $notification = array(
            'messege' => 'SEO Information Update successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // social setting

    public function socialSetting()
    {
        $social = Unique::where('key','social')->select('info')->first();
        return view('admin.setting.social_setting',compact('social'));
    }

    // social update
    public function socialSettingUpdate(Request $request)
    {
        
        $request->validate([
            'facebook'=>'required',
        ]);

        
       

        $social=Unique::where('key','social')->first()->update([
            'info'=>$request->except('_token'),
        ]);
      

        if($social){

            $notification = array(
                'messege' => 'Social Information Update successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Social Information Update Failed!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
       
    }

    // logo insert area start

    public function logoIndex()
    {
        $logos =Logo::first();
        
        return view('admin.logo.logo',compact('logos'));
    }

    // logo store area start

    public function logoStore(Request $request)
    {

        

       $request->validate([
           'frontlogo'=>'nullable',
           'favicon'=>'nullable',
           'adminlogo'=>'nullable',
           'loginbanner'=>'nullable',
       ]);



       $logos = Logo::first();

      
       
       // intervenation image upload update
        if ($request->hasFile('frontlogo')) {
          
            $link = base_path('public/admins/images/logo/') . $logos->frontlogo;
            unlink($link);
        
            $frontlogo = $request->file('frontlogo');
            $front = time().'front'. '.' . $frontlogo->getClientOriginalExtension();
            Image::make($frontlogo)->resize(250, 60)->save(base_path('public/admins/images/logo/' . $front), 100);
            $logos->frontlogo = $front;
            $logos->save();
            
        }
        if($request->hasFile('favicon')){
            $link = base_path('public/admins/images/logo/') . $logos->favicon;
            unlink($link);
            $favicon = $request->file('favicon');
            $fav = time() .'fav'.'.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(64, 64)->save(base_path('public/admins/images/logo/' . $fav), 100);
            $logos->favicon = $fav;
            $logos->save();
            

        }
        if($request->hasFile('adminlogo')){
            $link = base_path('public/admins/images/logo/') . $logos->adminlogo;
            unlink($link);
            
            $adminlogo = $request->file('adminlogo');
            $admin = time().'admin'. '.' . $adminlogo->getClientOriginalExtension();
            Image::make($adminlogo)->resize(220, 40)->save(base_path('public/admins/images/logo/' . $admin), 100);
            $logos->adminlogo = $admin;
            $logos->save();

        }
        if($request->hasFile('loginbanner')){
            $link = base_path('public/admins/images/logo/') . $logos->loginbanner;
            unlink($link);
            $loginbanner = $request->file('loginbanner');
            $login = time().'login'. '.' . $loginbanner->getClientOriginalExtension();
            Image::make($loginbanner)->resize(800, 600)->save(base_path('public/admins/images/logo/' . $login), 100);
            $logos->loginbanner = $login;
            $logos->save();
        }

        $notification = array(
            'messege' => 'Logo Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    // our say area start

    public function ourSayIndex ()
    {
        $oursay = OurSay::first();
        return view('admin.oursay.oursay',compact('oursay'));
    }

    // our store

    public function ourSayStore(Request $request)
    {
        

        $data =$request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'file',
        ]);

        $oursay = OurSay::first();
        $oursay->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        if($request->hasFile('image')){
            $link = base_path('public/admins/images/oursay/') . $oursay->image;
            unlink($link);
            $image = $request->file('image');
            $imagename = time().'oursay'. '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(160, 80)->save(base_path('public/admins/images/oursay/' . $imagename), 100);
            $oursay->image = $imagename;
            $oursay->save();
        }


        $notification = array(
            'messege' => 'Our Say Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    
}
