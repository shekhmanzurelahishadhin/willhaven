<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMotorModel extends Model
{
    use HasFactory;
    public static $model;
    public static function saveCarModelModel($request)
    {
        self::$model = new CarMotorModel();
        self::$model->brand_id = $request->brand_id;
        self::$model->model_name = $request->model_name;
        self::$model->save();
    }

    public static function updateCarMotorModel($request)
    {
        self::$model = CarMotorModel::find($request->id);
        self::$model->brand_id = $request->brand_id;
        self::$model->model_name = $request->model_name;
        self::$model->save();
    }
}
