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
            <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Quản Lý Hóa Đơn</a></li>
            <li class="breadcrumb-item active">Hóa Đơn {{ $order->code }}</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="card">
            <h4 class="text-center mt-3">Thông Tin Hóa Đơn</h4>
            <div style="line-height: 20px;word-spacing: 2px;" class="m-3 detail-order">
                <span style="display: flex;">
                    <b>Mã Hóa Đơn: </b>
                    <p style="margin-left: 10px;">{{ $order->code }}</p>
                </span>
                <span style="display: flex;">
                    <b>Bàn Ăn: </b>
                    <p style="margin-left: 10px;">{{ $order->table->name }}</p>
                </span>
                <span style="display: flex;">
                    <b>Người Đặt Bàn: </b>
                    <p style="margin-left: 10px;">
                        @if ($order->user_id == 0)
                            {{ $order->fullname }} ({{ $order->phone }})
                        @else
                            {{ $order->user->name }}
                        @endif
                    </p>
                </span>
                <span style="display: flex;">
                    <b>Tổng Số Người: </b>
                    <p style="margin-left: 10px;">{{ $order->people }} người<i></i></p>
                </span>
                <span style="display: flex;">
                    <b>Khách Đặt Hẹn: </b>
                    <p style="margin-left: 10px;">{{ $order->time_order }}</p>
                </span>
                <span style="display: flex;">
                    <b>Thanh Toán: </b>
                    <p style="margin-left: 10px;">
                        @if ($order->payment == 0)
                            Chưa Thanh Toán
                        @else
                            Đã Thanh Toán
                        @endif
                    </p>
                </span>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th class="not_print">Hình Ảnh</th>
                    <th>Tên Món Ăn</th>
                    <th>Giá Bán</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    @if ($order->payment == 0)
                        <th class="not_print">Hành Động</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($detailOrders as $key => $detailOrder)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="not_print">
                                <img style="width: 100px; height: 100px;" src="{{ asset('storage/'. $detailOrder->food->image) }}">
                            </td>
                            <td>
                                {{ $detailOrder->food->name }}
                            </td>
                            <td>
                                {{ number_format($detailOrder->food->price) }}đ
                            </td>
                            <td>
                                {{ $detailOrder->quantity }}
                            </td>
                            <td>
                                {{ number_format($detailOrder->quantity * $detailOrder->food->price) }}đ
                            </td> 
                            @if ($order->payment == 0)
                                <td class="not_print">
                                    <a class="btn btn-danger" href="{{ route('admin.order.deletefood', [$detailOrder->id]) }}"><i class="fa-solid fa-trash"></i> Xóa</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right mt-2 d-flex justify-content-end mr-4">
                <span class="d-flex m-1">
                    <b>Tổng Tiền: </b>
                    <p style="margin-left: 5px;">
                        @php
                            echo number_format($order->amount);
                        @endphp
                        VND
                    </p>
                </span>
            </div>
            </div>
            <div class="card-footer clearfix" style="background: white;">
                <a class="btn btn-success not_print" href="{{ route('admin.order.index') }}">Quay Lại</a>
                @if ($order->amount != 0)
                    <button class="btn btn-primary not_print" onclick="window.print()">In Hóa Đơn</button>
                @endif
                @if ($order->payment == 0)
                    @if (($order->amount == 0) && ($order->status != 0) && ($order->status != 2))
                        <a class="btn btn-danger not_print" href="{{ route('admin.order.payment', $order->code) }}"  style="color: white;">Hủy Đặt Bàn</a>
                    @elseif (($order->amount != 0) && ($order->status == 1))
                        <a class="btn btn-warning not_print" href="{{ route('admin.order.payment', $order->code) }}"  style="color: white;">Xác Nhận Thanh Toán</a>
                    @endif
                @endif
                @if (($order->payment == 0) && ($order->status != 0) && ($order->status != 2))
                    <a class="btn btn-success not_print" href="{{ route('admin.order.addfood', $order->code) }}"  style="color: white;">Thêm Món Ăn</a>
                @endif
            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('css')
<style type="text/css">
  @media print{
    .main-footer{
      display: none !important;
    }

    .content-wrapper{
      background-color: white;
    }

    .not_print{
      display: none !important;
    }

  }
</style>
@endsection