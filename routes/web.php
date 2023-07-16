<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\InHouseProductController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\WillHabenController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\PropertyPurposeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CarMotorCategoryController;
use App\Http\Controllers\CarMotorBrandController;
use App\Http\Controllers\CarMotorModelController;
use App\Http\Controllers\CarMotorFeatureController;
use App\Http\Controllers\CarMotorLocation;
use App\Http\Controllers\NearestLocationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobTypesController;
use App\Http\Controllers\CarMotorProductController;

//Route::get('/', function () {
//    return view('welcome');
//});
//product routes start
Route::get('/',[WillHabenController::class,'techWeb_index'])->name('front.page');
Route::get('/all-product',[WillHabenController::class,'techWeb_getAllProduct'])->name('all.product');
Route::get('/product-by-category/{id}',[WillHabenController::class,'techWeb_getProductByCategory'])->name('product.by.category');
Route::get('/product-by-subCategory/{id}',[WillHabenController::class,'techWeb_getProductBySubCategory'])->name('product.by.subCategory');
Route::get('/product-by-subSubCategory/{id}',[WillHabenController::class,'techWeb_getProductBySubSubCategory'])->name('product.by.subSubCategory');
Route::get('/product-by-brand/{id}',[WillHabenController::class,'techWeb_getProductByBrand'])->name('product.by.brand');
Route::get('/product-by-model/{id}',[WillHabenController::class,'techWeb_getProductByModel'])->name('product.by.model');
Route::get('/product-by-condition/{condition}',[WillHabenController::class,'techWeb_getProductByCondition'])->name('product.by.condition');
Route::get('/product-by-authenticity/{authenticity}',[WillHabenController::class,'techWeb_getProductByAuthenticity'])->name('product.by.authenticity');
Route::get('/product-by-edition/{edition}',[WillHabenController::class,'techWeb_getProductByEdition'])->name('product.by.edition');
Route::get('/product-by-district/{district}',[WillHabenController::class,'techWeb_getProductByDistrict'])->name('product.by.district');
Route::get('/product-details/{id}',[WillHabenController::class,'techWeb_productDetails'])->name('product.details');
Route::get('/product-by-price',[WillHabenController::class,'techWeb_productByPrice'])->name('product.by.price');
Route::get('/product-by-feature',[WillHabenController::class,'techWeb_productByFeature'])->name('product.by.feature');
//product routes end

//carmotor filter start
Route::get('/all-car-motor',[CarMotorProductController::class,'techWeb_getAllCarMotorProduct'])->name('all.car.product');
Route::get('/carMotor-by-category/{id}',[CarMotorProductController::class,'techWeb_getCarMotorByCategory'])->name('carMotor.by.category');
Route::get('/carMotor-by-subCategory/{id}',[CarMotorProductController::class,'techWeb_getCarMotorBySubCategory'])->name('carMotor.by.subCategory');
Route::get('/carMotor-by-brand/{id}',[CarMotorProductController::class,'techWeb_getCarMotorByBrand'])->name('carMotor.by.brand');
Route::get('/carMotor-by-model/{id}',[CarMotorProductController::class,'techWeb_getCarMotorByModel'])->name('carMotor.by.model');
Route::get('/carMotor-by-price',[CarMotorProductController::class,'techWeb_getCarMotorByPrice'])->name('carMotor.by.price');
Route::get('/carMotor-by-feature',[CarMotorProductController::class,'techWeb_getCarMotorByFeature'])->name('carMotor.by.feature');
Route::get('/carMotor-by-edition/{edition}',[CarMotorProductController::class,'techWeb_getCarMotorByEdition'])->name('carMotor.by.edition');
Route::get('/carMotor-by-district/{district}',[CarMotorProductController::class,'techWeb_getCarMotorByDistrict'])->name('carMotor.by.district');
Route::get('/carMotor-by-manufacture/{year}',[CarMotorProductController::class,'techWeb_getCarMotorByManufacture'])->name('carMotor.by.manufacture');
Route::get('/carMotor-by-kiloMeter/{kilo}',[CarMotorProductController::class,'techWeb_getCarMotorByKiloMeter'])->name('carMotor.by.KiloMeter');
Route::get('/carMotor-by-registration/{year}',[CarMotorProductController::class,'techWeb_getCarMotorByRegistration'])->name('carMotor.by.registration');
Route::get('/carMotor-by-capacity/{capacity}',[CarMotorProductController::class,'techWeb_getCarMotorByCapacity'])->name('carMotor.by.capacity');
Route::get('/carMotor-by-transmission/{transmission}',[CarMotorProductController::class,'techWeb_getCarMotorByTransmission'])->name('carMotor.by.transmission');


