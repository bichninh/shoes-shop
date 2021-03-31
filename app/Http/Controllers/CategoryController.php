<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{   private $cate;
    public function show(){
        $categories = Category::paginate(10);
      return view(
          'admin.category.category',
          ['categories' => $categories] 
      );
         }
    public function create(){
     
    return view('admin.category.add_category');

    }
    public function store(Request $request){  //luu danh muc san pham
       //$data =array();
      // $data['name'] =$request->name;
      // $data['category_id']=$request->category_id;
       
     // print_r($data);
     $request->validate([
        "name" => "required",
        "category_id" => "required",
    ],[
        "name.required" => "Bạn chưa nhập name",
        "category_id.required" => "Bạn chưa nhập "
    ]);
     
      
    $cate             = new Category;
    $cate->name       = $request->name;
    $cate->category_id  = $request->category_id;
    $cate->save();

    return redirect()->back()->with("message","Thêm thành công");
    	
    
        
    }
    public function edit(){
     
        return view('admin.category.edit_category');
        }
    public function update(Request $request){


        }
    public function form_delete(){

        return view('admin.category.delete_category');
    }    
   public function destroy(Request $request){

        //kiem tra xem trong danh muc co ton tai không
       // $id = $request->input('id');
        $id = Category::find($id);
        $name = $id->name;
        $category_id= $id->category_id;
        if($id->delete()){
            return redirect()->back()->with('message', "Xóa sản phẩm thành công ");
        }
    
    }
}
