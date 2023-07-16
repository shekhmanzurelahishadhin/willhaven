<?php

namespace App\Http\Controllers;


use App\Models\CarMotorCategory;
use App\Models\CarMotorFeature;
use App\Models\CarMotorFeatureProperty;
use App\Models\Language;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CarMotorFeatureController extends Controller
{
    //
    public function techWeb_carMotorIndex()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.feature.car_motor_feature',compact('sidebarCheck','languages'));
    }

    public function techWeb_saveCarMotorFeatures(Request $request)
    {
        CarMotorFeature::saveFeatures($request);
        Alert::toast('Model Added Successfully', 'Toast Type');
        return back();
    }

    public function techWeb_getCarMotorFeatures()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();

        return view('admin.carsAndMotors.feature.manage_car_motor_feature',compact('sidebarCheck','languages'),[
            'features'=>CarMotorFeature::get(),
        ]);
    }

    public function techWeb_editCarMotorFeature($id)
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.feature.edit_car_motor_feature',compact('sidebarCheck','languages'),[
            'feature'=>CarMotorFeature::find($id),
        ]);
    }

    public function techWeb_updateCarMotorFeature(Request $request)
    {
        CarMotorFeature::updateFeatures($request);
        Alert::toast('Features updated Successfully', 'Toast Type');
        return back();
    }

//    Property
    public function techWeb_CarMotorFeaturesProperty()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.feature.car_motor_feature_property',compact('sidebarCheck','languages'),[
            'categories'=>CarMotorCategory::get(),
            'features'=>CarMotorFeature::get(),
        ]);
    }

    public function techWeb_saveCarMotorFeaturesProperty(Request $request)
    {
        CarMotorFeatureProperty::saveFeatures($request);
        Alert::toast('Features added Successfully', 'Toast Type');
        return back();
    }

    public function techWeb_getCarMotorFeaturesProperty()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();

        return view('admin.carsAndMotors.feature.manage_car_motor_feature_property',compact('sidebarCheck','languages'),[
            'features'=>DB::table('car_motor_feature_properties')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_feature_properties.category_id')
                ->join('car_motor_features','car_motor_features.id','car_motor_feature_properties.features_id')
                ->select('car_motor_feature_properties.*','car_motor_categories.category_name','car_motor_features.features_name')
                ->get(),
        ]);
    }

    public function techWeb_editCarMotorFeaturesProperty($id)
    {

        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.feature.edit_car_motor_feature_property',compact('sidebarCheck','languages'),[
            'feature'=>CarMotorFeatureProperty::find($id),
            'featuresdata'=>CarMotorFeature::get(),
            'categories'=>CarMotorCategory::get(),
        ]);
    }

    public function techWeb_updateCarMotorFeaturesProperty(Request $request)
    {
        CarMotorFeatureProperty::updateFeatures($request);
        Alert::toast('Features updated Successfully', 'Toast Type');
        return back();
    }
}
