@extends('Admin.layouts.app')
@section('title', 'Xem chi tiết liên hệ')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Liên Hệ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Quản Lý Liên Hệ</a></li>
                    <li class="breadcrumb-item active">Xem Liên Hệ</li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ten">Tên Khách Hàng</label>
                            <input type="text" class="form-control"
                                name="name" value="{{ $contact->user->name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ten">Email</label>
                            <input type="text" class="form-control"
                                name="email" value="{{ $contact->user->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ten">Số Điện Thoại</label>
                            <input type="text" class="form-control"
                                name="phone" value="{{ $contact->user->phone }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ten">Loại Liên Hệ</label>
                            @if ($contact->type == 1)
                                <input type="text" class="form-control"
                                name="type" value="Liên Hệ Đánh Giá" disabled>
                            @elseif ($contact->type == 2)   
                                <input type="text" class="form-control"
                                name="type" value="Liên Hệ Hỗ Trợ" disabled>
                            @elseif ($contact->type == 3)  
                                <input type="text" class="form-control"
                                name="type" value="Liên Hệ Đặt Bàn" disabled>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ten">Nội Dung</label>
                            <textarea name="content" class="form-control" disabled>{{ $contact->content }}</textarea>
                        </div>
                    </div>
                </div>
                <a class="btn btn-success" href="{{ route('admin.contact.index') }}">Quay Lại</a>
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

