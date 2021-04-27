<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
session_start();  
class UserController extends Controller
{    
    
       
     
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
          
          return Redirect::to('/home');
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
