@extends('welcome')
@section('content')
    <div class="features_items"><!--features_items-->
        @foreach($cate_name as $name)
        <h2 class="title text-center">{{$name->name}}</h2>
         @foreach( $category_by_id as $by_id)
         <a href="{{URL::to('/Chi_tiet_san_pham/'.$by_id->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                    <img src="{{URL::to('public/uploads/product/'.$by_id->image)}}" alt="" />
                        <h2>{{$by_id->price}},000 VND</h2>
                        <p>{{$by_id->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                
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
@endforeach
    </div><!--features_items-->
   
   
@endsection
