<?php
namespace App\Http\Controllers;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{    

   
   
    public function save_cart(Request $request){
       $productId = $request->productId;
       $quantily= $request->qty;
       $product_info= DB::table('products')->join('sizes','sizes.id','=','products.size_id')
       ->join('colors','colors.id','=','products.color_id')->where('product_id',$productId)->first();
      // $datas= DB:: table('products')->where('product_id',$productId)->get();
       $data['id']= $product_info->product_id;
       $data['qty']= $quantily;
       $data['weight']= $product_info->price;
       $data['name']= $product_info->product_name;
       $data['price']= number_format($product_info->price, 0,".",",");
       $data['options']['image']= $product_info->image;
       $data['options']['size']= $product_info->size_name;
       $data['options']['color']= $product_info->color_name;
       Cart::add($data);
     return Redirect::to('/show-cart');
    }
    public function show_cart(){
    
        $cart= Cart::content();
     
        $categories =DB::table('categories')->orderby('id','asc')->get();
        $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
       // $product_info= DB::table('products')->join('sizes','sizes.id','=','products.size_id')
        //->join('colors','colors.id','=','products.color_id');
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
