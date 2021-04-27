<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class BrandController extends Controller
{
    private $cate;
    public function show(){
        $brands = brand::paginate(4);
      return view(
          'admin.brand.brand',
          ['brands' => $brands]
      );
         }
    public function create(){
     
    return view('admin.brand.add_brand');

    }
    public function store(Request $request){  //luu thuong hieu
      
     $request->validate([
        "brand_name" => "required",
        
    ],[
        "brand_name.required" => "Bạn chưa nhập name",
        
    ]);
     
      
    $cate             = new brand;
    $cate->brand_name       = $request->brand_name ;
    
    $cate->save();

    return redirect()->back()->with("message","Thêm thành công");
    	
    
        
    }
    public function edit($brand_id){
       $edit_brand =  DB::table('brands')->where('brand_id',$brand_id)->get();
       $a= view('admin.brand.edit_brand')->with('edit_brand', $edit_brand);
    
       return view('admin_layout')->with('admin.brand.edit_brand', $a);
        }
    public function update( Request $request, $brand_id ){

        $data= array();
        $data['brand_name']= $request->brand_name;
       
    
        DB::table('brands')->Where ('brand_id', $brand_id)->update($data);
        return redirect()->back()->with('message', "Cập nhật thành công ");
        
        }
     
        public function delete($id){
           DB::table('brands')->where('brand_id',$id)->delete();
           return redirect()->back()->with('message', "Xóa thành công ");
        }
        public function show_brand_home($brand_id){
            $cate_product= DB::table('categories')->orderby('id','desc')->get();
            $brand_product= DB::table('brands')->orderby('brand_id','desc')->get();
            $brand_by_id= $products =DB::table('products')
            ->join('brands','brands.brand_id','=','products.brand_id')->where('products.brand_id',$brand_id)->get() ;
            return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id', $brand_by_id ); 
        }
}
