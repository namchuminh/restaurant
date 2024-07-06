@extends('Web.layouts.app')
@section('title', 'Món ăn yêu thích')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url(https://html.themeholy.com/restar/demo/assets/img/bg/breadcumb-bg.jpg);">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Món Ăn Yêu Thích</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('web.home') }}">Trang Chủ</a></li>
                <li>Yêu Thích</li>
            </ul>
        </div>
    </div>
</div>
<div class="space">
    <div class="container">
        <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
            <div class="tinv-header">
                <h2 class="mb-30">Yêu Thích</h2>
            </div>
            <form action="#" method="post" autocomplete="off">
                <table class="tinvwl-table-manage-list">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Hình Ảnh</th>
                            <th class="product-name">
                                <span class="tinvwl-full">Tên Món Ăn</span><span class="tinvwl-mobile">Món Ăn</span>
                            </th>
                            <th class="product-price">Giá Bán</th>
                            <th class="product-date">Ngày Thêm</th>
                            <th class="product-stock">Trạng Thái</th>
                            <th class="product-action">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlists as $wishlist)
                            <tr class="wishlist_item">
                                <td class="product-thumbnail">
                                    <a href="{{ route('web.food.view', $wishlist->food->slug) }}"><img style="height: 84px;" src="{{ asset('storage/'. $wishlist->food->image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $wishlist->food->name }}"></a>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('web.food.view', $wishlist->food->slug) }}">{{ $wishlist->food->name }}</a>
                                </td>
                                <td class="product-price">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">
                                                @php
                                                    if ($wishlist->food->price >= 1000) {
                                                        echo number_format($wishlist->food->price / 1000, 0) . 'K';
                                                    } else {
                                                        echo $wishlist->food->price;
                                                    }
                                                @endphp
                                            </span>
                                        </bdi>
                                    </span>
                                </td>
                                <td class="product-date">
                                    <time class="entry-date" datetime="{{ $wishlist->created_at }}">{{ $wishlist->created_at }}</time>
                                </td>
                                <td class="product-stock">
                                    <p class="stock in-stock">
                                        @if ($wishlist->food->quantity > 0)
                                            <span><i class="fas fa-check"></i></span><span class="tinvwl-txt">
                                                Hiện còn
                                            </span>
                                        @else
                                            <span><i class="fas fa-remove"></i></span><span class="tinvwl-txt">
                                                Hết món
                                            </span>   
                                        @endif
                                        
                                    </p>
                                </td>
                                <td class="product-action">
                                    <a class="button th-btn" href="{{ route('web.wishlist.delete', $wishlist->food->id) }}" title="Xóa món ăn">
                                        <i class="fal fa-remove"></i><span class="tinvwl-txt"> Xóa Món Ăn</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            <div class="social-buttons">
                <span>Chia Sẻ</span>
                <ul>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=permalink" class="social social-facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/share?url=permalink" class="social social-twitter " title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="http://pinterest.com/pin/create/button/?url=permalink" class="social social-pinterest " title="Pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="https://api.whatsapp.com/send?text=permalink" class="social social-whatsapp " title="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a href="http://vecurosoft.com/products/wordpress/foodelio/wishlist/974b61/" class="social social-clipboard " title="Clipboard"><i class="far fa-clipboard"></i></a></li>
                    <li><a href="mailto:?body=permalink" class="social social-email " title="Email"><i class="far fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection