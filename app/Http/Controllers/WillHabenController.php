<?php

namespace App\Http\Controllers;

use App\Models\CarMotorBrand;
use App\Models\CarMotorCategory;
use App\Models\CarMotorProduct;
use App\Models\Category;
use App\Models\District;
use App\Models\InHouseProduct;
use App\Models\Language;
use App\Models\ProductBrand;
use App\Models\ProductFeatures;
use App\Models\ProductModel;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\WebsiteLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Arr;
use App\Models\PropertyPurpose;
use App\Models\property_type;
use App\Models\Property;
use Illuminate\Support\Facades\Cookie;
use App\Models\Job;
use App\Models\JobTypes;


class WillHabenController extends Controller
{
    //
    public function techWeb_index()
    {
//        return Category::all();
        $languages = Language::all();
        return view('front-page.home.front-page',compact('languages'),[
            'categories'=>Category::get(),
            'products'=> InHouseProduct::get(),
            'products1'=> InHouseProduct::get()->shuffle(),
            'products2'=> InHouseProduct::get()->shuffle(),
            'brands'=>ProductBrand::get(),
        ]);
    }

    public function techWeb_productDetails($id, Request $request)
    {
        $languages = Language::all();
        $state=$request->state;
        $product=InHouseProduct::find($id);
//        return Category::where('id',$product->category_id)->first();
//        return Category::where('id',$product->category_id);
        return view('front-page.home.product-details',compact('languages','state'),[
            'product'=> InHouseProduct::where('id',$id)->first(),
            'products'=> InHouseProduct::where('sub_category_id',$product->sub_category_id)->get(),

            'product_features'=>ProductFeatures::all(),
            'category'=>Category::where('id',$product->category_id)->first(),
            'sub_category'=>SubCategory::where('id',$product->sub_category_id)->first(),
            'sub_sub_category'=>SubSubCategory::where('id',$product->sub_sub_category_id)->first(),

        ]);
    }

    public function techWeb_getAllProduct()
    {
        $languages = Language::all();
        return view('front-page.home.all-product',compact('languages'),[
            'categories'=>Category::all(),
            'products'=> InHouseProduct::paginate(6),
        ]);
    }

