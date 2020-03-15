<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Menu;
use Carbon\Carbon;
use Session;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
    	$allcategory=Category::get();
    	$allsubcategory=SubCategory::get();
    	return view('admin.subcategory.index',compact('allcategory','allsubcategory'));
    }

    public function store(Request $request){
    	 $title=$request['name'];
         $subcate_slug=$request['slug'];

         $inputslug=str_replace(" ", "-", $subcate_slug);
         $slug = str_replace(" ", "-", $title);

         if($subcate_slug){

         	$this->validate($request, [
                'name' => 'required|unique:sub_categories,name',
                 ]);

                 $insert=SubCategory::insertGetId([
                   'name'=>$request['name'],
                   'slug'=>$inputslug,
                   'meta_description'=>$request['meta_description'],
                   'meta_keyword'=>$request['meta_keyword'],
                   'cate_id'=>$request['cate_id'],
                   'created_at'=>Carbon::now()->toDateTimeString(),
                 ]);
                 $menustable=Menu::insert([
                 	'name'=>$request['name'],
                 	'url'=>$inputslug,
                 	'type'=>'1',
                 	'non_id'=>$insert,
                 	'cate_type'=>'2',
                 	'created_at'=>Carbon::now()->toDateTimeString(),
                 ]);

                 if($insert){
                      $notification=array(
                        'messege'=>'SubCategory Insert Successfully',
                        'alert-type'=>'success'
                         );
                     return redirect()->back()->with($notification);
                    }
                else{
                    $notification=array(
                        'messege'=>'SubCategory Insert failed',
                        'alert-type'=>'error'
                         );
                     return redirect()->back()->with($notification);
                }
        }else{

        	$this->validate($request, [
                'name' => 'required|unique:sub_categories,name',
                 ]);
      
             $insert=SubCategory::insertGetId([
               'name'=>$request['name'],
               'slug'=>$slug,
               'meta_description'=>$request['meta_description'],
               'meta_keyword'=>$request['meta_keyword'],
               'cate_id'=>$request['cate_id'],
               'created_at'=>Carbon::now()->toDateTimeString(),
        
             ]);
              $menustable=Menu::insert([
                 	'name'=>$request['name'],
                 	'url'=>$slug,
                 	'type'=>'1',
                 	'non_id'=>$insert,
                 	'cate_type'=>'2',
                 	'created_at'=>Carbon::now()->toDateTimeString(),
                 ]);

             if($insert){
                  $notification=array(
                    'messege'=>' SubCategory Insert Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>'SubCategory Insert failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
        }
    }

    // 
    public function active($id){
    		$deactive=SubCategory::where('id',$id)->update([
    		'status'=>'1',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	 if($deactive){
                  $notification=array(
                    'messege'=>' SubCategory active Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>'SubCategory active failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
    }
    // 
    public function deactive($id){
    	$deactive=SubCategory::where('id',$id)->update([
    		'status'=>'0',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	 if($deactive){
                  $notification=array(
                    'messege'=>' SubCategory Deactive Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>'SubCategory Deactive failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
    }
    // delete
    public function delete($id){
    	$deactive=SubCategory::where('id',$id)->delete();
    	$del=Menu::where('cate_type',2)->where('non_id',$id)->delete();
    	 if($deactive){
                  $notification=array(
                    'messege'=>' SubCategory Delete Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>'SubCategory Delete failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
    }
    // delete
    public function multidelete(Request $request){
    		$deleteid = $request['delid'];
            if ($deleteid) {
                $deletpost = SubCategory::whereIn('id', $deleteid)->delete();
                $del = Menu::where('cate_type',2)->whereIn('non_id', $deleteid)->delete();
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
// edit
    	public function edit($id){
    		$data=SubCategory::where('id',$id)->first();
    		return json_encode($data);
    	}

    	// update
    	public function update(Request $request){
    	  $id=$request->id;
    	  $title=$request['name'];
          $subcate_slug=$request['slug'];

         $inputslug=str_replace(" ", "-", $subcate_slug);
         $slug = str_replace(" ", "-", $title);

         if($subcate_slug){
          $this->validate($request,[
            	'name' => 'required|unique:sub_categories,name,'.$id,
               ]);

                 $insert=SubCategory::where('id',$id)->update([
                   'name'=>$request['name'],
                   'slug'=>$inputslug,
                   'meta_description'=>$request['meta_description'],
                   'meta_keyword'=>$request['meta_keyword'],
                   'cate_id'=>$request['cate_id'],
                   'updated_at'=>Carbon::now()->toDateTimeString(),
                 ]);
                 $menustable=Menu::where('cate_type',2)->where('non_id',$id)->update([
                 	'name'=>$request['name'],
                 	'url'=>$inputslug,
                 	'updated_at'=>Carbon::now()->toDateTimeString(),
                 ]);

                 if($insert){
                      $notification=array(
                        'messege'=>'SubCategory Update Successfully',
                        'alert-type'=>'success'
                         );
                     return redirect()->back()->with($notification);
                    }
                else{
                    $notification=array(
                        'messege'=>'SubCategory Update failed',
                        'alert-type'=>'error'
                         );
                     return redirect()->back()->with($notification);
                }
        }else{

        	 $this->validate($request,[
            	'name' => 'required|unique:sub_categories,name,'.$id,
               ]);
      
             $insert=SubCategory::where('id',$id)->update([
               'name'=>$request['name'],
               'slug'=>$slug,
               'meta_description'=>$request['meta_description'],
               'meta_keyword'=>$request['meta_keyword'],
               'cate_id'=>$request['cate_id'],
               'updated_at'=>Carbon::now()->toDateTimeString(),
        
             ]);
              $menustable=Menu::where('cate_type',2)->where('non_id',$id)->update([
                 	'name'=>$request['name'],
                 	'url'=>$slug,
                 	'updated_at'=>Carbon::now()->toDateTimeString(),
                 ]);

             if($insert){
                  $notification=array(
                    'messege'=>' SubCategory update Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>'SubCategory update failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
        }
    	}




    public function categorypage($link){
    	return $link;
    }
}
