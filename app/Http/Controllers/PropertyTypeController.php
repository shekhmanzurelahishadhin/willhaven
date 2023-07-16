<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\property_type;
use App\Models\Language;
use Session;

class PropertyTypeController extends Controller
{
    public function property_Types(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $data = property_type::all();
        return view('admin.property_types',compact('sidebarCheck', 'data', 'languages'));
    }
    public function create_PropertyType(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        return view('admin.property_create_type',compact('sidebarCheck', 'languages'));
    }
    public function store_PropertyType(Request $req){
        $sidebarCheck= 'property';

        $rules = [
            'name' => 'required | max:100',
        ];

        $msg = [
            "name.required" => "You haven't entered any property type. Please enter a property type.",
            "name.max" => "Your entered porperty type must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = new property_type();
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Property type created successfully.');

        return redirect('/property_types');
    }
    public function edit_Type($id=null){
        $eData = property_type::find($id);
        $sidebarCheck= 'property';
        $languages = Language::all();
        return view('admin.property_edit_type', compact('sidebarCheck','eData', 'languages'));
    }
    public function update_PropertyType(Request $req, $id){
        $rules = [
            'name' => 'required | max:100',
        ];

        $msg = [
            "name.required" => "You haven't entered any property type. Please enter a property type.",
            "name.max" => "Your entered porperty type must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = property_type::find($id);
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Property type updated successfully.');

        return redirect('/property_types');
    }
    public function del_PropertyType($id=null){
        $dData = property_type::find($id);
        $dData->delete();

        Session::flash('scc', 'Property type deleted successfully.');

        return redirect('/property_types');
    }
}
