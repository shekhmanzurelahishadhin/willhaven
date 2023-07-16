<?php

namespace App\Http\Controllers;

use App\Models\CarMotorCategory;
use App\Models\Category;
use App\Models\Language;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    //
//    add category start
    public function addCategory()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.category',compact('sidebarCheck','languages'));
    }
//    add category end
//save category start
    public function saveCategory(Request $request)
    {

        Category::saveCategory($request);
        Alert::toast('Category Added Successfully', 'Toast Type');
        return back();
    }
//save category end
//get category start
    public function techWeb_getCategories()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.manage-category',compact('sidebarCheck','languages'),[
            'categories'=>Category::all(),
        ]);
    }
//    get category end

//edit category start
    public function techWeb_editCategory($category_id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.edit-category',compact('sidebarCheck','languages'),[
            'category'=>Category::find($category_id),
        ]);
    }
//    edit category end
//update category start
    public function techWeb_updateCategory(Request $request)
    {
        Category::updateCategory($request);
        Alert::toast('Category Updated Successfully', 'Toast Type');
        return back();
    }

//update category end

//sub category start
    //add subcategory start//
    public function addSubCategory()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.sub-category',compact('sidebarCheck','languages'),[
            'categories'=>Category::all(),
        ]);
    }
//    add sub category end

//save sub category start
    public function saveSubCategory(Request $request)
    {
        SubCategory::saveSubCategory($request);
        return back();
    }
//    save sub category end

//manage sub category start
    public function techWeb_getSubCategories()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();


        return view('admin.manage-sub-category',compact('sidebarCheck','languages'),[

            'subCategories'=>DB::table('sub_categories')
                ->join('categories','categories.id','sub_categories.category_id')
                ->select('sub_categories.*','categories.category_name')
                ->get()
        ]);
    }

//manage sub category end

//edit sub category start
    public function techWeb_editSubCategory($id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.edit-sub-category',compact('sidebarCheck','languages'),[
            'subCategory'=>SubCategory::find($id),
            'categories'=>Category::all(),
        ]);
    }
//    edit sub category end
//update sub category start
    public function techWeb_updateSubCategory(Request $request)
    {
        SubCategory::updateSubCategory($request);
        Alert::toast('Sub Category Updated Successfully', 'Toast Type');
        return back();
    }
//update sub category end
//    sub category end


//    sub sub category start
    public function addSubSubCategory()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.sub-sub-category',compact('sidebarCheck','languages'),[
            'categories'=>Category::all(),
            'subCategories'=>SubCategory::all(),
        ]);
    }

    public function saveSubSubCategory(Request $request)
    {
        SubSubCategory::saveSubSubCategory($request);
        return back();

    }

    public function getSubCategory($categoryId)
    {
        $subcategory = SubCategory::where('category_id',$categoryId)->get();
        return response()->json($subcategory);

    }public function getSubSubCategory($sub_categoryId)
    {
        $subSubCategory = SubSubCategory::where('sub_category_id',$sub_categoryId)->get();
        return response()->json($subSubCategory);

    }

//    get all sub sub category start
    public function techWeb_SubSubCategories()
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();


        return view('admin.manage-sub-sub-category',compact('sidebarCheck','languages'),[
        'subSubCategories'=>DB::table('sub_sub_categories')
            ->join('categories','categories.id','sub_sub_categories.category_id')
            ->join('sub_categories','sub_categories.id','sub_sub_categories.sub_category_id')
            ->select('sub_sub_categories.*','categories.category_name','sub_categories.sub_category_name')
            ->get(),
        ]);
    }
//    get all sub sub category end
//edit sub sub category start
    public function techWeb_editSubSubCategories($id)
    {
        $sidebarCheck= 'marketplace';
        $languages = Language::all();
        return view('admin.edit-sub-sub-category',compact('sidebarCheck','languages'),[
            'subCategories'=>SubCategory::all(),
            'categories'=>Category::all(),
            'subSubCategory'=>SubSubCategory::find($id),
        ]);
    }
//edit sub sub category end
//update sub sub category start
    public function techWeb_updateSubSubCategory(Request $request)
    {
        SubSubCategory::updateSubSubCategory($request);
        Alert::toast('Sub Sub Category Updated Successfully', 'Toast Type');
        return back();
    }
//update sub sub category end
//    sub sub category end
}
