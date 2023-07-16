<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Language;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    //
    public function addDistrict()
    {
        $sidebarCheck= 'admin';
        $languages = Language::all();
        return view('admin.location.district',compact('sidebarCheck','languages'));
    }

    public function saveDistrict(Request $request)
    {
        District::saveDistrict($request);
        Alert::toast('District Added Successfully', 'Toast Type');
        return back();
    }

    public function mangeDistrict()
    {
        $sidebarCheck= 'admin';
        $languages = Language::all();
        return view('admin.location.manage-district',compact('sidebarCheck','languages'),[
            'districts'=>District::all(),
        ]);
    }

    public function editDistrict($id)
    {
        $sidebarCheck= 'admin';
        $languages = Language::all();
        return view('admin.location.edit-district',compact('sidebarCheck','languages'),[
            'district'=>District::find($id),
        ]);
    }

    public function updateDistrict(Request $request)
    {
        District::updateDistrict($request);
        Alert::toast('District Updated Successfully', 'Toast Type');
        return back();
    }

    public function addSubDistrict()
    {

        $sidebarCheck= 'admin';
        $languages = Language::all();
        return view('admin.location.sub-district',compact('sidebarCheck','languages'),[
            'districts'=>District::all(),
        ]);
    }

    public function saveSubDistrict(Request $request)
    {
        SubDistrict::saveSubDistrict($request);
        Alert::toast('Sub District Added Successfully', 'Toast Type');
        return back();
    }

    public function mangeSubDistrict()
    {
        $sidebarCheck= 'admin';
        $languages = Language::all();
        return view('admin.location.manage-sub-district',compact('sidebarCheck','languages'),[
            'subDistricts'=>DB::table('sub_districts')
            ->join('districts','districts.id','sub_districts.district_id')
            ->select('districts.district_name','sub_districts.*')
            ->get(),
        ]);
    }

    public function editSubDistrict($id)
    {
        $sidebarCheck= 'admin';
        $languages = Language::all();
        return view('admin.location.edit-sub-district',compact('sidebarCheck','languages'),[
            'sub_district'=>SubDistrict::find($id),
            'districts'=>District::all()
        ]);
    }

    public function updateSubDistrict(Request $request)
    {
        SubDistrict::updateSubDistrict($request);
        Alert::toast('Sub District Updated Successfully', 'Toast Type');
        return back();
    }
}
