@extends('layout.app')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading"> Liệt Kê Đơn Hàng</div>
        <div class="row w3-res-tb">

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
                <th>Thứ Tự</th>
                <th>Mã Đơn Hàng</th>
                <th>Ngày Tháng Đặt Hàng</th>
                <th>Tình Trạng Đơn Hàng</th>
                <th style="width:30px"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($order as $key => $ord )
                    @php
                        $i++
                    @endphp
                    <tr>
                        <td><i>{{$i}}</i></label></td>
                        <td>{{$ord->order_code}}</td>
                        <td>{{$ord->created_at}}</td>
                        <td>@if ($ord->order_status==1)
                            Đơn hàng mới
                            @else
                            Đã Xử Lí

                        @endif
                    </td>
                        <td>
                            <a href="{{url('/view-order'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-eye text-success text-active"></i>
                            </a>
                            {{-- <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không ?')" href="{{url'/delete-order').$ord->order_code}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
