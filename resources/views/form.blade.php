<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="css/form.css" type="text/css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    {{-- <link href="{{asset('css/form-validation.css')}}" rel="stylesheet"> --}}
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="assets/img/footer-logo.png" alt="" width="72"
                height="72">
            <h2>Checkout form</h2>
            <p class="lead">Xin quý khách hàng vui lòng điền đầy đủ thông tin trước khi đặt hàng</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">

                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                </h4>

                @foreach (Session::get('cart')->products as $item)
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $item['productInfo']->name }}</h6>
                                <small class="text-muted">Số lượng: {{ $item['quanty'] }} </small>
                            </div>
                            <span class="text-muted">{{ number_format($item['productInfo']->price) }}₫</span>
                        </li>
                @endforeach
                {{-- @if (Session::get('fee')) --}}
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Phí Vận Chuyển</h6>
                        <small>Giá tiền ship COD</small>
                    </div>

                    <span class="text-success order_fee" id="ship"></span>

                </li>
                {{-- @endif --}}
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Product (VND)</span>
                    <strong>{{ Session::get('cart')->totalPrice }}₫</strong>
                </li>
                @php
                    $total = Session::get('cart')->totalPrice + Session::get('fee');
                @endphp
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (VND)</span>
                    <span>{{ $total }}</span>
                </li>
                </ul>


                <div class="input-group-append">
                    <a class="btn btn-secondary" href="{{ url('/index') }}">Back to Home</a>
                </div>

            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control shipping_name" name="shipping_name"
                                placeholder="Nhập họ và tên của bạn" value="abc" required>
                            <div class="invalid-feedback">
                                Valid full name is required.
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Your Phone</label>
                            <input type="tel" class="form-control shipping_phone" name="shipping_phone"
                                placeholder="Nhập số điện thoại" value="12345" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control shipping_email" name="shipping_email" placeholder="you@example.com" value="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control shipping_address" name="shipping_address" placeholder="1234 Main St"  value="1234 Main St"
                            required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn Thành Phố</label>
                                    <select name="city" id="city"
                                        class="form-control input-sm m-bot15 choose city">
                                        <option value="">--Chọn Tỉnh Thành Phố--</option>
                                        @foreach ($city as $key => $tp)
                                            <option value="{{ $tp->matp }}">{{ $tp->name_city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn Quận Huyện</label>
                                    <select name="province" id="province"
                                        class="form-control input-sm m-bot15 choose province">
                                        <option value="">--Chọn Quận Huyện--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn Xã Phường</label>
                                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                        <option value="">--Chọn Xã Phường--</option>
                                    </select>
                                </div>
                                <input type="button" value="Tính phí vận chuyển" name="calculate_order"
                                    class="btn btn-primary btn-sm calculate_delivery">

                            </form>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                checked required>
                            <label class="custom-control-label" for="credit">Ship COD</label>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block calculate_delivery send_order" name="send_order"
                        type="button">Đặt Hàng</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2022-2023 M.A Store</p>
        </footer>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
    {{-- <script src="{{asset('assets/js/sweetalert.js')}}"></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script> --}}

    <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>


    <script type="text/javascript">
        $.noConflict();
        jQuery(document).ready(function($) {
            // Code that uses jQuery's $ can follow here.
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ url('/select-delivery-home') }}',
                    method: 'get',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });

            $('.calculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' || maqh == '' || xaid == '') {
                    alert('Vui lòng chọn để tính phí vận chuyển');
                } else {

                    $.ajax({
                        url: '{{ url('/calculate-fee') }}',
                        method: 'get',
                        data: {
                            matp: matp,
                            maqh: maqh,
                            xaid: xaid,
                            _token: _token
                        },
                        success: function(data) {
                            console.log(data);
                            $('#ship').html(data);
                        }

                    });
                }
            });

            $('.send_order').click(function() {
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_email = $('.shipping_email').val();
                            var order_fee = $('.order_fee').val();
                            var _token = $('input[name="_token"]').val();

                            console.log(`${shipping_name}, ${shipping_address} `)
                            $.ajax({
                                url: '{{url('/confirm-order')}}',
                                method: 'POST',
                                data: {
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_email: shipping_email,
                                    order_fee: order_fee,
                                    _token: _token
                                },
                                success:function(){
                                    alert('Bạn đã đặt hàng thành công');
                                }
                            });

                    });

            });

    </script>


</body>

</html>
