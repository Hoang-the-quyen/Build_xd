@extends('admin')
@section('content')
<section class="wrapper" style="background: #FFFF">
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Visitors</h4>
					<h3>13,500</h3>
					<p>Other hand, we denounce</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Users</h4>
						<h3>
						1230
						</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sales</h4>
						<h3>1,500</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Orders</h4>
						<h3>1,500</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
        <div class="container-fluid">

            <div class="row">
                <p class="title_thongke">Thống kê đơn hàng theo doanh số</p>
                <form autocomplete="off">
                    @csrf
                    <div class="col-md-2">
                        <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                        <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                    </div>
                    <div class="col-md-2">
                        <p>Đến ngày : <input type="text" id="datepicker2" class="form-control"></p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            Lọc theo :
                            <select name="" class="dashboard-filter form-control">
                                <option >--chọn--</option>
                                <option value="7ngay">7 ngày qua</option>
                                <option value="thangtruoc">Tháng trước</option>
                                <option value="thangnay">Tháng này</option>
                                <option value="365ngay">365 ngày qua</option>
                            </select>
                        </p>
                    </div>
                </form>
                <div class="col-md-12">
                    <div id="myfirstchart" style="height: 250px"></div>
                </div>
            </div>
        </div>
</section>
@endsection
