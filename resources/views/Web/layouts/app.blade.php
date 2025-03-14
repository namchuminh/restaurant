<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $config->title }} | @yield('title')</title>
    <meta name="author" content="{{ $config->email }}">
    <meta name="description" content="@yield('title'), {{ $config->description }}">
    <meta name="keywords" content="@yield('title')">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset($config->favicon) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($config->favicon) }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset($config->favicon) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($config->favicon) }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset($config->favicon) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($config->favicon) }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset($config->favicon) }}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <!-- Date Time -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.datetimepicker.min.css') }}">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .alert {
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }

        .alert.fade-out {
            opacity: 0;
            visibility: hidden;
        }
    </style>
    @yield('css')

</head>

<body>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" style="margin-bottom: 0;" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 0;" role="alert">
        {{ session('info') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center" style="margin-bottom: 0;" role="alert">
        {{ session('error') }}
    </div>
@endif
<!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
    
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ route('web.home') }}"><img src="{{ asset($config->logo) }}"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li>
                        <a href="{{ route('web.home') }}">TRANG CHỦ</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">LOẠI MÓN ĂN</a>
                        <ul class="sub-menu">
                            @foreach ($listMenuCategory as $category)
                                <li><a href="about.html">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('web.food.list') }}">MÓN ĂN</a>
                    </li>
                    <li>
                        <a href="{{ route('web.news.list') }}">TIN TỨC</a>
                    </li>
                    <li>
                        <a href="{{ route('web.contact.index') }}">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout1 ">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li class="d-none d-xxl-inline-block"><i class="fas fa-location-dot"></i> <a href="https://www.google.com/maps/">{{ $config->address }}</a></li>
                                <li><i class="fas fa-phone"></i> <a href="tel:{{ $config->phone }}">{{ $config->phone }}</a></li>
                                <li><i class="fas fa-envelope"></i> <a href="mailto:{{ $config->email }}">{{ $config->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <div class="shape1"></div>
                            <ul>
                                <li><i class="fas fa-clock"></i> <b>Thứ 2 tới Thứ 7:</b> 10:00 sáng - 22:00 tối</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('web.home') }}"><img src="{{ asset($config->logo) }}" ></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="{{ route('web.home') }}">TRANG CHỦ</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">LOẠI MÓN ĂN</a>
                                        <ul class="sub-menu">
                                            @foreach ($listMenuCategory as $category)
                                                <li><a href="{{ route('web.category.view', $category->slug) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.food.list') }}">MÓN ĂN</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.news.list') }}">TIN TỨC</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.contact.index') }}">LIÊN HỆ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <div class="header-button">
                                <a style="color: #1f1f1f;" href="{{ route('web.customer.index') }}" class="simple-icon d-none d-xl-block color-dark"><i class="fal fa-user"></i></a>
                                @if (auth()->check())
                                    <a style="color: #1f1f1f;" href="{{ route('web.wishlist.index') }}" class="simple-icon">
                                        <i class="fal fa-heart"></i>
                                    </a>
                                    <a style="color: #1f1f1f;" href="{{ route('web.customer.logout') }}" class="simple-icon d-none d-xl-block color-dark"><i class="fal fa-arrow-right-from-bracket"></i></a>
                                @endif
                                <a href="{{ route('web.order.index') }}" class="th-btn style4 d-none d-xl-block">Đặt Bàn</a>
                                <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="smooth-wrapper">
        <div id="smooth-content">

            @yield('content')

            <footer class="footer-wrapper footer-layout1" data-bg-src="assets/img/bg/footer_bg_1.jpg">
                <div class="widget-area" style="background: #1f1f1f;">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget footer-widget">
                                    <h3 class="widget_title">Liên Hệ</h3>
                                    <div class="th-widget-contact">
                                        <div class="info-box">
                                            <h4 class="box-title">Địa Chỉ</h4>
                                            <div class="box-content">
                                                <div class="box-icon">
                                                    <i class="fas fa-location-dot"></i>
                                                </div>
                                                <p class="box-text">{{ $config->address }}</p>
                                            </div>
                                        </div>
                                        <div class="info-box">
                                            <h4 class="box-title">Số Điện Thoại</h4>
                                            <div class="box-content">
                                                <div class="box-icon">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                <p class="box-text"><a href="tel:{{ $config->phone }}">{{ $config->phone }}</a></p>
                                            </div>
                                        </div>
                                        <div class="info-box">
                                            <h4 class="box-title">Địa Chỉ Email</h4>
                                            <div class="box-content">
                                                <div class="box-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <p class="box-text"><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget widget_nav_menu footer-widget">
                                    <h3 class="widget_title">Thông Tin</h3>
                                    <div class="menu-all-pages-container">
                                        <ul class="menu">
                                            <li><a href="#">Đầu Bếp</a></li>
                                            <li><a href="#">Về Chúng Tôi</a></li>
                                            <li><a href="#">Điều Khoản</a></li>
                                            <li><a href="#">Dịch Vụ</a></li>
                                            <li><a href="#">Tin Tức</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget widget_nav_menu footer-widget">
                                    <h3 class="widget_title">Khách Hàng</h3>
                                    <div class="menu-all-pages-container">
                                        <ul class="menu">
                                            <li><a href="{{ route('web.order.index') }}">Đặt Bàn</a></li>
                                            <li><a href="{{ route('web.customer.login') }}">Đăng Nhập</a></li>
                                            <li><a href="{{ route('web.customer.register') }}">Đăng Ký</a></li>
                                            <li><a href="{{ route('web.contact.index') }}">Liên Hệ</a></li>
                                            <li><a href="{{ route('web.wishlist.index') }}">Yêu Thích</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget footer-widget">
                                    <h3 class="widget_title">Đăng Ký Nhận Tin</h3>
                                    <div class="newsletter-widget">
                                        <p class="footer-text">Đăng ký với hệ thống để nhận các thông tin khuyến mãi.</p>
                                        <form action="#" class="newsletter-form has-icon">
                                            <div class="form-group">
                                                <input class="form-control" type="email" placeholder="Địa chỉ email" required="">
                                            </div>
                                            <button type="submit" class="icon-btn"><i class="fa-solid fa-paper-plane"></i></button>
                                        </form>
                                        <div class="th-social">
                                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-wrap">
                    <div class="container">
                        <div class="row gx-1 gy-2 align-items-center">
                            <div class="col-md-7">
                                <p class="copyright-text">Bản quyền thuộc <i class="fal fa-copyright"></i> <a href="{{ route('web.home') }}">{{ $config->title }}</a> 2024 - 2025</p>
                            </div>
                            <div class="col-md-5 text-center text-md-end">
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="#">Hoạt Động</a></li>
                                        <li><a href="#">Hình Ảnh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>


    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <!-- Swiper Js -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Date Time -->
    <script src="{{ asset('assets/js/jquery.datetimepicker.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>

    <!-- Gsap Animation -->
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollSmoother.min.js') }}"></script>
    <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade-out');
                    setTimeout(function() {
                        alert.remove();
                    }, 500); // Transition duration should match CSS transition time
                });
            }, 1500); // 5000 milliseconds = 5 seconds
        });
    </script>
    @yield('script')
</body>

</html>