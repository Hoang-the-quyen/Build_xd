@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="margin: 80px 0 0 0">
               Phí ship theo địa chỉ
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">

                <div class=" form">
                    <form class="cmxform form-horizontal " id="commentForm" method="post" action="" novalidate="novalidate">
                      @csrf
                      <div class="form-group">
                          <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Tỉnh or Thành phố</label>
                          <div class="col-lg-6">
                              <select name="city" id="city" class="form-control input-lg m-bot15 choose city">
                                  <option value="0">--chọn--</option>
                                  @foreach ($city as $key =>$ci)
                                  <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Quận huyên</label>
                            <div class="col-lg-6">
                                <select name="province" id="province" class="form-control input-lg m-bot15 choose province">
                                    <option value="">--chọn--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Xã thị trấn</label>
                            <div class="col-lg-6">
                                <select name="wards" id="wards" class="form-control input-lg m-bot15  wards">
                                    <option value="">--chọn--</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Phí vận chuyển</label>
                            <div class="col-lg-6">
                                <input class="fee_ship form-control" id="fee-ship" name="fee_ship" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="load_delivery">

                </div>

            </div>
        </section>
    </div>
</div>
@endsection

