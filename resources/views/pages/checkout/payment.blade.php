@extends('welcome')
@section('content')

<div class="review-payment"> 
      <h2>Đơn hàng</h2>
 </div>
  <div class="table-responsive cart_info">
              <?php
			  $content_cart= Cart::content();
			  
			  ?>
           
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						
                            <td class="image">  Hình ảnh </td>
                            <td class="name"> Tên sản phẩm </td>
							<td class="color"> Màu sắc</td>
							<td class="size"> Size </td>
                            <td class="price"> Giá </td>
                            <td class="quantity"> Số lượng </td>
							<td class="total"> Tổng tiền </td>
                        </tr>
					</thead>
					<tbody>
                       @foreach($content_cart as $v_content)
						<tr>
						
							<td class="cart_image">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt=""></a>
							</td>
							<td class="cart_name">
								<h4><a href="">{{$v_content->name}}</a></h4>
								
							</td>
							<td class="cart_color">
								<p>{{$v_content->options->color}}</p>
								
							</td>
							<td class="cart_size">
								<p>{{$v_content->options->size}}</p>
								
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).',000 '.'vnd'}}</p>
							</td>
							<td class="cart_quantity">
								
									
							<p> {{$v_content->qty}}</p >
								
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
								<?php
								$subtotal= $v_content->price * $v_content->qty;
								echo number_format($subtotal).',000'.'vnd';
								?>
								
								</p>
							</td>
						
						</tr>
                    @endforeach
				
					</tbody>
				
				</table>
			
				
        </div>
        
  <div class="review-payment"> 
      <h2>Thành tiền</h2>
 </div>
        <div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::subtotal().'0'.' vnd'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::subtotal().'0'.' vnd'}}</span></li>
						</ul>
							
						</div>	
				</div>
		</div>
 
 <div class="review-payment"> 
      <h2>Thông tin giao hàng</h2>
 </div>
 <div class="row">
				
				<div class="col-sm-7">
					<div class="total_area">
						<ul>
							<li>Họ và tên: <span></span></li>
							<li>Địa chỉ email: <span></span></li>
							<li>Số điện thoại: <span></span></li>
							<li>Địa chỉ:<span></span></li>
							<li>Ghi chú cho sản phẩm: <span></span></li>
						</ul>
							
						</div>	
				</div>
		</div>
 @endsection