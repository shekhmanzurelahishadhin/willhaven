<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMotorFeatureProperty extends Model
{
    use HasFactory;
    public static $feature;

    public static function saveFeatures($request)
    {
        self::$feature= new CarMotorFeatureProperty();
        self::$feature->category_id = $request->category_id;
        self::$feature->features_id = $request->features_id;
        self::$feature->features_property = json_encode($request->features_property);
        self::$feature->save();
    }

    public static function updateFeatures($request)
    {
        self::$feature= CarMotorFeatureProperty::find($request->id);
        self::$feature->category_id = $request->category_id;
        self::$feature->features_id = $request->features_id;
        self::$feature->features_property = json_encode($request->features_property);
        self::$feature->save();
    }
}
