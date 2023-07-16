<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\InHouseProduct;
use App\Models\Language;
use App\Models\ProductBrand;
use App\Models\ProductFeatures;
use App\Models\ProductModel;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubDistrict;
use App\Models\SubSubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InHouseProductController extends Controller
{
    //
    public function techWeb_manage()
    {
        // dd('hi');
        $sidebarCheck = 'marketplace';
        $languages = Language::all();
//        return DB::table('in_house_products')
//            ->join('categories','categories.id','in_house_products.category_id')
//            ->join('sub_categories','sub_categories.id','in_house_products.sub_category_id')
//            ->join('sub_sub_categories','sub_sub_categories.id','in_house_products.sub_sub_category_id')
//            ->join('product_brands','product_brands.id','in_house_products.brand_id')
//            ->select('in_house_products.*','categories.category_name','sub_categories.sub_category_name','sub_sub_categories.sub_sub_category_name','product_brands.brand_name')
//            ->get();

        return view('admin.in-house-product.manage_in_house_product', compact('sidebarCheck', 'languages'), [
            'inhouse' => DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->join('sub_categories','sub_categories.id','in_house_products.sub_category_id')
                ->join('sub_sub_categories','sub_sub_categories.id','in_house_products.sub_sub_category_id')
                ->join('product_brands','product_brands.id','in_house_products.brand_id')
                ->select('in_house_products.*','categories.category_name','sub_categories.sub_category_name','sub_sub_categories.sub_sub_category_name','product_brands.brand_name')
                ->get(),
            'brands' => ProductBrand::all(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'subsubcategories' => SubSubCategory::all(),
        ]);
    }

    public function techWeb_edit_product($id)
    {
        $sidebarCheck = 'marketplace';
        $product_details = InHouseProduct::find($id);

        $languages = Language::all();
        return view('admin.in-house-product.edit-inhouse-product', compact('sidebarCheck', 'languages'), [
            'product'=>InHouseProduct::find($id),
            'brands' => ProductBrand::all(),
            'models'=>ProductModel::all(),
            'features' => ProductFeatures::where('category_id',$product_details->category_id)->get(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'subsubcategories' => SubSubCategory::all(),
            'districts'=>District::all(),
            'subDistricts'=>SubDistrict::all(),
        ]);
    }

    public function techWeb_update_product(Request $request)
    {
//        return $request;
        InHouseProduct::updateInhouseProduct($request);
        Alert::toast('Product update Successfully', 'Toast Type');
        return back();
        return back();
    }
    public function techWeb_index()
    {
        $sidebarCheck = 'marketplace';
        $languages = Language::all();
        return view('admin.in-house-product.in_house_product', compact('sidebarCheck', 'languages'), [
            'brands' => ProductBrand::all(),
            'features' => ProductFeatures::all(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'subsubcategories' => SubSubCategory::all(),
            'districts'=>District::all(),
            'subDistricts'=>SubDistrict::all(),
        ]);
    }

    public function techWeb_add_inHouseProduct_frontEnd(Request $request)
    {
//        return ProductFeatures::where('category_id',$request->category_id)->get();
        $languages = Language::all();
        return view('front-page.home.in_house_product_frontEnd', compact( 'languages'), [
            'brands' => ProductBrand::all(),
//            'features' => ProductFeatures::where('category_id',$request->category_id)->get(),
            'features' => DB::table('product_features')
            ->join('main_features','product_features.features_id','main_features.id')
            ->select('product_features.*','main_features.features_name')
            ->where('product_features.category_id',$request->category_id)
            ->get(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'subsubcategories' => SubSubCategory::all(),
            'districts'=>District::all(),
            'subDistricts'=>SubDistrict::all(),
            'district_id'=>$request->district_id,
            'sub_district_id'=>$request->sub_district_id,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'sub_sub_category_id'=>$request->sub_sub_category_id,
        ]);
    }

    public function techWeb_edit_inHouseProduct_frontEnd($id)
    {
        $languages = Language::all();
        $product=InHouseProduct::find($id);

        return view('front-page.home.post-list.edit_in_house_product_frontEnd', compact( 'languages'), [
            'brands' => ProductBrand::all(),
            'models' => ProductModel::where('id',$product->model_id)->get(),
            'product'=>$product,
            'features' => ProductFeatures::where('category_id',$product->category_id)->get(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'subsubcategories' => SubSubCategory::all(),
            'districts'=>District::all(),
            'subDistricts'=>SubDistrict::all(),
            'district_id'=>$product->district_id,
            'sub_district_id'=>$product->sub_district_id,
            'category_id'=>$product->category_id,
            'sub_category_id'=>$product->sub_category_id,
            'sub_sub_category_id'=>$product->sub_sub_category_id,
        ]);
    }

    public function techWeb_getModel($id)
    {
        $model = ProductModel::where('brand_id', $id)->get();
        return response()->json($model);
    }

    public function techWeb_getFeatures($id)
    {
        $feature = ProductFeatures::where('category_id', $id)->get();
        return response()->json($feature);
    }

    public function techWeb_getFeaturesProperty($data)
    {
        $feature = ProductFeatures::where('features_name', $data)->first();
        return response()->json($feature);
    }

    public function techWeb_saveInHouseProduct(Request $request)
    {

//        return $request;
        if(sizeof($request->images) >5){
            return back()->with('message','You Cant upload more than 5 images');
        }
        else{
            InHouseProduct::saveInHouseProduct($request);
            Alert::toast('Product added Successfully', 'Toast Type');
            return back();
        }

    }

    public function techWeb_getSubDistrict($id)
    {

        $subdistrict = SubDistrict::where('district_id',$id)->get();
        return response()->json($subdistrict);
    }

    public function techWeb_get_inHouse_product_category()
    {
        $languages = Language::all();
        return view('front-page.home.inhouse_product_category',compact('languages'),[
            'categories'=>Category::all(),
        ]);
    }
    public function techWeb_get_inHouse_product_subCategory($category_id)
    {
//        return $category_id;
        $languages = Language::all();
        return view('front-page.home.inhouse_product_subCategory',compact('languages'),[
            'categories'=>Category::all(),
            'sub_categories'=>SubCategory::where('category_id',$category_id)->get(),
            'category_id'=>$category_id,
        ]);
    }
    public function techWeb_get_inHouse_product_subSubCategory($sub_category_id)
    {
//        return $category_id;
        $sub_category_details = SubCategory::find($sub_category_id);
        $sub_sub_category_count = SubSubCategory::where('sub_category_id',$sub_category_id)->get()->count();


//        return $sub_category_details;
        if($sub_sub_category_count == 0){
            $languages = Language::all();
            return view('front-page.home.inhouse_product_district',compact('languages'),[
                'districts'=>District::all(),
                'category_id'=>$sub_category_details->category_id,
                'sub_category_id'=>$sub_category_details->id,
            ]);
        }
        else{
            $languages = Language::all();
            return view('front-page.home.inhouse_product_subSubCategory',compact('languages'),[
                'categories'=>Category::all(),
                'sub_categories'=>SubCategory::where('category_id',$sub_category_details->category_id)->get(),
                'sub_sub_categories'=>SubSubCategory::where('sub_category_id',$sub_category_id)->get(),
                'category_id'=>$sub_category_details->category_id,
                'sub_category_id'=>$sub_category_details->id,
            ]);
        }

    }

    public function techWeb_get_inHouse_product_district(Request $request)
    {
//        return $request;
        $languages = Language::all();
        return view('front-page.home.inhouse_product_district',compact('languages'),[
            'districts'=>District::all(),
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'sub_sub_category_id'=>$request->sub_sub_category_id,
        ]);
    }

    public function techWeb_get_inHouse_product_subDistrict($district_id,Request $request)
    {
        $languages = Language::all();


//        return SubDistrict::where('id',$sub_district_details->district_id)->get();
        return view('front-page.home.inhouse_product_sub_district',compact('languages'),[
            'sub_districts'=> SubDistrict::where('district_id',$district_id)->get(),
            'districts'=>District::all(),
            'district_id'=>$district_id,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'sub_sub_category_id'=>$request->sub_sub_category_id,

        ]);
    }
}