//carmotor filter end

//frontend route start
Route::get('/frontend-marketplace',[WillHabenController::class,'techWeb_getProductByMarketPlace'])->name('frontend.marketplace');
Route::get('/frontend-property',[WillHabenController::class,'techWeb_getProductByProperty'])->name('frontend.property');
Route::get('/frontend-car-motor',[WillHabenController::class,'techWeb_getProductByCarMotor'])->name('frontend.carMotor');
Route::get('/frontend-job',[WillHabenController::class,'techWeb_getProductByJob'])->name('frontend.job');
//frontend route end

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('seller/home', [HomeController::class, 'sellerHome'])->name('seller.home')->middleware('is_admin');

Route::get('/marketplace', [HomeController::class, 'marketPlace'])->name('marketplace');
Route::get('/property', [HomeController::class, 'property'])->name('property');
Route::get('/car-motor', [HomeController::class, 'carMotor'])->name('car.motor');
Route::get('/job', [HomeController::class, 'job'])->name('job');


//Category start
Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/save-category', [CategoryController::class, 'saveCategory'])->name('save.category');
Route::get('/manage-category', [CategoryController::class, 'techWeb_getCategories'])->name('manage.category');
Route::get('/edit-category/{category_id}', [CategoryController::class, 'techWeb_editCategory'])->name('edit.category');
Route::post('/update-category', [CategoryController::class, 'techWeb_updateCategory'])->name('update.category');
//Category end

//sub category start
Route::get('/add-sub-category', [CategoryController::class, 'addSubCategory'])->name('add.sub.category');
Route::post('/save-sub-category', [CategoryController::class, 'saveSubCategory'])->name('save.sub.category');
Route::get('/manage-sub-category', [CategoryController::class, 'techWeb_getSubCategories'])->name('manage.sub.category');
Route::get('/edit-sub-category/{id}', [CategoryController::class, 'techWeb_editSubCategory'])->name('edit.sub.category');
Route::post('/update-sub-category', [CategoryController::class, 'techWeb_updateSubCategory'])->name('update.sub.category');
//sub category end

//sub sub category start
Route::get('/add-sub-sub-category', [CategoryController::class, 'addSubSubCategory'])->name('add.sub.sub.category');
Route::post('/save-sub-sub-category', [CategoryController::class, 'saveSubSubCategory'])->name('save.sub.sub.category');
Route::get('/get-sub-sub-category/{category_id}', [CategoryController::class, 'getSubSubCategory'])->name('get.sub.sub.category');
Route::get('/get-sub-category/{category_id}', [CategoryController::class, 'getSubCategory'])->name('get.sub.category');
Route::get('/manage-sub-sub-category', [CategoryController::class, 'techWeb_SubSubCategories'])->name('manage.sub.sub.category');
Route::get('/edit-sub-sub-category/{id}', [CategoryController::class, 'techWeb_editSubSubCategories'])->name('edit.sub.sub.category');
Route::post('/update-sub-sub-category', [CategoryController::class, 'techWeb_updateSubSubCategory'])->name('update.sub.sub.category');
//sub sub category end

