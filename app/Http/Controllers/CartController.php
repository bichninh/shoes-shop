<?php
namespace App\Http\Controllers;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
       $productId = $request->productid_hidden;
       $quantily= $request->qty;
       $product_info= DB::table('products')->where('product_id',$productId)->first();
       $data= DB:: table('products')->where('product_id',$productId)->get();
       $categories =DB::table('categories')->orderby('id','asc')->get();
       $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
       $data['id']= $product_info->product_id;
       $data['image']= $product_info->image;
       $data['qty']= $quantily;
       $data['weight']= $product_info->price;
       $data['name']= $product_info->product_name;
       $data['price']= $product_info->price;
      // $data['options']['size']= $product_info->size;
      // $data['options']['color']= $product_info->color; 
       Cart::add($data);
     return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $categories =DB::table('categories')->orderby('id','asc')->get();
        $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
        return view('pages.cart.show_cart')->with('category',$categories)->with('brand',$brand_product);
    
    }
}
