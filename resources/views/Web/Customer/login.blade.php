@extends('Web.layouts.app')
@section('title', 'Đăng nhập')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Đăng Nhập</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Đăng Nhập</li>
            </ul>
        </div>
    </div>
</div>
<section class="space">
    <div class="container">
        <form method="POST" class="team-form input-white">
            @csrf
            <h2 class="form-title title-ani2">Đăng Nhập</h2>
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="form-text text-ani">{{ $error }}</p>
                @endforeach
            @elseif(session('success'))
                <p class="form-text text-ani">{{ session('success') }}</p>
            @else
                <p class="form-text text-ani">Truy cập hệ thống cùng chúng tôi</p>
            @endif
            <div class="row">
                <div class="form-group col-12 mb-4">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Số điện thoại hoặc email" required>
                    <i class="fal fa-user-group"></i>
                </div>
                <div class="form-group col-12 mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                    <i class="fal fa-lock"></i>
                </div>
            </div>
            <button class="th-btn w-100">Đăng Nhập</button>
            <p class="mt-4">Chưa có tài khoản? <a href="{{ route('web.customer.register') }}">Đăng Ký Ngay</a></p>
        </form>
    </div>
</section>
@endsection