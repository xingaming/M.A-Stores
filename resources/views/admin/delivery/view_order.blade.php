@extends('layout.app')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin khách hàng
        </div>
        <div class="table-responsive">
            <?php
                 $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên Khách Hàng</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th style="width:30px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin sản phẩm
        </div>
        <div class="table-responsive">
            <?php
                 $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px">
                        <label class="i-checks m-b-none">
                            <input type="checkbox">
                        </label>
                    </th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Tiền</th>
                        <th>Phí Ship</th>
                        <th>Tổng Tiền</th>
                        <th style="width:30px"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach ($order_detail as $key => $item)
                    @php
                    $i++;
                    $subtotal=$item->price*$item->quanty;
                    $total+=$subtotal;
                @endphp
                    <tr>
                        <td><i>{{$i}}</i></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quanty}}</td>
                        <td>{{number_format($item->price,0,',','.')}}đ</td>
                        <td>{{$item->feeship}} </td>
                        <td>{{number_format($subtotal,0,',','.')}}đ</td>

                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"></td>
                        <td>Phí Ship: {{number_format($item->feeship,0,',','.')}}đ</td>
                        <td>Thanh Toán: {{number_format($total,0,',','.')}}đ</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