    public function techWeb_getProductByCategory($id, Request $request)
    {
//        return DB::table('product_features')
//            ->join('main_features','product_features.features_id','main_features.id')
//            ->select('product_features.*','main_features.features_name')
//            ->get();
        $languages = Language::all();
        $search = $request['search']??"";
        $state = 'marketplace';
        if ($request->category_id){
            $product1=DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('category_id',$request->category_id)
                ->where('title','LIKE',"%$search%")
                ->paginate(10);
            $product2 = DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $category = Category::find($request->category_id);
            $sub_categories = SubCategory::where('category_id',$request->category_id)->get();
            $features = DB::table('product_features')
                ->join('main_features','product_features.features_id','main_features.id')
                ->select('product_features.*','main_features.features_name')
                ->where('product_features.category_id',$request->category_id)
                ->get();

        }
        else{
            $product1=DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('category_id',$id)
                ->where('title','LIKE',"%$search%")
                ->paginate(10);
            $product2 = DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('category_id',$id)
                ->paginate(10);
            $category = Category::find($id);
            $sub_categories = SubCategory::where('category_id',$id)->get();
            $features = DB::table('product_features')
                ->join('main_features','product_features.features_id','main_features.id')
                ->select('product_features.*','main_features.features_name')
                ->where('product_features.category_id',$id)
                ->get();
        }
//        return $request;

        if ($search != ""){
            return view('front-page.home.category-by-products',compact('languages','state'),[
                'categories'=>Category::all(),
                'subcategories'=>$sub_categories,
                'category'=>$category,
                'features'=>$features,
                'search'=>$search,
                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
//                'products'=> DB::table('in_house_products')
//                    ->join('categories','categories.id','in_house_products.category_id')
//                    ->select('in_house_products.*','categories.category_name')
//                    ->where('category_id',$id)
//                    ->where('title','LIKE',"%$search%")
//                    ->paginate(10),
                'products'=> $product1,
            ]);
        }
        else{
            return view('front-page.home.category-by-products',compact('languages','state'),[
                'categories'=>Category::all(),
                'subcategories'=>$sub_categories,
                'category'=>$category,
                'brands'=>ProductBrand::all(),
                'features'=>$features,
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
//                'products'=> DB::table('in_house_products')
//                    ->join('categories','categories.id','in_house_products.category_id')
//                    ->select('in_house_products.*','categories.category_name')
//                    ->where('category_id',$id)
//                    ->paginate(10),
                'products'=> $product2,
            ]);
        }

    }
    public function techWeb_getProductBySubCategory($id,Request $request)
    {

        $sub_category_details = SubCategory::find($id);
        $languages = Language::all();

        $search = $request['search']??"";
        if ($search != ""){
            return view('front-page.home.sub-category-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'subcategories'=>SubCategory::where('category_id',$sub_category_details->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('sub_category_id',$id)->get(),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$sub_category_details->category_id)
                    ->get(),
                'category'=>Category::where('id',$sub_category_details->category_id)->first(),
                'sub_category'=>SubCategory::where('id',$sub_category_details->id)->first(),
                'product_districts'=> District::all(),
                'brands'=>ProductBrand::all(),
                'category_id'=>$sub_category_details->category_id,

//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'search'=>$search,
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('sub_category_id',$id)
                    ->where('title','LIKE',"%$search%")
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.sub-category-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'subcategories'=>SubCategory::where('category_id',$sub_category_details->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('sub_category_id',$id)->get(),
                'category'=>Category::where('id',$sub_category_details->category_id)->first(),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$sub_category_details->category_id)
                    ->get(),
                'product_districts'=> District::all(),
                'sub_category'=>SubCategory::where('id',$sub_category_details->id)->first(),
                'category_id'=>$sub_category_details->category_id,
                'brands'=>ProductBrand::all(),


//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('sub_category_id',$id)
                    ->paginate(10),
            ]);
        }
    }

    public function techWeb_getProductBySubSubCategory($id,Request $request)
    {
        $sub_sub_category_details = SubSubCategory::find($id);

        $languages = Language::all();
        $search = $request['search']??"";

        if ($search != ""){
            return view('front-page.home.sub-sub-category-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'subcategories'=>SubCategory::where('category_id',$sub_sub_category_details->category_id)->get(),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$sub_sub_category_details->category_id)
                    ->get(),
                'subsubcategories'=>SubSubCategory::where('sub_category_id',$sub_sub_category_details->sub_category_id)->get(),
                'category'=>Category::where('id',$sub_sub_category_details->category_id)->first(),
                'sub_category'=>SubCategory::where('id',$sub_sub_category_details->sub_category_id)->first(),
                'sub_sub_category'=>$sub_sub_category_details->sub_sub_category_name,
                'product_districts'=> District::all(),
                'category_id'=>$sub_sub_category_details->category_id,
                'brands'=>ProductBrand::all(),
                'search'=>$search,
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('title','LIKE',"%$search%")
                    ->where('sub_sub_category_id',$id)
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.sub-sub-category-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'subcategories'=>SubCategory::where('category_id',$sub_sub_category_details->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('sub_category_id',$sub_sub_category_details->sub_category_id)->get(),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$sub_sub_category_details->category_id)
                    ->get(),
                'category'=>Category::where('id',$sub_sub_category_details->category_id)->first(),
                'sub_category'=>SubCategory::where('id',$sub_sub_category_details->sub_category_id)->first(),
                'sub_sub_category'=>SubSubCategory::where('id',$sub_sub_category_details->id)->first(),
                'product_districts'=> District::all(),
                'category_id'=>$sub_sub_category_details->category_id,
                'brands'=>ProductBrand::all(),


//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('sub_sub_category_id',$id)
                    ->paginate(10),
            ]);
        }


    }

    public function techWeb_productByFeature(Request $request)
    {
        $languages = Language::all();
        $search = $request['search']??"";

//        return DB::table('in_house_products')
//            ->join('categories','categories.id','in_house_products.category_id')
//            ->select('in_house_products.*','categories.category_name')
//            ->where('title','LIKE',"%$search%")
//            ->where('category_id',$request->category_id)
//            ->paginate(10);

        if ($search != ""){
            return view('front-page.home.feature-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'category_id'=>$request->category_id,
                'category'=>Category::find($request->category_id),
                'feature_data'=>$request->feature_property,
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
                'search'=>$search,
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('title','LIKE',"%$search%")
                    ->where('category_id',$request->category_id)
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.feature-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'category_id'=>$request->category_id,
                'category'=>Category::find($request->category_id),
                'feature_data'=>$request->feature_property,
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('category_id',$request->category_id)
                    ->paginate(10),
            ]);
        }

    }

    public function techWeb_getProductByBrand($id,Request $request)
    {
//        return $request;
        $languages = Language::all();
        $search = $request['search']??"";
        if ($request->category_id){
            $product = DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('brand_id',$id)
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $product1 = DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('title','LIKE',"%$search%")
                ->where('brand_id',$id)
                ->where('category_id',$request->category_id)
                ->paginate(10);
            $subCategory = SubCategory::where('category_id',$request->category_id)->get();
            $subSubCategory = SubSubCategory::where('category_id',$request->category_id)->get();
        }
        else{
            $product = DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('brand_id',$id)
                ->paginate(10);
            $product1 = DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->select('in_house_products.*','categories.category_name')
                ->where('title','LIKE',"%$search%")
                ->where('brand_id',$id)
                ->paginate(10);
            $subCategory = SubCategory::get();
            $subSubCategory = SubSubCategory::get();
        }

        if ($search != ""){
            return view('front-page.home.brand-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'category'=>Category::find($request->category_id),
                'category_id'=>$request->category_id,
                'subcategories'=>$subCategory,
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),
                'subsubcategories'=>$subSubCategory,
                'brands'=>ProductBrand::all(),
                'brand'=>ProductBrand::find($id),
                'models'=>ProductModel::where('brand_id',$id)->get(),
                'product_districts'=> District::all(),
                'search'=>$search,
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> $product1,
            ]);
        }
        else{
            return view('front-page.home.brand-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'category_id'=>$request->category_id,
                'category'=>Category::find($request->category_id),
                'subcategories'=>$subCategory,
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),
                'subsubcategories'=>$subSubCategory,
                'brands'=>ProductBrand::all(),
                'brand'=>ProductBrand::find($id),
                'models'=>ProductModel::where('brand_id',$id)->get(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> $product,
            ]);
        }
    }
    public function techWeb_getProductByModel($id,Request $request)
    {

        $languages = Language::all();
        $search = $request['search']??"";
        $model = ProductModel::find($id);


        if ($search != ""){
            return view('front-page.home.model-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'category_id'=>$request->category_id,
                'category'=>Category::find($request->category_id),
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),
                'brands'=>ProductBrand::all(),
                'brand'=>ProductBrand::find($request->brand_id),
                'models'=>ProductModel::where('brand_id',$model->brand_id)->get(),
                'model'=>ProductModel::find($id),
                'product_districts'=> District::all(),
                'search'=>$search,
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('title','LIKE',"%$search%")
                    ->where('model_id',$id)
                    ->where('category_id',$request->category_id)
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.model-by-products',compact('languages'),[
                'categories'=>Category::all(),
                'category_id'=>$request->category_id,
                'category'=>Category::find($request->category_id),
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),
                'brands'=>ProductBrand::all(),
                'brand'=>ProductBrand::find($request->brand_id),
                'models'=>ProductModel::where('brand_id',$model->brand_id)->get(),
                'model'=>ProductModel::find($id),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('sub_category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('model_id',$id)
                    ->where('category_id',$request->category_id)
                    ->paginate(10),
            ]);
        }
    }
