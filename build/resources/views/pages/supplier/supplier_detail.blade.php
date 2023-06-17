@extends('index')
@section('content')

        <div class="features_items"><!--features_items-->
            @foreach ($pro_product as $key => $pro )
                @foreach ($sup_product as $key => $sup_name )
                    @if($pro->supplier_id == $sup_name->supplier_id)
                        <h2 style="margin-top: 10px" class="title text-center">Sản phẩm của nhà cung cấp {{$sup_name->supplier_name}}</h2>
                    @endif
                @endforeach
                @break
            @endforeach
            @foreach ($pro_product as $key => $pro )
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form>
                                @csrf
                                <input type="hidden" class="cart_product_id_{{$pro->product_id}}" value="{{$pro->product_id}}">
                                <input type="hidden" class="cart_product_name_{{$pro->product_id}}" value="{{$pro->product_name}}">
                                <input type="hidden" class="cart_product_image_{{$pro->product_id}}" value="{{$pro->product_image}}">
                                <input type="hidden" class="cart_product_price_{{$pro->product_id}}" value="{{$pro->product_price}}">
                                <input type="hidden" class="cart_product_qty_{{$pro->product_id}}" value="1">
                                <a href="{{URL::to('/product-detail/'.$pro->product_id)}}">
                                    <img style="height:240px" src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
                                    <h2>{{number_format($pro->product_price)}} vnđ </h2>
                                    <p>{{$pro->product_name}}</p>
                                </a>
                                <button type="button" name="add-to-cart" data-id_product="{{$pro->product_id}}" class="btn btn-default add-to-cart">Giỏ Hàng</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!--features_items-->


@endsection

