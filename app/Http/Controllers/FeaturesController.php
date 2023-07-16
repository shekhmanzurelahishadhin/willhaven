<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\MainFeature;
use App\Models\ProductFeatures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FeaturesController extends Controller
{
    //
    public function techWeb_index()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.features.features',compact('sidebarCheck','languages'),[
            'categories'=>Category::get(),
            'features'=>MainFeature::get(),
        ]);
    }

    public function techWeb_saveFeatures(Request $request)
    {

        ProductFeatures::saveFeatures($request);
        Alert::toast('Features added Successfully', 'Toast Type');
        return back();
    }

    public function techWeb_getFeatures()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();

        return view('admin.features.manage-features',compact('sidebarCheck','languages'),[
            'features'=>DB::table('product_features')
                ->join('categories','categories.id','product_features.category_id')
                ->join('main_features','main_features.id','product_features.features_id')
                ->select('product_features.*','categories.category_name','main_features.features_name')
                ->get(),
        ]);
    }

    public function techWeb_editFeature($id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.features.edit-features',compact('sidebarCheck','languages'),[
            'feature'=>ProductFeatures::find($id),
            'featuresdata'=>MainFeature::get(),
            'categories'=>Category::all(),
        ]);
    }

    public function techWeb_updateFeature(Request $request)
    {
        ProductFeatures::updateFeatures($request);
        Alert::toast('Features updated Successfully', 'Toast Type');
        return back();
    }

    public function techWeb_main_index()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.features.main-features',compact('sidebarCheck','languages'),[
            'categories'=>Category::all(),
        ]);
    }

    public function techWeb_saveMainFeatures(Request $request)
    {
        MainFeature::saveFeatures($request);
        Alert::toast('Features added Successfully', 'Toast Type');
        return back();
    }

    public function techWeb_getMainFeatures()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();

        return view('admin.features.manage-main-features',compact('sidebarCheck','languages'),[
            'features'=>MainFeature::get(),
        ]);
    }

    public function techWeb_editMainFeature($id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.features.edit-main-features',compact('sidebarCheck','languages'),[
            'feature'=>MainFeature::find($id),
            'categories'=>Category::all(),
        ]);
    }

    public function techWeb_updateMainFeature(Request $request)
    {
        MainFeature::updateFeatures($request);
        Alert::toast('Features updated Successfully', 'Toast Type');
        return back();
    }
}
