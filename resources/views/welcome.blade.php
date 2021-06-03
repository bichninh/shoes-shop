<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | shop-shoes</title>
     
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
   {{-- <link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">--}}
    <link href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> shopgiay@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
              
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i>  Tài khoản</a></li>
                            
                            <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <?php
                            $user_id= Session::get('user_id');
                            $shipping_id= Session::get('shipping_id');
                            if( $user_id!= NULL && $shipping_id==NULL ){
                            ?>
                            <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-suitcase"></i> Thanh toán</a></li>
                            <?php
                            }elseif( $user_id!= NULL && $shipping_id!=NULL ){
                            ?>
                            <li><a href="{{URL::to('/payment')}}"><i class="fa fa-suitcase"></i> Thanh toán</a></li>
                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-suitcase"></i> Thanh toán</a></li>
                           <?php
                            }
                            ?>
                           
                            <?php
                            $user_id= Session::get('user_id');
                            if( $user_id!= NULL){

                            ?>
                            <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                           <?php
                            }
                            ?>
                            
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                             
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/home')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                   
                                    <li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
                                    
                                   
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                </div>
             <!--   <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>   -->
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider">  <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>SHOES</span>-SHOP</h1>
                                <h2>Chào mừng bạn đến với SHOES-SHOP! </h2>
                                <p> Website thương mại điện tử.Mang lại trải nghiệm yêu thích cho khách hàng! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontend/images/slide1.jpg')}}" class=" img-responsive" alt="" />
                                
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span></span></h1>
                                <h2>Chào mừng bạn đến với SHOES-SHOP!</h2>
                                <p> Website thương mại điện tử.Mang lại trải nghiệm yêu thích cho khách hàng! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontend/images/slide1.jpg')}}" class=" img-responsive" alt="" />
                              
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>SHOES</span>-SHOP</h1>
                                <h2></h2>
                                <p>Website thương mại điện tử.Mang lại trải nghiệm yêu thích cho khách hàng! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                
                                <img src="{{asset('frontend/images/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>

                    </div> 

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>

                </div>  

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($category as $key => $categories)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="{{URL::to('/Danh_muc_san_pham/'.$categories->id)}}"> {{$categories->name}}
                                    </a>
                                </h4>
                            </div>
                           
                        </div>

                        
 @endforeach
                      
                       
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Thương hiệu</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                            @foreach($brand as $key => $brand_product)
                                <li><a href="{{URL::to('/Thuong_hieu_san_pham/'.$brand_product->brand_id)}}"> {{$brand_product->brand_name}}</a></li>
                                
                                @endforeach
                         
                        </div>
                    </div><!--/brands_products-->
                 
                 <!--  <div class="price-range">  price-range
                        <h2>Hiển thị theo giá sản phẩm</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">200.000</b> <b class="pull-right">4.000.000</b>
                        </div>
                    </div>/price-range     -->   
                

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('frontend/images/slide1.jpg')}}" alt="" /> 
                    </div><!--/shipping-->  


                </div>
            </div>

            <div class="col-sm-9 padding-right">

                @yield('content')




            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>SHOES</span>-SHOP</h2>
                        <p>Thanks for you!</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                       <!-- <img src="public/frontend/images/map.png" alt="" /> -->
                        <p>Hà Nội</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            
                        </ul>
                    </div>
                </div>
                
                
                
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Website shoes- shop @2020</p>
                
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
	  var id= $(this).data('id');
      var cart_product_id = $('.cart_product_id_'+ id).val();
      var cart_product_name = $('.cart_product_name_' + id).val();
      var cart_product_image = $('.cart_product_image_' + id).val();
      var cart_product_price = $('.cart_product_price_'+ id).val();
      var cart_product_qty = $('.cart_product_qty_' + id).val();
      
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: '{{url::to('/add-cart-ajax')}}',
        method: 'POST',
        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,
        cart_product_image:cart_product_image,cart_product_price:cart_product_price,
        cart_product_qty:cart_product_qty, _token:_token},
        success:function(data){
        alert(data);
    }
        

      });
        });
});
</script>  -->
</body>
</html>
