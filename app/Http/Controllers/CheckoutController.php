<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\shipping;
use App\Models\order;
use App\Models\product;
use App\Models\order_detail;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
session_start();  
class CheckoutController extends Controller
{
    public function login_checkout(){
        $categories =DB::table('categories')->orderby('id','asc')->get();
        $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
          return view('pages.checkout.login_checkout')->with('category',$categories)->with('brand',$brand_product);
      }
      public function add_customer(Request $request){
       $data= array();
       $data['username']= $request->username;
       $data['password']= $request->password;
       $data['email']= $request->email;
       $data['phone']= $request->phone;
       $data['address']= $request->address;
       $user_id= DB::table('users')->InsertGetId($data);
       Session::put('user_id',$user_id);
       /*
          $user             = new User;
          $user->username       = $request->username ;
          $user->password       = $request->password;
          $user->email       = $request->email ;
          $user->phone       = $request->phone ;
          $user->address      = $request->address;
          $user->save();
  */
       Session::put('username',$request->username);
       return Redirect::to('/checkout');
      }
      public function checkout(){
          $categories =DB::table('categories')->orderby('id','asc')->get();
          $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
          $user_id= Session::get('user_id');
          $userid= User::find($user_id);
        
          return view('pages.checkout.show_checkout')->with('category',$categories)->with('brand',$brand_product)->with('user_id', $userid);
      }
      public function save_checkout(Request $request){
         $data= array();
         $data['shipping_name']= $request->shipping_name;
         $data['shipping_email']= $request->shipping_email;
         $data['shipping_phone']= $request->shipping_phone;
         $data['shipping_address']= $request->shipping_address;
         $data['shipping_notes']= $request->shipping_notes;
         
         $shipping_id= DB::table('shippings')->InsertGetId($data);
         Session::put('shipping_id',$shipping_id);
         return Redirect::to('/payment');
        
      }
      public function payment(){
          $categories =DB::table('categories')->orderby('id','asc')->get();
          $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
          
          $shipping_id=Session::get('shipping_id');
          //$shippingid= DB::table('shippings')->where('id',$shipping_id)->first();
          $shippingid= shipping::find($shipping_id);
          return view('pages.checkout.payment')->with('category',$categories)->with('brand',$brand_product)->with('shipping_id', $shippingid);
          
      }
      public function order(){
          
          //chèn vào bảng order
          $data= array();
          $data['shipping_id']= Session::get('shipping_id');
          $data['user_id']=  Session::get('user_id');
          $data['total']= Cart::subtotal();
          $data['status']= "dang cho xu li";
          $data['order_date']= NOW();
         $order_id= DB::table('orders')->InsertGetId($data);
         
         
         //chèn vào bảng order_detail
         $data_d_order= array();
         $content= Cart::content();
         foreach($content as $v_content){
          $data_d_order['order_id']=  $order_id;
          $data_d_order['product_id']=  $v_content->id;
          $data_d_order['product_name']=  $v_content->name;
          $data_d_order['price_unit']= $v_content->price;
          $data_d_order['quantily_sale']=$v_content->qty ;
          $data_d_order['size']= $v_content->options->size;
          $data_d_order['color']= $v_content->options->color;
          DB::table('order_details')->InsertGetId($data_d_order);
          //cap nhat so luong
          $order_detail= order_detail::where('order_id',$order_id)->get();
          $a=product::where('product_id', $v_content->id)->get();
          foreach($order_detail as $ord){
              foreach($a as $b){
                   $soluong= $b->quantily - $ord->quantily_sale;
                  product::where('product_id', $v_content->id)->update(['quantily'=>$soluong]);
              }
              
            }
          
         
          
         }
         Cart::destroy();
         $categories =DB::table('categories')->orderby('id','asc')->get();
         $brand_product= DB::table('brands')->orderby('brand_id','asc')->get();
       return view('pages.checkout.success')->with('category',$categories)->with('brand',$brand_product);
      }
      public function login_customer(Request $request){
         
          $username= $request->username;
          $password= $request->password;
          $result= DB::table('users')->where('username',$username)-> where('password',$password)->first();
          if($result){
            
            Session::put('user_id',$result->id);
            return Redirect::to('/checkout');
         }else{    
          return Redirect::to('/login-checkout');
         }
         
         }
      public function logout_checkout(){
         Session::flush();
         return Redirect::to('/login-checkout');
  
  
      }
}