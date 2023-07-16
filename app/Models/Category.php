<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class Category extends Model
{
    use HasFactory;
    public static $category, $image, $imageName, $imageDirectory, $imageUrl;
    //    save category start
    public static function saveCategory($request)
    {
        self::$category = new Category();
        self::$category->category_name = $request->category_name;
        self::$category->image = self::saveImage($request);
        self::$category->save();
    }
    //    save category end
    //update category start
    public static function updateCategory($request)
    {
        self::$category = Category::find($request->id);
        self::$category->category_name = $request->category_name;

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
    //update category end

    //save image start
    public static function saveImage($request)
    {
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = 'category-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'backend/category-image/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            Image::make(self::$image)->resize(100, 100)->save(public_path(self::$imageUrl));
            //        self::$image->move(self::$imageDirectory,self::$imageName);
            return self::$imageUrl;
        }
    }
    //    save image end
}
