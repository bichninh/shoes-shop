<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
   public function index(){
      $categories =DB::table('categories')->orderby('id','asc')->get();
      $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
      $product= DB::table('products')->orderby('product_id','desc')->limit(4)->get();
   return view('pages.home')->with('category',$categories)->with('brand',$brand_product)->with('product',$product);
      
   }
} 