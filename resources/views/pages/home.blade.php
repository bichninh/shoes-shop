@extends('welcome')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @foreach($product as $product)
        
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                 
                    <a href="{{URL::to('/Chi_tiet_san_pham/'.$product->product_id)}}">
                      <img src="{{URL::to('public/uploads/product/'.$product->image)}}" alt="" />
                        <h2>{{number_format($product->price, 0,".",",")}}VND</h2>
                        <p>{{$product->product_name}}</p>
                    </a>
                        <a href="{{URL::to('/Chi_tiet_san_pham/'.$product->product_id)}}"   class="btn btn-default add-to-cart" name="add-to-cart">Xem chi tiết sản phẩm
                        </a> 
                      
                        
                    </div>
                  <!--  <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$product->price}}</h2>
                            <p>{{$product->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>  -->
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Bình thường</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </a>
           @endforeach



    </div><!--features_items-->
    
  
@endsection
