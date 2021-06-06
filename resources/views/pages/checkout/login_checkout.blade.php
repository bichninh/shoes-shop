@extends('welcome')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{URL::to('/login-customer')}}" method="POST">
						{{csrf_field()}}
							<input type="text"  name="username" placeholder="UserName" required autocomplete="username"/>
							<input type="password" name= "password" placeholder="password" required autocomplete="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí tài khoản!</h2>
						<form action="{{URL::to('/add-customer')}}" method ="POST">
						    {{csrf_field()}}
							<input type="text" name="username" placeholder="UserName" required autocomplete="username"/>
							<input type="password" name="password" placeholder="Password" required autocomplete="password"/>
							<input type="email" name="email" placeholder=" Email " required autocomplete="email"/>
							<input type="text" name="phone" placeholder="Điện thoại" required autocomplete="phone"/>
							<input type="text" name="address" placeholder="Địa chỉ" required autocomplete="address"/>
                            
							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
	