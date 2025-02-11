@extends('Web.layouts.app')
@section('title', 'Đặt bàn')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Đặt Bàn</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Đặt Bàn</li>
            </ul>
        </div>
    </div>
</div>
<div class="space">
    <div class="container th-container">
        <div class="title-area text-center">
            <span class="sub-title3"><img src="https://html.themeholy.com/restar/demo/assets/img/theme-img/title_icon2.svg" alt="Icon">Đặt Bàn</span>
            <h2 class="sec-title title-ani">Phục Vụ Bạn Sớm Nhất</h2>
            <div class="mt-n1">
                <img src="https://html.themeholy.com/restar/demo/assets/img/shape/line_1.svg" alt="shape">
            </div>
        </div>

        <div class="reservation-form-wrap mb-5">
            <form action="{{ route('web.order.filterTable') }}" method="POST" class="reservation-form input-white" style="max-width: 100%;">
                @csrf 
                <h3 class="form-title">Tra Cứu Bàn Trống</h3>
                <div class="row">
                    <div class="form-group col-4">
                        <input type="number" class="form-control" name="people" id="people" placeholder="Tổng số người" min="1" value="{{ old('people') }}">
                        <i class="fal fa-user-group"></i>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" class="date-pick form-control" name="date" id="date-pick" placeholder="Ngày" value="{{ old('date') }}">
                        <i class="fal fa-calendar"></i>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" class="time-pick form-control" name="time" id="time-pick" placeholder="Giờ" value="{{ old('time') }}">
                        <i class="fal fa-clock"></i>
                    </div>
                </div>
                <button class="th-btn w-100">Tra Cứu</button>
                <p class="form-messages mb-0 mt-3"></p>
            </form>
        </div>
        <div class="reservation-form-wrap mt-5 mb-5">
            <div class="container">
                <div class="row">
                    @if (!isset($tablesFilter))

                    @elseif (count($tablesFilter) == 0)
                        <div class="col-12">
                            <div class="text-center text-warning">
                                Không có bàn nào phù hợp với yêu cầu của bạn.
                            </div>
                        </div>
                    @else
                        @foreach ($tablesFilter as $table)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $table->name }}</h5>
                                        <p class="card-text">
                                            Sức chứa: {{ $table->quantity }} người
                                        </p>
                                        <p class="card-text text-muted">
                                            {{ $table->address  }}  
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="reservation-form-wrap" data-bg-src="https://html.themeholy.com/restar/demo/assets/img/bg/reservation_bg_2.jpg">
            <form action="{{ route('web.order.order') }}" method="POST" class="reservation-form input-white">
                @csrf 
                <h3 class="form-title">Đặt Bàn</h3>
                <div class="row">
                    <div class="form-group col-12">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="{{ auth()->user()->name }}">
                        <i class="fal fa-user"></i>
                    </div>
                    <div class="form-group col-12">
                        <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number" value="{{ auth()->user()->phone }}">
                        <i class="fal fa-phone"></i>
                    </div>
                    <div class="form-group col-12">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ auth()->user()->email }}">
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="form-group col-12">
                        <input type="number" class="form-control" name="people" id="people" placeholder="Tổng số người" min="1" value="{{ old('people') }}">
                        <i class="fal fa-user-group"></i>
                        @error('people')
                            <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="date-pick form-control" name="date" id="date-pick" placeholder="Ngày" value="{{ old('date') }}">
                        <i class="fal fa-calendar"></i>
                        @error('date')
                            <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="time-pick form-control" name="time" id="time-pick" placeholder="Giờ" value="{{ old('time') }}">
                        <i class="fal fa-clock"></i>
                        @error('time')
                            <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <select name="table_id" id="" class="form-control">
                            <option value="" hidden>Chọn bàn</option>
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }} - {{ $table->address }} - {{ $table->quantity }} người</option>
                            @endforeach
                        </select>
                        @error('table_id')
                            <p class="form-messages d-flex" style="justify-content: center; margin-top: 15px; margin-bottom: 0px;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button class="th-btn w-100">Đặt Bàn</button>
                <p class="form-messages mb-0 mt-3"></p>
            </form>
        </div>
    </div>
</div>
@endsection
