@extends('Admin.layouts.app')
@section('title', 'Danh sách hóa đơn')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Hóa Đơn</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Hóa Đơn</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mã Hóa Đơn</th>
                                    <th>Khách Hàng</th>
                                    <th>Bàn Ăn</th>
                                    <th>Khách Đặt Hẹn</th>
                                    <th>Tổng Tiền</th>
                                    <th>Thanh Toán</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>
                                            {{ $order->code }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.customer.block', $order->user->id) }}">{{ $order->user->name }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.table.edit', $order->table->id) }}">{{ $order->table->name }}</a>
                                        </td>
                                        <td>
                                            {{ $order->time_order }}
                                        </td>
                                        <td>
                                            @php
                                                echo number_format($order->amount);
                                            @endphp
                                            VND
                                        </td>
                                        <td>
                                            @if ($order->payment == 0)
                                                Chưa Thanh Toán
                                            @else 
                                                Đã Thanh Toán
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                                Chuẩn Bị Bàn 
                                            @elseif ($order->status == 0)
                                                Hủy Đặt Bàn
                                            @elseif ($order->status == 2)
                                                Đã Kết Thúc
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('admin.order.view', $order->code) }}">XỬ LÝ HÓA ĐƠN</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            @for ($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ route('admin.order.index', ['page' => $i]) }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection