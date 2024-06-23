@extends('Admin.layouts.app')
@section('title', 'Hoạt động khách hàng')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Khách Hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Quản Lý Khách Hàng</a></li>
                    <li class="breadcrumb-item active">Hoạt Động Khách Hàng</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{ route('admin.customer.block', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Tên Khách Hàng</label>
                                <input type="text" class="form-control"
                                    name="name" value="{{ $user->name }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Email</label>
                                <input type="text" class="form-control"
                                    name="email" value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Email</label>
                                <input type="text" class="form-control"
                                    name="phone" value="{{ $user->phone }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Trạng Thái</label>
                                <input type="text" class="form-control"
                                    name="status" value="{{ $user->status == 0 ? "Đang Bị Cấm" : "Đang Hoạt Động" }}" disabled>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success" href="{{ route('admin.customer.index') }}">Quay Lại</a>
                    @if ($user->status == 1)
                        <button class="btn btn-danger">Cấm Khách Hàng</button>
                    @else
                        <button class="btn btn-primary">Được Hoạt Động</button>
                    @endif
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('css')
<style>
    .form-control:disabled, .form-control[readonly] {
        background-color: white;
        opacity: 1;
    }
</style>
@endsection

