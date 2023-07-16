<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public static $model;

    public static function saveModel($request)
    {
        self::$model = new ProductModel();
        self::$model->brand_id = $request->brand_id;
        self::$model->model_name = $request->model_name;
        self::$model->save();
    }

    public static function updateModel($request)
    {
        self::$model = ProductModel::find($request->id);
        self::$model->brand_id = $request->brand_id;
        self::$model->model_name = $request->model_name;
        self::$model->save();
    }
}
