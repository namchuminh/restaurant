<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $config->title }}</title>
    <meta name="author" content="{{ $config->email }}">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->title }}">
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
                <a href="{{ route('web.home') }}"><img src="{{ asset($config->logo) }}" ></a>
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
            </div>
        </div>
    </div><!--==============================
	Header Area
==============================-->
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
                                <li><i class="fas fa-clock"></i> <b>Thứ 2 tới Thứ 7:</b> 9:00 sáng - 22:00 tối</li>
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
        <div id="smooth-content"><!--==============================
Hero Area
==============================-->
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="hero-shape1">
                    <img src="https://html.themeholy.com/restar/demo/assets/img/hero/hero_shape_2_1.png" alt="shape">
                </div>
                <div class="hero-shape2">
                    <img src="https://html.themeholy.com/restar/demo/assets/img/hero/hero_shape_2_2.png" alt="shape">
                </div>
                <div class="hero-shape3">
                    <img src="https://html.themeholy.com/restar/demo/assets/img/hero/hero_shape_2_3.png" alt="shape">
                </div>
                <div class="hero-inner">
                    <div class="container th-container">
                        <div class="hero-style2">
                            <div class="title-ani">
                                <span class="hero-subtitle text-center">Ẩm thực & Khám phá!</span>
                            </div>
                            <h1 class="hero-title2">Đơn Giản</h1>
                            <h2 class="hero-title3">Đa Sắc</h2>
                            <div class="title-ani2">
                                <a href="{{ route('web.order.index') }}" class="th-btn style3">ĐẶT BÀN</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-img">
                    <img src="https://html.themeholy.com/restar/demo/assets/img/hero/hero_2_1.png" alt="Hero Image">
                </div>
            </div>
            <!--======== / Hero Section ========-->
            <!--==============================
Contact Area   
==============================-->
            <div class="py-5 bg-smoke2">
                <div class="container py-2 my-4">
                    <form action="{{ route('web.order.order') }}" method="POST" class="reservation-form2 input-white">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-3 col-sm-6">
                                <input type="text" class="date-pick form-control" name="date" id="date-pick" placeholder="Ngày" value="{{ old('date') }}">
                                <i class="fal fa-calendar-alt"></i>
                                @error('date')
                                    <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-sm-6">
                                <input type="text" class="time-pick form-control" name="time" id="time-pick" placeholder="Giờ" value="{{ old('time') }}">
                                <i class="fal fa-clock"></i>
                                @error('time')
                                    <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-sm-6">
                                <input type="text" class="form-control" name="people" id="people" placeholder="Số người" value="{{ old('people') }}">
                                <i class="fal fa-user-group"></i>
                                @error('people')
                                    <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-sm-6">
                                <select name="table_id" id="" class="form-control">
                                    <option value="" hidden>Chọn bàn</option>
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->name }} - {{ $table->address }} - {{ $table->quantity }} người</option>
                                    @endforeach
                                </select>
                                @error('table_id')
                                    <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-btn col-lg-12 col-sm-6">
                                @if(auth()->check())
                                    <button class="th-btn w-100">ĐẶT BÀN</button>
                                @else
                                    <a href="{{ route('web.customer.login') }}" class="th-btn w-100">ĐĂNG NHẬP & ĐẶT BÀN</a>
                                @endif
                                
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
            <!--==============================
