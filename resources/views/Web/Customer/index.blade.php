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
                <a class="nav-link active" id="v-pills-history-tab" data-bs-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="true">Lịch Sử Đặt Bàn</a>
                <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Thông Tin Cá Nhân</a>
                <a href="{{ route('web.customer.logout') }}" class="nav-link">Đăng Xuất</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                    <h3>Lịch Sử Đặt Bàn</h3>
                    <table class="table table-bordered custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã Đặt Bàn</th>
                                <th>Đặt Bàn</th>
                                <th>Ngày Đặt</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->code }}</td>
                                    <td>
                                        @php
                                            $selectedTable = $tables->firstWhere('id', $order->table->id);
                                            $otherTables = $tables->filter(fn($table) => $table->id !== $order->table->id);
                                        @endphp

                                        @if($order->status == 1)
                                            <select name="table_id" class="form-control" id="tableSelect">
                                                @if ($selectedTable)
                                                    <option value="{{ $selectedTable->id }}" selected>
                                                        {{ $selectedTable->name }} - {{ $selectedTable->address }} - {{ $selectedTable->quantity }} người
                                                    </option>
                                                @endif
                                                @foreach ($otherTables as $table)
                                                    <option value="{{ $table->id }}">
                                                        {{ $table->name }} - {{ $table->address }} - {{ $table->quantity }} người
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select name="table_id" class="form-control" disabled>
                                                @if ($selectedTable)
                                                    <option value="{{ $selectedTable->id }}" selected>
                                                        {{ $selectedTable->name }} - {{ $selectedTable->address }} - {{ $selectedTable->quantity }} người
                                                    </option>
                                                @endif
                                            </select>
                                        @endif
                                    </td>
                                    <td>{{ $order->time_order }}</td>
                                    <td>
                                        <i>
                                            @if($order->status == 1)
                                                Đang Chờ Xử Lý
                                            @elseif($order->status == 2)
                                                Đã Kết Thúc
                                            @else
                                                <b class="text-danger">Đã Hủy Bàn</b>
                                            @endif
                                        </i>
                                    </td>
                                    <td class="d-flex">
                                        @if($order->status == 1)
                                            <form style="margin-right: 10px;" action="{{ route('web.order.update', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="tableId" id="tableHidden" value="{{ $order->table->id }}">
                                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                            </form>
                                 
                                            <form action="{{ route('web.order.cancel', $order->id) }}" method="POST" id="cancelOrderForm">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" class="btn btn-danger" onclick="confirmCancel()">Hủy Đặt</button>
                                            </form>
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
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
@section('script')
<script>
    function confirmCancel() {
        // Hiển thị hộp thoại xác nhận
        const userConfirmed = confirm("Bạn có chắc chắn muốn hủy đơn đặt này không?");
        
        // Nếu người dùng bấm "OK", gửi form
        if (userConfirmed) {
            document.getElementById('cancelOrderForm').submit();
        }
        
        // Nếu bấm "Cancel", không làm gì
    }
</script>
<script>
    // Lắng nghe sự kiện thay đổi trên select
    document.getElementById('tableSelect').addEventListener('change', function () {
        // Gán giá trị mới cho input hidden
        document.getElementById('tableHidden').value = this.value;
    });
</script>
@endsection
