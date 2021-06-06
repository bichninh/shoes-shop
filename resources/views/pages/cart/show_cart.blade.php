@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
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
								<p>{{number_format($v_content->price).' '.'vnd'}}</p>
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
								echo number_format($subtotal).' '.'vnd';
								?>
								
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    @endforeach
					</tbody>

				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
  
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Hóa đơn</h3>
				
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::subtotal().' '.'vnd'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::subtotal().' '.'vnd'}}</span></li>
						</ul>
							{{-- <a class="btn btn-default update" href="">Update</a> --}}
							<?php
                            $user_id= Session::get('user_id');
							
							if (sizeof(Cart::content()) > 0 ){
                            if( $user_id!= NULL){
						     ?>
                           	<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                            <?php
                            }else{
                            ?>
                            <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                           <?php
                            }
						   }else{
						   ?>
						   <a  onclick="return confirm('Giỏ hàng đang trống không thể đặt hàng')"  class="btn btn-default check_out" href="{{URL::to('/show-cart')}}">Thanh toán</a>
						   <?php
						   }
						   ?>
							
				</div>
			</div>
		</div>
	</section>



@endsection
