@extends('frontend.layouts.master')

@section('content')
    <section class="single-product-area mt-20">
        <div class="container">
            <!--Single Product Info Start-->
            <div class="row single-product-info mb-50">
                <!--Single Product Image Start-->
                <div class="col-lg-6 col-md-6">
                    <!--Product Tab Content Start-->
                    <div class="single-product-tab-content tab-content">
                        <div id="w1" class="tab-pane fade in active">
                            <div class="">
                                <img src="{{ $product->images[0]->image_url }}" alt>
                            </div>
                        </div>
                        @if(count($product->images) > 0)
                            @for($i = 2; $i <= count($product->images); $i++)
                                <div id="{{'w'.$i}}" class="tab-pane fade">
                                    <div class="">
                                        <img src="{{ $product->images[$i-1]->image_url }}" alt>
                                    </div>
                                </div>
                            @endfor
                        @endif
{{--                        <div id="w2" class="tab-pane fade">--}}
{{--                            <div class="easyzoom easyzoom--overlay">--}}
{{--                                <a href="img/single-product/large/2.jpg">--}}
{{--                                    <img src="/frontend/images/clock3_600.jpg" alt>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <!--Product Tab Content End-->
                    <!--Single Product Tab Menu Start-->
                    <div class="single-product-tab">
                        <style>
                            /*.cloned{*/
                            /*    display: none;*/
                            /*}*/
                        </style>
                        <div class="nav single-product-tab-menu owl-carousel">
                            @if(count($product->images))
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($product->images as $image)
                                    @php
                                        $i++;
                                    @endphp
                                    <a data-toggle="tab" href="{{'#w'.$i}}"><img src="{{ $image->image_url }}" alt></a>
                                @endforeach
                            @endif
{{--                            <a data-toggle="tab" href="#w1"><img src="/frontend/images/clock1_100.jpg" alt></a>--}}
{{--                            <a data-toggle="tab" href="#w2"><img src="/frontend/images/clock2_100.jpg" alt></a>--}}
{{--                            <a data-toggle="tab" href="#w3"><img src="/frontend/images/clock3_100.jpg" alt></a>--}}
{{--                            <a data-toggle="tab" href="#w4"><img src="/frontend/images/clock4_100.jpg" alt></a>--}}
{{--                            <a data-toggle="tab" href="#w5"><img src="/frontend/images/clock1_100.jpg" alt></a>--}}
{{--                            <a data-toggle="tab" href="#w6"><img src="/frontend/images/clock2_100.jpg" alt></a>--}}
                        </div>
                    </div>
                    <!--Single Product Tab Menu Start-->
                </div>
                <!--Single Product Image End-->
                <!--Single Product Content Start-->
                <div class="col-lg-6 col-md-6">
                    <div class="single-product-content">
                        <!--Product Nav Start-->
                        <div class="product-nav">
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                        <!--Product Nav End-->
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <!--Product Rating End-->
                        <!--Product Price Start-->
                        <div class="single-product-price">
                            <span class="new-price">{{ number_format($product->sale_price) }} ₫</span>
                        </div>
                        <!--Product Price End-->
                        <!--Product Description Start-->
                        <div class="product-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>
                        </div>
                        <!--Product Description End-->
                        <!--Product Quantity Start-->
                        <div class="single-product-quantity">
                            <form action="#">
                                <div class="quantity">
                                    <label>Số lượng</label>
                                    <input class="input-text" value="1" type="number">
                                </div>
                                <button class="quantity-button" type="submit">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                        <!--Wislist Compare Button End-->
                        <!--Product Meta Start-->

                        <!--Product Sharing End-->
                    </div>
                </div>
                <!--Single Product Content End-->
            </div>
            <!--Single Product Info End-->
            <!--Discription Tab Start-->
            <div class="row">
                <div class="discription-tab">
                    <div class="col-lg-12">
                        <div class="discription-review-contnet mb-40">
                            <!--Discription Tab Menu Start-->
                            <div class="discription-tab-menu">
                                <ul class="nav">
                                    <li><a class="active" data-toggle="tab" href="#description">Mô tả sản phẩm</a></li>
                                </ul>
                            </div>
                            <!--Discription Tab Menu End-->
                            <!--Discription Tab Content Start-->
                            <div class="discription-tab-content tab-content" id="contentttt">
                                <div id="description" class="tab-pane fade show active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="description-content">
                                                {!! $product->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Discription Tab Content End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Discription Tab End-->
        </div>
    </section>
    <!--Single Product Area End-->
    <!--Related Products Area Start-->
    <section class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--Section Title1 Start-->
                    <div class="section-title1-border">
                        <div class="section-title1">
                            <h3>Sản phẩm liên quan</h3>
                        </div>
                    </div>
                    <!--Section Title1 End-->
                </div>
            </div>
            <div class="row">
                <div class="related-products owl-carousel">
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/9.jpg" alt>
                                    <img class="hover-img" src="images/10.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Letraset animal</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/21.jpg" alt>
                                    <img class="hover-img" src="images/22.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Natural popularised</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/19.jpg" alt>
                                    <img class="hover-img" src="images/20.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Natural simply</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/17.jpg" alt>
                                    <img class="hover-img" src="images/18.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Specimen animal</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/11.jpg" alt>
                                    <img class="hover-img" src="images/12.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Natural Contrary</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/25.jpg" alt>
                                    <img class="hover-img" src="images/26.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Dummy animal</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/31.jpg" alt>
                                    <img class="hover-img" src="images/32.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Simply animal</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                    <!--Single Product Start-->
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="first-img" src="images/27.jpg" alt>
                                    <img class="hover-img" src="images/28.jpg" alt>
                                </a>
                                <span class="sicker">-7%</span>
                                <ul class="product-action">
                                    <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h2><a href="single-product.html">Natural standard</a></h2>
                                <div class="product-price">
                                    <span class="new-price">$69.00</span>
                                    <a class="button add-btn" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Product End-->
                </div>
            </div>
        </div>
    </section>
@endsection
