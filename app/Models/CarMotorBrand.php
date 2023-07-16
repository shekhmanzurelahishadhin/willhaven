<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class CarMotorBrand extends Model
{
    use HasFactory;
    public static $brand, $image, $imageName, $imageDirectory, $imageUrl;

    //    save brand start
    public static function saveCarMotorBrand($request)
    {
        self::$brand = new CarMotorBrand();
        self::$brand->brand_name = $request->brand_name;
        self::$brand->image = self::saveImage($request);
        self::$brand->save();
    }
    //save brand end

    public static function updateCarMotorBrand($request)
    {
        self::$brand = CarMotorBrand::find($request->id);
        self::$brand->brand_name = $request->brand_name;

        if ($request->file('image')) {
            if (self::$brand->image) {
                if (file_exists(self::$brand->image)) {
                    unlink(self::$brand->image);
                    self::$brand->image = self::saveImage($request);
                }
            } else {
                self::$brand->image = self::saveImage($request);
            }
        }
        self::$brand->save();
    }
    //save image start
    public static function saveImage($request)
    {
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = 'car-motor-brand-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'backend/car-motor-brand-image/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            Image::make(self::$image)->resize(100, 100)->save(public_path(self::$imageUrl));
            return self::$imageUrl;
        }
    }
    //    save image end
}
