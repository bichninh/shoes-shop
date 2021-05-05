<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
         /* $user             = new User;
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
          $user_id= session::get('user_id');
          $userid= User::find($user_id);
        
          return view('pages.checkout.show_checkout')->with('category',$categories)->with('brand',$brand_product)->with('user_id', $userid);
      }
      public function save_checkout(){
  
  
          return Redirects('/payment');
  
      }
      public function payment(){
         
  
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
