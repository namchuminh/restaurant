@extends('Web.layouts.app')
@section('title', 'Khách hàng')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Khách Hàng</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Khách Hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5" style="min-height: 500px;">
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Thông Tin Cá Nhân</a>
                <a class="nav-link " id="v-pills-history-tab" data-bs-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="true">Lịch Sử Đặt Bàn</a>
                <a href="{{ route('web.customer.logout') }}" class="nav-link">Đăng Xuất</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h3>Thông Tin Cá Nhân</h3>
                    <form method="POST" action="{{ route('web.customer.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ Tên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nhập mật khẩu mới">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="th-btn w-100">Cập Nhật Thông Tin</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                    <h3>Lịch Sử Đặt Bàn</h3>
                    <table class="table table-bordered custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã Đặt Bàn</th>
                                <th>Đặt Bàn</th>
                                <th>Ngày Đặt</th>
                                <th>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ $order->table->name }}</td>
                                    <td>{{ $order->time_order }}</td>
                                    <td>
                                        @if($order->status == 1)
                                            Đang Chờ
                                        @elseif($order->status == 2)
                                            Đã Kết Thúc
                                        @else
                                            Đã Hủy Bàn
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($orders) <= 0)
                        <p class="text-center">Chưa có lịch sử đặt bàn!</p>
                    @else
                        <div class="pagination-wrapper">
                            <ul class="pagination">
                                <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}"><a class="page-link" href="{{ $orders->previousPageUrl() }}">Trước</a></li>
                                @for ($i = 1; $i <= $lastPage; $i++)
                                    <li class="page-item {{ $currentPage == $i ? 'active' : '' }}"><a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}"><a class="page-link" href="{{ $orders->nextPageUrl() }}">Tiếp</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #fa8507;
        border-bottom: 2px solid #dee2e6;
        border-radius: unset;
    }

    .nav-pills .nav-link, .nav-pills .show>.nav-link {
        color: black;
        padding: 18px;
        border-bottom: 2px solid #dee2e6;
    }

    #v-pills-tab{
        border: 2px solid #dee2e6;
        border-radius: 5px;
    }

    .custom-table th,
    .custom-table td {
        padding: 15px;
        font-size: 16px;
    }

    .custom-table th {
        background-color: #f8f9fa; /* Màu nền cho header */
        font-weight: bold;
    }

    .custom-table td {
        vertical-align: middle; /* Canh giữa theo chiều dọc */
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination-wrapper .pagination li {
        margin: 0 5px;
    }

    .pagination-wrapper .pagination li a,
    .pagination-wrapper .pagination li span {
        color: #fa8507;
        border: 1px solid #ddd;
        padding: 8px 12px;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-weight: 500;
    }

    .page-item.active .page-link{
        background-color: #fa8507;
        border: 1px solid #fa8507;
    }
    
</style>
@endsection
