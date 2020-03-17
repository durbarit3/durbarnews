<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SectionManage;
use Carbon\Carbon;
use Session;
use Image;

class SectionManageController extends Controller
{
    public function __construct(){

    }
    // index
    public function index(){
    	$allsection=SectionManage::get();
    	return view('admin.sectionmanage.index',compact('allsection'));
    }

    public function deactive($id){
    	$deactive=SectionManage::where('id',$id)->update([
    		'status'=>'0',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($deactive){
    		 $notification=array(
                'messege'=>'Section DeActive Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
    	}else{
    		 $notification=array(
                'messege'=>'Section DeActive Error',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
    	}
    }
     public function active($id){
    	$deactive=SectionManage::where('id',$id)->update([
    		'status'=>'1',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($deactive){
    		 $notification=array(
                'messege'=>'Section DeActive Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
    	}else{
    		 $notification=array(
                'messege'=>'Section DeActive Error',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
    	}
    }
}