Menu Area  
==============================-->
            <section class="space">
                <div class="container">
                    <div class="title-area text-center">
                        <span class="sub-title2">MENU MÓN</span>
                        <h2 class="sec-title">DANH SÁCH MÓN ĂN</h2>
                    </div>
                    <div class="text-ani">
                        <div class="nav tab-menu1" role="tablist">
                            <button class="th-btn style-border btn-sm active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">Tất Cả Món</button>
                            @foreach ($categories as $category)
                                <button class="th-btn style-border btn-sm" data-bs-toggle="tab" data-bs-target="#nav-{{ $category->id }}" type="button" role="tab" aria-selected="false">{{ $category->name }}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-content">
                        <!-- Single item -->
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="slider-area">
                                <div class="swiper th-slider blogSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                                    <div class="swiper-wrapper">
                                        @foreach ($foods as $food)
                                            <div class="swiper-slide">
                                                <div class="menu-card">
                                                    <div class="box-shape"></div>
                                                    <h3 class="box-title"><a href="{{ route('web.food.view', $food->slug) }}">{{ $food->name }}</a></h3>
                                                    <div class="box-img">
                                                        <img style="height: 241px;" src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}">
                                                    </div>
                                                    <p class="box-text">
                                                        Số lượng còn: {{ $food->quantity }}
                                                    </p>
                                                    <h4 class="box-price">
                                                        @php
                                                            if ($food->price >= 1000) {
                                                                echo number_format($food->price / 1000, 0) . 'K';
                                                            } else {
                                                                echo $food->price;
                                                            }
                                                        @endphp
                                                    </h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button data-slider-prev=".blogSlider1" class="slider-arrow slider-prev"><span class="icon"></span></button>
                                <button data-slider-next=".blogSlider1" class="slider-arrow slider-next"><span class="icon"></span></button>
                            </div>
                        </div>
                        @foreach ($categories as $category)
                            <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel">
                                <div class="slider-area">
                                    <div class="swiper th-slider blogSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                                        <div class="swiper-wrapper">
                                            @foreach ($category->foods as $food)
                                                <div class="swiper-slide">
                                                    <div class="menu-card">
                                                        <div class="box-shape"></div>
                                                        <h3 class="box-title"><a href="{{ route('web.food.view', $food->slug) }}">{{ $food->name }}</a></h3>
                                                        <div class="box-img">
                                                            <img style="height: 241px;" src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}">
                                                        </div>
                                                        <p class="box-text">
                                                            Số lượng còn: {{ $food->quantity }}
                                                        </p>
                                                        <h4 class="box-price">
                                                            @php
                                                                if ($food->price >= 1000) {
                                                                    echo number_format($food->price / 1000, 0) . 'K';
                                                                } else {
                                                                    echo $food->price;
                                                                }
                                                            @endphp
                                                        </h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button data-slider-prev=".blogSlider1" class="slider-arrow slider-prev"><span class="icon"></span></button>
                                    <button data-slider-next=".blogSlider1" class="slider-arrow slider-next"><span class="icon"></span></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-5 pt-xl-2 text-center">
                        <div class="text-ani">
                            <a href="{{ route('web.food.list') }}" class="th-btn style-border">Xem Tất Cả</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="overflow-hidden bg-smoke" id="about-sec">
                <div class="shape-mockup moving" data-top="10%" data-right="4%"><img src="assets/img/shape/garlic_3.png" alt="shape"></div>
                <div class="shape-mockup spin d-none d-lg-block" data-bottom="5%" data-right="3%"><img src="assets/img/shape/flower_5.png" alt="shape"></div>
                <div class="container">
                    <div class="row gx-0">
                        <div class="col-xl-6">
                            <div class="img-box4">
                                <img src="assets/img/normal/about_2_1.jpg" data-speed="auto" alt="Image">
                            </div>
                        </div>
                        <div class="col-xl-6 text-center text-xl-start space align-self-center">
                            <div class="about-space1">
                                <div class="title-area pe-xl-4 mb-35">
                                    <span class="sub-title2">About Us Restaurant</span>
                                    <h2 class="sec-title">The Artistry Behind the Menu</h2>
                                    <div class="text-ani">
                                        <p class="sec-text">From crispy and golden fries to mouthwatering burgers and wraps, our menu offers a variety of fast-food favorites. Each item is crafted with quality ingredients to ensure a tasty experience with every order.</p>
                                        <p class="sec-text">Elevate your dining experience with our extensive selection of fine wines and expertly crafted cocktails.</p>
                                    </div>

                                </div>
                                <div class="text-ani">
                                    <a href="about.html" class="th-btn style-border smoke-bg">More About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--==============================
Brand Area  
==============================-->
            <div class="space">
                <div class="container">
                    <div class="swiper th-slider" id="brandSlider1" data-slider-options='{"spaceBetween":45,"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1300":{"slidesPerView":"5"},"1500":{"slidesPerView":"5"}}}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_1.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_2.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_3.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_4.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_5.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_1.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_2.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_3.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_4.svg" alt="Brand Logo">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-box style2">
                                    <img src="assets/img/brand/brand_2_5.svg" alt="Brand Logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--==============================
