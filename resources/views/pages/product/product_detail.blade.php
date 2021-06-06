@extends('welcome')
@section('content')
<div class="product-details"><!--product-details-->

@foreach($details as $detail)
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/uploads/product/'.$detail->image)}}" alt="" />
								
							</div>
							<!--<div id="similar-product" class="carousel slide" data-ride="carousel"> -->

								  <!-- Wrapper for slides -->
								   <!-- <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('frontend/images/adidas1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('frontend/images/adidas2.jpg')}}" alt=""></a>

										</div>
									</div>  -->

								  <!-- Controls -->

							 <!-- <a class="left item-control" href="#" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right item-control" href="#" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a> -->

							<!--</div>  -->


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="" class="newarrival" alt="" />
								<h1>{{$detail->product_name}}</h1>
							   <img src="" alt="" />
						     @if($detail->quantily > 0)
							  <form action="{{URL::to('/save-cart')}}" method="POST">
							     {{csrf_field()}}
								<span>
									<span>{{number_format($detail->price, 0,".",",")}}VND</span>
									<label>Số lượng:  </label>
									<input name="qty" type="number" min="1" value="1"/>
									<input name="productId" type="hidden" value="{{$detail->product_id}}" />
                                    <br>
									<button type="submit" class="btn btn-fefault cart" >
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
								    </button>
                                    <p><b>Màu sắc: </b>{{$detail->color_name}}  </p>
									
								    <p><b>Size: </b>{{$detail->size_name}} </p>
								    <p><b>Thương hiệu: </b>{{$detail->brand_name}} </p>
								     @if($detail->quantily > 0)
								    <p><b>Tình trạng: </b> Còn hàng </p>
								    @else
								   <p><b>Tình trạng: </b> Hết hàng </p>
								   @endif
								  <br>

								<a href=""><img src="" class="share img-responsive"  alt="" /></a>
							   </span>
							   
								
								</form>
								@else
								
								<span>
									<span>{{number_format($detail->price, 0,".",",")}}VND</span>
									<label>Số lượng:  </label>
									<input name="qty" type="number" min="1" value="1"/>
									<input name="productId" type="hidden" value="{{$detail->product_id}}" />
                                    <br>
									<a  onclick="return confirm('Mặt hàng này đã hết')"  type="submit" class="btn btn-fefault cart" >
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
								    </a>
                                    <p><b>Màu sắc: </b>{{$detail->color_name}}  </p>
									
								    <p><b>Size: </b>{{$detail->size_name}} </p>
								    <p><b>Thương hiệu: </b>{{$detail->brand_name}} </p>
								     @if($detail->quantily > 0)
								    <p><b>Tình trạng: </b> Còn hàng </p>
								    @else
								   <p><b>Tình trạng: </b> Hết hàng </p>
								   @endif
								  <br>

								<a href=""><img src="" class="share img-responsive"  alt="" /></a>
							   </span>
							   
								
								
                             @endif
								
							</div><!--/product-information-->
						</div>

					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Chi tiết</a></li>

							{{--	<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li> --}}
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p> {!!$detail->content!!}</p>
							</div>
				     <!--    <div class="tab-pane fade " id="reviews" >
								<div class="col-sm-12">
								

									<p><b>Viết bình luận của bạn</b></p>

									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>

										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div> -->

						</div>

					</div><!--/category-tab-->
  @endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							<a class="left recommended-item-control" href="#" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							 </a>
							   
								<div class="item active">
								
							       @foreach($relation as  $lienquan)
								   
									<div class="col-sm-3">
										<div class="product-image-wrapper">
										 <div class="single-products">
                                            <div class="productinfo text-center">
                                              <img src="{{URL::to('public/uploads/product/'.$lienquan->image)}}" alt="" />
                                              <h2>{{number_format($lienquan->price, 0,".",",")}}VND</h2>
                                             <p>{{$lienquan->product_name}}</p>
                                              <a href="{{URL::to('/Chi_tiet_san_pham/'.$lienquan->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết sản phẩm</a>
                                          </div>

                                        </div>
										</div>
									</div>
									@endforeach
						      </div>
                            <!-- control -->
							   
							  <a class="right recommended-item-control" href="#" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->
@endsection
