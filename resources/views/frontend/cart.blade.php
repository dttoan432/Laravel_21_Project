@extends('frontend.layouts.master')

@section('content')
    <section class="heading-banner-area pt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-banner">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Trang chủ</a><span class="breadcome-separator">></span></li>
                                <li>Giỏ hàng</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Heading Banner Area End-->
    <!--Shopping Cart Area Start-->
    <div class="shopping-cart-area mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="shop-form" action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-cart-img">
                                        <span class="nobr">Ảnh mô tả</span>
                                    </th>
                                    <th class="product-name">
                                        <span class="nobr">Tên sản phẩm</span>
                                    </th>
                                    <th class="product-quantity">
                                        <span class="nobr">Số lượng</span>
                                    </th>
                                    <th class="product-price">
                                        <span class="nobr">Đơn giá</span>
                                    </th>
                                    <th class="product-total-price">
                                        <span class="nobr">Thành tiền</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="product-remove">
                                        <a href="#">×</a>
                                    </td>
                                    <td class="product-cart-img">
                                        <a href="#"><img src="images/1.jpg" alt></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">natural typesetting</a>
                                    </td>
                                    <td class="product-quantity">
                                        <select>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </td>
                                    <td class="product-price">
                                        <span><ins>$69.00</ins></span>
                                    </td>
                                    <td class="product-total-price">
                                        <span>$69.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-remove">
                                        <a href="#">×</a>
                                    </td>
                                    <td class="product-cart-img">
                                        <a href="#"><img src="images/2.jpg" alt></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">Natural simply random</a>
                                    </td>
                                    <td class="product-quantity">
                                        <select>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </td>
                                    <td class="product-price">
                                        <span><ins>$69.00</ins></span>
                                    </td>
                                    <td class="product-total-price">
                                        <span>$69.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-remove">
                                        <a href="#">×</a>
                                    </td>
                                    <td class="product-cart-img">
                                        <a href="#"><img src="images/1.jpg" alt></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">Natural simply random</a>
                                    </td>
                                    <td class="product-quantity">
                                        <select>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </td>
                                    <td class="product-price">
                                        <span><ins>$69.00</ins></span>
                                    </td>
                                    <td class="product-total-price">
                                        <span>$69.00</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="shopping-cart-total">
                        <h2>Hóa đơn</h2>
                        <div class="shop-table table-responsive">
                            <table>
                                <tbody>
                                <tr class="order-total">
                                    <td data-title="Tổng tiền"><span><strong>$212.00</strong></span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="proceed-to-checkout">
                            <a class="checkout-button " href="#">Tiếp tục</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
