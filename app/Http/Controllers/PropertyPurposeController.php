<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyPurpose;
use App\Models\Language;
use Session;

class PropertyPurposeController extends Controller
{
    public function property_Purpose(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $data = PropertyPurpose::all();
        return view('admin.property_purpose',compact('sidebarCheck', 'data', 'languages'));
    }
    public function create_PropertyPurpose(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        return view('admin.property_create_purpose',compact('sidebarCheck', 'languages'));
    }
    public function store_PropertyPurpose(Request $req){
        $sidebarCheck= 'property';

        $rules = [
            'name' => 'required | max:100',
        ];

        $msg = [
            "name.required" => "Enter the purpose of your property.",
            "name.max" => "Your entered porperty purpose must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = new PropertyPurpose();
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Property purpose created successfully.');

        return redirect('/property_purpose');
    }
    public function edit_Purpose($id=null){
        $eData = PropertyPurpose::find($id);
        $sidebarCheck= 'property';
        $languages = Language::all();
        return view('admin.property_edit_purpose', compact('sidebarCheck','eData', 'languages'));
    }
    public function update_PropertyPurpose(Request $req, $id){
        $rules = [
            'name' => 'required | max:100',
        ];

        $msg = [
            "name.required" => "You haven't entered any property type. Please enter a property type.",
            "name.max" => "Your entered porperty type must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = PropertyPurpose::find($id);
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Property purpose updated successfully.');

        return redirect('/property_purpose');
    }
    public function del_PropertyPurpose($id=null){
        $dData = PropertyPurpose::find($id);
        $dData->delete();

        Session::flash('scc', 'Property purpose deleted successfully.');

        return redirect('/property_purpose');
    }
}
