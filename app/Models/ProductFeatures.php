<?php

namespace App\Models;

use App\Http\Controllers\FeaturesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    use HasFactory;
    public static $feature;

    public static function saveFeatures($request)
    {
        self::$feature= new ProductFeatures();
        self::$feature->category_id = $request->category_id;
        self::$feature->features_id = $request->features_id;
        self::$feature->features_property = json_encode($request->features_property);
        self::$feature->save();
    }

    public static function updateFeatures($request)
    {
        self::$feature= ProductFeatures::find($request->id);
        self::$feature->category_id = $request->category_id;
        self::$feature->features_id = $request->features_id;
        self::$feature->features_property = json_encode($request->features_property);
        self::$feature->save();
    }
}
