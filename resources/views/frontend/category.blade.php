@extends('frontend.layouts.master')

@section('content')
    <div class="heading-banner-area pt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-banner">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Trang chủ</a><span class="breadcome-separator">></span></li>
                                <li>{{ $category->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Heading Banner Area End-->
    <!--Product List Grid View Area Start-->
    <div class="product-list-grid-view-area mt-20">
        <div class="container">
            <div class="row">
                <!--Shop Product Area Start-->
                <div class="col-lg-9 order-lg-1 order-1">
                    <!--Shop Tab Menu Start-->
                    <div class="shop-tab-menu">
                        <div class="row">
                            <!--List & Grid View Menu Start-->
                            <div class="col-lg-5 col-md-5 col-xl-6 col-12">
                                <div class="shop-tab">
                                    <ul class="nav">
                                        <li><a class="active" data-toggle="tab" href="#grid-view"><i
                                                    class="ion-android-apps"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--List & Grid View Menu End-->
                            <!-- View Mode Start-->
                            <div class="col-lg-7 col-md-7 col-xl-6 col-12">
                                <div class="toolbar-form">
                                    <form action="#">
                                        <div class="toolbar-select">
                                            <span>Short by:</span>
                                            <select data-placeholder="Choose a Country..." class="order-by"
                                                    tabindex="1">
                                                <option value="Default sorting">Default sorting</option>
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="show-result">
                                    <p>Showing 1–16 of 56 results</p>
                                </div>
                            </div>
                            <!-- View Mode End-->
                        </div>
                    </div>
                    <!--Shop Tab Menu End-->
                    <!--Shop Product Area Start-->
                    <div class="shop-product-area">
                        <div class="tab-content">
                            <!--Grid View Start-->
                            <div id="grid-view" class="tab-pane fade show active">
                                <div class="row product-container">
                                    <!--Single Product Start-->
                                    @foreach($products as $product)
                                        <div class="col-lg-3 col-md-3 item-col2">
                                            <div class="single-product" style="height: 100%;">
                                                <div class="product-img" style="height: 70%;">
                                                    <a href="{{ route('frontend.product.show', 1) }}" style="height: 100%;">
                                                        @if(count($product->images))
                                                            <img class="first-img" src="{{ $product->images[0]->image_url }}" alt="anh" style="height: 100%; width: 80%; margin-left: 10%;">
                                                        @endif
                                                    </a>
{{--                                                    <ul class="product-action">--}}
{{--                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i--}}
{{--                                                                    class="ion-android-favorite-outline"></i></a></li>--}}
{{--                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i--}}
{{--                                                                    class="ion-ios-shuffle-strong"></i></a></li>--}}
{{--                                                        <li><a href="#" data-toggle="modal" title="Quick View"--}}
{{--                                                               data-target="#myModal"><i class="ion-android-expand"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
                                                </div>
                                                <div class="product-content" style="height: 30%;">
                                                    <h2 style="height: 65%; width: 90%; margin: 0 auto;">
                                                        <a href="{{ route('frontend.product.show', $product->id) }}">{{ $product->name }}</a>
                                                    </h2>

                                                    <style>
                                                        a.button.add-btn,a.button.add-btn.big{
                                                            top: auto;
                                                            bottom: 0;
                                                        }
                                                    </style>
                                                    <div class="product-price" style="height: 35%;">
                                                        <span class="new-price">{{ number_format($product->sale_price) }} <b>₫</b></span>
                                                        <a class="button add-btn" href="{{ route('frontend.product.show', $product->id) }}" data-toggle="tooltip">Quick View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! $products->links() !!}
                </div>
                <!--Shop Product Area End-->
                <!--Left Sidebar Start-->
                <div class="col-lg-3 order-lg-2 order-2">
                    <!--Widget Shop Categories End-->
                    <!--Widget Price Slider Start-->
                    <div class="widget widget-price-slider">
                        <h3 class="widget-title">Filter by price</h3>
                        <div class="widget-content">
                            <div class="price-filter">
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <span>Price:<input id="amount" class="amount" readonly type="text"></span>
                                    <input class="price-button" value="Filter" type="button">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Widget Price Slider End-->
                    <!--Widget Brand Start-->
                    <div class="widget widget-brand">
                        <h3 class="widget-title">Brands</h3>
                        <div class="widget-content">
                            <ul class="brand-menu">
                                <li><input type="checkbox"><a href="#">Brand2</a> <span class="pull-right">(1)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Widget Brand End-->
                    <!--Widget Manufacture Start-->
                    <div class="widget widget-manufacture">
                        <h3 class="widget-title">MANUFACTURER</h3>
                        <div class="widget-content">
                            <ul class="brand-menu">
                                <li><input type="checkbox"><a href="#">Pellentesque</a> <span
                                        class="pull-right">(1)</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--Widget Manufacture End-->
                    <!--Widget Color Start-->
                    <div class="widget widget-color">
                        <h3 class="widget-title">Color</h3>
                        <div class="widget-content">
                            <ul class="brand-menu">
                                <li><input type="checkbox"><a href="#">Gold</a> <span class="pull-right">(1)</span></li>
                                <li><input type="checkbox"><a href="#">Green</a> <span class="pull-right">(1)</span>
                                </li>
                                <li><input type="checkbox"><a href="#">White</a> <span class="pull-right">(1)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Widget Color End-->
                    <!--Widget Compare Start-->
                    <div class="widget widget-compare">
                        <h3 class="widget-compare-title">Compare</h3>
                        <div class="widget-content">
                            <ul class="compare-menu">
                                <li>
                                    <a class="title" href="#">Cillum dolore</a>
                                    <a class="pull-right" href="#"><i class="fa fa-times"></i></a>
                                </li>
                                <li>
                                    <a class="title" href="#">Cillum dolore</a>
                                    <a class="pull-right" href="#"><i class="fa fa-times"></i></a>
                                </li>
                            </ul>
                            <a class="clear-all" href="#">Clear all</a>
                            <a class="compare-btn" href="#">compare</a>
                        </div>
                    </div>
                </div>
                <!--Left Sidebar End-->
            </div>
        </div>
    </div>
@endsection
