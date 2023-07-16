<?php

namespace App\Http\Controllers;

use App\Models\CarMotorBrand;
use App\Models\Language;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarMotorBrandController extends Controller
{
    //
//    brand add start
    public function techWeb_addCarMotorBrand()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.brand.car_motor_brand',compact('sidebarCheck','languages'));
    }
//    brand add end

    public function techWeb_addCarMotorSaveBrand(Request $request)
    {
        CarMotorBrand::saveCarMotorBrand($request);
        Alert::toast('Brand Added Successfully', 'Toast Type');
        return back();
    }

    public function techWeb_getCarMotorBrand()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.brand.manage_car_motor_brand',compact('sidebarCheck','languages'),[
            'brands'=>CarMotorBrand::get(),
        ]);
    }

    public function techWeb_editCarMotorBrand($id)
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.brand.edit_car_motor_brand',compact('sidebarCheck','languages'),[
            'brand'=>CarMotorBrand::find($id),
        ]);
    }

    public function techWeb_updateCarMotorBrand(Request $request)
    {
        CarMotorBrand::updateCarMotorBrand($request);
        Alert::toast('Brand Updated Successfully', 'Toast Type');
        return back();
    }
}
