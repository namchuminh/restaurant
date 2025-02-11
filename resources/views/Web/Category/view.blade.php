@extends('Web.layouts.app')
@section('title', $category->name)
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $category->name }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Loại Món Ăn</li>
                <li>{{ $category->name }}</li>
            </ul>
        </div>
    </div>
</div>
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="th-sort-bar">
            <div class="row justify-content-between align-items-center">
                <div class="col-md">
                    <p class="woocommerce-result-count">Hiển thị {{ $foods->firstItem() }}–{{ $foods->lastItem() }} trong {{ $foods->total() }} kết quả</p>
                </div>

                <div class="col-md-auto">
                    <form class="woocommerce-ordering" method="GET" action="{{ url()->current() }}">
                        <select name="sort" class="orderby" id="sort" onchange="this.form.submit()">
                            <option value="price_ASC" {{ $sort == 'price_ASC' ? 'selected' : '' }}>Giá bán: Thấp tới cao</option>
                            <option value="price_DESC" {{ $sort == 'price_DESC' ? 'selected' : '' }}>Giá bán: Cao tới thấp</option>
                            <option value="id_ASC" {{ $sort == 'id_ASC' ? 'selected' : '' }}>Cũ nhất</option>
                            <option value="id_DESC" {{ $sort == 'id_DESC' ? 'selected' : '' }}>Mới nhất</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            @foreach ($foods as $food)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img transparent-img">
                            <img style="height: 230px;" src="{{ asset('storage/' . $food->image) }}" alt="Product Image">
                            <div class="actions">
                                <a href="{{ route('web.food.view', $food->slug) }}" class="icon-btn"><i class="far fa-eye"></i></a>
                                <a href="{{ route('web.wishlist.add', $food->id) }}" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 4">
                                <span>Rated <strong class="rating">4.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                            <h3 class="product-title"><a href="{{ route('web.food.view', $food->slug) }}">{{ $food->name }}</a></h3>
                            <span class="price">
                                @php
                                    if ($food->price >= 1000) {
                                        echo number_format($food->price / 1000, 0) . 'K';
                                    } else {
                                        echo $food->price;
                                    }
                                @endphp
                                <del>
                                    @php
                                        if ($food->sale >= 1000) {
                                            echo number_format($food->sale / 1000, 0) . 'K';
                                        } else {
                                            echo $food->sale;
                                        }
                                    @endphp
                                </del>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="th-pagination text-center pt-50">
            @if ($foods->hasPages())
                <ul>
                    {{-- Previous Page Link --}}
                    @if ($foods->onFirstPage())
                        <li class="disabled"><span><i class="far fa-arrow-left"></i></span></li>
                    @else
                        <li><a href="{{ $foods->previousPageUrl() }}" rel="prev"><i class="far fa-arrow-left"></i></a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($foods->getUrlRange(1, $foods->lastPage()) as $page => $url)
                        @if ($page == $foods->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($foods->hasMorePages())
                        <li><a href="{{ $foods->nextPageUrl() }}" rel="next"><i class="far fa-arrow-right"></i></a></li>
                    @else
                        <li class="disabled"><span><i class="far fa-arrow-right"></i></span></li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</section>
@endsection