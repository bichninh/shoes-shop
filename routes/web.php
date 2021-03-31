<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
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
Route::get('/category',[CategoryController ::class, 'show']);
Route::get('/add_category',[CategoryController ::class, 'create']);

Route::get('/edit_category',[CategoryController ::class, 'edit']);
Route::post('/store-category',[CategoryController ::class, 'store']);
Route::get('/delete-category',[CategoryController ::class, 'form_delete']);
Route::post('/delete',[CategoryController ::class, 'destroy']);