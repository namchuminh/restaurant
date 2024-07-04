@extends('Web.layouts.app')
@section('title', 'Danh sách tin tức')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Danh Sách Tin Tức</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Tin Tức</li>
            </ul>
        </div>
    </div>
</div>
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                @if(session('status'))
                    <div class="alert alert-info">{{ session('status') }}</div>
                @endif
                @foreach ($news as $newsItem)
                    <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-img">
                            <a href="{{ route('web.news.view', $newsItem->slug) }}"><img style="height: 450px; width: 100%;" src="{{ asset('storage/'. $newsItem->image) }}" alt="{{ $newsItem->name }}"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a class="author" href="{{ route('web.news.view', $newsItem->slug) }}">{{ $newsItem->created_at }}</a>
                                <a href="{{ route('web.news.view', $newsItem->slug) }}">Admin</a>
                                <a href="{{ route('web.category.view', $newsItem->category->slug) }}">{{ $newsItem->category->name }}</a>
                            </div>
                            <h2 class="blog-title"><a href="{{ route('web.news.view', $newsItem->slug) }}">{{ $newsItem->name }}</a>
                            </h2>
                            <p class="blog-text">{{ Str::limit(strip_tags($newsItem->content), 218) }}</p>
                            <a href="{{ route('web.news.view', $newsItem->slug) }}" class="th-btn btn-sm style-border"><span class="top-line"></span><span class="text">Đọc Thêm</span><span class="bottom-line-1"></span><span class="bottom-line-2"></span></a>
                        </div>
                    </div>
                @endforeach
                <div class="th-pagination text-center">
                    @if ($news->hasPages())
                        <ul>
                            {{-- Previous Page Link --}}
                            @if ($news->onFirstPage())
                                <li class="disabled"><span><i class="far fa-arrow-left"></i></span></li>
                            @else
                                <li><a href="{{ $news->previousPageUrl() }}" rel="prev"><i class="far fa-arrow-left"></i></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                @if ($page == $news->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($news->hasMorePages())
                                <li><a href="{{ $news->nextPageUrl() }}" rel="next"><i class="far fa-arrow-right"></i></a></li>
                            @else
                                <li class="disabled"><span><i class="far fa-arrow-right"></i></span></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <div class="widget widget_search  ">
                        <form class="search-form" action="{{ route('web.news.list') }}">
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
                        <h3 class="widget_title">Danh Sách Thẻ</h3>
                        <div class="tagcloud">
                            <a href="#">Đồ Ăn Nhanh</a>
                            <a href="#">Món Nhậu</a>
                            <a href="#">Nhà Hàng</a>
                            <a href="#">Cơm Bình Dân</a>
                            <a href="#">Món Lẩu</a>
                            <a href="#">Gà Rán</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection