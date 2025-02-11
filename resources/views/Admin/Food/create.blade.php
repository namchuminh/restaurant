@extends('Admin.layouts.app')
@section('title', 'Thêm mới món ăn')
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.food.index') }}">Quản Lý Món Ăn</a></li>
                    <li class="breadcrumb-item active">Thêm Món Ăn</li>
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
                <form method="post" action="{{ route('admin.food.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Tên Món Ăn</label>
                                <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên món ăn"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Chuyên Mục</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="w-100">
                                    <label for="ten">Đường Dẫn</label>
                                    <span id="taoduongdan" class="float-right" style="cursor: pointer;">Tạo tự
                                        động?</span>
                                </div>
                                <input type="text" class="form-control" id="duongdan" placeholder="Đường dẫn món ăn"
                                    name="slug">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ten">Mô Tả Món Ăn</label>
                                <textarea class="form-control" placeholder="Mô tả món ăn" name="description" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="sl" placeholder="Số lượng"
                                    name="quantity" value="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="sl" placeholder="Giá gốc"
                                    name="sale" value="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sl">Giá Bán</label>
                                <input type="number" class="form-control" id="sl" placeholder="Giá bán"
                                    name="price">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="anh">Hình Ảnh</label>
                                <input type="file" class="form-control tenchinh" id="anh" name="image">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success" href="{{ route('admin.food.index') }}">Quay Lại</a>
                    <button class="btn btn-primary">Thêm Món Ăn</button>
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
	            toastr.error('Vui lòng nhập tên Món Ăn!', 'Thất Bại');
            }else{
                $("#duongdan").val(createSlug($(".tenchinh").val()))
            }
        })
    });
</script>
@endsection


