@extends('index')
@section('content')
<div class="container col-sm-12">
    <h1 class="text-center">Đơn hàng của tôi</h1>
    <table  class=" table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Trạng thái đơn hàng</th>
                <th>Thời gian giao hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Xem chi tiết</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($order as $key => $voc)
                <tr>
                    <td>{{$voc->order_id}}</td>
                    <td>{{$voc->order_time}}</td>
                    <td>{{$voc->order_status}}</td>
                    <td>{{$voc->order_send}}</td>
                    <td>{{$voc->order_total}}</td>
                    <td style="text-align: center"><a href="{{URL::to('/chitietdonhang/'.$voc->order_id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
        </tbody>
        </table>

</div>


@endsection
