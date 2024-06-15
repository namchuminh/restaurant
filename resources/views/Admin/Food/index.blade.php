@extends('Admin.layouts.app')
@section('title', 'Trang Quản Trị')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Món Ăn</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Món Ăn</li>
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
                                    <th>Hình Ảnh</th>
                                    <th style="width: 150px;">Tên Món Ăn</th>
                                    <th>Loại Món Ăn</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Gốc</th>
                                    <th>Giá Bán</th>
                                    <th style="width: 120px;">Đường Dẫn</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($foods as $key => $food)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            <img style="width: 150px; height: 150px" src="{{ asset('storage/' . $food->image) }}">
                                        </td>
                                        <td>
                                            {{ $food->name }}
                                        </td>
                                        <td>
                                            <a href=""
                                                target="_blank">
                                                {{ $food->category->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $food->quantity }} sản phẩm
                                        </td>
                                        <td>
                                            {{ number_format($food->sale) }}đ
                                        </td>
                                        <td>
                                            {{ number_format($food->price) }}đ
                                        </td>
                                        <td>
                                            <a href=""
                                                target="_blank">
                                                {{ $food->slug }}
                                            </a>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.food.edit', $food->id) }}" class="btn btn-primary mr-2">
                                                <i class="fas fa-edit"></i> <span>SỬA</span>
                                            </a>
                                            <form id="delete-form-{{ $food->id }}" action="{{ route('admin.food.destroy', ['food' => $food->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa món ăn này?')">
                                                    <i class="fas fa-trash"></i> XÓA
                                                </button>
                                            </form>
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
                                        href="{{ route('admin.food.index', ['page' => $i]) }}">
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