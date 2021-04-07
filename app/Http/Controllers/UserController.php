<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    private $cate;
    public function show(){
        $users = User::paginate(5);
        
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
