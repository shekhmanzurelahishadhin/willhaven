<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NearestLocation;
use App\Models\Language;
use Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class NearestLocationController extends Controller
{
    public function create_NearestLocation(){
        $sidebarCheck= 'property';
        $languages = Language::all();

        return view('admin.property_create_nearestlocation',compact('sidebarCheck', 'languages'));
    }
    public function store_NearestLocation(Request $req){
        $sidebarCheck= 'property';

        $rules = [
            'name' => 'required | max:100',
        ];

        $msg = [
            "name.required" => "You haven't entered any nearest location. Please enter a nearest location.",
            "name.max" => "Your entered text must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = new NearestLocation();
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Nearest Location successfully.');

        return redirect('/property_location');
    }
    public function edit_NearestLocation($id=null){
        $eData = NearestLocation::find($id);
        $sidebarCheck= 'property';
        $languages = Language::all();

        return view('admin.property_edit_nearestlocation', compact('sidebarCheck','eData', 'languages'));
    }
    public function update_NearestLocation(Request $req, $id){
        $rules = [
            "name" => "required | max:100",
        ];

        $msg = [
            "name.required" => "You haven't entered any nearest location. Please enter a nearest location.",
            "name.max" => "Your entered text must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = NearestLocation::find($id);
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Nearest Location successfully.');

        return redirect('/property_location');
    }
    public function del_NearestLocation($id=null){
        $dData = NearestLocation::find($id);
        $dData->delete();

        Session::flash('scc', 'Nearest Location deleted successfully.');

        return redirect('/property_location');
    }
}
