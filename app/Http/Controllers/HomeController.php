<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\NearestLocation;
use Illuminate\Http\Request;
use App\Models\aminity;
use App\Models\property_type;
use App\Models\PropertyPurpose;
use App\Models\Property;
use Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class HomeController extends Controller
{
    public $sidebarCheck;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sidebarCheck= 'user';
        $languages = Language::all();
        return view('home',compact('sidebarCheck','languages'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $sidebarCheck= 'admin';
        $languages = Language::all();
        return view('adminHome',compact('sidebarCheck','languages'));
    }
    public function sellerHome()
    {

        $sidebarCheck= 'seller';
        $languages = Language::all();
        return view('sellerHome',compact('sidebarCheck','languages'));
    }

    public function marketPlace()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('seller.market-place',compact('sidebarCheck','languages'));
    }
    public function property()
    {
        $sidebarCheck= 'property';
        $languages = Language::all();
        return view('seller.property',compact('sidebarCheck','languages'));
    }
    public function carMotor()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('seller.cars-motors',compact('sidebarCheck','languages'));
    }
    public function job()
    {
        $sidebarCheck= 'job';
        $languages = Language::all();
        return view('seller.job',compact('sidebarCheck','languages'));
    }

    //aminity

    public function property_Aminity(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $data = Aminity::all();

        return view('admin.property_aminities',compact('sidebarCheck', 'data', 'languages'));
    }
    public function property_Location(){
        $sidebarCheck= 'property';
        $languages = Language::all();
        $data = NearestLocation::all();

        return view('admin.property_location',compact('sidebarCheck', 'data', 'languages'));
    }
    public function property_Types(){
        $sidebarCheck= 'property';
        $languages = Language::all();

        return view('admin.property_types',compact('sidebarCheck', 'languages'));
    }
    public function property_Purpose(){
        $sidebarCheck= 'property';
        $languages = Language::all();

        return view('admin.property_purpose',compact('sidebarCheck', 'languages'));
    }


    public function create_Aminity(){
        $sidebarCheck= 'property';
        $languages = Language::all();

        return view('admin.property_create_aminity',compact('sidebarCheck', 'languages'));
    }
    public function store_Aminity(Request $req){
        $sidebarCheck= 'property';

        $rules = [
            'name' => 'required | max:100',
        ];

        $msg = [
            "name.required" => "You haven't entered amenity name. Please enter the amenity name.",
            "name.max" => "Your amenity must not exceed 100 characters.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = new Aminity();
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Aminity created successfully.');

        return redirect('/property_aminities');
    }
    public function edit_Aminity($id=null){
        $eData = Aminity::find($id);
        $sidebarCheck= 'property';
        $languages = Language::all();

        return view('admin.property_edit_aminity', compact('sidebarCheck','eData', 'languages'));
    }
    public function update_Aminity(Request $req, $id){
        $rules = [
            "name" => "required | max:100",
        ];

        $msg = [
            "name.required" => "Animity name field cannot be empty.",
            "name.max" => "your entered name is more than 100 characters long.",
        ];
        $this->validate($req, $rules, $msg);

        $crud = Aminity::find($id);
        $crud->name = $req->name;
        $crud->save();

        Session::flash('scc', 'Amnity name updated successfully.');

        return redirect('/property_aminities');
    }
    public function del_Aminity($id=null){
        $dData = Aminity::find($id);
        $dData->delete();

        Session::flash('scc', 'Aminity deleted successfully.');

        return redirect('/property_aminities');
    }

}
