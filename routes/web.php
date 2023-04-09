<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('seller/home', [HomeController::class, 'sellerHome'])->name('seller.home')->middleware('is_admin');

Route::get('/marketplace', [HomeController::class, 'marketPlace'])->name('marketplace');
Route::get('/property', [HomeController::class, 'property'])->name('property');
Route::get('/car-motor', [HomeController::class, 'carMotor'])->name('car.motor');
Route::get('/job', [HomeController::class, 'job'])->name('job');



Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/save-category', [CategoryController::class, 'saveCategory'])->name('save.category');

Route::get('/add-sub-category', [CategoryController::class, 'addSubCategory'])->name('add.sub.category');
Route::post('/save-sub-category', [CategoryController::class, 'saveSubCategory'])->name('save.sub.category');
Route::get('/add-sub-sub-category', [CategoryController::class, 'addSubSubCategory'])->name('add.sub.sub.category');
Route::post('/save-sub-sub-category', [CategoryController::class, 'saveSubSubCategory'])->name('save.sub.sub.category');
Route::get('/get-sub-sub-category/{category_id}', [CategoryController::class, 'getSubSubCategory'])->name('get.sub.sub.category');
