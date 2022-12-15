<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;


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

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');


Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

    //admin category

    Route::get('admin/category', [CategoryController::class, 'index']);

    Route::get('admin/category/addcategory', [CategoryController::class, 'create']);
    Route::get('admin/category/addcategory/{id}', [CategoryController::class, 'create']);


    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete_category']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);



    Route::get('admin/updatepassword', [AdminController::class, 'updatepassword']);


    //admin coupon

    Route::get('admin/coupon', [CouponController::class, 'index']);

    Route::get('admin/coupon/addcoupon', [CouponController::class, 'create']);
    Route::get('admin/coupon/addcoupon/{id}', [CouponController::class, 'create']);


    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.manage_category_process');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete_category']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);


    //admin size

    Route::get('admin/size', [SizeController::class, 'index']);

    Route::get('admin/size/addsize', [SizeController::class, 'create']);
    Route::get('admin/size/addsize/{id}', [SizeController::class, 'create']);


    Route::post('admin/size/manage_size_process', [SizeController::class, 'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/delete/{id}', [SizeController::class, 'delete_size']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);


    //admin color

    Route::get('admin/color', [ColorController::class, 'index']);

    Route::get('admin/color/addcolor', [ColorController::class, 'create']);
    Route::get('admin/color/addcolor/{id}', [ColorController::class, 'create']);


    Route::post('admin/color/manage_color_process', [ColorController::class, 'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete_color']);
    Route::get('admin/color/status/{status}/{id}', [ColorController::class, 'status']);



    //admin product

    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/product/addproduct', [ProductController::class, 'create']);
    Route::get('admin/product/addproduct/{id}', [ProductController::class, 'create']);
    Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete_product']);
    Route::get('admin/color/status/{status}/{id}', [ProductController::class, 'status']);



    Route::get(
        'admin/logout',
        function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('message', "logout successfully");
            return redirect('admin');

        }
    );

});
