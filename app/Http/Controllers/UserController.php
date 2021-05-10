<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\shipping;
use Auth;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
session_start();  
class UserController extends Controller
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
        //$data['order_date']= getdate();
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
    
    public function getLogin(){
        return view('auth.login');

    }
    public function getRegister(){
        return view('auth.register');

    }
    public function setLogin(Request $request ){
     /*   $data = [
            'username' => $request->username,
            'password' => $request->password,
       ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
       
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('users')->attempt($data)) {

          
            return view('welcome');
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        }
         else {

           return redirect()->back()->with('message', "Username hoặc mật khẩu sai!");
            
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        } */
       $username= $request->username ;
       $password= $request->password;
       $result= DB::table('users')-> where('username',$username)-> where('password',$password)->first();
       if($result){
           session::put('username',$request->username);
          
          return view('/home');
       }else
       {    
        return redirect()->back()->with('message', "Username hoặc mật khẩu sai!");
       }

    }
   public function user_logout(){
    Session::put('username', null);
    Session::put('id', null);
    
    return redirect()->back();

   }
    public function user_register(Request $request){
        $request->validate([
            "username" => "required",
            "password" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            
            
        ],[
            "username.required" => "Bạn chưa nhập name",
            "passwors.required" => "Bạn chưa nhập pass",
            "email.required" => "Bạn chưa nhập email",
            "phone.required" => "Bạn chưa nhập phone",
            "address.required" => "Bạn chưa nhập adrress",
        ]);
         
          
        $user             = new User;
        $user->username       = $request->username ;
        $user->password       = $request->password;
        $user->email       = $request->email ;
        $user->phone       = $request->phone ;
        $user->address      = $request->address;
        $user->save();
    
         return Redirect::to('/login-user')-> with("message","Đăng kí tài khoản thành công");



    }


    private $cate;
    public function show(){
        $users = User::paginate(4);
        
      return view(
          'admin.user.user',
          ['users' => $users] 
      );
         }
    public function create(){
     
    return view('admin.user.add_user');

    }
    public function store(Request $request){ 
        
     $request->validate([
        "username" => "required",
        "email" => "required",
        "password" => "required",
        "phone" => "required",
        "address" => "required",
        


    ],[
        "username.required" => "Bạn chưa nhập name",
        "email.required" => "Bạn chưa nhập ",
        "password.required" => "Bạn chưa nhập ",
        "phone.required" => "Bạn chưa nhập ",
        "address.required" => "Bạn chưa nhập ",
        
    ]);
     
      
    $cate               = new User;
    $cate->username     = $request->username;
    $cate->email        = $request->email;
    $cate->password     = $request->password;
    $cate->phone        = $request->phone;
    $cate->address      = $request->address;
    
    $cate->save();

    return redirect()->back()->with("message","Thêm người dùng thành công");
    	
    
        
    }
    public function edit($id){
        $edit_user =  DB::table('users')->where('id',$id)->get();
        $a= view('admin.user.edit_user')->with('edit_user', $edit_user);
     
        return view('admin_layout')->with('admin.user.edit_user', $a);
         }
     public function update( Request $request, $id ){
 
         $data= array();
         $data['username']= $request->username;
         $data['email']= $request->email;
         $data['password']= $request->password;
         $data['phone']= $request->phone;
         $data['address']= $request->address;
         
         DB::table('users')->Where ('id', $id)->update($data);
         return redirect()->back()->with('message', "Cập nhật thông tin người dùng thành công ");
         
         }
     
    public function delete($id){
 
    
        DB::table('users')->where('id',$id)->delete($id);
        return redirect()->back()->with('message', "Xóa người dùng thành công ");
     }
}
