<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Division;
use App\District;
use App\SubDistrict;
use App\NewsPost;
use Image;
use Carbon\Carbon;

class NewsPostController extends Controller
{
     public function __construct(){

	   }
	   // 
	   public function index(){
	   	$allnews=NewsPost::where('is_deleted',0)->OrderBy('id','DESC')->get();
	   	return view('admin.newspost.index',compact('allnews'));
	   }

	   // create
	   public function create(){
	   	$allcategory=Category::where('is_deleted',0)->where('status',1)->get();
	   	$alldivision=Division::where('is_deleted',0)->where('status',1)->get();
	   	return view('admin.newspost.create',compact('allcategory','alldivision'));
	   }
	   // get subcate ajax
	   public function getsubcate($cate_id){
	   		$data=SubCategory::where('is_deleted',0)->where('status',1)->where('cate_id',$cate_id)->get();
	   		return json_encode($data);
	   }
	   // get district
	   public function getdistrict($division_id){
	   		$data=District::where('is_deleted',0)->where('status',1)->where('division_id',$division_id)->get();
	   		return json_encode($data);
	   }
	   //get sub district
	   public function getsubdistrict($district_id){
	   		$data=SubDistrict::where('is_deleted',0)->where('status',1)->where('district_id',$district_id)->get();
	   		return json_encode($data);
	   }
	   // store news
	   public function store(Request $request){


	   			$this->validate($request,[
                	'title' => 'required',
                	'cate_id' => 'required',
                	'pic' => 'required',
                 ],[
                 	'title.required'=>'Please enter News title!',
                 	'cate_id.required'=>'Please enter News title!',
                 	'pic.required'=>'Please upload Image!',
                 ]);


	   			$title=$request->title;
	         	$title_slug=$request->slug;
	         
	         	$inputslug=str_replace(" ", "-", $title_slug);
	         	$slug = str_replace(" ", "-", $title);

	   			$data = new NewsPost;
        		$data->title = $request->title;

        		if($title_slug){
        			$data->slug = $inputslug;
        		}else{
        			$data->slug = $slug;
        		}

        		$data->cate_id = $request->cate_id;
        		$data->subcategory_id = $request->subcategory_id;
        		$data->division_id = $request->division_id;
        		$data->district_id = $request->district_id;
        		$data->subdistrict_id = $request->subdistrict_id;
        		$data->post_type = $request->post_type;
                $data->popular_news = $request->popular_news;
        		
        		// video link start
        		$data->video_link = $request->video_link;
        		// video link end
        		$data->description = $request->description;
        		$data->meta_tag = $request->meta_tag;
        		$data->meta_description = $request->meta_description;
        		$data->braking_news = $request->braking_news;
        		$data->pocket_news = $request->pocket_news;
        		if($request->hasFile('pic')){
		            $image = $request->file('pic');
		            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
		            Image::make($image)->resize(580, 390)->save('public/uploads/newspost/bigthum/' . $ImageName);
                    Image::make($image)->resize(270, 180)->save('public/uploads/newspost/mediumthum/' . $ImageName);
                    Image::make($image)->resize(125, 65)->save('public/uploads/newspost/small/' . $ImageName);
		            $data->image = $ImageName;
		        }
		        if($data->save()){
		        	$notification=array(
                        'messege'=>'NewsPost Insert Success',
                        'alert-type'=>'success'
                         );
                     return redirect()->back()->with($notification);
                 }else{
                 	$notification=array(
                        'messege'=>'NewsPost Insert failed',
                        'alert-type'=>'error'
                         );
                     return redirect()->back()->with($notification);
                 }

	   }
	   // deactive
	   public function deactive($id){
	   		$deactive=NewsPost::where('id',$id)->update([
	   			'status'=>'0',
	   			'updated_at'=>Carbon::now()->toDateTimeString(),
	   		]);
	   		if($deactive){
	        	$notification=array(
                    'messege'=>'NewsPost Deactive Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
             	$notification=array(
                    'messege'=>'NewsPost Deactive failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
             }
	   }
	   //active
	   public function active($id){
	   		$deactive=NewsPost::where('id',$id)->update([
	   			'status'=>'1',
	   			'updated_at'=>Carbon::now()->toDateTimeString(),
	   		]);
	   		if($deactive){
	        	$notification=array(
                    'messege'=>'NewsPost active Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
             	$notification=array(
                    'messege'=>'NewsPost active failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
             }
	   }
	   // deactive
	   public function softdelete($id){
	   	$deactive=NewsPost::where('id',$id)->update([
	   			'is_deleted'=>'1',
	   			'updated_at'=>Carbon::now()->toDateTimeString(),
	   		]);
	   		if($deactive){
	        	$notification=array(
                    'messege'=>'NewsPost Delete Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
             	$notification=array(
                    'messege'=>'NewsPost Delete failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
             }
	   }
	    // multisoftdelete
	   public function multisoftdelete(Request $request){
	   	$deleteid = $request['delid'];
            if($deleteid) {
                $deletpost = NewsPost::whereIn('id', $deleteid)->update([
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

	   public function edit($id){
	   	$data=NewsPost::where('id',$id)->first();
	   	$allcategory=Category::where('is_deleted',0)->where('status',1)->get();
	   	$allsubcategory=SubCategory::where('is_deleted',0)->where('status',1)->get();
	   	$alldivision=Division::where('is_deleted',0)->where('status',1)->get();
	   	$alldistrict=District::where('is_deleted',0)->where('status',1)->get();
	   	$allsubdistrict=SubDistrict::where('is_deleted',0)->where('status',1)->get();
	   	return view('admin.newspost.edit',compact('data','allcategory','allsubcategory','alldivision','alldistrict','allsubdistrict'));
	   }


	   // update
	   public function update(Request $request,$id){
	   		//return $id;
	   		$this->validate($request,[
                	'title' => 'required',
                	'cate_id' => 'required',
                	'pic' => 'sometimes|image',
                 ],[
                 	'title.required'=>'Please enter News title!',
                 	'cate_id.required'=>'Please enter News title!',
                 	'pic.required'=>'Please upload Image!',
                 ]);


	   			$title=$request->title;
	         	$title_slug=$request->slug;
	         
	         	$inputslug=str_replace(" ", "-", $title_slug);
	         	$slug = str_replace(" ", "-", $title);

	   			$data = NewsPost::findOrFail($id);

        		$data->title = $request->title;
        		if($title_slug){
        			$data->slug = $inputslug;
        		}else{
        			$data->slug = $slug;
        		}

        		$data->cate_id = $request->cate_id;
        		$data->subcategory_id = $request->subcategory_id;
        		$data->division_id = $request->division_id;
        		$data->district_id = $request->district_id;
        		$data->subdistrict_id = $request->subdistrict_id;
        		$data->post_type = $request->post_type;
        		
        		// video link start
        		$data->video_link = $request->video_link;
        		// video link end
        		$data->description = $request->description;
        		$data->meta_tag = $request->meta_tag;
        		$data->meta_description = $request->meta_description;
        		$data->braking_news = $request->braking_news;
        		$data->pocket_news = $request->pocket_news;
                $data->popular_news = $request->popular_news;
        		if($request->hasFile('pic')){
		            $image = $request->file('pic');
		            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
		             Image::make($image)->resize(580, 390)->save('public/uploads/newspost/bigthum/' . $ImageName);
                    Image::make($image)->resize(270, 180)->save('public/uploads/newspost/mediumthum/' . $ImageName);
                    Image::make($image)->resize(125, 65)->save('public/uploads/newspost/small/' . $ImageName);
		            $data->image = $ImageName;
		        }
		        if($data->save()){
		        	$notification = array(
                    'messege' => 'Update success',
                    'alert-type' => 'success'
	                );
	                return Redirect()->back()->with($notification);
		        }else{
		        	$notification = array(
                    'messege' => 'Update Faild',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
		        }
		        	
                   
	   }
	   public function deletedpost(){
	   	$allnews=NewsPost::where('is_deleted',1)->OrderBy('id','DESC')->get();
	   	return view('admin.newspost.trash',compact('allnews'));
	   }

	   // recycle
	   public function recycle($id){
	   		$deactive=NewsPost::where('id',$id)->update([
	   			'is_deleted'=>'0',
	   			'updated_at'=>Carbon::now()->toDateTimeString(),
	   		]);
	   		if($deactive){
	        	$notification=array(
                    'messege'=>'NewsPost Recycle Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
             	$notification=array(
                    'messege'=>'NewsPost Recycle failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
             }
	   }
	   // delete
	   public function delete($id){
	   	$deactive=NewsPost::where('id',$id)->delete();
	   		if($deactive){
	        	$notification=array(
                    'messege'=>'NewsPost Delete Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
             	$notification=array(
                    'messege'=>'NewsPost Delete failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
             }
	   }

	   // multi heard deleted
	   public function multihearddelete(Request $request){
	   	//return $request;
	   		switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = NewsPost::whereIn('id', $deleteid)->delete();
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
                    $delet = NewsPost::whereIn('id', $deleteid)->update([
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

}
