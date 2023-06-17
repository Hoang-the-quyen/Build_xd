@extends('index')
@section('content')


        <div class="features_items"><!--features_items-->
            <h2 style="margin-top: 10px" class="title text-center">Sản phẩm mới nhất </h2>
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
                                {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                <button type="button" name="add-to-cart" data-id_product="{{$pro->product_id}}" class="btn btn-default add-to-cart">Giỏ Hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div><!--features_items-->



        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Vật Tư Cần Thiết</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach ($pro_pro4 as $key => $pro )
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{URL::to('/product-detail/'.$pro->product_id)}}">
                                                <img height="220px" src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
                                                <h2>{{number_format($pro->product_price)}} vnđ</h2>
                                                <p>{{$pro->product_name}}</p>
                                            </a>
                                            <button type="button" name="add-to-cart" data-id_product="{{$pro->product_id}}" class="btn btn-default add-to-cart">Giỏ Hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="item">
                        @foreach ($pro_pro4 as $key => $pro )
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img height="220px" src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
                                        <h2>{{number_format($pro->product_price)}} vnđ</h2>
                                        <p>{{$pro->product_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                  </a>
            </div>
        </div><!--/recommended_items-->



@endsection