//Brand start
Route::get('/add-brand', [ProductBrandController::class, 'index'])->name('add.brand');
Route::post('/save-brand', [ProductBrandController::class, 'saveBrand'])->name('save.brand');
Route::get('/manage-brand', [ProductBrandController::class, 'techWeb_getBrand'])->name('manage.brand');
Route::get('/edit-brand/{id}', [ProductBrandController::class, 'techWeb_editBrand'])->name('edit.brand');
Route::post('/update-brand', [ProductBrandController::class, 'techWeb_updateBrand'])->name('update.brand');

//Brand end

//model start
Route::get('/add-model', [ProductModelController::class, 'index'])->name('add.model');
Route::post('/save-model', [ProductModelController::class, 'saveModel'])->name('save.model');
Route::get('/manage-model', [ProductModelController::class, 'techWeb_getModel'])->name('manage.model');
Route::get('/edit-model/{id}', [ProductModelController::class, 'techWeb_editModel'])->name('edit.model');
Route::post('/update-model', [ProductModelController::class, 'techWeb_updateModel'])->name('update.model');
//model end

//features property start
Route::get('/features', [FeaturesController::class, 'techWeb_index'])->name('features');
Route::post('/save-features', [FeaturesController::class, 'techWeb_saveFeatures'])->name('save.features');
Route::get('/manage-features',[FeaturesController::class,'techWeb_getFeatures'])->name('manage.features');
Route::get('/edit-features/{id}',[FeaturesController::class,'techWeb_editFeature'])->name('edit.features');
Route::post('/update-features',[FeaturesController::class,'techWeb_updateFeature'])->name('update.features');

//features property end

//features start
Route::get('/main-features', [FeaturesController::class, 'techWeb_main_index'])->name('main.features');
Route::post('/save-main-features', [FeaturesController::class, 'techWeb_saveMainFeatures'])->name('save.main.features');
Route::get('/manage-main-features',[FeaturesController::class,'techWeb_getMainFeatures'])->name('manage.main.features');
Route::get('/edit-main-features/{id}',[FeaturesController::class,'techWeb_editMainFeature'])->name('edit.main.features');
Route::post('/update-main-features',[FeaturesController::class,'techWeb_updateMainFeature'])->name('update.main.features');

//features end

//location start
Route::get('/add-district', [LocationController::class, 'addDistrict'])->name('add.district');
Route::post('/save-district', [LocationController::class, 'saveDistrict'])->name('save.district');
Route::get('/manage-district', [LocationController::class, 'mangeDistrict'])->name('mange.district');
Route::get('/edit-district/{id}', [LocationController::class, 'editDistrict'])->name('edit.district');
Route::post('/update-district', [LocationController::class, 'updateDistrict'])->name('update.district');

Route::get('/add-sub-district',[LocationController::class,'addSubDistrict'])->name('add.sub.district');
Route::post('/save-sub-district', [LocationController::class, 'saveSubDistrict'])->name('save.sub.district');
Route::get('/manage-sub-district', [LocationController::class, 'mangeSubDistrict'])->name('manage.sub.district');
Route::get('/edit-sub-district/{id}', [LocationController::class, 'editSubDistrict'])->name('edit.sub.district');
Route::post('/update-sub-district', [LocationController::class, 'updateSubDistrict'])->name('update.sub.district');

//location end

