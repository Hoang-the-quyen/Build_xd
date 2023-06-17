<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Build</title>
    <link href="{{asset('/public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('/public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('/public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/public/frontend/css/base.css')}}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png')}}">
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
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
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
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('/public/backend/images/d_img/logo.png')}}" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>

								<li><a href="{{URL::to('/gio_hang ')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                 <?php
                                        $customer_id = Session::get('customer_id');
                                        if($customer_id!=NULL){
                                    ?>
                                        <li><a href="{{URL::to('/logout_checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>

                                    <?php
                                        }else{
                                      ?>
                                        <li><a href="{{URL::to('/login_checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                    <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">

						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/')}}" class="active">Home</a></li>
                                <li><a href="{{URL::to('/')}}" >Product</a></li>
                                <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id !=NULL ){
                                ?>
                                        <li><a href="{{URL::to('/history_cart/'.$customer_id)}}" >Đơn hàng</a></li>
                                <?php
                                }else{
                                ?>
                                        <li><a href="{{URL::to('/')}}" ></a></li>
                                <?php } ?>
                                {{-- <li><a href="{{URL::to('/')}}" >Đơn mua</a></li> --}}
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
                        <form action="{{URL::to('/search')}}" method="POST">
                            @csrf
                            <div style="display:flex" class="search_box pull-right">
                                <input type="text" name="keyword_submit" placeholder="Search"/>
                                <input type="submit" style="margin: 0 10px;font-size:14px;width:60px;background-image: url('')" value="Search" class="btn btn-primary btn-sm" placeholder="">
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="slider"><!--slider-->

	</section><!--/slider-->

	<section>

		<div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <div class="brands_products"><!--brands_products-->
                            <h2 style="margin-top: 10px">Danh mục</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($cate_product as $key => $cate_pro)
                                        <li>
                                            <a href="{{ URL::to('category-detail/'.$cate_pro->category_id) }}">
                                                <span class="pull-right">({{ $cate_pro->product_count }})</span>
                                                {{ $cate_pro->category_name }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <h2 style="margin-top: 10px">Nhà cung cấp</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @foreach ($sup_product as $key =>$sup_pro )

                                    <h4 style="margin: 10px 0" class="panel-title"><a href="{{ URL::to('supplier-detail/'.$sup_pro->supplier_id) }}">{{$sup_pro->supplier_name}}</a></h4>

                                    @endforeach
                                </div>
                            </div>
                        </div>



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
							<h2>HALO</h2>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('/public/frontend/images/home/map.png')}}" alt="" />
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
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
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
	</footer><!--/Footer-->



    <script src="{{asset('/public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('/public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('/public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('/public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('/public/frontend/js/main.js')}}"></script>
    <script src="{{asset('/public/frontend/js/style.js')}}"></script>
    <script src="{{asset('/public/frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
               var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{!! url('/add-cart-ajax') !!}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        // swal({
                        //     title: "Good job!",
                        //     text: "You clicked the button!",
                        //     icon: "success",
                        //     });
                        swal("Thank you!", "Bạn đã thêm sản phẩm vào giỏ hàng thành công!", "success");
                    }
                });

            });

        });
    </script>


</body>
</html>
