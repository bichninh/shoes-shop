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
        //$products = product::paginate(5);
        $products = product::join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.brand_id','=','products.brand_id')
        ->join('sizes','sizes.id','=','products.size_id')
        ->join('colors','colors.id','=','products.color_id')
        ->orderby('products.product_id','asc')->paginate(4);
       
      return view(
          'admin.product.product',
          ['products' => $products] 
      );
         }
    public function create(){
     $cate_product = DB::table('categories')->orderby('id','asc')->get();
     $brand_product = DB::table('brands')->orderby('brand_id','asc')->get();
     $size_product= DB::table('sizes')->orderby('id','asc')->get();
     $color_product=DB::table('colors')->orderby('id','asc')->get();
    return view('admin.product.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('size_product',$size_product)->with('color_product',$color_product);

    }
    public function store(Request $request){ 
        
     $request->validate([
        "product_name" => "required",
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
        "product_name.required" => "Bạn chưa nhập name",
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
    $data= array();
    $data['product_name']= $request->product_name;
    $data['category_id']= $request->category_id;
    $data['brand_id']= $request->brand_id;
    $data['size_id']= $request->size_id;
    $data['color_id']= $request->color_id;
    $data['price']= $request->price;
    $data['price_new']= $request->price_new;
    $data['quantily']= $request->quantily;
    $data['content']= $request->content;
    $data['image']= $request->image; 
    /*$cate               = new product;
    $cate->product_name         = $request->product_name;
    $cate->category_id  = $request->category_id;
    $cate->brand_id     = $request->brand_id;
    $cate->size_id      = $request->size_id;
    $cate->color_id     = $request->color_id;
    $cate->price        = $request->price;
    $cate->price_new    = $request->price_new;
    $cate->quantily     = $request->quantily;
    $cate->content      = $request->content;
    $cate->image        = $request->image;*/
    $get_image= $request->file('image');
    if( $get_image){
    $get_name_image=   $get_image->getClientOriginalName();
    $name_image=current(explode('.',$get_name_image));
    $new_image= $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
    $get_image->move('public/uploads/product', $new_image);
    $data['image']=$new_image;
    DB::table('products')->insert($data);
    return redirect()->back()->with("message","Thêm thành công");
     }
     $data['image'] = "";
     DB::table('products')->insert($data);

    return redirect()->back()->with("message","Thêm thành công");
    	
    
        
    }
    public function edit($id){
        $cate_product = DB::table('categories')->orderby('id','asc')->get();
        $brand_product = DB::table('brands')->orderby('brand_id','asc')->get();
        $size_product= DB::table('sizes')->orderby('id','asc')->get();
        $color_product=DB::table('colors')->orderby('id','asc')->get();
        $edit_product =  DB::table('products')->where('product_id',$id)->get();
        
        $a= view('admin.product.edit_product')->with('edit_product', $edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('size_product',$size_product)->with('color_product',$color_product);;
     
        return view('admin_layout')->with('admin.product.edit_product', $a);
         }
     public function update( Request $request, $id ){
 
         $data= array();
         $data['product_name']= $request->product_name;
         $data['category_id']= $request->category_id;
         $data['brand_id']= $request->brand_id;
         $data['size_id']= $request->size_id;
         $data['color_id']= $request->color_id;
         $data['price']= $request->price;
         $data['price_new']= $request->price_new;
         $data['quantily']= $request->quantily;
         $data['content']= $request->content;
         $data['image']= $request->image;
         $get_image= $request->file('image');
         if( $get_image){
         $get_name_image=   $get_image->getClientOriginalName();
         $name_image=current(explode('.',$get_name_image));
         $new_image= $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
         $get_image->move('public/uploads/product', $new_image);
         $data['image']=$new_image;
         DB::table('products')->Where ('product_id', $id)->update($data);
         return redirect()->back()->with('message', "Cập nhật sản phẩm thành công ");
         }
        
         DB::table('products')->Where ('product_id', $id)->update($data);
         return redirect()->back()->with('message', "Cập nhật sản phẩm thành công ");
        }
     
      public function delete($product_id){
 
    
        DB::table('products')->where('product_id', $product_id)->delete();
        return redirect()->back()->with('message', "Xóa sản phẩm thành công ");
     }
     public function productdetail($id){
        $cate_product= DB::table('categories')->orderby('id','desc')->get();
        $brand_product= DB::table('brands')->orderby('brand_id','desc')->get();
        $size_product=  DB::table('sizes')->orderby('id','desc')->get();
        $color_product=  DB::table('colors')->orderby('id','desc')->get();
        $details =DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.brand_id','=','products.brand_id')
        ->join('sizes','sizes.id','=','products.size_id')
        ->join('colors','colors.id','=','products.color_id')
        ->where('products.product_id',$id)->get() ;
       foreach($details as $detail ){
        $brandId= $detail->brand_id;
        $relation= DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.brand_id','=','products.brand_id')
        ->join('sizes','sizes.id','=','products.size_id')
        ->join('colors','colors.id','=','products.color_id')
        ->where('brands.brand_id',$brandId)->whereNotIn('products.product_id',[$id])->get();
              }
       
       
        return view('pages.product.product_detail')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('size', $size_product)->with('color',$color_product)->with('details',$details)->with('relation',$relation); 
        
     }
}