//In house product route start
Route::get('/manage-inHouse-product', [InHouseProductController::class, 'techWeb_manage'])->name('manage.inhouse');
Route::get('/edit-inHouse-product/{id}', [InHouseProductController::class, 'techWeb_edit_product'])->name('edit.inhouse.product');
Route::post('/update-inHouse-product', [InHouseProductController::class, 'techWeb_update_product'])->name('update.inHouseProduct');
Route::get('/add-inHouse-product', [InHouseProductController::class, 'techWeb_index'])->name('add.inHouseProduct')->middleware('is_admin');
//add post frontend start
Route::get('/add-inHouse-product-frontEnd', [InHouseProductController::class, 'techWeb_add_inHouseProduct_frontEnd'])->name('add.inHouseProduct.frontEnd')->middleware('is_admin');
Route::get('/edit-inHouse-product-frontEnd/{id}', [InHouseProductController::class, 'techWeb_edit_inHouseProduct_frontEnd'])->name('edit.inHouseProduct.frontEnd')->middleware('is_admin');
Route::get('/add-front', [WillHabenController::class, 'techWeb_ad_front'])->name('add.front')->middleware('is_admin');
Route::get('/add-inHouse-product-category', [InHouseProductController::class, 'techWeb_get_inHouse_product_category'])->name('add.inHouseProduct.category')->middleware('is_admin');
Route::get('/add-inHouse-product-subCategory/{category_id}', [InHouseProductController::class, 'techWeb_get_inHouse_product_subCategory'])->name('add.inHouseProduct.subCategory')->middleware('is_admin');
Route::get('/add-inHouse-product-subSubCategory/{sub_category_id}', [InHouseProductController::class, 'techWeb_get_inHouse_product_subSubCategory'])->name('add.inHouseProduct.subSubCategory')->middleware('is_admin');
Route::get('/add-inHouse-product-district', [InHouseProductController::class, 'techWeb_get_inHouse_product_district'])->name('add.inHouseProduct.district')->middleware('is_admin');
Route::get('/add-inHouse-product-subDistrict/{district_id}', [InHouseProductController::class, 'techWeb_get_inHouse_product_subDistrict'])->name('add.inHouseProduct.subDistrict')->middleware('is_admin');

//add post frontend end
Route::post('/save-inHouse-product', [InHouseProductController::class, 'techWeb_saveInHouseProduct'])->name('save.inHouseProduct');
Route::get('/get-model/{id}', [InHouseProductController::class, 'techWeb_getModel'])->name('get.model');
Route::get('/get-features/{id}', [InHouseProductController::class, 'techWeb_getFeatures'])->name('get.features');
Route::get('/get-features-property/{id}', [InHouseProductController::class, 'techWeb_getFeaturesProperty'])->name('get.features.property');
Route::get('/get-sub-district/{id}', [InHouseProductController::class, 'techWeb_getSubDistrict'])->name('get.sub.sub.category');
//In house product route  end

//frontend post list start
Route::get('/my-account-frontend',[WillHabenController::class,'techWeb_my_account_frontend'])->name('my.account.frontend');
Route::get('/post-list-frontend',[WillHabenController::class,'techWeb_post_list_frontend'])->name('post.list.frontend');
Route::get('/marketplace_post-list-frontend',[WillHabenController::class,'techWeb_marketplace_post_list_frontend'])->name('marketplace.post.list.frontend');
Route::get('/property_post-list-frontend',[WillHabenController::class,'techWeb_property_post_list_frontend'])->name('property.post.list.frontend');
Route::get('/carAndmotors_post-list-frontend',[WillHabenController::class,'techWeb_carAndmotors_post_list_frontend'])->name('carAndmotors.post.list.frontend');
Route::get('/job_post-list-frontend',[WillHabenController::class,'techWeb_job_post_list_frontend'])->name('job.post.list.frontend');
//frontend post list end

//property route start
Route::get('/property_aminities', [HomeController::class, 'property_Aminity'])->name('aminity');
Route::get('/property_location', [HomeController::class, 'property_Location'])->name('nearest_location');
Route::get('/property_types', [PropertyTypeController::class, 'property_Types'])->name('types');
Route::get('/property_purpose', [PropertyPurposeController::class, 'property_Purpose'])->name('purpose');
Route::get('/property_addproperty', [PropertyController::class, 'addproperty'])->name('addproperty');

