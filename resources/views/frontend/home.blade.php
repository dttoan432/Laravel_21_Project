@extends('frontend.layouts.master')

@section('content')
    <section class="slider-area ptb-30 white-bg">
        <div class="container">
            <div class="row">
                <!--Slider Start-->
                <div class="col-lg-9 col-md-9">
                    <div class="slider-wrapper theme-default">
                        <!--Slider Background Image Start-->
                        <div id="slider" class="nivoSlider">
                            <img src="frontend/images/1_4.jpg" alt title="#htmlcaption">
                            <img src="frontend/images/2_1.jpg" alt title="#htmlcaption2">
                        </div>
                        <!--Slider Background Image End-->
                        <!--1st Slider Caption Start-->
                        <div id="htmlcaption" class="nivo-html-caption">
                            <div class="slider-caption">
                                <div class="slider-text">
                                    <h5 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                        Exclusive Offer -20% Off This Week </h5>
                                    <h1 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                        Gone Gear Vr <br>Sale 70% Off</h1>
                                    <h4 class="wow animated fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                        Starting at <span>$560.99</span></h4>
                                    <div class="slider-button">
                                        <a href="#" class="wow button animated fadeInLeft" data-text="Shop now"
                                           data-wow-duration="2.5s" data-wow-delay="0.5s">shopping Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--1st Slider Caption End-->
                        <!--2nd Slider Caption Start-->
                        <div id="htmlcaption2" class="nivo-html-caption">
                            <div class="slider-caption">
                                <div class="slider-text">
                                    <h5 class="wow animated fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                        Exclusive Offer -40% Off This Week </h5>
                                    <h1 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                        Gone <br>X7/X7 edge 2018</h1>
                                    <h4 class="wow animated fadeInLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                                        Starting at <span>$560.99</span></h4>
                                    <div class="slider-button">
                                        <a href="#" class="wow button animated fadeInLeft" data-text="Shop now"
                                           data-wow-duration="2.5s" data-wow-delay="0.5s">shopping Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--2nd Slider Caption End-->
                    </div>
                </div>
                <!--Slider End-->
                <!--Offer Image Start-->
                <div class="col-lg-3 col-md-3">
                    <div class="single-offer mb-20">
                        <div class="offer-img img-full">
                            <a href="#"><img src="frontend/images/1_6.jpg" alt></a>
                        </div>
                    </div>
                    <div class="offer">
                        <div class="offer-img2 img-full">
                            <a href="#"><img src="frontend/images/2.jpg" alt></a>
                        </div>
                    </div>
                </div>
                <!--Offer Image End-->
            </div>
        </div>
    </section>
    <!--Slider Area End-->
    <!--Corporate About Start-->
    <section class="corporate-about white-bg pb-30">
        <div class="container">
            <div class="row all-about no-gutters">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-about">
                        <div class="block-wrapper">
                            <div class="about-content">
                                <h5>Free Delivery</h5>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-about">
                        <div class="block-wrapper2">
                            <div class="about-content">
                                <h5>Free Delivery</h5>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-about">
                        <div class="block-wrapper3">
                            <div class="about-content">
                                <h5>Free Delivery</h5>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-about not-border">
                        <div class="block-wrapper4">
                            <div class="about-content">
                                <h5>Free Delivery</h5>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Corporate About End-->
    <!--All Product Area Start-->
    <section class="all-product-area pt-100">
        <div class="container">
            <div class="row">
                <!--Left Side Product Start-->
                <div class="col-lg-9 col-md-9">
                    <!--Desktop & Television Product Start-->
                    <style>
                        .section-title1 h3 {
                            text-transform: none;
                        }
                    </style>
                    <div class="desktop-television-product">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--Section Title1 Start-->
                                <div class="section-title1-border">
                                    <div class="section-title1">
                                        <h3>Điện thoại</h3>
                                    </div>
                                </div>
                                <!--Section Title1 End-->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="amply" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        @foreach($products as $product)
                                            @if($product->category_id == 1 && count($product->images))
                                                <div class="col-lg-12 item-col">
                                                    <div class="single-product" style="height: 100%;">
                                                        <div class="product-img" style="height: 160px;">
                                                            <a href="{{ route('frontend.product.show', $product->id) }}"
                                                               style="height: 100%;">
                                                                <img class="first-img"
                                                                     src="{{ $product->images[0]->image_url }}"
                                                                     alt="anh"
                                                                     style="height: 100%; width: 80%; margin-left: 10%;">
                                                            </a>
                                                        </div>
                                                        <div class="product-content" style="height: 80px;">
                                                            <h2 style="height: 65%; width: 90%; margin: 0 auto;">
                                                                <a href="{{ route('frontend.product.show', $product->id) }}">{{ $product->name }}</a>
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
                                                                   href="{{ route('frontend.product.show', $product->id) }}"
                                                                   data-toggle="tooltip">Quick View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product Tab End-->
                        <!--Offer Image Start-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-offer">
                                    <div class="offer-img img-full">
                                        <a href="#"><img src="frontend/images/3_2.jpg" alt></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Offer Image End-->
                    </div>
                    <!--Desktop & Television Product End-->
                    <!--Smartphone & Tablet Product Start-->
                    <div class="smartphone-tablet-product pt-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--Section Title1 Start-->
                                <div class="section-title1-border">
                                    <div class="section-title1">
                                        <h3>Laptop</h3>
                                    </div>
                                </div>
                                <!--Section Title1 End-->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="amply" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        @foreach($products as $product)
                                            @if($product->category_id == 2 && count($product->images))
                                                <div class="col-lg-12 item-col">
                                                    <div class="single-product" style="height: 100%;">
                                                        <div class="product-img" style="height: 160px;">
                                                            <a href="{{ route('frontend.product.show', $product->id) }}"
                                                               style="height: 100%;">
                                                                <img class="first-img"
                                                                     src="{{ $product->images[0]->image_url }}"
                                                                     alt="anh"
                                                                     style="height: 100%; width: 80%; margin-left: 10%;">
                                                            </a>
                                                        </div>
                                                        <div class="product-content" style="height: 80px;">
                                                            <h2 style="height: 65%; width: 90%; margin: 0 auto;">
                                                                <a href="{{ route('frontend.product.show', $product->id) }}">{{ $product->name }}</a>
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
                                                                   href="{{ route('frontend.product.show', $product->id) }}"
                                                                   data-toggle="tooltip">Quick View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product Tab End-->
                        <!--Offer Image Start-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-offer">
                                    <div class="offer-img img-full">
                                        <a href="#"><img src="frontend/images/4_1.jpg" alt></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Offer Image End-->
                    </div>
                    <!--Smartphone & Tablet Product End-->
                    <!--Electronics Product Start-->
                    <div class="electronics-product pt-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--Section Title1 Start-->
                                <div class="section-title1-border">
                                    <div class="section-title1">
                                        <h3>Tablet</h3>
                                    </div>
                                </div>
                                <!--Section Title1 End-->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="amply" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        @foreach($products as $product)
                                            @if($product->category_id == 3 && count($product->images))
                                                <div class="col-lg-12 item-col">
                                                    <div class="single-product" style="height: 100%;">
                                                        <div class="product-img" style="height: 160px;">
                                                            <a href="{{ route('frontend.product.show', $product->id) }}"
                                                               style="height: 100%;">
                                                                <img class="first-img"
                                                                     src="{{ $product->images[0]->image_url }}"
                                                                     alt="anh"
                                                                     style="height: 100%; width: 80%; margin-left: 10%;">
                                                            </a>
                                                        </div>
                                                        <div class="product-content" style="height: 80px;">
                                                            <h2 style="height: 65%; width: 90%; margin: 0 auto;">
                                                                <a href="{{ route('frontend.product.show', $product->id) }}">{{ $product->name }}</a>
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
                                                                   href="{{ route('frontend.product.show', $product->id) }}"
                                                                   data-toggle="tooltip">Quick View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product Tab End-->
                        <!--Offer Image Start-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-offer">
                                    <div class="offer-img img-full">
                                        <a href="#"><img src="frontend/images/5_1.jpg" alt></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Offer Image End-->
                    </div>
                    <!--Electronics Product End-->
                    <!--Bestseller Product Start-->
                    <div class="bestseller-product pt-100 pb-85">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--Section Title1 Start-->
                                <div class="section-title1-border">
                                    <div class="section-title1">
                                        <h3>Đồng hồ thông minh</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Best Sell Product Start-->
                        <div class="tab-content">
                            <div id="amply" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        @foreach($products as $product)
                                            @if($product->category_id == 5 && count($product->images))
                                                <div class="col-lg-12 item-col">
                                                    <div class="single-product" style="height: 100%;">
                                                        <div class="product-img" style="height: 160px;">
                                                            <a href="{{ route('frontend.product.show', $product->id) }}"
                                                               style="height: 100%;">
                                                                <img class="first-img"
                                                                     src="{{ $product->images[0]->image_url }}"
                                                                     alt="anh"
                                                                     style="height: 100%; width: 80%; margin-left: 10%;">
                                                            </a>
                                                        </div>
                                                        <div class="product-content" style="height: 80px;">
                                                            <h2 style="height: 65%; width: 90%; margin: 0 auto;">
                                                                <a href="{{ route('frontend.product.show', $product->id) }}">{{ $product->name }}</a>
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
                                                                   href="{{ route('frontend.product.show', $product->id) }}"
                                                                   data-toggle="tooltip">Quick View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Best Sell Product End-->
                    </div>
                    <!--Bestseller Product End-->
                </div>
                <!--Left Side Product End-->
                <!--Right Side Product Start-->
                <div class="col-lg-3 col-md-3">
                    <div class="new-arrivals-product mb-50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="new-arrivals-product-title">
                                    <!--Section Title2 Start-->
                                    <div class="section-title2">
                                        <h3>Tai nghe</h3>
                                    </div>

                                    <div class="hot-del-single-product">
                                        <div class="row slide-active2">
                                            <!--Single Product Start-->
                                            @for($i = 0; $i < 10; $i++)
                                                @if($i < count($headphones))
                                                <div class="col-lg-12">
                                                    <div class="row no-gutters single-product style-2 list">
                                                        <div class="col-4">
                                                            <div class="product-img">
                                                                <a href="{{ route('frontend.product.show', $headphones[$i]->id) }}">
                                                                    @if(count($headphones[$i]->images)>0)
                                                                        <img class="first-img"
                                                                             src="{{ $headphones[$i]->images[0]->image_url }}"
                                                                             alt>
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="product-content">
                                                                <h2>
                                                                    <a href="{{ route('frontend.product.show', $headphones[$i]->id) }}">{{ $headphones[$i]->name }}</a>
                                                                </h2>
                                                                <div class="product-price">
                                                                    <span class="new-price">{{ number_format($headphones[$i]->sale_price) }} <b>₫</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offer-img-area pb-50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-offer mb-20">
                                    <div class="offer-img img-full">
                                        <a href="#"><img src="frontend/images/8_1.jpg" alt></a>
                                    </div>
                                </div>
                                <div class="single-offer mb-20">
                                    <div class="offer-img img-full">
                                        <a href="#"><img src="frontend/images/9_1.jpg" alt></a>
                                    </div>
                                </div>
                                <div class="single-offer">
                                    <div class="offer-img img-full">
                                        <a href="#"><img src="frontend/images/10.jpg" alt></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--All Product Area End-->
    <!--Offer Image Area Start-->
    <div class="offer-img-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-offer">
                        <div class="offer-img img-full">
                            <a href="#"><img src="frontend/images/6_1.jpg" alt></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-offer">
                        <div class="offer-img img-full">
                            <a href="#"><img src="frontend/images/7_1.jpg" alt></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="all-slide-product pt-100 white-bg">
        <div class="container">
            <div class="row">
                <!--Single Slide Product Start-->
                <style>
                    .section-title2 h3 {
                        text-transform: none;
                    }
                </style>
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--Section Title2 Start-->
                            <div class="section-title2">
                                <h3>Pin dự phòng</h3>
                            </div>
                            <!--Section Title2 End-->
                        </div>
                    </div>
                    <!--Special Single Product Start-->
                    <div class="hot-del-single-product">
                        <div class="row">
                            <div class="slide-active3">
                                <!--Single Product Start-->
                                @for($i = 0; $i < 10; $i++)
                                    @if($i < count($batterys))
                                        <div class="col-lg-12">
                                            <div class="row no-gutters single-product style-2 list">
                                                <div class="col-4">
                                                    <div class="product-img">
                                                        <a href="{{ route('frontend.product.show', $batterys[$i]->id) }}">
                                                            @if(count($batterys[$i]->images)>0)
                                                                <img class="first-img" src="{{ $batterys[$i]->images[0]->image_url }}"
                                                                     alt>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="product-content">
                                                        <h2><a href="{{ route('frontend.product.show', $batterys[$i]->id) }}">{{ $batterys[$i]->name }}</a>
                                                        </h2>
                                                        <div class="product-price">
                                                            <span class="new-price">{{ number_format($batterys[$i]->sale_price) }} <b>₫</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <!--Special Single Product Start-->
                </div>
                <!--Single Slide Product Start-->
                <!--Single Slide Product Start-->
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--Section Title2 Start-->
                            <div class="section-title2">
                                <h3>Cáp sạc</h3>
                            </div>
                            <!--Section Title2 End-->
                        </div>
                    </div>
                    <!--New Arrivals Single Product Start-->
                    <div class="hot-del-single-product">
                        <div class="row">
                            <div class="slide-active3">
                                <!--Single Product Start-->
                                @for($i = 0; $i < 10; $i++)
                                    @if($i < count($chargings))
                                    <div class="col-lg-12">
                                        <div class="row no-gutters single-product style-2 list">
                                            <div class="col-4">
                                                <div class="product-img">
                                                    <a href="{{ route('frontend.product.show', $chargings[$i]->id) }}">
                                                        @if(count($chargings[$i]->images)>0)
                                                            <img class="first-img" src="{{ $chargings[$i]->images[0]->image_url }}"
                                                                 alt>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="product-content">
                                                    <h2><a href="{{ route('frontend.product.show', $chargings[$i]->id) }}">{{ $chargings[$i]->name }}</a>
                                                    </h2>
                                                    <div class="product-price">
                                                        <span class="new-price">{{ number_format($chargings[$i]->sale_price) }} <b>₫</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <!--New Arrivals Single Product Start-->
                </div>
                <!--Single Slide Product Start-->
                <!--Single Slide Product Start-->
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--Section Title2 Start-->
                            <div class="section-title2">
                                <h3>Loa Bluetooth</h3>
                            </div>
                            <!--Section Title2 End-->
                        </div>
                    </div>
                    <!--On Sale Single Product Start-->
                    <div class="hot-del-single-product">
                        <div class="row">
                            <div class="slide-active3">
                                <!--Single Product Start-->
                                @for($i = 0; $i < 10; $i++)
                                    @if($i < count($sounds))
                                        <div class="col-lg-12">
                                            <div class="row no-gutters single-product style-2 list">
                                                <div class="col-4">
                                                    <div class="product-img">
                                                        <a href="{{ route('frontend.product.show', $sounds[$i]->id) }}">
                                                            @if(count($sounds[$i]->images)>0)
                                                                <img class="first-img" src="{{ $sounds[$i]->images[0]->image_url }}"
                                                                     alt>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="product-content">
                                                        <h2><a href="{{ route('frontend.product.show', $sounds[$i]->id) }}">{{ $sounds[$i]->name }}</a>
                                                        </h2>
                                                        <div class="product-price">
                                                            <span class="new-price">{{ number_format($sounds[$i]->sale_price) }} <b>₫</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <!--On Sale Single Product Start-->
                </div>
                <!--Single Slide Product Start-->
            </div>
        </div>
    </section>
    <!--All Slide Product Area End-->
    <!--Brand Area Start-->
    <div class="brand-area ptb-30 white-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-active owl-carousel">
                        <!--Single Brand Start-->
                        <div class="single-brand img-full">
                            <a href="#"><img src="frontend/images/1.png" alt></a>
                        </div>
                        <!--Single Brand End-->
                        <!--Single Brand Start-->
                        <div class="single-brand img-full">
                            <a href="#"><img src="frontend/images/2.png" alt></a>
                        </div>
                        <!--Single Brand End-->
                        <!--Single Brand Start-->
                        <div class="single-brand img-full">
                            <a href="#"><img src="frontend/images/3.png" alt></a>
                        </div>
                        <!--Single Brand End-->
                        <!--Single Brand Start-->
                        <div class="single-brand img-full">
                            <a href="#"><img src="frontend/images/4.png" alt></a>
                        </div>
                        <!--Single Brand End-->
                        <!--Single Brand Start-->
                        <div class="single-brand img-full">
                            <a href="#"><img src="frontend/images/5.png" alt></a>
                        </div>
                        <!--Single Brand End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