Menu Area  
==============================-->
            <section class="overflow bg-fixed " data-bg-src="assets/img/bg/menu_bg_2.jpg" data-overlay="theme" data-opacity="6">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col-xl-9">
                            <div class="slider-area menu-list-slider space" data-bg-src="assets/img/bg/square_pattern2.jpg">
                                <div class="title-area text-center">
                                    <span class="sub-title2">Menu Card</span>
                                    <h2 class="sec-title title-ani text-white">Our Restaurant Foods Menu</h2>
                                </div>
                                <div class="swiper th-slider" id="menuSlider3" data-slider-options='{}'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="menu-list-area">
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_1.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Grilled Salmon with Dil Sauce</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$40</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_2.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Roast Beef with Vegetable</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$50</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_3.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Marrakesh Vegetarian Curry</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$30</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_4.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Spicy Vegan Potato Curry</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$20</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_5.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Apple Pie with Cream</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$45</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_6.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">French Onion Soup</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$32</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="menu-list-area">
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_7.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">French Onion Soup</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$40</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_8.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Roast Beef with Vegetable</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$50</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_9.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Italian Vegetarian Pizza</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$30</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_10.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Fried Rice Set Menu</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$20</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_11.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">Beef Fried and Kabab</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$45</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-list">
                                                    <div class="box-img">
                                                        <img src="assets/img/product/menu_thumb_6.png" alt="Food">
                                                        <div class="actions">
                                                            <a href="cart.html" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h3 class="box-title"><a href="shop-details.html">French Onion Soup</a></h3>
                                                        <div class="box-content">
                                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                                            <div class="box-line"></div>
                                                            <h4 class="box-price">$32</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button data-slider-prev="#menuSlider3" class="slider-arrow slider-prev"><span class="icon"></span></button>
                                <button data-slider-next="#menuSlider3" class="slider-arrow slider-next"><span class="icon"></span></button>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!--==============================
Schedule Area  
==============================-->
            <div class="overflow-hidden space">
                <div class="container">
                    <div class="schedule-sec2" data-bg-src="https://html.themeholy.com/restar/demo/assets/img/bg/square_pattern3.png">
                        <h2 class="sec-title title-ani2"><span>MỞ</span> <span>CỬA</span></h2>
                        <div class="schedule-img">
                            <img class="flipY" src="https://html.themeholy.com/restar/demo/assets/img/normal/schedule_2.png" alt="Chef">
                        </div>
                        <div class="schedule-box">
                            <div class="schedule-list-wrap">
                                <div class="schedule-list flipX">
                                    <h3 class="box-title">Monday to Tuesday</h3>
                                    <h4 class="box-time">10:00 AM</h4>
                                    <h4 class="box-time">20:00 PM</h4>
                                    <a href="tel:{{ $config->phone }}" class="th-btn style-border border-two">{{ $config->phone }}</a>
                                </div>
                                <div class="schedule-list flipX">
                                    <h3 class="box-title">Friday to Sunday</h3>
                                    <h4 class="box-time">12:00 PM</h4>
                                    <h4 class="box-time">23:00 PM</h4>
                                    <a href="mailto:{{ $config->email }}" class="th-btn style-border border-two">{{ $config->email }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--==============================
Blog Area  
==============================-->
            <section class="space" id="blog-sec" style="padding-top: 0px;">
                <div class="container">
                    <div class="title-area text-center">
                        <span class="sub-title2">Tin Tức & Thông Báo</span>
                        <h2 class="sec-title title-ani">Danh Sách Tin Mới Cập Nhật</h2>
                    </div>
                    <div class="slider-area">
                        <div class="swiper th-slider has-shadow" id="blogSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                            <div class="swiper-wrapper">
                                @foreach ($news as $item)
                                    <div class="swiper-slide">
                                        <div class="blog-card">
                                            <div class="blog-img">
                                                <img src="{{ asset('storage/' . $item->image) }}" style="height: 300px;" alt="blog image">
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-meta">
                                                    <a href="blog.html">{{ $item->created_at }}</a>
                                                    <a href="blog.html">{{ $item->category->name }}</a>
                                                </div>
                                                <h3 class="box-title"><a href="blog-details.html">{{ $item->name }}</a></h3>
                                                <a href="blog-details.html" class="th-btn btn-sm style-border">Đọc Thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev"><span class="icon"></span></button>
                        <button data-slider-next="#blogSlider1" class="slider-arrow slider-next"><span class="icon"></span></button>
                    </div>
                </div>
            </section>

            <!--==============================
	Footer Area
==============================-->
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

            <!--********************************
			Code End  Here 
	******************************** -->

            <!-- Smooth scroller -->
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
</body>

</html>