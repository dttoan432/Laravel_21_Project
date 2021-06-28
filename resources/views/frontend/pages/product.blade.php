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
                        </div>
                    </div>
                    <!--Single Product Tab Menu Start-->
                </div>
                <!--Single Product Image End-->
                <!--Single Product Content Start-->
                <div class="col-lg-6 col-md-6">
                    <div class="single-product-content">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <!--Product Rating End-->
                        <!--Product Price Start-->
                        <div class="single-product-price">
                            <span class="new-price">Giá: {{ number_format($product->sale_price) }} ₫</span>
                        </div>
                        <!--Product Price End-->
                        <!--Product Description Start-->
                        <div class="product-description">

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
                                    <li><a data-toggle="tab" href="#specifications">Thông số kỹ thuật</a></li>
                                    <li><a data-toggle="tab" href="#review">Đánh giá</a></li>
                                </ul>
                            </div>
                            <!--Discription Tab Menu End-->
                            <!--Discription Tab Content Start-->
                            <div class="discription-tab-content tab-content">
                                <div id="description" class="tab-pane fade show active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="description-content position-relative">
                                                @if(empty($product->content))
                                                    <style>
                                                        .description-content {
                                                            display: none;
                                                        }

                                                        #show_description {
                                                            display: none;
                                                        }
                                                    </style>
                                                @else
                                                    {!! $product->content !!}
                                                @endif
                                                <div class="bg-article"></div>
                                            </div>
                                        </div>
                                        <p id="show_description" class="text-center text-danger hoshow">Xem thêm</p>
                                    </div>
                                </div>

                                <div id="specifications" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="specifications-content position-relative">
                                                @if(!empty($product->content_more_json))
                                                    <table class="table">
                                                        <tbody>
                                                        @foreach($product->content_more_json as $key => $val)
                                                            <tr>
                                                                <td style="width: 30%;">{{ $key }}</td>
                                                                <th>{{ $val }}</th>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <style>
                                                        .specifications-content {
                                                            display: none;
                                                        }

                                                        #show_specifications {
                                                            display: none;
                                                        }
                                                    </style>
                                                @endif
                                                <div class="bg-article"></div>
                                            </div>
                                        </div>
                                        <p id="show_specifications" class="text-center text-danger hoshow">Xem thêm</p>
                                    </div>
                                </div>

                                <div id="specifications" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="review-page-comment">
                                                @if(!empty($product->content_more_json))
                                                    <table class="table">
                                                        <tbody>
                                                        @foreach($product->content_more_json as $key => $val)
                                                            <tr>
                                                                <td style="width: 30%;">{{ $key }}</td>
                                                                <th>{{ $val }}</th>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="review" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="review-page-comment">
                                                <div class="review-comment">
                                                    <h2>1 review for typesetting animal</h2>
                                                    <ul>
                                                        <li>
                                                            <div class="product-comment">
                                                                <img src="images/2_1.png" alt>
                                                                <div class="product-comment-content">
                                                                    <p><strong>admin</strong>
                                                                        -
                                                                        <span>March 7, 2016:</span>
                                                                        <span class="pro-comments-rating">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </span>
                                                                    </p>
                                                                    <div class="description">
                                                                        <p>roadthemes</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="review-form-wrapper">
                                                        <div class="review-form">
                                                            <span class="comment-reply-title">Add a review </span>
                                                            <form action="#">
                                                                <p class="comment-notes">
                                                                    <span id="email-notes">Your email address will not be published.</span>
                                                                    Required fields are marked
                                                                    <span class="required">*</span>
                                                                </p>
                                                                <div class="comment-form-rating">
                                                                    <label>Your rating</label>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="input-element">
                                                                    <div class="comment-form-comment">
                                                                        <label>Comment</label>
                                                                        <textarea name="message" cols="40"
                                                                                  rows="8"></textarea>
                                                                    </div>
                                                                    <div class="review-comment-form-author">
                                                                        <label>Name </label>
                                                                        <input required="required" type="text">
                                                                    </div>
                                                                    <div class="review-comment-form-email">
                                                                        <label>Email </label>
                                                                        <input required="required" type="text">
                                                                    </div>
                                                                    <div class="comment-submit">
                                                                        <button type="submit" class="form-button">
                                                                            Submit
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
                                    <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i
                                                class="ion-android-expand"></i></a></li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#show_description').click(function () {
                $('.description-content').css({
                    'height': '100%'
                }, $('#show').hide(), $('.bg-article').hide(), $('#show_description').hide())
            })
            $('#show_specifications').click(function () {
                $('.specifications-content').css({
                    'height': '100%'
                }, $('#show').hide(), $('.bg-article').hide(), $('#show_specifications').hide())
            })
        });
    </script>

    <style>
        .description-content {
            height: 500px;
            overflow: hidden;
        }

        .specifications-content {
            height: 500px;
            overflow: hidden;
        }

        #show_description, #show_specifications {
            margin-top: 15px;
            z-index: 2;
            margin: 0 auto;
        }

        .hoshow:hover {
            cursor: pointer;
            text-decoration: underline;
        }

        .bg-article {
            background: linear-gradient(to bottom, rgba(255 255 255/0), rgba(255 255 255/62.5), rgba(255 255 255/1));
            bottom: 0;
            height: 105px;
            left: 0;
            position: absolute;
            width: 100%;
        }
    </style>
@endsection
