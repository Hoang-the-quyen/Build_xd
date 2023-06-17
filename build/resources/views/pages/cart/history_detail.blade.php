@extends('index')
@section('content')
<div class="container col-sm-12">
    <h1 style="text-align: center">Chi tiết đơn hàng</h1>

    <div class="card">
      <div class="card-header">
        Thông tin khách hàng
      </div>
      @foreach ($view_order_customer as $key => $voc)
        <div class="card-body">
            <h5 class="card-title">Tên khách hàng: {{$voc->shipping_name}}</h5>
            <p class="card-text">Địa chỉ: {{$voc->shipping_address}}</p>
            <p class="card-text">Số điện thoại: {{$voc->shipping_phone}}</p>
            <p class="card-text">Email: {{$voc->shipping_email}}</p>
        </div>

      @endforeach
    </div>

    <div class="card mt-4">
      <div class="card-header">
        Sản phẩm
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($view_order_detail as $key => $vod)
                <tr>
                <td>{{$key + 1}}</td>
                <td>{{$vod->product_name}}</td>
                <td>{{$vod->product_quantity}}</td>
                <td>{{$vod->product_price}}</td>
                <td>{{$vod->product_quantity * $vod->product_price  }}</td>
                </tr>

            @endforeach

          </tbody>
          <tfoot>
            <tr>
                <th>Tổng thanh toán : </th>
              <th>{{number_format($vod->order_total,0,',','.')}} VNĐ</th>

            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <a href="javascript:void(0);" onclick="goBack()" class="btn btn-primary mt-4">Quay lại</a>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>

  </div>

  @endsection

