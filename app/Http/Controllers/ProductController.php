<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    private $cate;
    public function show(){
        $products = product::paginate(5);
        
      return view(
          'admin.product.product',
          ['products' => $products] 
      );
         }
    public function create(){
     
    return view('admin.product.add_product');

    }
    public function store(Request $request){ 
        
     $request->validate([
        "name" => "required",
        "category_id" => "required",
        "brand_id" => "required",
        "size_id" => "required",
        "color_id" => "required",
        "image" => "required",
        "price" => "required",
        "price_new" => "required",
        "quantily" => "required",
        "content" => "required",
        


    ],[
        "name.required" => "Bạn chưa nhập name",
        "category_id.required" => "Bạn chưa nhập ",
        "brand_id.required" => "Bạn chưa nhập ",
        "size_id.required" => "Bạn chưa nhập ",
        "color_id.required" => "Bạn chưa nhập ",
        "image.required" => "Bạn chưa nhập ",
        "price.required" => "Bạn chưa nhập ",
        "price_new.required" => "Bạn chưa nhập ",
        "quantily.required" => "Bạn chưa nhập ",
        "content.required" => "Bạn chưa nhập ",
        
    ]);
     
      
    $cate               = new product;
    $cate->name         = $request->name;
    $cate->category_id  = $request->category_id;
    $cate->brand_id     = $request->brand_id;
    $cate->size_id      = $request->size_id;
    $cate->color_id     = $request->color_id;
    $cate->image        = $request->image;
    $cate->price        = $request->price;
    $cate->price_new    = $request->price_new;
    $cate->quantily     = $request->quantily;
    $cate->content      = $request->content;
    $cate->save();

    return redirect()->back()->with("message","Thêm thành công");
    	
    
        
    }
    public function edit($id){
        $edit_product =  DB::table('products')->where('id',$id)->get();
        $a= view('admin.product.edit_product')->with('edit_product', $edit_product);
     
        return view('admin_layout')->with('admin.product.edit_product', $a);
         }
     public function update( Request $request, $id ){
 
         $data= array();
         $data['name']= $request->name;
         $data['category_id']= $request->category_id;
         $data['brand_id']= $request->brand_id;
         $data['size_id']= $request->size_id;
         $data['color_id']= $request->color_id;
         $data['image']= $request->image;
         $data['price']= $request->price;
         $data['price_new']= $request->price_new;
         $data['quantily']= $request->quantily;
         $data['content']= $request->content;
     
         DB::table('products')->Where ('id', $id)->update($data);
         return redirect()->back()->with('message', "Cập nhật sản phẩm thành công ");
         
         }
     
    public function delete($id){
 
    
        DB::table('products')->where('id',$id)->delete($id);
        return redirect()->back()->with('message', "Xóa sản phẩm thành công ");
     }
}
