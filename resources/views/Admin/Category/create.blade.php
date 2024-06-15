@extends('Admin.layouts.app')
@section('title', 'Thêm mới chuyên mục')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Chuyên Mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Quản Lý Chuyên
                            Mục</a></li>
                    <li class="breadcrumb-item active">Thêm Chuyên Mục</li>
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
                <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Tên Chuyên Mục</label>
                                <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên chuyên mục"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="w-100">
                                    <label for="ten">Đường Dẫn</label>
                                    <span id="taoduongdan" class="float-right" style="cursor: pointer;">Tạo tự
                                        động?</span>
                                </div>
                                <input type="text" class="form-control" id="duongdan" placeholder="Đường dẫn chuyên mục"
                                    name="slug">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Hình Ảnh</label>
                                <input type="file" class="form-control" id="ten" name="image">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success" href="{{ route('admin.category.index') }}">Quay Lại</a>
                    <button class="btn btn-primary">Thêm Chuyên Mục</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script>
    function createSlug(str) {
        // Chuyển đổi tiếng Việt thành dạng slug
        str = str.toLowerCase().trim();
        str = str.replace(/\s+/g, '-'); // Thay thế khoảng trắng bằng dấu gạch ngang
        str = convertVietnameseToSlug(str); // Xử lý các dấu tiếng Việt

        return str;
    }

    function convertVietnameseToSlug(str) {
        var slug = str;

        // Xử lý dấu tiếng Việt
        slug = slug.replace(/[áàảãạăắằẳẵặâấầẩẫậ]/g, 'a');
        slug = slug.replace(/[éèẻẽẹêếềểễệ]/g, 'e');
        slug = slug.replace(/[íìỉĩị]/g, 'i');
        slug = slug.replace(/[óòỏõọôốồổỗộơớờởỡợ]/g, 'o');
        slug = slug.replace(/[úùủũụưứừửữự]/g, 'u');
        slug = slug.replace(/[ýỳỷỹỵ]/g, 'y');
        slug = slug.replace(/đ/g, 'd');

        return slug;
    }

    $(document).ready(function(){
        $('#taoduongdan').click(function(){
            if($(".tenchinh").val() == ""){
                toastr.options = {
	                closeButton: true,
	                progressBar: true,
	                positionClass: 'toast-top-right', // Vị trí hiển thị
	                timeOut: 5000 // Thời gian tự động đóng
	            };
	            toastr.error('Vui lòng nhập tên chuyên mục!', 'Thất Bại');
            }else{
                $("#duongdan").val(createSlug($(".tenchinh").val()))
            }
        })
    });
</script>
@endsection