Route::post('/property_storing', [PropertyController::class, 'storingProperty'])->name('storingProperty');
Route::get('/property_allProperty', [PropertyController::class, 'allProperty'])->name('allProperty');
Route::get('/property_myProperty', [PropertyController::class, 'myProperty'])->name('myProperty');

Route::get('/property_edit_property/{id}', [PropertyController::class,'editProperty'])->name('editProperty');
Route::post('/property_update_property/{id}', [PropertyController::class,'updateProperty'])->name('updateProperty');
Route::get('/property_del_property/{id}', [PropertyController::class,'delProperty'])->name('delProperty');



Route::get('/property_create_aminity', [HomeController::class, 'create_Aminity'])->name('create_Aminity');
Route::post('/property_store_aminity', [HomeController::class, 'store_Aminity'])->name('store_Aminity');
Route::get('/property_edit_aminity/{id}', [HomeController::class,'edit_Aminity'])->name('edit_Aminity');
Route::post('/property_update_aminity/{id}', [HomeController::class,'update_Aminity'])->name('update_Aminity');
Route::get('/property_del_aminity/{id}', [HomeController::class,'del_Aminity'])->name('del_Aminity');

Route::get('/property_create_type', [PropertyTypeController::class, 'create_PropertyType'])->name('create_PropertyType');
Route::post('/property_store_type', [PropertyTypeController::class, 'store_PropertyType'])->name('store_PropertyType');
Route::get('/property_edit_type/{id}', [PropertyTypeController::class,'edit_Type'])->name('edit_Type');
Route::post('/property_update_type/{id}', [PropertyTypeController::class,'update_PropertyType'])->name('update_PropertyType');
Route::get('/property_del_type/{id}', [PropertyTypeController::class,'del_PropertyType'])->name('del_PropertyType');

Route::get('/property_create_purpose', [PropertyPurposeController::class, 'create_PropertyPurpose'])->name('create_PropertyPurpose');
Route::post('/property_store_purpose', [PropertyPurposeController::class, 'store_PropertyPurpose'])->name('store_PropertyPurpose');
Route::get('/property_edit_purpose/{id}', [PropertyPurposeController::class,'edit_Purpose'])->name('edit_Purpose');
Route::post('/property_update_purpose/{id}', [PropertyPurposeController::class,'update_PropertyPurpose'])->name('update_PropertyPurpose');
Route::get('/property_del_purpose/{id}', [PropertyPurposeController::class,'del_PropertyPurpose'])->name('del_PropertyPurpose');

//property route end


//Car and motors route start
//Category start
Route::get('/add-car-motor-category', [CarMotorCategoryController::class, 'techWeb_addCarMotorCategory'])->name('add.car.motor.category');
Route::post('/save-car-motor-category', [CarMotorCategoryController::class, 'techWeb_saveCarMotorCategory'])->name('save.car.motor.category');
Route::get('/manage-car-motor-category', [CarMotorCategoryController::class, 'techWeb_getCarMotorCategories'])->name('manage.car.motor.category');
Route::get('/edit-car-motor-category/{category_id}', [CarMotorCategoryController::class, 'techWeb_editCarMotorCategory'])->name('edit.car.motor.category');
Route::post('/update-car-motor-category', [CarMotorCategoryController::class, 'techWeb_updateCarMotorCategory'])->name('update.car.motor.category');
//Category end

//sub category start
Route::get('/add-car-motor-sub-category', [CarMotorCategoryController::class, 'techWeb_addCarMotorSubCategory'])->name('add.car.motor.sub.category');
Route::post('/save-car-motor-sub-category', [CarMotorCategoryController::class, 'techWeb_saveCarMotorSubCategory'])->name('save.car.motor.sub.category');
Route::get('/manage-car-motor-sub-category', [CarMotorCategoryController::class, 'techWeb_getCarMotorSubCategories'])->name('manage.car.motor.sub.category');
Route::get('/edit-car-motor-sub-category/{id}', [CarMotorCategoryController::class, 'techWeb_editCarMotorSubCategory'])->name('edit.car.motor.sub.category');
Route::post('/update-car-motor-sub-category', [CarMotorCategoryController::class, 'techWeb_updateCarMotorSubCategory'])->name('update.car.motor.sub.category');
//sub category end

