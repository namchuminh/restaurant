@extends('Web.layouts.app')
@section('title', 'Danh sách món ăn')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Danh Sách Món</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Món Ăn</li>
            </ul>
        </div>
    </div>
</div>
<section class="space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title3"><img src="https://html.themeholy.com/restar/demo/assets/img/theme-img/title_icon2.svg" alt="Icon">DANH SÁCH MÓN ĂN</span>
            <h2 class="sec-title title-ani">TẤT CẢ MÓN ĂN</h2>
        </div>
        <div class="tab-menu1 filter-menu-active">
            <button data-filter="*" class="th-btn style-border btn-sm active" type="button">Tất Cả Món</button>
            @foreach ($categories as $category)
                <button data-filter=".cat{{ $category->id }}" class="th-btn style-border btn-sm" type="button">{{ $category->name }}</button>
            @endforeach
        </div>
        <div class="row gy-30 filter-active">
            @foreach ($foods as $food)
                <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat{{ $food->category_id }}">
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
        <div class="mt-5 text-center">
            <div class="btn-group justify-content-center">
                <a href="reservation.html" class="th-btn style-border">ĐẶT BÀN NGAY</a>
            </div>
        </div>
    </div>
</section>
<div class="bg-smoke2">
    <div class="shape-mockup jump d-none d-xl-block" data-top="0" data-right="0"><img src="https://html.themeholy.com/restar/demo/assets/img/shape/tomato_1.png" alt="shape"></div>
    <div class="shape-mockup moving d-none d-xl-block" data-bottom="0" data-right="0"><img src="https://html.themeholy.com/restar/demo/assets/img/shape/red_cilli.png" alt="shape"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7">
                <div class="reserve-img1">
                    <img src="https://html.themeholy.com/restar/demo/assets/img/normal/booking_1.jpg" alt="Booking">
                </div>
            </div>
            <div class="col-xl-5 text-center text-xl-start">
                <div class="ps-xxl-5 pt-40 pb-40 mb-40 mb-xl-0">
                    <div class="title-area mb-30">
                        <span class="sub-title4">Bạn cần đặt bàn?</span>
                        <h2 class="sec-title">Để Lại Thông Tin Đặt Bàn Dưới Đây!</h2>
                    </div>
                    <form action="mail.php" method="POST" class="reservation-form3 input-white">
                        <div class="row">
                            <div class="form-group col-12">
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="date-time-pick form-control" name="date-time" id="date-time-pick" placeholder="Date & Time">
                                <i class="fal fa-calendar-alt"></i>
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="form-control" name="people" id="people" placeholder="Total Person">
                                <i class="fal fa-user-group"></i>
                            </div>
                        </div>
                        <button class="th-btn">Reservation Now</button>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space">
    <div class="container brand-container">
        <div class="swiper th-slider" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1300":{"slidesPerView":"5"},"1500":{"slidesPerView":"7"}}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_1.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_2.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_3.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_4.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_5.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_6.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_7.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_1.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_2.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_3.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_4.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_5.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_6.svg" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box">
                        <img src="https://html.themeholy.com/restar/demo/assets/img/brand/brand_1_7.svg" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection