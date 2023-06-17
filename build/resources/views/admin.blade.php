<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta namef="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('/public/backend/css/bootstrap.min.css')}}" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('/public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('/public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('/public/backend/css/font.css')}}" type="text/css')}}"/>
<link href="{{asset('/public/backend/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/public/backend/css/morris.css')}}" type="text/css')}}"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('/public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->

<script src="{{asset('/public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('/public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('/public/backend/js/morris.js')}}"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
{{-- moris --}}
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        HALO
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->

        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('/public/backend/images/2.png')}}">
                <span class="username">
                    <?php
                        $admin_name = Session('admin_name');
                        if($admin_name){
                            echo $admin_name;
                        }
                    ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Hồ sơ</a></li>
                <li><a href="#"><i class="fa fa-cog"></i>Cài đặt</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/admin')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-category-product')}}">Quản lý danh mục sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Nhà cung cấp</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-supplier')}}">Thêm nhà cung cấp</a></li>
                        <li><a href="{{URL::to('/all-supplier')}}">Danh mục nhà cung cấp</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lý sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Quản lý sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <span><a di href="{{URL::to('/management_order')}}">Đơn hàng</a></span>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
                        <span><a di href="{{URL::to('/insert_coupon')}}">Thêm mã giảm giá</a></span>
                        <span><a di href="{{URL::to('/list_coupon')}}">Quản lý mã giảm giá</a></span>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Vận chuyển</span>
                    </a>
                    <ul class="sub">
                        <span><a di href="{{URL::to('/delivery')}}">Phí vận chuyển</a></span>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
    <section id="main-content">
        @yield('content')
    </section>

 <!-- footer -->
		  {{-- <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div> --}}
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('/public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('/public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('/public/backend/js/scripts.js')}}"></script>
<script src="{{asset('/public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('/public/backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('/public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</body>
</html>

{{--  --}}
<script type="text/javascript">
 $( function(){
    $(document).ready(function(){
        new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'myfirstchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        { year: '2008', value: 20 },
        { year: '2009', value: 10 },
        { year: '2010', value: 5 },
        { year: '2011', value: 5 },
        { year: '2012', value: 20 }
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Value']
    });
    });
    $("#datepicker").datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhât"],
        duration:"show"
    });
    $("#datepicker2").datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhât"],
        duration:"show"
    });
 });
</script>
<script type="text/javascript">
    $('#btn-dashboard-filter').click(function(){
        var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
        // alert(from_date);
        // alert(to_date);
        $.ajax({
            url: '{!! url('/filter-by-date') !!}',
            method: 'post',
            datatype:'json',
            data: {
                from_date:from_date,
                to_date:to_date,
                _token:_token},
                success:function(data){
                    chart.setData(data);

                }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        fetch_delivery();
        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{!! url('/select-feeship') !!}',
                    method: 'POST',
                    data: {
                        _token:_token},
                        success:function(data){
                        $('#load_delivery').html(data);
                        }
                });
        }
        $(document).on('blur','.fee_feeship_edit',function(){
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{!! url('/update_delivery') !!}',
                    method: 'POST',
                    data: {
                        feeship_id:feeship_id,fee_value:fee_value,_token:_token},
                        success:function(data){
                            fetch_delivery();
                        }
                });
        } )
        $('.add_delivery').click(function(){
            var city =$('.city').val();
            var province =$('.province').val();
            var wards =$('.wards').val();
            var fee_ship =$('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            // alert(city);
            // alert(province);
            // alert(wards);
            // alert(fee_ship);
            $.ajax({
                url: '{!! url('/insert_delivery') !!}',
                    method: 'POST',
                    data: {
                        city:city,province:province,wards:wards,fee_ship:fee_ship,_token:_token},
                        success:function(data){
                            // alert('Bạn đã thêm phí vận chuyển thành công!');
                            fetch_delivery();
                        }
                });
        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result ='';
            if(action === 'city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url: '{!! url('/select_delivery') !!}',
                // url: '{{url('/select_delivery')}}',
                    method: 'POST',
                    data: {
                        action:action,ma_id:ma_id,_token:_token},
                        success:function(data){
                            $('#'+ result).html(data);
                        }
                });
        });
    });
</script>
</body>
</html>