//    product by price start
    public function techWeb_productByPrice(Request $request)
    {
//        return request();
//        $products = InHouseProduct::whereBetween('price',[100,$price])->get();
        $products = DB::table('in_house_products')
        ->join('categories','in_house_products.category_id','categories.id')
        ->select('in_house_products.*','categories.category_name')
        ->whereBetween('in_house_products.price',[$request->start,$request->end])
        ->where('in_house_products.category_id',$request->category_id)
        ->paginate(10);
        $languages = Language::all();

        return view('front-page.home.category-by-products',compact('languages'),[
            'categories'=>Category::all(),
            'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
            'category'=>Category::where('id',$request->category_id)->first(),
            'features'=>DB::table('product_features')
                ->join('main_features','product_features.features_id','main_features.id')
                ->select('product_features.*','main_features.features_name')
                ->where('product_features.category_id',$request->category_id)
                ->get(),
            'request'=> $request,
            'brands'=>ProductBrand::all(),
            'product_districts'=> District::all(),
            'products'=> $products,
        ]);
    }
//    product by price end

//product by condition start
    public function techWeb_getProductByCondition($condition, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;


        $languages = Language::all();

        $search = $request['search']??"";


        if ($search != ""){
            return view('front-page.home.condition-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'category'=>Category::find($request->category_id),
                'condition'=>$condition,
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'features'=>ProductFeatures::where('category_id',$request->category_id)->get(),

                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('condition',$condition)
                    ->where('category_id',$category_id)
                    ->where('title','LIKE',"%$search%")
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.condition-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'category'=>Category::find($request->category_id),
                'condition'=>$condition,
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'features'=>ProductFeatures::where('category_id',$request->category_id)->get(),

                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('condition',$condition)
                    ->where('category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }
//product by condition end
//
//product by authenticity start
    public function techWeb_getProductByAuthenticity($authenticity, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;


        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){
            return view('front-page.home.authenticity-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'authenticity'=>$authenticity,
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>Category::find($request->category_id),
                'features'=>ProductFeatures::where('category_id',$request->category_id)->get(),

                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('authenticity',$authenticity)
                    ->where('category_id',$category_id)
                    ->where('title','LIKE',"%$search%")
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.authenticity-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'authenticity'=>$authenticity,
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>Category::find($request->category_id),
                'brands'=>ProductBrand::all(),
                'features'=>ProductFeatures::where('category_id',$request->category_id)->get(),

                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('authenticity',$authenticity)
                    ->where('category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }
//product by authenticity end
//
/// //product by edition start
    public function techWeb_getProductByEdition($edition, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;


        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){
            return view('front-page.home.edition-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'edition'=>$edition,
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>Category::find($request->category_id),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),

                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('edition',$edition)
                    ->where('category_id',$category_id)
                    ->where('title','LIKE',"%$search%")
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.edition-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'edition'=>$edition,
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>Category::find($request->category_id),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),

                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),

//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('edition',$edition)
                    ->where('category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }
//product by edition end///
//
// //product by district start
    public function techWeb_getProductByDistrict($district, Request $request)
    {
//        dd($request);
        $category_id=$request->category_id;


        $languages = Language::all();

        $search = $request['search']??"";

        if ($search != ""){
            return view('front-page.home.district-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'district_name'=>$request->district_name,

                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),

                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>Category::find($request->category_id),
                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('district_id',$district)
                    ->where('category_id',$category_id)
                    ->where('title','LIKE',"%$search%")
                    ->paginate(10),
            ]);
        }
        else{
            return view('front-page.home.district-by-product',compact('languages','category_id'),[
                'categories'=>Category::all(),
                'district_name'=>$request->district_name,
                'subcategories'=>SubCategory::where('category_id',$request->category_id)->get(),
                'subsubcategories'=>SubSubCategory::where('category_id',$request->category_id)->get(),
                'category'=>Category::find($request->category_id),
                'features'=>DB::table('product_features')
                    ->join('main_features','product_features.features_id','main_features.id')
                    ->select('product_features.*','main_features.features_name')
                    ->where('product_features.category_id',$request->category_id)
                    ->get(),

                'brands'=>ProductBrand::all(),
                'product_districts'=> District::all(),
//            'products'=> InHouseProduct::where('category_id',$id)->get(),
                'products'=> DB::table('in_house_products')
                    ->join('categories','categories.id','in_house_products.category_id')
                    ->select('in_house_products.*','categories.category_name')
                    ->where('district_id',$district)
                    ->where('category_id',$category_id)
                    ->paginate(10),
            ]);
        }


    }
//product by district end

//post list frontend start
    public function techWeb_post_list_frontend()
    {
        $languages = Language::all();
        return view('front-page.home.post-list.post-list-front',compact('languages'));
    }
//post list frontend end
//marketplace post list start
    public function techWeb_marketplace_post_list_frontend()
    {
        $languages = Language::all();

        return view('front-page.home.post-list.marketplace-post-list-front',compact('languages'),[
            'products'=>DB::table('in_house_products')
                ->join('categories','categories.id','in_house_products.category_id')
                ->join('sub_categories','sub_categories.id','in_house_products.sub_category_id')
                ->join('sub_sub_categories','sub_sub_categories.id','in_house_products.sub_sub_category_id')
                ->join('product_brands','product_brands.id','in_house_products.brand_id')
                ->select('in_house_products.*','categories.category_name','sub_categories.sub_category_name','sub_sub_categories.sub_sub_category_name','product_brands.brand_name')
                ->where('in_house_products.user_id',Auth::user()->id)
                ->get(),
        ]);
    }
//marketplace post list end
//
 //property post list start
    public function techWeb_property_post_list_frontend()
    {
        $languages = Language::all();

        return view('front-page.home.post-list.property-post-list-front',compact('languages'),[
        ]);
    }
//property post list end
//car and motors post list start
    public function techWeb_carAndmotors_post_list_frontend()
    {
        $languages = Language::all();

        return view('front-page.home.post-list.caraAndmotors-post-list-front',compact('languages'),[
            'products'=>DB::table('car_motor_products')
                ->join('car_motor_categories','car_motor_categories.id','car_motor_products.category_id')
                ->join('car_motor_sub_categories','car_motor_sub_categories.id','car_motor_products.sub_category_id')
                ->join('car_motor_brands','car_motor_brands.id','car_motor_products.brand_id')
                ->select('car_motor_products.*','car_motor_categories.category_name','car_motor_sub_categories.sub_category_name','car_motor_brands.brand_name')
                ->where('car_motor_products.user_id',Auth::user()->id)
                ->get(),
        ]);
    }
//car and motors post list end
//job post list start
    public function techWeb_job_post_list_frontend()
    {
        $languages = Language::all();

        return view('front-page.home.post-list.job-post-list-front',compact('languages'),[
        ]);
    }
//job post list end
////my_account frontend start
    public function techWeb_my_account_frontend()
    {
        $languages = Language::all();
        return view('front-page.home.my-account-frontend',compact('languages'));
    }
//my_account_frontend end

//add front start
    public function techWeb_ad_front()
    {
        $languages = Language::all();
        return view('front-page.home.ad-front',compact('languages'));
    }
//add front end

    public function techWeb_getProductByMarketPlace()
    {
        $languages = Language::all();
        return view('front-page.home.all-product-by-marketplace',compact('languages'),[
            'categories'=>Category::all(),
            'products'=> InHouseProduct::all(),
            'products1'=> InHouseProduct::get()->shuffle(),
            'products2'=> InHouseProduct::get()->shuffle(),
            'brands'=>ProductBrand::get(),
        ]);
    }
    public function techWeb_getProductByProperty()
    {
        return view('front-page.home.all-product-by-property',[
            'categories'=>Category::all(),
            'products'=> InHouseProduct::all(),
            'purposes'=> PropertyPurpose::get(),
            'properties'=> Property::get(),
        ]);
    }
    public function techWeb_getProductByCarMotor()
    {
        $languages = Language::all();

        return view('front-page.home.all-product-by-car-motor',compact('languages'),[
            'categories'=>CarMotorCategory::all(),
            'products'=> CarMotorProduct::all(),
            'products1'=> CarMotorProduct::get()->shuffle(),
            'products2'=> CarMotorProduct::get()->shuffle(),
            'brands'=>CarMotorBrand::get(),
        ]);
    }
    public function techWeb_getProductByJob()
    {
        return view('front-page.home.all-product-by-job',[
            'types'=>JobTypes::all(),
            'jobs'=> Job::all(),
        ]);
    }

    // property
    public function techWeb_getPropertybyPurpose($x=null)
    {
        $purposes = PropertyPurpose::all();
        $properties = DB::select('select * from properties where purpose = ?', [$x]);

        return view('front-page.home.property-by-purpose', compact('purposes', 'properties'));
    }
    public function techWeb_getPropertybyType()
    {
        return view('front-page.home.all-product-by-property',[
            'categories'=>Category::all(),
            'products'=>InHouseProduct::all(),
        ]);
    }

    public function techWeb_getJobByType($title)
    {
        $types = JobTypes::all();
        $thejob = DB::select('select * from jobs where type = ?', [$title]);

        return view('front-page.home.job-by-type', compact('thejob', 'types'));
    }

//    logo dynamic start
    public function techWeb_webSiteLogo()
    {
        $sidebarCheck= 'admin';
        $logo = WebsiteLogo::latest()->first();
        $languages = Language::all();
        return view('admin.upload-website-logo',compact('sidebarCheck','languages','logo'));
    }

    public function techWeb_saveWebSiteLogo(Request $request)
    {
        WebsiteLogo::saveWebsiteLogo($request);
        return back();
    }
//    logo dynamic end

}
