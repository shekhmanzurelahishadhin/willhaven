<?php

namespace App\Http\Controllers;

use App\Models\CarMotorSubCategory;
use App\Models\Category;
use App\Models\Language;
use App\Models\CarMotorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CarMotorCategoryController extends Controller
{
    //
//    add category start
    public function techWeb_addCarMotorCategory()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.car_motor_category.car_motor_category',compact('sidebarCheck','languages'));
    }
//    add category end

//save category start
    public function techWeb_saveCarMotorCategory(Request $request)
    {
//        return $request;
        CarMotorCategory::saveCarMotorCategory($request);
        Alert::toast('Category Added Successfully', 'Toast Type');
        return back();

    }
//    save category end

//get all category start
    public function techWeb_getCarMotorCategories()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.car_motor_category.car_motor_manage-category',compact('sidebarCheck','languages'),[
            'categories'=>CarMotorCategory::get(),
        ]);
    }
//get all category end

//car and motor category edit start
    public function techWeb_editCarMotorCategory($category_id)
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.car_motor_category.car_motor_edit-category',compact('sidebarCheck','languages'),[
            'category'=>CarMotorCategory::find($category_id),
        ]);

    }
//car and motor category edit end

//car and motor category update start
    public function techWeb_updateCarMotorCategory(Request $request)
    {
//        return $request;
        CarMotorCategory::updateCarMotorCategory($request);
        Alert::toast('Category Updated Successfully', 'Toast Type');
        return back();
    }
//car and motor category update end

//sub category start
    //add subcategory start//
    public function techWeb_addCarMotorSubCategory()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.car_motor_category.car_motor_sub_category',compact('sidebarCheck','languages'),[
            'categories'=>CarMotorCategory::all(),
        ]);
    }
//    add sub category end

//save sub category start
    public function techWeb_saveCarMotorSubCategory(Request $request)
    {
//        return $request;
        CarMotorSubCategory::saveSubCategory($request);
        Alert::toast('SubCategory Added Successfully', 'Toast Type');
        return back();
    }
//    save sub category end

//manage sub category start
    public function techWeb_getCarMotorSubCategories()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();


        return view('admin.carsAndMotors.car_motor_category.manage_car_motor_sub_category',compact('sidebarCheck','languages'),[

            'subCategories'=>DB::table('car_motor_sub_categories')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_sub_categories.category_id')
                ->select('car_motor_sub_categories.*','car_motor_categories.category_name')
                ->get()
        ]);
    }

//manage sub category end
//edit sub category start
    public function techWeb_editCarMotorSubCategory($id)
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.car_motor_category.edit_car_motor_sub_category',compact('sidebarCheck','languages'),[
            'subCategory'=>CarMotorSubCategory::find($id),
            'categories'=>CarMotorCategory::get(),
        ]);
    }
//edit sub category end
//update sub category start
    public function techWeb_updateCarMotorSubCategory(Request $request)
    {
//        return $request;
        CarMotorSubCategory::updateCarMotorSubCategory($request);
        Alert::toast('Sub Category Updated Successfully', 'Toast Type');
        return back();
    }
//update sub category end
//sub category end
}
