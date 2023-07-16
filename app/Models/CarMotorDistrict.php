<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMotorDistrict extends Model
{
    use HasFactory;
    public static $district;

    public static function saveDistrict($request)
    {
        self::$district = new CarMotorDistrict();
        self::$district->district_name = $request->district_name;
        self::$district->save();
    }

    public static function updateDistrict($request)
    {
        self::$district = CarMotorDistrict::find($request->id);
        self::$district->district_name = $request->district_name;
        self::$district->save();
    }
}
