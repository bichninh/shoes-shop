<?php
namespace App\Http\Controllers;
use Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function save_cart(Request $request){
       $productId = $request->productId;
       $quantily= $request->qty;
       $product_info= DB::table('products')->where('product_id',$productId)->first();
       $datas= DB:: table('products')->where('product_id',$productId)->get();
       $categories =DB::table('categories')->orderby('id','asc')->get();
       $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
       $datas['id']= $product_info->product_id;
       $datas['image']= $product_info->image;
       $datas['qty']= $quantily;
       $datas['weight']= $product_info->price;
       $datass['name']= $product_info->product_name;
       $datas['price']= $product_info->price;
      // $data['options']['size']= $product_info->size;
      // $data['options']['color']= $product_info->color;
       Cart::add($datas);
     return Redirect::to('/show-cart');
    }
    public function show_cart(){
    
        $cart= Cart::content();
     
        $categories =DB::table('categories')->orderby('id','asc')->get();
        $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
        return view('pages.cart.show_cart')->with('category',$categories)->with('brand',$brand_product)->with('content_cart',$cart);

    }
}
