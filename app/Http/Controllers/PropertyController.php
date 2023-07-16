<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aminity;
use App\Models\property_type;
use App\Models\PropertyPurpose;
use App\Models\Property;
use App\Models\Language;
use App\Models\NearestLocation;
use App\Models\division;
use Session;
use Illuminate\Support\Facades\Cookie;
 use Illuminate\Support\Facades\DB;
//use DB;
use Auth;

class PropertyController extends Controller
{
    public function addproperty(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $divisions  = division::all();
        $nlocations = NearestLocation::all();

        $pTypes = DB::select('select * from property_types');
        $pPurpose = DB::select('select * from property_purposes');
        $pAmenities = DB::select('select * from aminities');

        // $pTypes = property_type::all();
        // $pPurpose = PropertyPurpose::all();
        // $pAmenities = Aminity::all();

        return view('admin.property_addproperty',compact('sidebarCheck', 'pTypes', 'pPurpose', 'pAmenities', 'languages', 'nlocations', 'divisions'));
    }

    public function storingProperty(Request $req){
        $insert = new Property;

        $insert->title = $req->title;
        $insert->type = $req->type;
        $insert->purpose = $req->purpose;
        $insert->division = $req->division;
        $insert->address = $req->address;
        $insert->phone = $req->phone;
        $insert->email = $req->email;
        $insert->price = $req->price;
        $insert->area = $req->area;
        $insert->unit = $req->unit;
        $insert->room = $req->room;
        $insert->washroom = $req->washroom;
        $insert->floor = $req->floor;
        $insert->bedroom = $req->bedroom;
        $insert->kitchen = $req->kitchen;
        $insert->parking = $req->parking;
        if($req->hasFile('img')){
            $file = $req->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = "ID_".$req->userid."__title_".$req->title.rand().".".$ext;
            $file->move('uploads/img/', $filename);
            $insert->img = $filename;
        }
        $insert->video_link = $req->video_link;
        $insert->amenities = json_encode($req->aminities);

        $insert->locations = json_encode($req->nlocations);
        $insert->distance = json_encode($req->distance);

        $insert->google_map_embed_code = $req->google_maps_code;
        $insert->descriptions = $req->descriptions;
        $insert->featured = $req->featured;
        $insert->top_property = $req->top_property;
        $insert->urgent_property = $req->urgent_property;
        $insert->addedBy = $req->userid;

        $insert->save();

        Session::flash('scc', 'Property added successfully.');

        return redirect('seller_addProperty');
    }

    public function allProperty(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $properties = Property::all();

        return view('admin.property_allProperty',compact('sidebarCheck', 'properties', 'languages'));
    }

    public function editProperty($id=null){
        $eData = Property::find($id);
        $pTypes = property_type::all();
        $pPurpose = PropertyPurpose::all();
        $pAmenities = Aminity::all();
        $languages = Language::all();
        $sidebarCheck= 'property';
        return view('admin.property_edit_property', compact('sidebarCheck','eData', 'pTypes', 'pPurpose', 'pAmenities', 'languages'));
    }

    public function updateProperty(Request $req, $id){
        $rules = [
            "title" => "required | max:200",
        ];

        $msg = [
            "title.required" => "Property name field cannot be empty.",
            "title.max" => "your entered Property name is more than 200 characters long.",
        ];
        $this->validate($req, $rules, $msg);

        $upd = Property::find($id);

        $upd->title = $req->title;
        $upd->type = $req->type;
        $upd->purpose = $req->purpose;
        $upd->division = $req->division;
        $upd->address = $req->address;
        $upd->phone = $req->phone;
        $upd->email = $req->email;
        $upd->price = $req->price;
        $upd->area = $req->area;
        $upd->unit = $req->unit;
        $upd->room = $req->room;
        $upd->washroom = $req->washroom;
        $upd->floor = $req->floor;
        $upd->bedroom = $req->bedroom;
        $upd->kitchen = $req->kitchen;
        $upd->parking = $req->parking;
        // if($req->hasFile('newImg')){
        //     $file = $req->file('newImg');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = "ID: ".$req->userid." - title: ".$req->title.".".$ext;
        //     $file->move('uploads/img/', $filename);
        //     $upd->img = $filename;
        // }
        $upd->video_link = $req->video_link;
        // $upd->amenities = json_encode($req->aminities);

        // $upd->locations = json_encode($req->nlocations);
        // $upd->distance = json_encode($req->distance);

        $upd->google_map_embed_code = $req->google_maps_code;
        $upd->descriptions = $req->descriptions;
        $upd->featured = $req->featured;
        $upd->top_property = $req->top_property;
        $upd->urgent_property = $req->urgent_property;
        $upd->save();

        Session::flash('scc', 'Property updated successfully.');

        return redirect('property_addproperty');
    }

