<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Poll;
use Carbon\Carbon;
use Session;


class PollController extends Controller
{
	   public function __construct(){

	   }
	   // 
	   public function index(){
	   	$poll=Poll::OrderBy('id','DESC')->get();
	   	return view('admin.poll.index',compact('poll'));
	   }
	   // 
	   public function store(Request $request){
		   	$insert=Poll::insert([
		   		'poll'=>$request['poll'],
		   		'created_at'=>Carbon::now()->toDateTimeString(),
		   	]);
		     if($insert){
	              $notification=array(
	                'messege'=>'Poll Insert Successfully',
	                'alert-type'=>'success'
	                 );
	             return redirect()->back()->with($notification);
	            }
	        else{
	            $notification=array(
	                'messege'=>'Poll Insert failed',
	                'alert-type'=>'error'
	                 );
	             return redirect()->back()->with($notification);
	        }
	   }

	   // active
	   public function active($id){
	   	$deactive=Poll::where('id',$id)->update([
	   		'status'=>'1',
	   		'updated_at'=>Carbon::now()->toDateTimeString(),

	   	]);
	   	 if($deactive){
	              $notification=array(
	                'messege'=>'Poll Active Successfully',
	                'alert-type'=>'success'
	                 );
	             return redirect()->back()->with($notification);
	            }
	        else{
	            $notification=array(
	                'messege'=>'Poll active failed',
	                'alert-type'=>'error'
	                 );
	             return redirect()->back()->with($notification);
	        }
	   }
	   //deactive
	   public function deactive($id){
	   	//return $id;
	   	$deactive=Poll::where('id',$id)->update([
	   		'status'=>'0',
	   		'updated_at'=>Carbon::now()->toDateTimeString(),

	   	]);
	   	 if($deactive){
	              $notification=array(
	                'messege'=>'Poll DeActive Success',
	                'alert-type'=>'success'
	                 );
	             return redirect()->back()->with($notification);
	            }
	        else{
	            $notification=array(
	                'messege'=>'Poll DeActive failed',
	                'alert-type'=>'error'
	                 );
	             return redirect()->back()->with($notification);
	        }

	   }
	    //delete
	   public function delete($id){
	   	  $deactive=Poll::where('id',$id)->delete();
	   	 if($deactive){
	              $notification=array(
	                'messege'=>'Poll Delete Success',
	                'alert-type'=>'success'
	                 );
	             return redirect()->back()->with($notification);
	            }
	        else{
	            $notification=array(
	                'messege'=>'Poll Delete failed',
	                'alert-type'=>'error'
	                 );
	             return redirect()->back()->with($notification);
	        }
	   }

	   // 
	   public function multiDelete(Request $request){
	   	$deleteid = $request['delid'];
            if ($deleteid) {
                $deletpost = Poll::whereIn('id', $deleteid)->delete();
                if ($deletpost) {
                    $notification = array(
                        'messege' => 'Multiple Delete Successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'messege' => 'Multiple Delete Faild',
                        'alert-type' => 'errors'
                    );
                    return Redirect()->back()->with($notification);
                }
            } else {
                $notification = array(
                    'messege' => 'Nothing To Delete',
                    'alert-type' => 'info'
                );
                return Redirect()->back()->with($notification);
            }
	   }



	   // poll result
	   public function pollresult(){
	   	return view('admin.poll.polldetails');
	   }
}
