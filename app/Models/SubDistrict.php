<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    public static $sub_district;
    public static function saveSubDistrict($request)
    {
        self::$sub_district = new SubDistrict();
        self::$sub_district->district_id = $request->district_id;
        self::$sub_district->sub_district_name = $request->sub_district_name;
        self::$sub_district->save();
    }
    public static function updateSubDistrict($request)
    {
        self::$sub_district = SubDistrict::find($request->id);
        self::$sub_district->district_id = $request->district_id;
        self::$sub_district->sub_district_name = $request->sub_district_name;
        self::$sub_district->save();
    }
}
