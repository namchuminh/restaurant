@extends('Admin.layouts.app')
@section('title', 'Thêm món ăn hóa đơn')
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
            <li class="breadcrumb-item"><a href="{{ route('admin.order.view', $order->code) }}">Hóa Đơn {{ $order->code }}</a></li>
            <li class="breadcrumb-item active">Thêm Món Ăn</li>
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
                <form method="post" action="{{ route('admin.order.addfooddetail', $order->code) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="food_name">Tên Món Ăn</label>
                                <select class="form-control" id="food_name" name="food_id" required>
                                    @foreach ($foods as $food)
                                        <option value="{{ $food->id }}" data-price="{{ $food->price }}">{{ $food->name }} - Đơn giá {{ number_format($food->price) }}đ</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ten">Số Lượng</label>
                                <input type="number" id="quantity" class="form-control" placeholder="Số lượng"
                                    name="quantity">
                            </div>
                            <div class="form-group">
                                <label for="ten">Tạm Tính</label>
                                <input type="text" class="form-control tamtinh" placeholder="Tạm tính" value="0 VND">
                            </div>
                        </div>
                        
                    </div>
                    <a class="btn btn-success" href="{{ route('admin.order.view', $order->code) }}">Quay Lại</a>
                    <button class="btn btn-primary">Thêm Món Ăn</button>
                </form>
            </div>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        var firstOption = $('#food_name').find('option:first');
        var price = firstOption.data('price');
        var quantity = 0;
        $('#quantity').keyup(function (e) { 
            quantity = $(this).val();
            if(quantity){
                let total = parseInt(price) * parseInt(quantity);
                $('.tamtinh').val(total.toLocaleString() + " VND");
            }else{
                $('.tamtinh').val("0 VND");
            }
        });

        $('#food_name').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            price = selectedOption.data('price');

            if(quantity){
                let total = parseInt(price) * parseInt(quantity);
                $('.tamtinh').val(total.toLocaleString() + " VND");
            }else{
                $('.tamtinh').val("0 VND");
            }
        });

    });
</script>

@endsection