@extends('Admin.layouts.app')
@section('title', 'Danh sách liên hệ')
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
                    <li class="breadcrumb-item active">Quản Lý Liên Hệ</li>
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
                                    <th>#</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Loại Liên Hệ</th>
                                    <th>Xem Chi Tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $contact->user->name }}
                                        </td>
                                        <td>
                                            {{ $contact->user->email }}
                                        </td>
                                        <td>
                                            {{ $contact->user->phone }}
                                        </td>
                                        <td>
                                            @if ($contact->type == 1)
                                                Liên Hệ Đánh Giá
                                            @elseif ($contact->type == 2)   
                                                Liên Hệ Hỗ Trợ
                                            @elseif ($contact->type == 3)  
                                                Liên Hệ Đặt Bàn
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.contact.view', $contact->id) }}" class="btn btn-primary">
                                                <i class="fa-regular fa-eye"></i> <span>XEM CHI TIẾT</span>
                                            </a>  
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
                                        href="{{ route('admin.contact.index', ['page' => $i]) }}">
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