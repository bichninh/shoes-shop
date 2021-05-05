<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{    
   

    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        //$admin=  admin::paginate(5);
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $username= $request->username ;
        $password= md5($request->password);
        $result= DB::table('admin')-> where('username',$username)-> where('password',$password)->first();
        if($result){
           Session::put('username', $result->username);
          // Session::put('password', $result->password);
           return Redirect::to('/dashboard');
        }else
        {    
           // Session::put('message','Tài khoản hoặc mật khẩu sai. Nhập lại!');
           // return Redirect::to('/admin');
           return redirect()->back()->with('message', "Username hoặc mật khẩu sai!");
        }

       // return view('admin.dashboard');

    } 
    
    public function edit($id){
        
        $edit_admin =  DB::table('admin')->where('id',$id)->get();
        $a= view('admin.admin_profide')->with('admin_profide', $edit_admin);
     
        return view('admin_layout')->with('admin.admin_profide', $a);
         }
     public function update( Request $request, $id ){
 
         $data= array();
         $data['username']= $request->username;
         $data['email']= $request->email;
         $data['password']= $request->password;
         $data['phone']= $request->phone;
         
         DB::table('admin')->Where ('id', $id)->update($data);
         return redirect()->back()->with('message', "Cập nhật thông tin thành công ");
         
         }
    public function logout(){
        Session::put('username', null);
        Session::put('id', null);
        return Redirect::to('/admin');
    }
}
