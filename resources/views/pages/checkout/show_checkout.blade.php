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
								<form action="URL::to('/save-checkout')" method="POST">
                                {{csrf_field()}}
                                    <input type="text" placeholder="UserName*">
									<input type="email" placeholder="Email*">
									<input type="text" name="phone" placeholder="Điện thoại*"/>
							        <input type="text" name="address" placeholder="Địa chỉ*"/>
                                    <textarea name="shipping_notes"  placeholder="Ghi chú gửi hàng" rows="16"></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
						
						</div>
					</div>
							
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại đơn hàng</h2>
			</div>

			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection