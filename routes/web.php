<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
// backend
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
Route::get('/logout',[AdminController::class,'logout']);
//category
Route::get('/category',[CategoryController ::class, 'show']);
Route::get('/add_category',[CategoryController ::class, 'create']);
Route::post('/store-category',[CategoryController ::class, 'store']);
Route::get('/edit-category/{id}',[CategoryController ::class, 'edit']);
Route::post('/update-category/{id}',[CategoryController ::class, 'update']);
Route::get('/delete-category/{id}',[CategoryController ::class, 'delete']);
//brand
Route::get('/brand',[BrandController ::class, 'show']);
Route::get('/add_brand',[BrandController ::class, 'create']);
Route::post('/store-brand',[BrandController ::class, 'store']);
Route::get('/edit-brand/{brand_id}',[BrandController ::class, 'edit']);
Route::post('/update-brand/{brand_id}',[BrandController ::class, 'update']);
Route::get('/delete-brand/{brand_id}',[BrandController ::class, 'delete']);
//product
Route::get('/product',[ProductController ::class, 'show']);
Route::get('/add_product',[ProductController ::class, 'create']);
Route::post('/store-product',[ProductController ::class, 'store']);
Route::get('/edit-product/{id}',[ProductController ::class, 'edit']);
Route::post('/update-product/{id}',[ProductController ::class, 'update']);
Route::get('/delete-product/{id}',[ProductController ::class, 'delete']);