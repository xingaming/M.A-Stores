<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>M.A Store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assest/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style>
        #change-item-cart table tbody tr td img {
            width: 70px;
        }

        .footer-left .footer-logo{
            width: 100px;
            height: 50px;

        }
    </style>
</head>

<body>


    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        fptaptech@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        0123456789
                    </div>
                </div>
                <div class="ht-right">
                    <a href="{{url('/login ')}}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="#">
                                <img src="assets/assets/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon"><ion-icon name="cart-outline"></ion-icon>
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    @if (Session::has('cart') != null)
                                        <span id="total-quanty-show">{{Session::get('cart')->totalQuanty}}</span>

                                    @else
                                        <span id="total-quanty-show">0</span>
                                    @endif

                                </a>
                                <div class="cart-hover">
                                    <div id="change-item-cart">
                                        @if (Session::has('cart') != null)
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        @foreach (Session::get('cart')->products as $item)
                                                            <tr>
                                                                <td class="si-pic"><img
                                                                        src="assets/img/products/{{ $item['productInfo']->img }}"
                                                                        alt=""></td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>{{ number_format($item['productInfo']->price) }}₫
                                                                            x {{ $item['quanty'] }}</p>
                                                                        <h6>{{ $item['productInfo']->name }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <i class="ti-close"
                                                                        data-id="{{ $item['productInfo']->id }}"></i>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>total:</span>
                                                <h5>{{ number_format(Session::get('cart')->totalPrice) }}₫</h5>
                                            </div>
                                        @endif


                                    </div>

                                    <div class="select-button">
                                        <a href="{{url('/list')}}" class="primary-btn view-card">VIEW CARD</a>                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li><a href="#">Dàn Nhựa</a></li>
                            <li><a href="#">Bánh Xe</a></li>
                            <li><a href="#">Bình Điện</a></li>
                            <li><a href="#">Đèn Tín Hiệu</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="#">Air Blade</a></li>
                        <li><a href="#">Vario</a></li>
                        <li><a href="#">Vision</a></li>
                        <li><a href="#">SH</a></li>
                        <li><a href="#">Click</a></li>
                        <li><a href="#">News</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{url('/index')}}"><i class="fa fa-home"></i> Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="assets/img/products/{{ $product->img }}" alt="">
                                            <div class="sale pp-sale">Sale</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i
                                                            class="icon_bag_alt"><ion-icon name="bag-add-outline"></ion-icon></i></a></li>
                                                <li class="quick-view"><a onclick="Cart({{ $product->id }})"
                                                        href="javascript:">+ Add Cart</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Towel</div>
                                            <a href="#">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                {{ number_format($product->price) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Shop Section End -->


    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="assets/img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 590 Đ. Cách Mạng Tháng 8, Phường 11, Quận 3, Thành phố Hồ Chí Minh </li>
                            <li>Phone: 0981578920</li>
                            <li>Email: fptaptech@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3146.2785506396176!2d106.66396284660618!3d10.787505324590677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1658112702523!5m2!1svi!2s"
                         width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This shop MA
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="assets/assets/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.zoom.min.js"></script>
    <script src="assets/js/jquery.dd.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    {{-- JavaScript --}}
    <script>
        function RenderCart(response){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty-cart").val());
        }
        function Cart(id) {
            $.ajax({
                url: 'addCart/' + id,
                type: 'GET',
            }).done(function(response) {
                console.log(response);
                RenderCart(response);
                alertify.success('Da them moi san pham');
            });

        }

        $("#change-item-cart").on("click", ".si-close i", function() {

            $.ajax({
                url: 'delete/' + $(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                console.log(response);
                RenderCart(response);
                alertify.success('Da xoa san pham');
            });

        })
    </script>

</body>

</html>
