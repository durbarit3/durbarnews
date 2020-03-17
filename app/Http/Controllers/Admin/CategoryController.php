<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Session;
use Carbon\Carbon;
use App\Menu;


class CategoryController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
    	$allCategory = Category::where('is_deleted',0)->get();
    	return view('admin.category.index',compact('allCategory'));
    }
    // insert
    public function store(Request $request){
    	 $title=$request['cate_name'];
         $cate_slug=$request['cate_slug'];
         $inputslug=str_replace(" ", "-", $cate_slug);
         $slug = str_replace(" ", "-", $title);

         if($cate_slug){
            $this->validate($request, [
                'cate_name' => 'required|unique:categories,name',

                 ]);

                 $insert=Category::insertGetId([
                   'name'=>$request['cate_name'],
                   'slug'=>$inputslug,
                   'meta_description'=>$request['meta_description'],
                   'meta_keyword'=>$request['meta_keyword'],
                   'is_top'=>$request['is_top'],
                   'created_at'=>Carbon::now()->toDateTimeString(),
                 ]);
                 $menustable=Menu::insert([
                 	'name'=>$request['cate_name'],
                 	'url'=>$inputslug,
                 	'type'=>'1',
                 	'non_id'=>$insert,
                 	'cate_type'=>'1',
                 	'updated_at'=>Carbon::now()->toDateTimeString(),
                 ]);

                 if($insert){
                      $notification=array(
                        'messege'=>' Category Insert Successfully',
                        'alert-type'=>'success'
                         );
                     return redirect()->back()->with($notification);
                    }
                else{
                    $notification=array(
                        'messege'=>' Category Insert failed',
                        'alert-type'=>'error'
                         );
                     return redirect()->back()->with($notification);
                }
        }else{
            $this->validate($request,[
                'cate_name' => 'required|unique:categories,name',

                 ]);

             $insert=Category::insertGetId([
               'name'=>$request['cate_name'],
               'slug'=>$slug,
               'meta_description'=>$request['meta_description'],
               'meta_keyword'=>$request['meta_keyword'],
               'is_top'=>$request['is_top'],

               'created_at'=>Carbon::now()->toDateTimeString(),

             ]);
              $menustable=Menu::insert([
                 	'name'=>$request['cate_name'],
                 	'url'=>$slug,
                 	'type'=>'1',
                 	'non_id'=>$insert,
                 	'cate_type'=>'1',
                 	'updated_at'=>Carbon::now()->toDateTimeString(),
                 ]);

             if($insert){
                  $notification=array(
                    'messege'=>' Category Insert Successfully',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>' Category Insert failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
        }

    }

    // active
    public function active($id){
    	$active=Category::where('id',$id)->update([
    		'is_top'=>'1',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	 if($active){
                  $notification=array(
                    'messege'=>' Category Active Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>' Category active failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }

    }
     // deactive
    public function deactive($id){
    		$active=Category::where('id',$id)->update([
    		'is_top'=>'0',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	 if($active){
                  $notification=array(
                    'messege'=>' Category Deactive Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>' Category Deactive failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }

         }
     // delete
    public function delete($id){
    	$active=Category::where('id',$id)->delete();
    	$del=Menu::where('cate_type',1)->where('non_id',$id)->delete();
    	 if($active){
                  $notification=array(
                    'messege'=>' Category Delete Success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>' Category Delete failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
    }
    //
    public function update(Request $request){
    	 $id=$request->id;
    	 $title=$request['cate_name'];
         $cate_slug=$request['cate_slug'];
         $inputslug=str_replace(" ", "-", $cate_slug);
         $slug = str_replace(" ", "-", $title);

         if($cate_slug){

            $this->validate($request,[
            'cate_name' => 'required|unique:categories,name,'.$id,
               ]);

                 $update=Category::where('id',$id)->update([
                   'name'=>$request['cate_name'],
                   'slug'=>$inputslug,
                   'meta_description'=>$request['meta_description'],
                   'meta_keyword'=>$request['meta_keyword'],
                   'created_at'=>Carbon::now()->toDateTimeString(),
                 ]);
                 $menuup=Menu::where('cate_type',1)->where('non_id',$id)->Update([
                 	'name'=>$request['cate_name'],
                 	'url'=>$inputslug,
                 ]);

                 if($update){
                      $notification=array(
                        'messege'=>' Category Update Successfully',
                        'alert-type'=>'success'
                         );
                     return redirect()->back()->with($notification);
                    }
                else{
                    $notification=array(
                        'messege'=>' Category Update failed',
                        'alert-type'=>'error'
                         );
                     return redirect()->back()->with($notification);
                }
        }else{
            $this->validate($request, [
            'cate_name' => 'required|unique:categories,name,'.$id
               ]);

             $update=Category::where('id',$id)->update([
               'name'=>$request['cate_name'],
               'slug'=>$slug,
               'meta_description'=>$request['meta_description'],
               'meta_keyword'=>$request['meta_keyword'],
               'created_at'=>Carbon::now()->toDateTimeString(),
             ]);
             $menuup=Menu::where('cate_type',1)->where('non_id',$id)->Update([
                 	'name'=>$request['cate_name'],
                 	'url'=>$slug,
                 ]);

             if($update){
                  $notification=array(
                    'messege'=>' Category Update Successfully',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
                }
            else{
                $notification=array(
                    'messege'=>' Category Update failed',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
            }
        }
    }
    // ajax editmodal show
    public function edit($id){
    	$data=Category::where('id',$id)->first();
    	return json_encode($data);
    }
    // multiple delete
    public function multidelete(Request $request){
    	$deleteid = $request['delid'];
            if ($deleteid) {
                $deletpost = Category::whereIn('id', $deleteid)->delete();
                $del = Menu::where('cate_type',1)->whereIn('non_id', $deleteid)->delete();
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

    //


}
