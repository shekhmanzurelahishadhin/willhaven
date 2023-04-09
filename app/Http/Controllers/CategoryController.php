<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function addCategory()
    {
        $sidebarCheck= 'category';
        return view('admin.category',compact('sidebarCheck'));
    }

    public function saveCategory(Request $request)
    {
        Category::saveCategory($request);
        return back();
    }

    //add subcategory start//
    public function addSubCategory()
    {
        $sidebarCheck= 'category';
        return view('admin.sub-category',compact('sidebarCheck'),[
            'categories'=>Category::all(),
        ]);
    }

    public function saveSubCategory(Request $request)
    {
        SubCategory::saveSubCategory($request);
        return back();
    }
    public function addSubSubCategory()
    {
        $sidebarCheck= 'category';
        return view('admin.sub-sub-category',compact('sidebarCheck'),[
            'categories'=>Category::all(),
            'subCategories'=>SubCategory::all(),
        ]);
    }

    public function saveSubSubCategory(Request $request)
    {
        SubSubCategory::saveSubSubCategory($request);
        return back();

    }

    public function getSubSubCategory($categoryId)
    {
        $subcategory = SubCategory::where('category_id',$categoryId)->get();
        return response()->json($subcategory);
//        return $categoryId;

    }
}
