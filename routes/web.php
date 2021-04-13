<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user',[UserController ::class, 'show']);
Route::get('/add_user',[UserController ::class, 'create']);
Route::post('/store-user',[UserController ::class, 'store']);
Route::get('/edit-user/{id}',[UserController ::class, 'edit']);
Route::post('/update-user/{id}',[UserController ::class, 'update']);
Route::get('/delete-user/{id}',[UserController ::class, 'delete']);
//trang home

