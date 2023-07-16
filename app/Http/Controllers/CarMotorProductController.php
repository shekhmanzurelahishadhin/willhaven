<?php

namespace App\Http\Controllers;

use App\Models\CarMotorBrand;
use App\Models\CarMotorCategory;
use App\Models\CarMotorDistrict;
use App\Models\CarMotorFeature;
use App\Models\CarMotorFeatureProperty;
use App\Models\CarMotorModel;
use App\Models\CarMotorProduct;
use App\Models\CarMotorSubCategory;
use App\Models\District;
use App\Models\InHouseProduct;
use App\Models\Language;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CarMotorProductController extends Controller
{
    //
    public function techWeb_addCarMotorProduct()
    {
        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('admin.carsAndMotors.carMotorProduct.add_car_motor_product',compact('sidebarCheck','languages'),[
            'categories'=>CarMotorCategory::get(),
            'brands'=>CarMotorBrand::get(),
            'districts'=>District::get(),
        ]);
    }
    public function techWeb_getCarMotorSubCategory($id)
    {
        $feature = CarMotorSubCategory::where('category_id', $id)->get();
        return response()->json($feature);
    }

    public function techWeb_getCarMotorModel($id)
    {
        $model = CarMotorModel::where('brand_id', $id)->get();
        return response()->json($model);
    }

    public function techWeb_getCarMotorFeatures($id)
    {
        $feature = DB::table('car_motor_feature_properties')
        ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
        ->select('car_motor_feature_properties.*','car_motor_features.features_name')
        ->get();
        return response()->json($feature);
    }

    public function techWeb_saveCarMotorProduct(Request $request)
    {
//        return $request;
        CarMotorProduct::saveInHouseProduct($request);
        Alert::toast('Product added Successfully', 'Toast Type');
        return back();
    }


    public function techWeb_get_carMotor_product_category()
    {
        $state = 'carAndMotors';
        $languages = Language::all();
        return view('front-page.home.car-motor.carMotor_product_category',compact('languages','state'),[
            'categories'=>CarMotorCategory::get(),
        ]);
    }

    public function techWeb_get_carMotor_product_subCategory($category_id)
    {
        $languages = Language::all();
        $carMotorSubCategoryCount = CarMotorSubCategory::where('category_id',$category_id)->get()->count();
        if ($carMotorSubCategoryCount==0){
            return view('front-page.home.car-motor.carMotor_product_district',compact('languages'),[
                'category_id'=>$category_id,
                'districts'=>District::get(),
            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_product_subCategory',compact('languages'),[
                'categories'=>CarMotorCategory::get(),
                'sub_categories'=>CarMotorSubCategory::where('category_id',$category_id)->get(),
                'category_id'=>$category_id,
            ]);
        }

    }

    public function techWeb_get_carMotor_product_district(Request $request)
    {
//        return $request;
        $languages = Language::all();
        return view('front-page.home.car-motor.carMotor_product_district',compact('languages'),[
            'districts'=>District::all(),
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
        ]);
    }

    public function techWeb_get_carMotor_product_subDistrict($district_id,Request $request)
    {

        $languages = Language::all();


//        return SubDistrict::where('id',$sub_district_details->district_id)->get();
        return view('front-page.home.car-motor.carMotor_product_subDistrict',compact('languages'),[
            'sub_districts'=> SubDistrict::where('district_id',$district_id)->get(),
            'districts'=>District::all(),
            'district_id'=>$district_id,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,

        ]);
    }

    public function techWeb_add_carMotor_frontEnd(Request $request)
    {


        $sidebarCheck= 'carMotor';
        $languages = Language::all();
        return view('front-page.home.car-motor.add_carMotor_product_frontEnd',compact('sidebarCheck','languages'),[
            'categories'=>CarMotorCategory::get(),
            'brands'=>CarMotorBrand::get(),
            'models'=>CarMotorModel::get(),
            'features'=>CarMotorFeature::get(),
            'feature_properties'=>DB::table('car_motor_feature_properties')
                ->join('car_motor_features','car_motor_features.id','car_motor_feature_properties.features_id')
                ->where('category_id',$request->category_id)
                ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                ->get(),
            'districts'=>District::all(),
            'subDistricts'=>SubDistrict::all(),
            'district_id'=>$request->district_id,
            'sub_district_id'=>$request->sub_district_id,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
        ]);
    }

    public function techWeb_carMotorProductDetails($id,Request $request)
    {
        $languages = Language::all();
        $state=$request->state;
        $product=CarMotorProduct::find($id);
        return view('front-page.home.car-motor.carMotor_product_details',compact('languages','state'),[
            'product'=> CarMotorProduct::where('id',$id)->first(),
            'products'=> CarMotorProduct::where('sub_category_id',$product->sub_category_id)->get(),

            'product_features'=>CarMotorFeature::all(),
            'category'=>CarMotorCategory::where('id',$product->category_id)->first(),
            'sub_category'=>CarMotorSubCategory::where('id',$product->sub_category_id)->first(),

        ]);
    }
//all car motor product start
    public function techWeb_getAllCarMotorProduct()
    {

        $languages = Language::all();
        return view('front-page.home.car-motor.all-carMotor-product',compact('languages'),[
            'categories'=>CarMotorCategory::all(),
            'products'=> CarMotorProduct::paginate(6),
        ]);
    }
//all car motor product end
//    car motor filter start
    public function techWeb_getCarMotorByCategory($id, Request $request)
    {
        $state = 'carAndMotors';
        $languages = Language::all();
        $search = $request['search']??"";
        if ($request->category_id){
            $product1=DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('category_id',$request->category_id)
                ->where('title','LIKE',"%$search%")
                ->paginate(10);
            $product2 = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $category = CarMotorCategory::find($request->category_id);
            $sub_category = CarMotorSubCategory::where('category_id',$request->category_id)->get();
            $features=DB::table('car_motor_feature_properties')
                ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                ->where('car_motor_feature_properties.category_id',$request->category_id)
                ->get();
        }
        else{
            $product1=DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('car_motor_products.category_id',$id)
                ->where('title','LIKE',"%$search%")
                ->paginate(10);
            $product2 = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('car_motor_products.category_id',$id)
                ->paginate(10);
            $category = CarMotorCategory::find($id);
            $sub_category = CarMotorSubCategory::where('category_id',$id)->get();
            $features = DB::table('car_motor_feature_properties')
                ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                ->where('car_motor_feature_properties.category_id',$id)
                ->get();
        }
//        return $request;

        if ($search != ""){
            return view('front-page.home.car-motor.carMotor_by_category',compact('languages','state'),[
                'features'=>$features,
                'search'=>$search,
                'categories'=>CarMotorCategory::all(),
                'category'=>$category,
                'subcategories'=>$sub_category,
                'brands'=>CarMotorBrand::get(),
                'product_districts'=>District::get(),

                'products'=> $product1,
            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_category',compact('languages','state'),[
                'features'=>$features,
                'categories'=>CarMotorCategory::all(),
                'category'=>$category,
                'subcategories'=>$sub_category,
                'brands'=>CarMotorBrand::get(),
                'product_districts'=>District::get(),
                'products'=> $product2,
            ]);
        }

    }

    public function techWeb_getCarMotorBySubCategory($id, Request $request)
    {


        $sub_category_details = CarMotorSubCategory::find($id);
//        return DB::table('car_motor_products')
//                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
//                    ->select('car_motor_products.*','car_motor_categories.category_name')
//                    ->where('sub_category_id',$id)->get();
        $languages = Language::all();

        $search = $request['search']??"";
        if ($search != ""){
            return view('front-page.home.car-motor.carMotor-by-subCategory',compact('languages'),[
                'categories'=>CarMotorCategory::all(),
                'subcategories'=>CarMotorSubCategory::where('category_id',$sub_category_details->category_id)->get(),
                'features'=>CarMotorFeatureProperty::where('category_id',$sub_category_details->category_id)->get(),
                'category'=>CarMotorCategory::where('id',$sub_category_details->category_id)->first(),
                'sub_category'=>CarMotorSubCategory::where('id',$sub_category_details->id)->first(),
                'product_districts'=> District::all(),
                'brands'=>CarMotorBrand::all(),
                'category_id'=>$sub_category_details->category_id,

//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'search'=>$search,
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('sub_category_id',$id)
                    ->where('title','LIKE',"%$search%")
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor-by-subCategory',compact('languages'),[
                'categories'=>CarMotorCategory::all(),
                'subcategories'=>CarMotorSubCategory::where('category_id',$sub_category_details->category_id)->get(),
                'category'=>CarMotorCategory::where('id',$sub_category_details->category_id)->first(),
                'features'=>CarMotorFeatureProperty::where('category_id',$sub_category_details->category_id)->get(),
                'product_districts'=> District::all(),
                'sub_category'=>CarMotorSubCategory::where('id',$sub_category_details->id)->first(),
                'category_id'=>$sub_category_details->category_id,
                'brands'=>CarMotorBrand::all(),


//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('sub_category_id',$id)
                    ->paginate(10),
            ]);
        }
    }

    public function techWeb_getCarMotorByBrand($id,Request $request)
    {
        $languages = Language::all();
        $search = $request['search']??"";
        $state = 'carAndMotors';
        if ($request->category_id){
            $product = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('brand_id',$id)
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $product1 = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('title','LIKE',"%$search%")
                ->where('brand_id',$id)
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $subCategory = CarMotorSubCategory::where('category_id',$request->category_id)->get();
        }
        else{
            $product = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('brand_id',$id)
                ->paginate(10);
            $product1 = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('title','LIKE',"%$search%")
                ->where('brand_id',$id)
                ->paginate(10);
            $subCategory = CarMotorSubCategory::get();
        }

        if ($search != ""){
            return view('front-page.home.car-motor.carMotor_by_brand',compact('languages','state'),[
                'categories'=>CarMotorCategory::get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'category_data'=>$request->category_id,
                'subcategories'=>$subCategory,
                'brands'=>CarMotorBrand::get(),
                'brand'=>CarMotorBrand::find($id),
                'models'=>CarMotorModel::where('brand_id',$id)->get(),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),
                'product_districts'=> District::all(),

                'search'=>$search,
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> $product1,
            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_brand',compact('languages','state'),[
                'categories'=>CarMotorCategory::get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'category_data'=>$request->category_id,
                'subcategories'=>$subCategory,
                'brands'=>CarMotorBrand::get(),
                'brand'=>CarMotorBrand::find($id),
                'models'=>CarMotorModel::where('brand_id',$id)->get(),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> $product,
            ]);
        }
    }

    public function techWeb_getCarMotorByModel($id,Request $request)
    {
        $languages = Language::all();
        $search = $request['search']??"";
        $state = 'carAndMotors';
        if ($request->category_id){
            $product = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('model_id',$id)
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $product1 = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('title','LIKE',"%$search%")
                ->where('model_id',$id)
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $subCategory = CarMotorSubCategory::where('category_id',$request->category_id)->get();
            $brand = CarMotorBrand::find($request->brand_id);
        }
        else{
            $product = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('model_id',$id)
                ->paginate(10);
            $product1 = DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->select('car_motor_products.*','car_motor_categories.category_name')
                ->where('title','LIKE',"%$search%")
                ->where('model_id',$id)
                ->paginate(10);
            $subCategory = CarMotorSubCategory::get();
            $brand = CarMotorBrand::find($id);
        }

        if ($search != ""){
            return view('front-page.home.car-motor.carMotor_by_model',compact('languages','state'),[
                'categories'=>CarMotorCategory::get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'category_data'=>$request->category_id,
                'subcategories'=>$subCategory,
                'brands'=>CarMotorBrand::get(),
                'brand'=>$brand,
                'models'=>CarMotorModel::where('brand_id',$id)->get(),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),
                'product_districts'=> District::all(),

                'search'=>$search,
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> $product1,
            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_model',compact('languages','state'),[
                'categories'=>CarMotorCategory::get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'category_data'=>$request->category_id,
                'subcategories'=>$subCategory,
                'brands'=>CarMotorBrand::get(),
                'brand'=>$brand,
                'models'=>CarMotorModel::where('brand_id',$id)->get(),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> $product,
            ]);
        }
    }

    public function techWeb_getCarMotorByFeature(Request $request)
    {
        $languages = Language::all();
        $search = $request['search']??"";

//        return DB::table('car_motor_products')
//                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
//                    ->select('car_motor_products.*','car_motor_categories.category_name')
//                    ->where('title','LIKE',"%$search%")
//                    ->where('car_motor_products.category_id',$request->category_id)
//                    ->paginate(10);

        if ($search != ""){
            return view('front-page.home.car-motor.carMotor_by_feature',compact('languages'),[
                'categories'=>CarMotorCategory::all(),
                'category_id'=>$request->category_id,
                'category'=>CarMotorCategory::find($request->category_id),
                'feature_data'=>$request->feature_property,
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
                'search'=>$search,
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('title','LIKE',"%$search%")
                    ->where('car_motor_products.category_id',$request->category_id)
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_feature',compact('languages'),[
                'categories'=>CarMotorCategory::all(),
                'category_id'=>$request->category_id,
                'category'=>CarMotorCategory::find($request->category_id),
                'feature_data'=>$request->feature_property,
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.category_id',$request->category_id)
                    ->paginate(10),
            ]);
        }

    }

    public function techWeb_getCarMotorByPrice(Request $request)
    {

        $products = DB::table('car_motor_products')
            ->join('car_motor_categories','car_motor_products.category_id','car_motor_categories.id')
            ->select('car_motor_products.*','car_motor_categories.category_name')
            ->whereBetween('car_motor_products.price',[$request->start,$request->end])
            ->where('car_motor_products.category_id',$request->category_id)
            ->paginate(10);
        $languages = Language::all();

        return view('front-page.home.car-motor.carMotor_by_category',compact('languages'),[
            'categories'=>CarMotorCategory::all(),
            'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
            'category'=>CarMotorCategory::where('id',$request->category_id)->first(),
            'features'=>DB::table('car_motor_feature_properties')
                ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                ->where('car_motor_feature_properties.category_id',$request->category_id)
                ->get(),
            'request'=> $request,
            'brands'=>CarMotorBrand::all(),
            'product_districts'=> District::all(),
            'products'=> $products,
        ]);
    }

    /// //product by edition start
    public function techWeb_getCarMotorByEdition($edition, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;

        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){

            return view('front-page.home.car-motor.carMotor_by_edition',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'edition'=>$edition,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.edition',$edition)
                    ->where('car_motor_products.category_id',$category_id)
                    ->where('car_motor_products.title','LIKE',"%$search%")
                    ->paginate(10),


            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_edition',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'edition'=>$edition,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.edition',$edition)
                    ->where('car_motor_products.category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }

    public function techWeb_getCarMotorByManufacture($year, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;

        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){

            return view('front-page.home.car-motor.carMotor_by_manufacture',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'year'=>$year,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.manufacture_year',$year)
                    ->where('car_motor_products.category_id',$category_id)
                    ->where('car_motor_products.title','LIKE',"%$search%")
                    ->paginate(10),


            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_manufacture',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'year'=>$year,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.manufacture_year',$year)
                    ->where('car_motor_products.category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }

    public function techWeb_getCarMotorByKiloMeter($kilo, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;

        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){

            return view('front-page.home.car-motor.carMotor_by_kiloMeter',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'kilo'=>$kilo,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.kilomertes_run',$kilo)
                    ->where('car_motor_products.category_id',$category_id)
                    ->where('car_motor_products.title','LIKE',"%$search%")
                    ->paginate(10),


            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_kiloMeter',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'kilo'=>$kilo,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.kilomertes_run',$kilo)
                    ->where('car_motor_products.category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }

    public function techWeb_getCarMotorByRegistration($year, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;

        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){

            return view('front-page.home.car-motor.carMotor_by_registration',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'year'=>$year,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.registration_year',$year)
                    ->where('car_motor_products.category_id',$category_id)
                    ->where('car_motor_products.title','LIKE',"%$search%")
                    ->paginate(10),


            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_registration',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'year'=>$year,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.registration_year',$year)
                    ->where('car_motor_products.category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }

    public function techWeb_getCarMotorByCapacity($capacity, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;

        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){

            return view('front-page.home.car-motor.carMotor_by_capacity',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'capacity'=>$capacity,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.engine_capacity',$capacity)
                    ->where('car_motor_products.category_id',$category_id)
                    ->where('car_motor_products.title','LIKE',"%$search%")
                    ->paginate(10),


            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_capacity',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'capacity'=>$capacity,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.engine_capacity',$capacity)
                    ->where('car_motor_products.category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }

    public function techWeb_getCarMotorByTransmission($transmission, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;

        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){

            return view('front-page.home.car-motor.carMotor_by_transmission',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'transmission'=>$transmission,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.transmission',$transmission)
                    ->where('car_motor_products.category_id',$category_id)
                    ->where('car_motor_products.title','LIKE',"%$search%")
                    ->paginate(10),


            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_transmission',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'transmission'=>$transmission,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.transmission',$transmission)
                    ->where('car_motor_products.category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }

    public function techWeb_getCarMotorByDistrict($district, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;


        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){
            return view('front-page.home.car-motor.carMotor_by_district',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'district_name'=>$request->district_name,

                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.district_id',$district)
                    ->where('car_motor_products.category_id',$category_id)
                    ->where('title','LIKE',"%$search%")
                    ->paginate(10),


            ]);
        }
        else{
            return view('front-page.home.car-motor.carMotor_by_district',compact('languages','category_id'),[
                'categories'=>CarMotorCategory::all(),
                'district_name'=>$request->district_name,
                'subcategories'=>CarMotorSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>CarMotorCategory::find($request->category_id),
                'features'=>DB::table('car_motor_feature_properties')
                    ->join('car_motor_features','car_motor_feature_properties.features_id','car_motor_features.id')
                    ->select('car_motor_feature_properties.*','car_motor_features.features_name')
                    ->where('car_motor_feature_properties.category_id',$request->category_id)
                    ->get(),

                'brands'=>CarMotorBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('car_motor_products')
                    ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                    ->select('car_motor_products.*','car_motor_categories.category_name')
                    ->where('car_motor_products.district_id',$district)
                    ->where('car_motor_products.category_id',$category_id)
                    ->paginate(10),

            ]);
        }


    }
//product by district end
//    car motor filter end
}