//Brand start
Route::get('/add-car-motor-brand', [CarMotorBrandController::class, 'techWeb_addCarMotorBrand'])->name('add.car.motor.brand');
Route::post('/save-car-motor-brand', [CarMotorBrandController::class, 'techWeb_addCarMotorSaveBrand'])->name('save.car.motor.brand');
Route::get('/manage-car-motor-brand', [CarMotorBrandController::class, 'techWeb_getCarMotorBrand'])->name('manage.car.motor.brand');
Route::get('/edit-car-motor-brand/{id}', [CarMotorBrandController::class, 'techWeb_editCarMotorBrand'])->name('edit.car.motor.brand');
Route::post('/update-car-motor-brand', [CarMotorBrandController::class, 'techWeb_updateCarMotorBrand'])->name('update.car.motor.brand');

//Brand end
//model start
Route::get('/add-car-motor-model', [CarMotorModelController::class, 'techWeb_addCarMotorModel'])->name('add.car.motor.model');
Route::post('/save-car-motor-model', [CarMotorModelController::class, 'techWeb_saveCarMotorModel'])->name('save.car.motor.model');
Route::get('/manage-car-motor-model', [CarMotorModelController::class, 'techWeb_manageCarMotorModel'])->name('manage.car.motor.model');
Route::get('/edit-car-motor-model/{id}', [CarMotorModelController::class, 'techWeb_editCarMotorModel'])->name('edit.car.motor.model');
Route::post('/update-car-motor-model', [CarMotorModelController::class, 'techWeb_updateCarMotorModel'])->name('update.car.motor.model');
//model end

//features start
Route::get('/main-car-motor-features', [CarMotorFeatureController::class, 'techWeb_carMotorIndex'])->name('main.car.motor.features');
Route::post('/save-car-motor-features', [CarMotorFeatureController::class, 'techWeb_saveCarMotorFeatures'])->name('save.car.motor.features');
Route::get('/manage-car-motor-features',[CarMotorFeatureController::class,'techWeb_getCarMotorFeatures'])->name('manage.car.motor.features');
Route::get('/edit-car-motor-features/{id}',[CarMotorFeatureController::class,'techWeb_editCarMotorFeature'])->name('edit.car.motor.features');
Route::post('/update-car-motor-features',[CarMotorFeatureController::class,'techWeb_updateCarMotorFeature'])->name('update.car.motor.features');

//features end


//features property start
Route::get('/car-motor-features-property', [CarMotorFeatureController::class, 'techWeb_CarMotorFeaturesProperty'])->name('car.motor.features.property');
Route::post('/save-car-motor-features-property', [CarMotorFeatureController::class, 'techWeb_saveCarMotorFeaturesProperty'])->name('save.car.motor.features.property');
Route::get('/manage-car-motor-features-property',[CarMotorFeatureController::class,'techWeb_getCarMotorFeaturesProperty'])->name('manage.car.motor.features.property');
Route::get('/edit-car-motor-features-property/{id}',[CarMotorFeatureController::class,'techWeb_editCarMotorFeaturesProperty'])->name('edit.car.motor.features.property');
Route::post('/update-car-motor-features',[CarMotorFeatureController::class,'techWeb_updateCarMotorFeaturesProperty'])->name('update.car.motor.features.property');

//features property end


