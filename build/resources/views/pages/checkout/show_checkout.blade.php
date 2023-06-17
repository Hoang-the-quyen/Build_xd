<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('/public/frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/public/frontend/css/base.css')}}">

    <!--[if lt IE 9]>
    <script src="{{asset('public/frontend/js/html5shiv.js')}}"></script>
    <script src="{{asset('public/frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
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
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
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
                                <?php
                                        $customer_id = Session::get('customer_id');
                                        $shipping_id = Session::get('shipping_id');
                                        if($customer_id!=NULL && $customer_id == NULL){
                                    ?>
                                        <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                    <?php
                                        }elseif ($customer_id!=NULL && $customer_id!=NULL) {
                                    ?>
                                        <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                    <?php
                                        }else{
                                      ?>
                                        <li><a href="{{URL::to('/login_checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                                    <?php } ?>
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
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html">Home</a></li>

							</ul>
						</div>
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

	<section id="cart_items">
		<div class="container">

			<div class="shopper-informations">
				<div class="row">
                    <form action="" method="post">
                        @csrf
                        <div class="col-sm-12 clearfix">
                            <section  id="cart_items">
                                <div class="breadcrumbs">
                                    <ol class="breadcrumb">
                                      <li><a id="home" href="{{URL::to('/')}}">Cart</a></li>
                                      <li class="active">Xác nhận thông tin</li>
                                    </ol>
                                </div>
                                <div class="container">
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
                                                                <form action="" >
                                                                    <input class="product_id" type="hidden" name="product_id" value="{{$cart['product_id']}}" autocomplete="off" size="2">
                                                                    <input class="cart_quantity_input product_quantity" type="text" name="product_quantity" value="{{$cart['product_qty']}}" autocomplete="off" size="2">
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td class="cart_total">
                                                            <p class="cart_total_price">
                                                                {{number_format($subtotal,0,',','.').' '.'vnđ'}}
                                                            </p>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section> <!--/#cart_items-->
                            <div  class="col-sm-12 clearfix">
                                <div class="bill-to">
                                    <p>Điền thông tin người nhận vật tư</p>
                                    <div style="width:100%;" class="form-one">
                                        <?php
                                            $customer_id = Session('customer_id');
                                            if($customer_id){
                                                echo '<input class="customer_id" value="'.$customer_id.'"  type="hidden" name="customer_id" >';
                                            }
                                        ?>
                                        <form action="">
                                            <input class="shipping_email"   type="text" name="shipping_email" placeholder="Email">
                                            <input class="shipping_name"  type="text" name="shipping_name" placeholder="Họ và tên">
                                            <input class="shipping_address"  type="text" name="shipping_address" placeholder="Địa chỉ">
                                            <input class="shipping_phone"  type="text" name="shipping_phone" placeholder="Phone">
                                            <div class="order-message">
                                                <textarea style="height: 251px" class="order_detail_note" name="order_detail_note"  placeholder="Ghi chú đơn hàng"  rows="16"></textarea>
                                            </div>
                                        </form>
                                            <section spellcheck=""   id="do_action">
                                                <div class="container">
                                                    <div class="row">
                                                        <div  class="col-sm-12">
                                                            <h3 style="margin-left: 15px">Hình thức thanh toán</h3>
                                                            <div style="margin:15px;" class="payment-options">
                                                                <span>
                                                                    <label style="color:#111 "><input class="payment_option" name="payment_option" value="0" type="checkbox"> Thanh toán khi nhận hàng</label>
                                                                </span>
                                                                <span>
                                                                    <label style="color:#111"><input class="payment_option" name="payment_option" value="1" type="checkbox"> Thanh toán bằng ngân hàng</label>
                                                                </span>
                                                                <span>
                                                                    <label style="color:#111"><input class="payment_option" name="payment_option" value="2" type="checkbox"> Thanh toán qua ví điện tử</label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div  class="col-sm-5">
                                                            <div style="margin-bottom: 0;padding:0" class="total_area">
                                                                <ul>
                                                                    <li>Tổng tiền <span>{{number_format($total,0,',','.').' '.'vnđ'}}</span></li>

                                                                        @if(session::get('coupon') && !empty(Session::get('cart')))
                                                                            @foreach (session::get('coupon') as $key =>$cou )
                                                                                @if($cou['coupon_codition'] ==1 )
                                                                                <li>Vocher : <span><input type="hidden" value="{{'Giảm '.$cou['coupon_code']}}" class="show_coupon" name="show_coupon">{{'Giảm '.$cou['coupon_number']}} %</span></li>

                                                                                    <p>
                                                                                        @php
                                                                                            $total_coupon = ($total * $cou['coupon_number'])/100;
                                                                                            // echo '<li>Tổng giảm:<span>'.number_format($total_coupon).' '.'vnđ'.'</span></li>';
                                                                                        @endphp
                                                                                    </p>
                                                                                    {{-- <li>sau giảm : <span>{{number_format($total - $total_coupon).' '.'vnđ'}}</span></li> --}}
                                                                                @elseif ($cou['coupon_codition'] ==2)
                                                                                    <li>Vocher : <span>{{'Giảm '.number_format($cou['coupon_number'],0,',','.')}} K</span></li>
                                                                                    <p>
                                                                                        @php
                                                                                            $total_coupon = ($cou['coupon_number']);
                                                                                            // echo '<li>Tổng giảm:<span>'.number_format($total_coupon).' '.'vnđ'.'</span></li>';
                                                                                        @endphp
                                                                                    </p>
                                                                                    {{-- <li>sau giảm : <span>{{number_format($total - $total_coupon).' '.'vnđ'}}</span></li> --}}

                                                                                @endif
                                                                            @endforeach
                                                                            @php
                                                                                Session::forget('coupon'); // Xóa mã giảm giá khỏi session
                                                                            @endphp
                                                                        @else
                                                                                <li>Vocher : <span> </span></li>
                                                                        @endif


                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div  class="col-sm-5">
                                                            <div style="margin-bottom: 0;padding:0" class="total_area">
                                                                <ul>
                                                                    <li>Phí vận chuyển <span>Free</span></li>

                                                                    <li>Tổng thanh toán <span>{{number_format(($total - $total_coupon),0,',','.').' '.'vnđ'}}</span></li>
                                                                    <input type="hidden" class="order_total" name="order_total" value="{{$total - $total_coupon}}">
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button type="button" name="add_order" class="btn btn-default check_out add_order" >Đặt hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        <div style="position: absolute;top:71%;right:0" class="col-sm-3">
                                            <div style="margin-bottom: 0;padding:0;display: flex;justify-content:space-between;align-item:center" class="total_area">
                                                <form style="display: flex; "  action="{{url('/check_coupon')}}" method="post">
                                                    @csrf
                                                    <input style="margin-top:10px;color:#111" name="coupon" type="text" name="coupon" id="" class="form-control" placeholder="Nhập mã giảm giá">
                                                    <input style=" margin: 10px;box-sizing:border-box;background-color:white;color:#111" value="Áp dụng" class="btn btn-default check_coupon" name="check_coupon" type="submit">
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>

				</div>
			</div>

		</div>
	</section> <!--/#cart_items-->
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('/public/frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add_order').click(function(){
                var product_ids = [];
                var product_quantities = [];
                // var product_ids = $('.product_ids').val();
                // var product_quantities = $('.product_quantities').val();

                var shipping_email = $('.shipping_email').val();
                var shipping_name = $('.shipping_name').val();
                var shipping_address = $('.shipping_address').val();
                var shipping_phone = $('.shipping_phone').val();
                var order_detail_note = $('.order_detail_note').val();
                // var payment_option = $('.payment_option').val();
                // var show_coupon = $('.show_coupon').val();
                var order_total = $('.order_total').val();
                var customer_id = $('.customer_id').val();
                var _token = $('input[name="_token"]').val();
                $('.product_id').each(function(){
                    product_ids.push($(this).val());
                });

                $('.product_quantity').each(function(){
                    product_quantities.push($(this).val());
                });

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{!! url('/insert_order') !!}',
                    method: 'POST',
                    data: {
                        product_ids: product_ids,
                        product_quantities: product_quantities,
                        shipping_email: shipping_email,
                        shipping_name: shipping_name,
                        shipping_address: shipping_address,
                        shipping_phone: shipping_phone,
                        customer_id: customer_id,
                        order_detail_note: order_detail_note,
                        order_total: order_total,
                        _token: _token
                    },
                    success: function(data) {
                        swal("Thank you!", "Bạn đã đặt hàng thành công!", "success");
                        setTimeout(function() {
                            window.location.href = "http://localhost/build/"; // Chuyển hướng sau 3 giây
                        }, 3000);
                    }
                });
            });
        });
    </script>

</body>
</html>
