<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    public static $sub_sub_category;

    public static function saveSubSubCategory($request)
    {
        self::$sub_sub_category = New SubSubCategory();
        self::$sub_sub_category->category_id = $request->category_id;
        self::$sub_sub_category->sub_category_id = $request->sub_category_id;
        self::$sub_sub_category->sub_sub_category_name = $request->sub_sub_category_name;
        self::$sub_sub_category->save();
    }
}
