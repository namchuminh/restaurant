@extends('Web.layouts.app')
@section('title', 'Liên hệ')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Liên Hệ</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Liên Hệ</li>
            </ul>
        </div>
    </div>
</div>
<div class="space">
    <div class="container">
        <div class="row gx-0 gy-40">
            <div class="col-xl-5">
                <div class="contact-feature-area">
                    <div class="title-area mb-32">
                        <h2 class="sec-title title-ani2">Thông Tin Liên Hệ</h2>
                        <div class="text-ani">
                            <p class="sec-text">Gửi thông tin liên hệ của bạn dưới đấy cho chúng tôi biết bạn đang cần hỗ trợ vấn đề gì!</p>
                        </div>
                    </div>
                    <div class="contact-feature-wrap">
                        <div class="contact-feature">
                            <div class="box-icon">
                                <i class="fal fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="box-title text-ani">Địa Chỉ</h3>
                                <p class="box-text text-ani">{{ $config->address }}</p>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="box-icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="box-title text-ani">Địa Chỉ Email</h3>
                                <p class="box-text text-ani">
                                    <a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="box-icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="box-title text-ani">Số Điện Thoại</h3>
                                <p class="box-text text-ani">
                                    <a href="tel:{{ $config->phone }}">{{ $config->phone }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="th-social text-ani">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <form action="{{ route('web.news.contact') }}" method="POST" class="contact-form">
                    @csrf
                    @if($errors->any())
                        <h2 class="sec-title title-ani2" style="margin-bottom: 0;">Gửi Liên Hệ</h2>
                        @foreach ($errors->all() as $error)
                            <p class="d-flex mt-2" style="text-align: center; justify-content: center;">{{ $error }}</p>
                        @endforeach
                    @elseif(session('success'))
                        <h2 class="sec-title title-ani2" style="margin-bottom: 0;">Gửi Liên Hệ</h2>
                        <p class="d-flex mt-2" style="text-align: center; justify-content: center;">{{ session('success') }}</p>
                    @else
                        <h2 class="sec-title title-ani2">Gửi Liên Hệ</h2>
                    @endif
                    <div class="row">
                        <div class="form-group col-sm-6">
                            @if (auth()->check())
                                <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" value="{{ auth()->user()->name }}" disabled>
                                <i class="fal fa-user"></i>
                            @else
                                <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên">
                                <i class="fal fa-user"></i>
                            @endif
                        </div>
                        <div class="form-group col-sm-6">
                            @if (auth()->check())
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ auth()->user()->email }}" disabled>
                                <i class="fal fa-envelope"></i>
                            @else
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                <i class="fal fa-envelope"></i>
                            @endif
                            
                        </div>
                        <div class="form-group col-12">
                            @if (auth()->check())
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Số điện thoại" value="{{ auth()->user()->phone }}" disabled>
                                <i class="fal fa-phone"></i>
                            @else
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Số điện thoại">
                                <i class="fal fa-phone"></i>
                            @endif
                        </div>
                        <div class="form-group col-12">
                            <select name="type" id="subject" class="form-select">
                                <option value="" disabled selected hidden>Kiểu Liên Hệ</option>
                                <option value="1">Liên Hệ Đánh Giá</option>
                                <option value="2">Liên Hệ Hỗ Trợ</option>
                                <option value="3">Liên Hệ Đặt Bàn</option>
                            </select>
                            <i class="fal fa-chevron-down"></i>
                        </div>
                        <div class="form-group col-12">
                            <textarea name="content" id="message" cols="30" rows="3" class="form-control" placeholder="Nội dung liên hệ ..."></textarea>
                            <i class="fal fa-pencil"></i>
                        </div>
                        <div class="form-btn col-12">
                            <button class="th-btn w-100">Gửi Liên Hệ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection