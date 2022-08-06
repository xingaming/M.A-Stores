@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="text-align: center">
                <h1>Thêm Phí Vận Chuyển</h1>
            </header>
            <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>

<div class="pannel-body">
    <div class="position-center">
<form>
    @csrf
    <div class="form-group">
      <label for="exampleInputPassword1">Chọn Thành Phố</label>
        <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
            <option value="">--Chọn Tỉnh Thành Phố--</option>
        @foreach ($city as $key => $tp)
        <option value="{{$tp->matp}}">{{$tp->name_city}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Chọn Quận Huyện</label>
          <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
              <option value="">--Chọn Quận Huyện--</option>
            </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Chọn Xã Phường</label>
          <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
              <option value="">--Chọn Xã Phường--</option>
            </select>
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Phí Vận Chuyển</label>
      <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Số tiền">
    </div>
    <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm Phí Vận Chuyển</button>
  </form>
  <div id="load_delivery">

  </div>
</div>
</div>
</section>
</div>
</div>
@endsection
