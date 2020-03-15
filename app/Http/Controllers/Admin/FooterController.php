<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Unique;
use Illuminate\Http\Request;

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
}
