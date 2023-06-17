@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="margin: 80px 0 0 0">
                Sửa sản phẩm
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>
                <div class=" form">

                    @foreach ($edit_product as $key => $values_pro )
                    <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{URL::to('/update-product/'.$values_pro->product_id)}}" enctype="multipart/form-data" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Tên sản phẩm</label>
                            <div class="col-lg-6">
                                <input value="{{$values_pro->product_name}}" class=" form-control" id="cname" name="product_name" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả</label>
                            <div class="col-lg-6">
                                <textarea rows="8" class="form-control " id="ccomment" name="product_des" required="">{{$values_pro->product_des}}</textarea>
                            </div>
                        </div>
                        {{-- Giá bán --}}
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Giá sản phẩm</label>
                            <div class="col-lg-6">
                                <input value="{{$values_pro->product_price}}" class=" form-control" id="cname" name="product_price" minlength="2" type="text" required="">
                            </div>
                        </div>

                        {{-- hình ảnh --}}
                        <div class="form-group ">
                           <label for="cname" class="control-label col-lg-3">Hình ảnh</label>
                           <div class="col-lg-6">
                               <input class="form-add-image form-control" id="cname" name="product_image" minlength="2" type="file" required="">
                               <img width="100p" height="100px" src="{{URL::to('public/uploads/product/'.$values_pro->product_image)}}" alt="">
                           </div>
                       </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Thuộc danh mục</label>
                            <div class="col-lg-6">
                                <select name="cate_product" class="form-control input-lg m-bot15">
                                @foreach ($cate_product as $key => $cate_pro )
                                    @if ($values_pro->category_id == $cate_pro->category_id)
                                        <option selected value="{{$cate_pro->category_id}}">{{$cate_pro->category_name}}</option>
                                    @else
                                        <option value="{{$cate_pro->category_id}}">{{$cate_pro->category_name}}</option>
                                    @endif

                                @endforeach
                            </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Đơn vị cung cấp</label>
                            <div class="col-lg-6">
                                <select name="sup_product" class="form-control input-lg m-bot15">
                                        @foreach ($sup_product as $key => $sup_pro )

                                            @if ($values_pro->supplier_id == $sup_pro->supplier_id)
                                                <option selected value="{{$sup_pro->supplier_id}}">{{$sup_pro->supplier_name}}</option>
                                             @else
                                                <option value="{{$sup_pro->supplier_id}}">{{$sup_pro->supplier_name}}</option>
                                            @endif


                                        @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
				                <input type="submit" value="Sửa sản phẩm" name="login">
                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>

            </div>
        </section>
    </div>
</div>
@endsection
