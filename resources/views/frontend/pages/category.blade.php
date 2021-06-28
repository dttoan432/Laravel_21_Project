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
                    <div>
                        @if(!empty($category->trademarks))
                            @foreach($category->trademarks as $trademark)
                                <a href="{{ request()->fullUrlWithQuery(['trademark' => $trademark->slug]) }}"
                                   class="btn btn-sm btn-danger">{{ $trademark->name }}</a>
                            @endforeach
                        @endif
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

                            <style>
                                .toolbar-select a:hover > i {
                                    text-decoration: underline;
                                }
                            </style>
                            <div class="col-lg-7 col-md-7 col-xl-6 col-12">
                                <div class="toolbar-form float-right float-right" style="width: unset;">
                                    <div class="toolbar-select">
                                        <span>Sắp xếp:</span>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}"
                                           style="margin: 0 5px;">
                                            <i class="fas fa-sort-amount-up text-danger"> Tăng dần</i>
                                        </a>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}">
                                            <i class="fas fa-sort-amount-down text-danger"> Giảm dần</i>
                                        </a>
                                    </div>
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
                                                <div class="product-img" style="height: 65%;">
                                                    <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                       style="height: 100%;">
                                                        @if(count($product->images))
                                                            <img class="first-img"
                                                                 src="{{ $product->images[0]->image_url }}" alt="anh"
                                                                 style="height: 100%; width: 80%; margin-left: 10%;">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-content" style="height: 35%;">
                                                    <h2 style="height: 65%; width: 90%; margin: 0 auto;">
                                                        <a href="{{ route('frontend.product.show', $product->slug) }}">{{ $product->name }}</a>
                                                    </h2>

                                                    <style>
                                                        a.button.add-btn, a.button.add-btn.big {
                                                            top: auto;
                                                            bottom: 0;
                                                        }
                                                    </style>
                                                    <div class="product-price" style="height: 35%;">
                                                        <span class="new-price">{{ number_format($product->sale_price) }} <b>₫</b></span>
                                                        <a class="button add-btn"
                                                           href="{{ route('frontend.product.show', $product->slug) }}"
                                                           data-toggle="tooltip">Xem chi tiết</a>
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


                <div class="col-lg-3 order-lg-2 order-2">
                    <!--Widget Shop Categories End-->
                    <!--Widget Price Slider Start-->
                    <div class="widget widget-price-slider">
                        <h3 class="widget-title">Lọc theo giá</h3>
                        <div class="widget-content">
                            <div class="price-filter">
                                <form action="{{ route('frontend.category', $category->id) }}" method="GET">
                                    <div id="slider-range"></div>
                                    <span><input id="amount" class="amount" readonly type="text"
                                                 style="width: 100%;"></span>
                                    <input type="hidden" id="start_price" name="start_price" value="1000000">
                                    <input type="hidden" id="end_price" name="end_price" value="50000000">
                                    <input class="price-button" value="Filter" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--Widget Price Slider End-->
                    <div class="widget widget-brand">
                        <h3 class="widget-title">Brand</h3>
                        <div class="widget-content">
                            <ul class="brand-menu">
                                <li class="priceui">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '5']) }}">Dưới 5 triệu</a>
                                </li>
                                <li class="priceui">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '5-10']) }}">5 - 10 triệu</a>
                                </li>
                                <li class="priceui">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '10-15']) }}">10 - 15 triệu</a>
                                </li>
                                <li class="priceui">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '15-20']) }}">15 - 20 triệu</a>
                                </li>
                                <li class="priceui">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '20-25']) }}">20 - 25 triệu</a>
                                </li>
                                <li class="priceui">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a href="{{ request()->fullUrlWithQuery(['price' => '25']) }}">Trên 25 triệu</a>
                                </li>
                            </ul>
                        </div>
                    </div>

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

    <style>
        .priceui>i{
            font-size: 14px;
            color: #eb3e32;
        }
        .priceui>a{
            font-size: 14px;
        }
        .priceui>a:hover{
            text-decoration: underline;
        }
    </style>
@endsection
