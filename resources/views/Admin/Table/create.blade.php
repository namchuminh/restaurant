@extends('Admin.layouts.app')
@section('title', 'Thêm bàn ăn')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Bàn Ăn</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.table.index') }}">Quản Lý Bàn Ăn</a></li>
                    <li class="breadcrumb-item active">Thêm Bàn Ăn</li>
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
                <form method="post" action="{{ route('admin.table.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Tên Bàn Ăn</label>
                                <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên bàn ăn"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Vị Trí</label>
                                <input type="text" class="form-control" placeholder="Vị trí bàn ăn"
                                    name="address">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Số Người</label>
                                <input type="number" class="form-control" placeholder="Số người tối đa"
                                    name="quantity">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success" href="{{ route('admin.table.index') }}">Quay Lại</a>
                    <button class="btn btn-primary">Thêm Bàn Ăn</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection