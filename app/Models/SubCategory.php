<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    use HasFactory;
    public static $sub_category;

    public static function saveSubCategory($request)
    {
        self::$sub_category = New SubCategory();
        self::$sub_category->category_id = $request->category_id;
        self::$sub_category->sub_category_name = $request->sub_category_name;
        self::$sub_category->save();
    }

    public static function updateSubCategory($request)
    {
        self::$sub_category = SubCategory::find($request->id);
        self::$sub_category->category_id = $request->category_id;
        self::$sub_category->sub_category_name = $request->sub_category_name;
        self::$sub_category->save();
    }
}
