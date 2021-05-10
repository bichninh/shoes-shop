@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->

			
			

			<div class="register-req">
				<p>Hãy đăng nhập hoặc đăng kí để thanh toán và xem lại đơn hàng đã đặt!</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông tin để gửi hàng</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout')}}" method="POST">
                                {{csrf_field()}}
                                     <input type="text" value="{{$user_id->username}}" name="shipping_name" placeholder="UserName*">
									 <input type="email" value="{{$user_id->email}}"name="shipping_email" placeholder="Email*">
									 <input type="text" value="{{$user_id->phone}}" name="shipping_phone" placeholder="Điện thoại*"/>
							         <input type="text" value="{{$user_id->address}}" name="shipping_address" placeholder="Địa chỉ*"/>
                                     <textarea name="shipping_notes"  placeholder="Ghi chú gửi hàng" rows="16"></textarea>
									 <input type="submit" value="Gửi" class="btn btn-primary btn-sm">
								</form>
							</div>
						
						</div>
					</div>
							
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại đơn hàng</h2>
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
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quanlity')}}" method="POST">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="cart_quanlity" value="{{$v_content->qty}}" >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
								<?php
								$subtotal= $v_content->price * $v_content->qty;
								echo number_format($subtotal).',000'.'vnd';
								?>
								
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    @endforeach
					<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Tổng tiền</td>
										<td>{{Cart::subtotal().'0'.' vnd'}}</td>
									</tr>
									
									<tr class="shipping-cost">
										<td>Phí vận chuyển</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Thành tiền</td>
										<td><span>{{Cart::subtotal().'0'.' vnd'}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				
				</table>
			
				
           </div>
		   <div class="payment-options">
					<span>
						<label><input type="checkbox"> Thanh toán qua thẻ ATM</label>
					</span>
					<span>
						<label><input type="checkbox"> Thanh toán trực tiếp</label>
					</span>
					
				</div>
		  </div>
	</section> <!--/#cart_items-->
@endsection