<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
use Auth;

class InHouseProduct extends Model
{
    use HasFactory;
    public static $product, $imageName, $imageDirectory, $imageUrls = [],$images;

    public static function saveInHouseProduct($request)
    {
        // dd($request);
        $user = Auth()->user();
        self::$product = new InHouseProduct();
        self::$product->user_id = $user->id;
        self::$product->title = $request->title;
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->sub_sub_category_id = $request->sub_sub_category_id;
        self::$product->phone = $request->phone;
        self::$product->condition = $request->condition;
        self::$product->authenticity = $request->authenticity;
        self::$product->brand_id = $request->brand_id;
        self::$product->model_id = $request->model_id;
        self::$product->edition = $request->edition;
        self::$product->feature_id = $request->feature_id;
        self::$product->features_property = json_encode($request->features_property);
        self::$product->description = $request->description;
        self::$product->price = $request->price;
        self::$product->district_id = $request->district_id;
        self::$product->sub_district_id = $request->sub_district_id;
        self::$product->negotiable = $request->negotiable;
        self::$product->term_condition = $request->term_condition;
        self::$product->video_url = $request->video_url;
        self::$product->delivery_charge = $request->delivery_charge;
        self::$product->delivery_option = $request->delivery_option;
        self::$product->images = json_encode(self::saveImage($request));
        self::$product->save();
    }

    public static function updateInhouseProduct($request)
    {

        self::$product = InHouseProduct::find($request->id);
        self::$product->user_id = $request->user_id;
        self::$product->title = $request->title;
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->sub_sub_category_id = $request->sub_sub_category_id;
        self::$product->phone = $request->phone;
        self::$product->condition = $request->condition;
        self::$product->authenticity = $request->authenticity;
        self::$product->brand_id = $request->brand_id;
        self::$product->model_id = $request->model_id;
        self::$product->edition = $request->edition;
        self::$product->features = json_encode($request->features);
        self::$product->description = $request->description;
        self::$product->price = $request->price;
        self::$product->district_id = $request->district_id;
        self::$product->sub_district_id = $request->sub_district_id;
        self::$product->negotiable = $request->negotiable;
        self::$product->video_url = $request->video_url;
        self::$product->delivery_charge = $request->delivery_charge;
        self::$product->delivery_option = $request->delivery_option;
        self::$product->term_condition = $request->term_condition;

        if($request->images){
            if (self::$product->images){
                self::$images = json_decode(self::$product->images);
                foreach (self::$images as $image){
                    if (file_exists($image)) {
                        unlink($image);
                    }

                }
            }
            self::$product->images = json_encode(self::saveImage($request));
        }


        self::$product->save();
    }
    //save image start
    public static function saveImage($request)
    {
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                self::$imageName = 'InHouse_product-' . rand() . '.' . $image->Extension();
                self::$imageDirectory = 'backend/inHouse_product/';
                self::$imageUrls[] = self::$imageDirectory . self::$imageName;
                Image::make($image)->resize(100, 100)->save(public_path(self::$imageDirectory . self::$imageName));
            }

            return self::$imageUrls;
        }
    }
    //    save image end
}
