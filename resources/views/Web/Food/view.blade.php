@extends('Web.layouts.app')
@section('title',$food->name)
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $food->name }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li><a href="{{ route('web.food.list') }}">Món Ăn</a></li>
                <li>{{ $food->name }}</li>
            </ul>
        </div>
    </div>
</div>
<section class="product-details space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-big-img transparent-img">
                    <div class="img"><img style="height: 454px;" src="{{ asset('storage/' . $food->image) }}" alt="Product Image"></div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="product-about">
                    <p class="price">
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
                    </p>
                    <h2 class="product-title">{{ $food->name }}</h2>
                    @php
                        $rating = number_format($rating, 2); // Làm tròn đến 2 chữ số
                        $ratingWidth = ($rating / 5) * 100; // Tính độ rộng %
                    @endphp
                    <div class="product-rating">
                        <div class="star-rating" role="img" aria-label="Rated {{ $rating }} out of 5">
                            <span style="width:{{ $ratingWidth }}%">
                                Rated <strong class="rating">{{ $rating }}</strong> out of 5
                            </span>
                        </div>
                    </div>
                    <p class="text">{{ $food->description }}</p>
                    <div class="mt-2 link-inherit">
                        <p>
                            <strong class="text-title me-3">Số lượng còn:</strong>
                            <span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i>{{ $food->quantity }}</span>
                        </p>
                    </div>
                    <div class="actions">
                        <a href="{{ route('web.wishlist.add', $food->id) }}" class="th-btn"><i class="far fa-heart"></i> YÊU THÍCH</a>
                    </div>
                    <div class="product_meta">
                        <span class="sku_wrapper">SKU: <span class="sku">{{ $food->id }}-{{ $food->slug }}</span></span>
                        <span class="posted_in">Loại Món Ăn: <a href="{{ route('web.category.view', $food->category->slug) }}">{{ $food->category->name }}</a></span>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav product-tab-style1" id="productTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link th-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true">Đánh Giá Mới</a>
            </li>
        </ul>
        <div class="tab-content" id="productTabContent">
            <div class="tab-pane fade active show" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="woocommerce-Reviews">
                    <div class="th-comments-wrap ">
                        <ul class="comment-list" style="position: relative;">
                            @php
                                \Carbon\Carbon::setLocale('vi'); // Đặt ngôn ngữ là tiếng Việt
                            @endphp
                            @foreach ($reviews as $index => $review)
                                <li class="review th-comment-item" style="position: absolute; left: {{ $index % 2 == 0 ? '0px' : '657px' }}; top: {{ floor($index / 2) * 215.922 }}px;">
                                    <div class="th-post-comment">
                                        <div class="comment-content">
                                            <!-- Tên người dùng -->
                                            <h4 class="name">{{ $review->user->name }}</h4>
                                            <!-- Ngày bình luận -->
                                            <span class="commented-on">
                                                <i class="fal fa-calendar"></i> {{ $review->created_at->translatedFormat('d \T\h\á\n\g n, Y') }}
                                            </span>
                                            <!-- Đánh giá sao -->
                                            <div class="star-rating" role="img" aria-label="Rated {{ $review->rating }} out of 5">
                                                <span style="width:{{ $review->rating * 20 }}%">
                                                    Rated <strong class="rating">{{ $review->rating }}</strong> out of 5
                                                </span>
                                            </div>
                                            <!-- Nội dung bình luận -->
                                            <p class="text">{{ $review->content }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div> <!-- Comment Form -->
                    @if (Auth::check())
                        <form class="th-comment-form" method="POST" action="{{ route('web.review.create', $food->id) }}">
                            @csrf
                            <div class="form-title text-center">
                                <h3 class="blog-inner-title ">Gửi Đánh Giá</h3>
                            </div>
                            <div class="row">
                                <label>Chọn Số Sao</label>
                                <div class="form-group rating-select d-flex align-items-center">
                                    <p class="stars selected">
                                        <span>
                                            <a class="star-1" href="#" data-value="1">1</a>
                                            <a class="star-2" href="#" data-value="2">2</a>
                                            <a class="star-3" href="#" data-value="3">3</a>
                                            <a class="star-4" href="#" data-value="4">4</a>
                                            <a class="star-5" href="#" data-value="5">5</a>
                                        </span>
                                    </p>
                                </div>
                                <br>
                                <label>Nhập Nội Dung</label>
                                <div class="col-12 form-group">
                                    <textarea placeholder="Ví dụ: món rất ngon" name="content" class="form-control"></textarea>
                                    <i class="text-title far fa-pencil-alt"></i>
                                </div>
                                <div class="col-12 form-group mb-0">
                                    <input type="hidden" name="rating" value="5" id="ratingInput">
                                    <button class="th-btn" type="submit">Đánh Giá</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!--==============================
Related Product  
==============================-->
        <div class="space-extra-top mb-30">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto">
                    <h2 class="sec-title title-ani text-center">Món Liên Quan</h2>
                </div>
                <div class="col-md d-none d-sm-block">
                    <hr class="title-line">
                </div>
                <div class="col-md-auto d-none d-md-block">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slider-prev="#productSlider1" class="slider-arrow slider-prev default"><span class="icon"></span></button>
                            <button data-slider-next="#productSlider1" class="slider-arrow slider-next default"><span class="icon"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper th-slider has-shadow" id="productSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                <div class="swiper-wrapper">
                    @foreach ($relatedFoods as $food)
                        <div class="swiper-slide">
                            <div class="th-product product-grid">
                                <div class="product-img transparent-img">
                                    <img style="height: 230px;" src="{{ asset('storage/' . $food->image) }}" alt="Product Image">
                                    <span class="product-tag">
                                        @php
                                            $discountPercentage = (($food->sale - $food->price) / $food->sale) * 100;
                                            echo $discountPercentage."%";
                                        @endphp
                                    </span>
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
            </div>
            <div class="d-block d-md-none mt-40 text-center">
                <div class="icon-box">
                    <button data-slider-prev="#productSlider1" class="slider-arrow slider-prev default"><span class="icon"></span></button>
                    <button data-slider-next="#productSlider1" class="slider-arrow slider-next default"><span class="icon"></span></button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    // Lấy tất cả các sao
    const stars = document.querySelectorAll('.stars a');
    const ratingInput = document.getElementById('ratingInput');

    // Thêm sự kiện click cho từng sao
    stars.forEach(star => {
        star.addEventListener('click', function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

            // Lấy giá trị của sao được chọn
            const ratingValue = this.getAttribute('data-value');

            // Gán giá trị cho input hidden
            ratingInput.value = ratingValue;

            // Xóa class "active" của tất cả các sao
            stars.forEach(s => s.classList.remove('active'));

            stars[ratingValue - 1].classList.add('active');
        });
    });
</script>
@endsection