@extends('Web.layouts.app')
@section('title', $newsItem->name)
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $newsItem->name }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li><a href="{{ route('web.news.list') }}">Tin Tức</a></li>
                <li>{{ $newsItem->name }}</li>
            </ul>
        </div>
    </div>
</div>
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                <div class="th-blog blog-single">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a class="author" href="#">{{ $newsItem->created_at }}</a>
                            <a href="#">Admin</a>
                            <a href="{{ route('web.category.view', $newsItem->category->slug) }}">{{ $newsItem->category->name }}</a>
                        </div>
                        <h2 class="blog-title">{{ $newsItem->name }}</h2>

                        <!-- Nội dung bài viết -->
                        <div class="blog-content-detail">
                            {!! $newsItem->content !!}
                        </div>

                        <div class="share-links clearfix">
                            <div class="row justify-content-between">
                                <div class="col-sm-auto">
                                </div>
                                <div class="col-sm-auto text-xl-end">
                                    <span class="share-links-title">Chia Sẻ:</span>
                                    <div class="th-social">
                                        <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </div><!-- End Social Share -->
                                </div><!-- Share Links Area end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <div class="widget widget_search  ">
                        <form class="search-form">
                            @if(isset($keyword))
                                <input type="text" name="keyword" placeholder="{{ $keyword }}">
                            @else
                                <input type="text" name="keyword" placeholder="Nhập tên tin tức">
                            @endif
                            
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget_categories  ">
                        <h3 class="widget_title">Chuyên Mục</h3>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('web.news.category.show', $category->slug) }}">{{ $category->name }}</a>
                                    <span>({{ $category->news_count }})</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget  ">
                        <h3 class="widget_title">Tin Tức Mới</h3>
                        <div class="recent-post-wrap">

                            @foreach ($recentPosts as $recentPost)
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route('web.news.view', $recentPost->slug) }}">
                                            <img style="height: 85px;" src="{{ asset('storage/'.$recentPost->image) }}" alt="Blog Image">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title">
                                            <a class="text-inherit" href="{{ route('web.news.view', $recentPost->slug) }}">{{ $recentPost->name }}</a>
                                        </h4>
                                        <div class="recent-post-meta">
                                            <a href="{{ route('web.news.view', $recentPost->slug) }}">
                                                <i class="fal fa-calendar-days"></i>{{ $recentPost->created_at }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="widget widget_tag_cloud  ">
                        <!-- <h3 class="widget_title">Danh Sách Thẻ</h3> -->
                        <div class="tagcloud">
                            <!-- <a href="#">Đồ Ăn Nhanh</a>
                            <a href="#">Món Nhậu</a>
                            <a href="#">Nhà Hàng</a>
                            <a href="#">Cơm Bình Dân</a>
                            <a href="#">Món Lẩu</a>
                            <a href="#">Gà Rán</a> -->
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection