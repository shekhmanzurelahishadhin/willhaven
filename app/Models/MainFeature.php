<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainFeature extends Model
{
    use HasFactory;
    public static $feature;

    public static function saveFeatures($request)
    {
        self::$feature= new MainFeature();
        self::$feature->features_name = $request->features_name;
        self::$feature->save();
    }
    public static function updateFeatures($request)
    {
        self::$feature= MainFeature::find($request->id);
        self::$feature->features_name = $request->features_name;
        self::$feature->save();
    }
}
