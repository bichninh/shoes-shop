<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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
//home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/search', [HomeController::class, 'search']);

// backend
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
Route::get('/logout',[AdminController::class,'logout']);
//Route::get('/edit-profide/{id}',[AdminController ::class, 'edit']);
//Route::post('/update-profide/{id}',[AdminController ::class, 'update']);
//category
Route::get('/category',[CategoryController ::class, 'show']);
Route::get('/add_category',[CategoryController ::class, 'create']);
Route::post('/store-category',[CategoryController ::class, 'store']);
Route::get('/edit-category/{id}',[CategoryController ::class, 'edit']);
Route::post('/update-category/{id}',[CategoryController ::class, 'update']);
Route::get('/delete-category/{id}',[CategoryController ::class, 'delete']);
Route::get('/Danh_muc_san_pham/{id}',[CategoryController ::class,'show_category_home']);
//brand
Route::get('/brand',[BrandController ::class, 'show']);
Route::get('/add_brand',[BrandController ::class, 'create']);
Route::post('/store-brand',[BrandController ::class, 'store']);
Route::get('/edit-brand/{brand_id}',[BrandController ::class, 'edit']);
Route::post('/update-brand/{brand_id}',[BrandController ::class, 'update']);
Route::get('/delete-brand/{brand_id}',[BrandController ::class, 'delete']);
Route::get('/Thuong_hieu_san_pham/{brand_id}',[BrandController ::class, 'show_brand_home']);

//product
Route::get('/product',[ProductController ::class, 'show']);
Route::get('/add_product',[ProductController ::class, 'create']);
Route::post('/store-product',[ProductController ::class, 'store']);
Route::get('/edit-product/{product_id}',[ProductController ::class, 'edit']);
Route::post('/update-product/{product_id}',[ProductController ::class, 'update']);
Route::get('/delete-product/{product_id}',[ProductController ::class, 'delete']);
Route::get('/Chi_tiet_san_pham/{product_id}',[ProductController ::class, 'productdetail']);
//user
//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user',[UserController ::class, 'show']);
Route::get('/add_user',[UserController ::class, 'create']);
Route::post('/store-user',[UserController ::class, 'store']);
Route::get('/edit-user/{id}',[UserController ::class, 'edit']);
Route::post('/update-user/{id}',[UserController ::class, 'update']);
Route::get('/delete-user/{id}',[UserController ::class, 'delete']);
//Route::get('/login-checkout',[UserController ::class, 'login_checkout']);
//Route::post('/add-customer',[UserController ::class, 'add_customer']);
//Route::get('/checkout',[UserController ::class, 'checkout']);
//Route::post('/save-checkout',[UserController ::class, 'save_checkout']);
//Route::post('/login-customer',[UserController ::class, 'login_customer']);
//Route::get('/logout-checkout',[UserController ::class, 'logout_checkout']);
//Route::get('/payment',[UserController ::class, 'payment']);
//Route::get('/order',[UserController ::class, 'order']);
//Route::get('/login-user',[UserController ::class, 'getLogin']);
//Route::get('/sign-in',[UserController ::class, 'getRegister']);
//Route::post('/home',[UserController ::class, 'setLogin']);
//Route::get('/home',[UserController ::class, 'user_logout']);
//Route::post('/login-user',[UserController ::class, 'user_register']);

//cart
Route::post('/save-cart',[CartController ::class, 'save_cart']);
Route::get('/show-cart',[CartController ::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}',[CartController ::class, 'delete_to_cart']);
Route::post('/update-cart-quanlity',[CartController ::class, 'update_cart_quanlity']);
Route::post('/add-cart-ajax',[CartController ::class, 'add_cart_ajax']);
//Route::get('/gio-hang',[CartController ::class, 'gio_hang']);

//checkout
Route::get('/login-checkout',[CheckoutController ::class, 'login_checkout']);
Route::post('/add-customer',[CheckoutController ::class, 'add_customer']);
Route::get('/checkout',[CheckoutController ::class, 'checkout']);
Route::post('/save-checkout',[CheckoutController ::class, 'save_checkout']);
Route::post('/login-customer',[CheckoutController ::class, 'login_customer']);
Route::get('/logout-checkout',[CheckoutController ::class, 'logout_checkout']);
Route::get('/payment',[CheckoutController ::class, 'payment']);
Route::get('/order',[CheckoutController ::class, 'order']);


//order
Route::get('/manage-order',[OrderController ::class, 'manage_order']);
Route::get('/view-order/{order_id}',[OrderController ::class, 'view_order']);
//Route::get('/edit-order/{order_id}',[CheckoutController ::class, 'edit_order']);
Route::get('/delete-order/{order_id}',[OrderController ::class, 'delete_order']);