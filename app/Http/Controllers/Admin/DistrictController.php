<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $districts = District::with('division')->select('id', 'name_bn', 'status', 'division_id')->get()
        ->map(function($dis){
            return [
                'id' => $dis->id,
                'name_bn' => $dis->name_bn,
                'status' => $dis->status,
                'division_id' => $dis->division_id,
                'division' => [
                    'id' => $dis->division->id,
                    'name_bn' => $dis->division->name_bn,
                ]
            ];
        });
         //dd($districts);
        $divisions = Division::with('districts')->select('id', 'name_bn')->where('status', 1)->get();
        return view('admin.division.districts.index', compact('districts', 'divisions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name_bn'
        ]);

        District::insert([
            'name_bn' => $request->name,
            'division_id' => $request->division_id,
            'slug' => str_replace(" ", "-", $request->name),
        ]);

        $notification = array(
            'messege' => 'District inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function statusChange($districtId)
    {
        $statusChange = District::where('id', $districtId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'District is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'District is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function update(Request $request, $districtId)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name_bn,' . $districtId
        ]);

        District::where('id', $districtId)->update([
            'name_bn' => $request->name,
            'division_id' => $request->division_id,
            'slug' => str_replace(" ", "-", $request->name),
        ]);

        $notification = array(
            'messege' => 'District updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getDistrictByAjax($districtId)
    {
        $district = District::where('id', $districtId)->select(['id', 'name_bn', 'division_id'])->first();
        $divisions = $divisions = Division::with('districts')->select('id', 'name_bn')->where('status', 1)->get();
        return view('admin.division.districts.ajax_view.edit_modal_view', compact('district', 'divisions'));
    }

    public function delete($districtId)
    {
        District::where('id', $districtId)->delete();
        $notification = array(
            'messege' => 'District is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteIds == null) {
            $notification = array(
                'messege' => 'You did not select any district',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteIds as $districtId) {
                District::where('id', $districtId)->delete();
            }
        }
        $notification = array(
            'messege' => 'District is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
