<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use App\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    public function index()
    {
        $divisions = Division::where('status', 1)->select('id', 'name_bn')->get();
        $subDistricts = SubDistrict::with(['district', 'division'])->select(['id', 'name', 'status', 'district_id', 'division_id'])->get();
        return view('admin.division.sub_districts.index', compact('divisions', 'subDistricts'));
    }

    public function getDistrictByDivisionId($divisionId)
    {
        $districts = District::where('division_id', $divisionId)->get();
        return response()->json($districts);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_districts,name'
        ]);

        SubDistrict::insert([
            'name' => $request->name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'slug' => str_replace(" ", "-", $request->name),
        ]);

        $notification = array(
            'messege' => 'Sub-district inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request, $subDistrictId)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_districts,name,' . $subDistrictId
        ]);

        SubDistrict::where('id', $subDistrictId)->update([
            'name' => $request->name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'slug' => str_replace(" ", "-", $request->name),
        ]);

        $notification = array(
            'messege' => 'Sub-district updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($subDistrictId)
    {
        $statusChange = SubDistrict::where('id', $subDistrictId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Sub-District is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Sub-District is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($subDistrictId)
    {
        SubDistrict::where('id', $subDistrictId)->delete();
        $notification = array(
            'messege' => 'Sub-District is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteIds == null) {
            $notification = array(
                'messege' => 'You did not select any Sub-district',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteIds as $districtId) {
                SubDistrict::where('id', $districtId)->delete();
            }
        }
        $notification = array(
            'messege' => 'Sub-District is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function getSubDistrictByAjax($subDistrictId)
    {
        $subDistrict = SubDistrict::where('id', $subDistrictId)->select('id', 'name', 'division_id', 'district_id')->first();
        $divisions = Division::select(['id', 'name_bn'])->get();
        $districts = District::select('id', 'name_bn')->get();
        return view('admin.division.sub_districts.ajax_view.edit_modal_view', compact('subDistrict', 'divisions', 'districts'));
    }
}
