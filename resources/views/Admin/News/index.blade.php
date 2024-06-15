@extends('Admin.layouts.app')
@section('title', 'Trang Quản Trị')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Tin Tức</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Tin Tức</li>
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
                                    <th style="width: 200px;">Tiêu Đề</th>
                                    <th>Chuyên Mục</th>
                                    <th style="width: 150px;">Đường Dẫn</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $key => $post)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            <img style="width: 150px; height: 150px" src="{{ asset('storage/' . $post->image) }}">
                                        </td>
                                        <td>
                                            {{ $post->name }}
                                        </td>
                                        <td>
                                            <a href=""
                                                target="_blank">
                                                {{ $post->category->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">{{ $post->slug }}</a>
                                        </td> 
                                        <td class="d-flex">
                                            <a href="{{ route('admin.news.edit', $post->id) }}" class="btn btn-primary mr-2">
                                                <i class="fas fa-edit"></i> <span>SỬA</span>
                                            </a>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('admin.news.destroy', ['news' => $post->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">
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
                                        href="{{ route('admin.news.index', ['page' => $i]) }}">
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