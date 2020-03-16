<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ThemeColor;
use Illuminate\Http\Request;

class ThemeColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
       $themeColors = ThemeColor::select(['id','hover_color', 'web_color','status'])->get();
       return view('admin.setting.theme_color.index', compact('themeColors'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hover_color' => 'required',
            'web_color' => 'required',
        ]);

        ThemeColor::insert([
            'hover_color' => $request->hover_color,
            'web_color' => $request->web_color,
        ]);

        $notification = array(
            'messege' => 'Theme color inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($themeColorId)
    {

        $actionThemeColor = ThemeColor::where('status', 1)->first();

        if ($actionThemeColor) {
            $actionThemeColor->status = 0;
            $actionThemeColor->save();
        }

        $statusChange = ThemeColor::where('id', $themeColorId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Theme color is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Theme color is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function multipleAction(Request $request)
    {


        if ($request->action_target === 'multiple_delete') {
            if ($request->colorIds == null) {
                $notification = array(
                    'messege' => 'You did not select any theme color',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
            foreach ($request->colorIds as $colorId) {
                ThemeColor::where('id', $colorId)->delete();
            }
        }else {
            $actionThemeColor = ThemeColor::where('status', 1)->first();
            if ($actionThemeColor) {
                $actionThemeColor->status = 0;
                $actionThemeColor->save();
            }
        }

        $notification = array(
            'messege' => 'All theme color is activated is deactivated:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($themeColorId)
    {
        ThemeColor::where('id', $themeColorId)->delete();
        $notification = array(
            'messege' => 'Theme color is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getThemeColorByAjax($themeColorId)
    {
        $themeColor = ThemeColor::where('id', $themeColorId)->first();
        return view('admin.setting.theme_color.ajax_view.edit_modal_view', compact('themeColor'));
    }

}