    public function delProperty($id=null){
        $dData = Property::find($id);

        $image_path = "uploads/jobs/".$dData->img;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $dData->delete();

        Session::flash('scc', 'Property deleted successfully.');

        return redirect('property_allProperty');
    }

    public function myProperty(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $addedBy = Auth::user()->id;
        $myproperties = DB::select('select * from properties where addedBy = ?', [$addedBy]);
        if($myproperties == null){
            Session::flash('scc', 'No property has been added by you.');
            return redirect('property_addproperty');
        }
        else{
            return view('admin.property_myProperty',compact('sidebarCheck', 'myproperties', 'languages'));
        }
    }

    // seller Property STARTS
    public function seller_addProperty(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $nlocations = NearestLocation::all();

        $pTypes = DB::select('select * from property_types');
        $pPurpose = DB::select('select * from property_purposes');
        $pAmenities = DB::select('select * from aminities');

        // Session::flash('scc', 'Property added successfully.');

        return view('seller.seller_addProperty',compact('sidebarCheck', 'pTypes', 'pPurpose', 'pAmenities', 'languages', 'nlocations'));
    }

    public function seller_myProperty(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $addedBy = Auth::user()->id;
        $myproperties = DB::select('select * from properties where addedBy = ?', [$addedBy]);
        if($myproperties == null){
            Session::flash('scc', 'No property has been added by you.');
            return redirect('seller_addProperty');
        }
        else{
            return view('seller.seller_myProperty',compact('sidebarCheck', 'myproperties', 'languages'));
        }
    }

    public function seller_propertyDetails($id=null){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $myproperty = Property::find($id);
        return view('seller.seller_propertyDetails', compact('sidebarCheck','myproperty', 'languages'));
    }


    public function seller_editProperty($id=null){
        $eData = Property::find($id);
        $pTypes = property_type::all();
        $pPurpose = PropertyPurpose::all();
        $pAmenities = Aminity::all();
        $languages = Language::all();
        $sidebarCheck= 'property';
        return view('seller.seller_editProperty', compact('sidebarCheck','eData', 'pTypes', 'pPurpose', 'pAmenities', 'languages'));
    }

    public function seller_updateProperty(Request $req, $id){
        $rules = [
            "title" => "required | max:200",
        ];

        $msg = [
            "title.required" => "Property name field cannot be empty.",
            "title.max" => "your entered Property name is more than 200 characters long.",
        ];
        $this->validate($req, $rules, $msg);

        $upd = Property::find($id);

        $upd->title = $req->title;
        $upd->type = $req->type;
        $upd->purpose = $req->purpose;
        $upd->division = $req->division;
        $upd->address = $req->address;
        $upd->phone = $req->phone;
        $upd->email = $req->email;
        $upd->price = $req->price;
        $upd->area = $req->area;
        $upd->unit = $req->unit;
        $upd->room = $req->room;
        $upd->washroom = $req->washroom;
        $upd->floor = $req->floor;
        $upd->bedroom = $req->bedroom;
        $upd->kitchen = $req->kitchen;
        $upd->parking = $req->parking;
        // if($req->hasFile('newImg')){
        //     $file = $req->file('newImg');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = "ID: ".$req->userid." - title: ".$req->title.".".$ext;
        //     $file->move('uploads/img/', $filename);
        //     $upd->img = $filename;
        // }
        $upd->video_link = $req->video_link;
        // $upd->amenities = json_encode($req->aminities);

        // $upd->locations = json_encode($req->nlocations);
        // $upd->distance = json_encode($req->distance);

        $upd->google_map_embed_code = $req->google_maps_code;
        $upd->descriptions = $req->descriptions;
        $upd->featured = $req->featured;
        $upd->top_property = $req->top_property;
        $upd->urgent_property = $req->urgent_property;
        $upd->save();

        Session::flash('scc', 'Property updated successfully.');

        return redirect('seller_myProperty');
    }

    public function seller_delProperty($id=null){
        $dData = Property::find($id);
        $dData->delete();

        Session::flash('scc', 'Property deleted successfully.');

        return redirect('seller_myProperty');
    }
    // seller Property ENDS
}
