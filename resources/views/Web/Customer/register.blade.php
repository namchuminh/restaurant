@extends('Web.layouts.app')
@section('title', 'Đăng ký')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Đăng Ký</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Đăng Ký</li>
            </ul>
        </div>
    </div>
</div>
<section class="space">
    <div class="container">
        <form method="POST" class="team-form input-white">
            @csrf
            <h2 class="form-title title-ani2">Đăng Ký</h2>
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="form-text text-ani">{{ $error }}</p>
                @endforeach
            @else
                <p class="form-text text-ani">Tạo tài khoản để truy cập hệ thống</p>
            @endif
            <div class="row">
                <div class="form-group col-12 mb-4">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Tên" required>
                    <i class="fal fa-user"></i>
                </div>
                <div class="form-group col-12 mb-4">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <i class="fal fa-envelope"></i>
                </div>
                <div class="form-group col-12 mb-4">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" required>
                    <i class="fal fa-phone"></i>
                </div>
                <div class="form-group col-12 mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                    <i class="fal fa-lock"></i>
                </div>
                <div class="form-group col-12 mb-4">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                    <i class="fal fa-lock"></i>
                </div>
            </div>
            <button class="th-btn w-100">Đăng Ký</button>
            <p class="mt-4">Đã có tài khoản? <a href="{{ route('web.customer.login') }}">Đăng Nhập</a></p>
        </form>
    </div>
</section>
@endsection