//location start
//Route::get('/add-car-motor-district', [CarMotorLocation::class, 'addCarMotorDistrict'])->name('add.car.motor.district');
//Route::post('/save-car-motor-district', [CarMotorLocation::class, 'saveCarMotorDistrict'])->name('save.car.motor.district');
//Route::get('/manage-car-motor-district', [CarMotorLocation::class, 'mangeCarMotorDistrict'])->name('mange.car.motor.district');
//Route::get('/edit-car-motor-district/{id}', [CarMotorLocation::class, 'editCarMotorDistrict'])->name('edit.car.motor.district');
//Route::post('/update-district', [CarMotorLocation::class, 'updateDistrict'])->name('update.district');
//
//Route::get('/add-sub-district',[CarMotorLocation::class,'addSubDistrict'])->name('add.sub.district');
//Route::post('/save-sub-district', [CarMotorLocation::class, 'saveSubDistrict'])->name('save.sub.district');
//Route::get('/manage-sub-district', [CarMotorLocation::class, 'mangeSubDistrict'])->name('manage.sub.district');
//Route::get('/edit-sub-district/{id}', [CarMotorLocation::class, 'editSubDistrict'])->name('edit.sub.district');
//Route::post('/update-sub-district', [CarMotorLocation::class, 'updateSubDistrict'])->name('update.sub.district');

//location end

//Car motor Post add start
Route::get('/add-car-motor-post',[CarMotorProductController::class,'techWeb_addCarMotorProduct'])->name('add.car.motor.post');
Route::get('/get-car-motor-sub-category/{id}',[CarMotorProductController::class,'techWeb_getCarMotorSubCategory'])->name('get.car.motor.subCategory');
Route::get('/get-car-motor-model/{id}', [CarMotorProductController::class, 'techWeb_getCarMotorModel'])->name('get.car.motor.model');
Route::get('/get-car-motor-features/{id}', [CarMotorProductController::class, 'techWeb_getCarMotorFeatures'])->name('get.car.motor.features');
Route::post('/save-car-motor-product', [CarMotorProductController::class, 'techWeb_saveCarMotorProduct'])->name('save.carMotorProduct');
Route::get('/carMotor-product-details/{id}',[CarMotorProductController::class,'techWeb_carMotorProductDetails'])->name('carMotor.product.details');


Route::get('/carMotor-product-category', [CarMotorProductController::class, 'techWeb_get_carMotor_product_category'])->name('add.carMotor.category')->middleware('is_admin');
Route::get('/carMotor-product-subCategory/{category_id}', [CarMotorProductController::class, 'techWeb_get_carMotor_product_subCategory'])->name('get.carMotor.subCategory')->middleware('is_admin');
Route::get('/carMotor-product-district', [CarMotorProductController::class, 'techWeb_get_carMotor_product_district'])->name('get.carMotor.district')->middleware('is_admin');
Route::get('/carMotor-product-subDistrict/{district_id}', [CarMotorProductController::class, 'techWeb_get_carMotor_product_subDistrict'])->name('get.carMotor.subDistrict')->middleware('is_admin');

//add car motor product front end start
Route::get('/add-carMotor-product-frontEnd', [CarMotorProductController::class, 'techWeb_add_carMotor_frontEnd'])->name('add.carMotor.frontEnd')->middleware('is_admin');

//add car motor product frontend end



//Car motor Post add end

//Car and motors route end

