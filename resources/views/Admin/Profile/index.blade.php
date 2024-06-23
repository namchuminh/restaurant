@extends('Admin.layouts.app')
@section('title', 'Thông tin cá nhân')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Cá Nhân</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Cá Nhân</li>
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
                <form method="post" action="{{ route('admin.profile.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Họ Tên</label>
                                <input type="text" class="form-control"
                                    name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Số Điện Thoại</label>
                                <input type="text" class="form-control"
                                    name="phone" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Email</label>
                                <input type="text" class="form-control"
                                    name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Đổi Mật Khẩu</label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới"
                                    name="password">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success" href="{{ route('admin.dashboard') }}">Quay Lại</a>
                    <button class="btn btn-primary">Cập Nhật Thông Tin</button>
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

