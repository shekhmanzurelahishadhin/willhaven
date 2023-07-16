<?php

namespace App\Http\Controllers;

use App\Models\CarMotorBrand;
use App\Models\CarMotorModel;
use App\Models\Language;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class CarMotorModelController extends Controller
{
    //
    public function techWeb_addCarMotorModel()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.model.add_car_motor_model',compact('sidebarCheck','languages'),[
            'brands'=>CarMotorBrand::get(),
        ]);
    }

    public function techWeb_saveCarMotorModel(Request $request)
    {
        CarMotorModel::saveCarModelModel($request);
        Alert::toast('Model Added Successfully', 'Toast Type');
        return back();
    }

    public function techWeb_manageCarMotorModel()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.model.manage_car_motor_model',compact('sidebarCheck','languages'),[
            'models'=>DB::table('car_motor_models')
                ->join('car_motor_brands','car_motor_brands.id','car_motor_models.brand_id')
                ->select('car_motor_models.*','car_motor_brands.brand_name')
                ->get(),
        ]);
    }

    public function techWeb_editCarMotorModel($id)
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.model.edit_car_motor_model',compact('sidebarCheck','languages'),[
            'model'=>CarMotorModel::find($id),
            'brands'=>CarMotorBrand::all(),
        ]);
    }

    public function techWeb_updateCarMotorModel(Request $request)
    {
        CarMotorModel::updateCarMotorModel($request);
        Alert::toast('Model Updated Successfully', 'Toast Type');
        return back();
    }
}
