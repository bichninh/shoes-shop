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
      // $datas= DB:: table('products')->where('product_id',$productId)->get();
       $data['id']= $product_info->product_id;
       $data['qty']= $quantily;
       $data['weight']= $product_info->price;
       $data['name']= $product_info->product_name;
       $data['price']= $product_info->price;
       $data['options']['image']= $product_info->image;
      // $data['options']['size']= $product_info->size;
      // $data['options']['color']= $product_info->color;
       Cart::add($data);
     return Redirect::to('/show-cart');
    }
    public function show_cart(){
    
        $cart= Cart::content();
     
        $categories =DB::table('categories')->orderby('id','asc')->get();
        $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
        return view('pages.cart.show_cart')->with('category',$categories)->with('brand',$brand_product)->with('content_cart',$cart);

    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');

    }
    public function update_cart_quanlity(Request $request){
        $rowId = $request->rowId_cart;
        $qty= $request->cart_quanlity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
