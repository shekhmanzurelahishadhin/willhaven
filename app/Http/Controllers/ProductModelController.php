<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\ProductBrand;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductModelController extends Controller
{
    //
    public function index()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.model.add-model',compact('sidebarCheck','languages'),[
            'brands'=>ProductBrand::all(),
        ]);

    }

//    save model start
    public function saveModel(Request $request)
    {
        ProductModel::saveModel($request);
        Alert::toast('Model Added Successfully', 'Toast Type');
        return back();
    }
//save model end

//get model  start
    public function techWeb_getModel()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.model.manage-model',compact('sidebarCheck','languages'),[
            'models'=>DB::table('product_models')
                ->join('product_brands','product_brands.id','product_models.brand_id')
                ->select('product_models.*','product_brands.brand_name')
                ->get(),
        ]);
    }
//    get model end
//model edit start
    public function techWeb_editModel($id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.model.edit-model',compact('sidebarCheck','languages'),[
            'model'=>ProductModel::find($id),
            'brands'=>ProductBrand::all(),
        ]);
    }
//model edit end

//update model start
    public function techWeb_updateModel(Request $request)
    {
        ProductModel::updateModel($request);
        Alert::toast('Model Updated Successfully', 'Toast Type');
        return back();
    }
//update model end

}
