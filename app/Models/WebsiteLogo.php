<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class WebsiteLogo extends Model
{
    use HasFactory;
    public static $category, $image, $imageName, $imageDirectory, $imageUrl;
    //    save category start
    public static function saveWebsiteLogo($request)
    {
        if($request->id){
            self::$category = WebsiteLogo::find($request->id);
            if ($request->file('image')) {
                if (self::$category->image) {
                    if (file_exists(self::$category->image)) {
                        unlink(self::$category->image);
                        self::$category->image = self::saveImage($request);
                    }
                } else {
                    self::$category->image = self::saveImage($request);
                }
            }
            self::$category->save();
        }
        else{
            self::$category = new WebsiteLogo();
            self::$category->image = self::saveImage($request);
            self::$category->save();
        }

    }
    //save category end

    //save image start
    public static function saveImage($request)
    {
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = 'logo-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'backend/logo-image/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            self::$image->move(self::$imageDirectory,self::$imageName);
            return self::$imageUrl;
        }
    }
}
