<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductBrandController extends Controller
{
    //
//    brand start
    public function index()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.brand.add-brand',compact('sidebarCheck','languages'));

    }
//    brand end

//brand save start
    public function saveBrand(Request $request)
    {
        ProductBrand::saveBrand($request);
        Alert::toast('Brand Added Successfully', 'Toast Type');
        return back();
    }
//    brand save end

//get brand  start
    public function techWeb_getBrand()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.brand.manage-brand',compact('sidebarCheck','languages'),[
            'brands'=>ProductBrand::all(),
        ]);
    }
//    get brand end

//brand edit start
    public function techWeb_editBrand($id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.brand.edit-brand',compact('sidebarCheck','languages'),[
            'brand'=>ProductBrand::find($id),
        ]);
    }
//brand edit end

//update brand start
    public function techWeb_updateBrand(Request $request)
    {
        ProductBrand::updateBrand($request);
        Alert::toast('Brand Updated Successfully', 'Toast Type');
        return back();
    }
//update brand end

}
