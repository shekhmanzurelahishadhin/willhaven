<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class ProductBrand extends Model
{
    use HasFactory;
    public static $brand, $image, $imageName, $imageDirectory, $imageUrl;

    //    save brand start
    public static function saveBrand($request)
    {
        self::$brand = new ProductBrand();
        self::$brand->brand_name = $request->brand_name;
        self::$brand->image = self::saveImage($request);
        self::$brand->save();
    }
    //save brand end

    //update brand start
    public static function updateBrand($request)
    {
        self::$brand = ProductBrand::find($request->id);
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
    //update brand end

    //save image start
    public static function saveImage($request)
    {
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = 'brand-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'backend/brand-image/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            Image::make(self::$image)->resize(100, 100)->save(public_path(self::$imageUrl));
            return self::$imageUrl;
        }
    }
    //    save image end
}
