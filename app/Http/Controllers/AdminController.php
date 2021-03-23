<?php

namespace App\Http\Controllers;

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
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $username= $request->username ;
        $password= md5($request->password);
        $result= DB::table('admin')-> where('username',$username)-> where('password',$password)->first();
        if($result){
           Session::put('username', $result->username);
           Session::put('id', $result->id);
           return Redirect::to('/dashboard');
        }else
        {    
            Session::put('message','Tài khoản hoặc mật khẩu sai. Nhập lại!');
            return Redirect::to('/admin');
        }

       // return view('admin.dashboard');

    }
    public function logout(){
        Session::put('username', null);
        Session::put('id', null);
        return Redirect::to('/admin');
    }
}
