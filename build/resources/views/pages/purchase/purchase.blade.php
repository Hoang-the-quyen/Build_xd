<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart </title>
    <link rel="stylesheet" href="{{asset('public/frontend/css/base.css')}}">
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('public/frontend/js/html5shiv.js')}}"></script>
    <script src="{{asset('public/frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
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
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>

								<li><a href="{{URL::to('/show_cart  ')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
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
					<div class="col-sm-9">
						<ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/')}}" class="active">Home</a></li>
                            <li><a href="{{URL::to('/')}}" >Product</a></li>
                            <li><a href="{{URL::to('/')}}" >Đơn mua</a></li>
                        </ul>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section style="margin-bottom: 300px" id="cart_items">

		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a id="home" href="{{URL::to('/')}}">Cart</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div style="margin-bottom:0 " class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        @php
                            $total =0;
                            $total_coupon =0;
                        @endphp
                        @if (null !==(Session::get('cart')) && !empty(Session::get('cart')))
                        @foreach (Session::get('cart') as $key =>$cart )
                        @php
                            $subtotal = $cart['product_price'] * $cart['product_qty'];
                            $total += $subtotal;
                        @endphp
                        <tr>
							<td class="cart_product">
								<a href=""><img height="80px" width="80px" src="{{asset('/public/uploads/product/'.$cart['product_image'])}}" alt=""></a>
							</td>
							<td  class="cart_description">
								<p>{{$cart['product_name']}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($cart['product_price'],0,',','.').' '.'vnđ'}}</p>
							</td>
							<td  class="cart_quantity">
								<div style="position: relative;" class="cart_quantity_button">
									<form action="{{url('/update_qty_ajax_plus/'.$cart['session_id'])}}" method="post">
                                        {{ csrf_field() }}
                                        <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$cart['product_qty']}}" autocomplete="off" size="2">
										<input type="hidden" value="" name="rowId_cart" class="form-control">
										<input style="margin-left: 5px" value="+" type="submit" name="update_qty" class="btn btn-default btn-sm" id="">
									</form>
									<form style="position: relative;" action="{{url('/update_qty_ajax_minus/'.$cart['session_id'])}}" method="post">
                                        {{ csrf_field() }}
                                        <input style="position: absolute;left:-33px;top:-29px"  value="-" type="submit" name="update_qty" class="btn btn-default btn-sm" id="quantity-minus">
										<input  class="cart_quantity_input_minus" type="hidden" name="cart_quantity" value="" autocomplete="off" size="2">
										<input type="hidden" value="" name="rowId_cart" class="form-control">

									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
                                    {{number_format($subtotal,0,',','.').' '.'vnđ'}}
                                </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/delete_cart_ajax/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

                        @endforeach
                        @endif

					</tbody>
                    <div style="position: absolute;bottom:0;right:7%"  class="col-sm-2">
                        <div style="margin-bottom: 0;padding:0" class="total_area">
                            <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id');
                                if($customer_id!=NULL && $shipping_id == NULL){
                            ?>
                                <a   class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Đặt hàng</a>
                                <?php
                            }elseif ($customer_id!=NULL && $shipping_id !=NULL) { ?>
                                <a  class="btn btn-default check_out" href="{{URL::to('/payment')}}">Đặt hàng</a>
                            <?php
                                }else{
                                ?>
                                <a  class="btn btn-default check_out" href="{{URL::to('/login_checkout')}}">Đặt hàng</a>
                            <?php } ?>
                        </div>
                    </div>
				</table>
			</div>
		</div>

	</section> <!--/#cart_items-->





    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>

