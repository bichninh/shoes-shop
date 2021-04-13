<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{   
    private $cate;
     
    public function show(){
        $categories = Category::paginate(5);
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
    public function edit($id){
       $edit_category =  DB::table('categories')->where('id',$id)->get();
       $a= view('admin.category.edit_category')->with('edit_category', $edit_category);
    
       return view('admin_layout')->with('admin.category.edit_category', $a);
        }
    public function update( Request $request, $id ){

        $data= array();
        $data['name']= $request->name;
        $data['category_id']= $request->category_id;
    
        DB::table('categories')->Where ('id', $id)->update($data);
        return redirect()->back()->with('message', "Cập nhật sản phẩm thành công ");
        
        }
    public function form_delete(){

        return view('admin.category.delete_category');
    }    
   public function delete($id){

        //kiem tra xem trong danh muc co ton tai không
       // $id = $request->input('id');
        //$id = Category::find($id);
        //$name = $id->name;
       // $category_id= $id->category_id;
       // if($id->delete()){
       //     return redirect()->back()->with('message', "Xóa sản phẩm thành công ");
       // }
       DB::table('categories')->where('id',$id)->delete();
       return redirect()->back()->with('message', "Xóa sản phẩm thành công ");
    }
    public function show_category_home($category_id){
      $cate_product= DB::table('categories')->orderby('id','desc')->get();
      $brand_product= DB::table('brands')->orderby('brand_id','desc')->get();
      $category_by_id= $products =DB::table('products')
      ->join('categories','categories.id','=','products.category_id')->where('products.category_id',$category_id)->get() ;
      return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id', $category_by_id ); 
    
    }
}
      