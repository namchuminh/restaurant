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
                    <li class="breadcrumb-item active">Tạo Hóa Đơn</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{ route('admin.order.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ten" placeholder="Tên khách hàng"
                                    name="fullname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Số Điện Thoại</label>
                                <input type="text" class="form-control" id="phone" placeholder="Số điện thoại"
                                    name="phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Số Người / 1 Bàn</label>
                                <input type="number" class="form-control" id="phone" placeholder="Số lượng khách ăn / 1 bàn"
                                    name="people">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">Chọn Bàn Ăn</label>
                                <select name="table_id" class="form-control">
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->name }} - {{ $table->address }} - {{ $table->quantity }} người</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success" href="{{ route('admin.order.index') }}">Quay Lại</a>
                    <button class="btn btn-primary">Tạo Hóa Đơn</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



@endsection