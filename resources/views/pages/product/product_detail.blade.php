@extends('welcome')
@section('content')
<div class="product-details"><!--product-details-->
 
@foreach($details as $detail)
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/uploads/product/'.$detail->image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('frontend/images/adidas1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('frontend/images/adidas2.jpg')}}" alt=""></a>
										  
										</div>
									</div>

								  <!-- Controls -->
								 
								  <a class="left item-control" href="#" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right item-control" href="#" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	
							 
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="" class="newarrival" alt="" />
								<h1>{{$detail->product_name}}</h1>
							
								<img src="" alt="" />
								<span>
									<span>{{$detail->price}},000 VND</span>
									<label>Số lượng:  {{$detail->quantily}}</label>
									
							   </span>
								<p><b>Màu sắc: </b>{{$detail->color_name}}  </p>
								<p><b>Thương hiệu: </b>{{$detail->brand_name}} </p>
								@if($detail->quantily > 0)
								<p><b>Tình trạng: </b> Còn hàng </p>
								@else
								<p><b>Tình trạng: </b> Hết hàng </p>
								@endif
								<br>
								<button type="button" class="btn btn-fefault cart" >
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
								<a href=""><img src="" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
@endforeach
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#" data-toggle="tab">A</a></li>
								<li><a href="#" data-toggle="tab">b</a></li>
								<li><a href="#" data-toggle="tab">C</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="A" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>600,000 VND</h2>
												<p>abc</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							
								
								
							</div>
							
							<div class="tab-pane fade" id="B" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>600,000 VND</h2>
												<p>abc</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								
								
							</div>
							
							<div class="tab-pane fade" id="C" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="" alt="" />
												<h2>600,000 VND</h2>
												<p>abc</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>ab</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>00:00 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>dd DEC yyyy</a></li>
									</ul>
									
									<p><b>Viết bình luận của bạn</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
						
					</div><!--/category-tab-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="" alt="" />
													<h2>600,000 VND</h2>
													<p>ABC</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>600,000 VND</h2>
													<p>ABC</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									
									
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection
