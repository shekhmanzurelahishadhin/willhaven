<?php

namespace App\Http\Controllers;

use App\Models\CarMotorDistrict;
use App\Models\Language;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarMotorLocation extends Controller
{
    //
    public function addCarMotorDistrict()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.location.add_car_motor_district',compact('sidebarCheck','languages'));
    }

    public function saveCarMotorDistrict(Request $request)
    {
        CarMotorDistrict::saveDistrict($request);
        Alert::toast('District Added Successfully', 'Toast Type');
        return back();
    }

    public function mangeCarMotorDistrict()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.location.manage_car_motor_district',compact('sidebarCheck','languages'),[
            'districts'=>CarMotorDistrict::get(),
        ]);
    }

    public function editCarMotorDistrict($id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.carsAndMotors.location.edit_car_motor_district',compact('sidebarCheck','languages'),[
            'district'=>CarMotorDistrict::find($id),
        ]);
    }
}
