<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class NoticeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    // show all notice

    public function noticeIndex ()
    {
        $notices = Notice::all();
        return view('admin.notice.notice',compact('notices'));
    }

    // store notice

    public function noticeStore (Request $request)
    {

        $request->validate([
            'notice'=>'required',
        ]);
        Notice::create($request->all());
        
        $notification = array(
            'messege' => 'Notice Insert successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // notice area edit

    public function noticeEdit($id)
    {
        $notice = Notice::findOrFail($id);
        return response()->json($notice);
    }


    // update status

    public function noticeStatusUpdate($id)
    {
        
        $statusChange = Notice::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Notice Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Notice Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
        return $id;
    }


    // multi delete

    public function noticeMultiDelete(Request $request)
    {
        
        $id = $request->input('deleteId');

        if($request->deleteId == null){
            $notification = array(
                'messege' => 'You did not select any Notice',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }else {
           Notice::whereIn('id',$id)->delete();
        }
        $notification = array(
            'messege' => 'Hostel deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // notice update

    public function noticeUpdate (Request $request)
    {
        $request->validate([
            'notice'=>'required',
        ]);
        $id = $request->input('id');

        
        Notice::findOrFail($id)->update($request->all());
        $notification = array(
            'messege' => 'Notice Update successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // notice delete

    public function noticeDelete($id)
    {
        Notice::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Notice Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);


    }
    





}
