<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdvertisementPosition;
use App\Advertisement;
use Session;
use Carbon\Carbon;
use Image;

class AdvertisementController extends Controller
{
    public function __construct(){

    }
    // 
    public function index(){
    	$allad=Advertisement::where('is_deleted',0)->OrderBy('id','DESC')->get();
    	return view('admin.advertisement.index',compact('allad'));
    }
    // ad create
    public function create(){
    	$allposition=AdvertisementPosition::get();
    	return view('admin.advertisement.create',compact('allposition'));
    }


    // ad store
    public function store(Request $request){
    	$height=$request->height;
    	$width=$request->width;

    	if($request->post_type == 1){
    		$this->validate($request,[
    			'url'=>'required',
    			'start_date'=>'required',
    			'end_date'=>'required',
    			'width'=>'required',
    			'height'=>'required',
    			'advertisement_image'=>'required',
    		]);
    	}elseif($request->post_type == 2){
    		$this->validate($request,[
    			'advertisement'=>'required',
    		]);
    	}
    	
    	$data = new Advertisement;
    	$data->ad_name = $request->ad_name;
    	$data->ad_phone = $request->ad_phone;
    	$data->url = $request->url;
    	$data->ad_type = $request->post_type;
    	$data->position_id = $request->position_id;
    	$data->start_date = $request->start_date;
    	$data->end_date = $request->end_date;
    	$data->height = $request->height;
    	$data->width = $request->width;
    	if($request->post_type == 1){
    		if($request->hasFile('advertisement_image')) {
	            $image = $request->file('advertisement_image');
	            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
	            Image::make($image)->resize($width,$height)->save('public/uploads/advertisement/' . $ImageName);
	            $data->advertisement = $ImageName;
            
       			}

    	}elseif($request->post_type == 2){
    		$data->advertisement = $request->advertisement;
    	}

    	if($data->save()){
    		 $notification=array(
                'messege'=>'Advertisement Insert Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	 $notification=array(
                'messege'=>'Advertisement Insert failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }

    	


    }
    	// ad edit
    public function edit($id){
    	$allposition=AdvertisementPosition::get();
    	$data=Advertisement::where('id',$id)->first();
    	return view('admin.advertisement.edit',compact('data','allposition'));
    }

    // update
    public function update(Request $request,$id){
    	

    	$height=$request->height;
    	$width=$request->width;

    	if($request->post_type == 1){
    		$this->validate($request,[
    			'url'=>'required',
    			'start_date'=>'required',
    			'end_date'=>'required',
    			'width'=>'required',
    			'height'=>'required',
    			'advertisement_image'=>'required',
    		]);
    	}elseif($request->post_type == 2){
    		$this->validate($request,[
    			'advertisement'=>'required',
    		]);
    	}
    	
    	$data = Advertisement::findOrFail($id);
    	$data->ad_name = $request->ad_name;
    	$data->ad_phone = $request->ad_phone;
    	$data->url = $request->url;
    	$data->ad_type = $request->post_type;
    	$data->position_id = $request->position_id;
    	$data->start_date = $request->start_date;
    	$data->end_date = $request->end_date;
    	$data->height = $request->height;
    	$data->width = $request->width;
    	if($request->post_type == 1){
    		if($request->hasFile('advertisement_image')) {
	            $image = $request->file('advertisement_image');
	            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
	            Image::make($image)->resize($width,$height)->save('public/uploads/advertisement/' . $ImageName);
	            $data->advertisement = $ImageName;
            
       			}

    	}elseif($request->post_type == 2){
    		$data->advertisement = $request->advertisement;
    	}

    	if($data->save()){
    		 $notification=array(
                'messege'=>'Advertisement Insert Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	 $notification=array(
                'messege'=>'Advertisement Insert failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }

    }

 public function restore($id){
    	$active=Advertisement::where('id',$id)->update([
    		'is_deleted'=>'0',
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($active){
    		 $notification=array(
                'messege'=>'Advertisement restore Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	 $notification=array(
                'messege'=>'Advertisement restore failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }
    }
     public function delete($id){
    	$active=Advertisement::where('id',$id)->delete();
    	if($active){
    		 $notification=array(
                'messege'=>'Advertisement Delete Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	 $notification=array(
                'messege'=>'Advertisement Delete failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }
    }

    // heard delete multi dele
    public function heardmultidelete(Request $request){
    	switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = Advertisement::whereIn('id', $deleteid)->delete();
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
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Advertisement::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }

    // ad active
    public function active($id){
    	$active=Advertisement::where('id',$id)->update([
    		'status'=>'1',
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($active){
    		 $notification=array(
                'messege'=>'Advertisement Active Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	 $notification=array(
                'messege'=>'Advertisement Active failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }
    }
    // ad deactive
    public function deactive($id){
    	$active=Advertisement::where('id',$id)->update([
    		'status'=>'0',
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($active){
    		 $notification=array(
                'messege'=>'Advertisement DeActive Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	 $notification=array(
                'messege'=>'Advertisement DeActive failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }
    }
    // ad softdele
    public function softdelete($id){
    	$active=Advertisement::where('id',$id)->update([
    		'is_deleted'=>'1',
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($active){
    		 $notification=array(
                'messege'=>'Advertisement delete Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	 $notification=array(
                'messege'=>'Advertisement delete failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }
    }
    // ad multisoft del
    public function multisoftdel(Request $request){
    	$deleteid = $request['delid'];
            if($deleteid) {
                $deletpost = Advertisement::whereIn('id', $deleteid)->update([
                	'is_deleted'=>'1',
                	'updated_at'=>Carbon::now()->toDateTimeString(),
                ]);

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

    // deleted ad
    public function deletead(){
    	$allad=Advertisement::where('is_deleted',1)->OrderBy('id','DESC')->get();
    	return view('admin.advertisement.trash',compact('allad'));
    }



    // add position
    public function addposition(){
    	$allpostion=AdvertisementPosition::get();
    	return view('admin.adposition.index',compact('allpostion'));
    }
    // store position
    public function addpositioninsert(Request $request){
    	$insert=AdvertisementPosition::insert([
    		'position_name'=>$request->position_name,
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($insert){
              $notification=array(
                'messege'=>'Position Insert Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
            }
        else{
            $notification=array(
                'messege'=>' Position Insert failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
        }
    }
    // edit
    public function addpositionedit($id){
    	$data=AdvertisementPosition::where('id',$id)->first();
    	return json_encode($data);
    }


    // update ad postion
    public function updateposition(Request $request){
    	$id=$request->id;
    	$update=AdvertisementPosition::where('id',$id)->update([
    		'position_name'=>$request['position_name'],
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($update){
    		 $notification=array(
                'messege'=>'Position update Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	$notification=array(
                'messege'=>' Position update failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }
    }

    public function postiondelete($id){
    	$delete=AdvertisementPosition::where('id',$id)->delete();
    	if($delete){
    		 $notification=array(
                'messege'=>'Position delete Success',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
         }else{
         	$notification=array(
                'messege'=>' Position delete failed',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
         }
    }





}
