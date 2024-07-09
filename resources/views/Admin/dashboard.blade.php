@extends('Admin.layouts.app')
@section('title', 'Trang Quản Trị')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Bảng Điều Khiển</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ number_format($totalRevenueToday) }} VND</h3>
                        <p>Doanh Thu Hôm Nay</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalOrdersToday }}</h3>
                        <p>Hóa Đơn Hôm Nay</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalCustomersToday }}</h3>
                        <p>Khách Hàng Hôm Nay</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $foodSum }}</h3>
                        <p>Món Ăn Trong Menu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="ion ion-stats-bars"></i></span>
                    <a href="#" class="info-box-content"
                        style="color: black;">
                        <span class="info-box-text">Doanh Thu Tháng Này</span>
                        <span class="info-box-number">{{ number_format($totalRevenueThisMonth) }} VND</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-clipboard-list"></i></span>

                    <a href="#" class="info-box-content"
                        style="color: black;">
                        <span class="info-box-text">Hóa Đơn Tháng Này</span>
                        <span class="info-box-number">{{ $totalOrdersThisMonth }} Hóa Đơn</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-bag-shopping"></i></span>

                    <a href="#" class="info-box-content"
                        style="color: black;">
                        <span class="info-box-text">Bán Trong Tháng Này</span>
                        <span class="info-box-number">{{ $totalQuantityThisMonth }} Món Ăn</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="ion ion-stats-bars"></i></span>
                    <a href="#" class="info-box-content"
                        style="color: black;">
                        <span class="info-box-text">Doanh Thu Tuần Này</span>
                        <span class="info-box-number">{{ number_format($totalRevenueLast7Days) }} VND</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-clipboard-list"></i></span>

                    <a href="#" class="info-box-content"
                        style="color: black;">
                        <span class="info-box-text">Đơn Hàng Tuần Này</span>
                        <span class="info-box-number">{{ $totalOrdersLast7Days }} Hóa Đơn</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-bag-shopping"></i></span>

                    <a href="#" class="info-box-content"
                        style="color: black;">
                        <span class="info-box-text">Bán Trong Tuần Này</span>
                        <span class="info-box-number">{{ $totalQuantityLast7Days }} Món Ăn</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <!-- solid sales graph -->
                <div class="card bg-gradient-white">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-th mr-1"></i>
                            Đơn Hàng Theo Tháng
                        </h3>
                    </div>
                    <div class="card-body">
                        <canvas id="orderChar"
                            style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%; display: block; box-sizing: border-box; width: 486px;"
                            width="486" height="400"></canvas>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </section>

            <section class="col-lg-6 connectedSortable ui-sortable">
                <!-- solid sales graph -->
                <div class="card bg-gradient-white">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-th mr-1"></i>
                            Doanh Thu Theo Tháng
                        </h3>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart"
                            style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%; display: block; box-sizing: border-box; width: 486px;"
                            width="486" height="400"></canvas>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </section>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function(){
      $.get('{{ route('admin.dashboard.order') }}', function(data){
        var months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
        var order = data;

        // Lấy thẻ canvas
        var ctx = document.getElementById('orderChar').getContext('2d');

        // Khởi tạo biểu đồ đường
        var orderChar = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Đơn Hàng Theo Tháng',
                    data: order,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                          stepSize: 1, // Đảm bảo chỉ hiển thị số nguyên
                          callback: function(value, index, values) {
                              return Math.round(value); // Làm tròn giá trị
                          }
                      }
                  }
              }
            },
        });
      })

    $.get('{{ route('admin.dashboard.revenue') }}', function(data){
        // Dữ liệu doanh thu theo tháng
        var months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
        var revenues = data;

        // Lấy thẻ canvas
        var ctx = document.getElementById('revenueChart').getContext('2d');

        // Khởi tạo biểu đồ đường
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Doanh thu theo tháng (VND)',
                    data: revenues,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
            });
        })
    });
</script>
@endsection