// nearest locations route STARTS
Route::get('/property_create_nearestlocation', [NearestLocationController::class, 'create_NearestLocation'])->name('create_NearestLocation');
Route::post('/property_store_nearestlocation', [NearestLocationController::class, 'store_NearestLocation'])->name('store_NearestLocation');
Route::get('/property_edit_nearestlocation/{id}', [NearestLocationController::class,'edit_NearestLocation'])->name('edit_NearestLocation');
Route::post('/property_update_nearestlocation/{id}', [NearestLocationController::class,'update_NearestLocation'])->name('update_NearestLocation');
Route::get('/property_del_nearestlocation/{id}', [NearestLocationController::class,'del_NearestLocation'])->name('del_NearestLocation');
// nearest locations route ENDS
// PANEL: seller property STARTS
Route::get('/seller_addProperty', [PropertyController::class, 'seller_addProperty'])->name('seller_addProperty');
Route::get('/seller_myProperty', [PropertyController::class, 'seller_myProperty'])->name('seller_myProperty');
Route::get('/seller_propertyDetails/{id}', [PropertyController::class,'seller_propertyDetails'])->name('seller_propertyDetails');
Route::get('/seller_editProperty/{id}', [PropertyController::class,'seller_editProperty'])->name('seller_editProperty');
Route::post('/seller_updateProperty/{id}', [PropertyController::class, 'seller_updateProperty'])->name('seller_updateProperty');
Route::get('/seller_delProperty/{id}', [PropertyController::class,'seller_delProperty'])->name('seller_delProperty');





// Jobs Route STARTS
Route::get('/all-jobs', [JobController::class, 'jobHome'])->name('jobHome');

Route::get('/view-job-type', [JobController::class, 'viewjobtype'])->name('viewjobtype');
Route::get('/add-job-type', [JobController::class, 'addjobtype'])->name('addjobtype');
Route::get('/store-jop-type', [JobController::class, 'storeJobType'])->name('storeJobType');

Route::get('/add-new-job', [JobController::class, 'addjobs'])->name('addjobs');
Route::post('/store-new-job', [JobController::class, 'newJob'])->name('newJob');

Route::get('/all-jobs', [JobController::class, 'allJobs'])->name('allJobs');
Route::get('/view-jobs', [JobController::class, 'viewJob'])->name('viewJob');

Route::get('/delete-job/{id}', [JobController::class, 'delJob'])->name('delJob');
Route::get('/edit-job/{id}', [JobController::class, 'editjob'])->name('editjob');
Route::post('/update-Jobs/{id}', [JobController::class,'updateJob'])->name('updateJob');

Route::get('/jobs_editType/{id}', [JobController::class,'editJobType'])->name('editJobType');
Route::post('/jobs_updateJobType/{id}', [JobController::class,'updateJobType'])->name('updateJobType');
Route::get('/jobs_delType/{id}', [JobController::class,'delJobType'])->name('delJobType');

Route::get('/view-divisions', [JobController::class, 'viewDivisions'])->name('viewDivisions');
Route::get('/add-division', [JobController::class, 'addDivision'])->name('addDivision');
Route::get('/store-division', [JobController::class, 'storeDivision'])->name('storeDivision');

Route::get('/edit-division/{id}', [JobController::class, 'editDivision'])->name('editDivision');
Route::post('/update-division/{id}', [JobController::class,'updateDivision'])->name('updateDivision');
Route::get('/del-division/{id}', [JobController::class, 'delDivision'])->name('delDivision');

Route::get('/view-qua', [JobController::class, 'viewQua'])->name('viewQua');
Route::get('/add-qua', [JobController::class, 'addQua'])->name('addQua');
Route::get('/store-qua', [JobController::class, 'storeQua'])->name('storeQua');

Route::get('/edit-qua/{id}', [JobController::class, 'editQua'])->name('editQua');
Route::post('/update-qua/{id}', [JobController::class,'updateQua'])->name('updateQua');
Route::get('/del-qua/{id}', [JobController::class, 'delQua'])->name('delQua');
// Jobs Route ENDS

// frontend JOB
Route::get('/job-by-type/{title}',[WillHabenController::class,'techWeb_getJobByType'])->name('job.by.type');
// frontend JOB
//language route start
Route::get('/lang/change', [LangController::class, 'techWeb_langChange'])->name('changeLang');
//language route end
////logo route start
Route::get('/website-logo', [WillHabenController::class, 'techWeb_webSiteLogo'])->name('website.logo');
Route::post('/save-website-logo', [WillHabenController::class, 'techWeb_saveWebSiteLogo'])->name('save.website.logo');
//logo route end
