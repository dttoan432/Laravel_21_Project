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
                                <li>Thanh toán</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Heading Banner Area End-->
    <!--Checkout Area Start-->
    <div class="checkout-area mt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-form-area">
                        <div class="checkout-title">
                            <h3>Thông tin khách hàng</h3>
                        </div>
                        <div class="ceckout-form">
                            <form action="#">
                                <!--Billing Fields Start-->
                                <div class="billing-fields">
                                    <div class="form-fild company-name">
                                        <p><label>Họ tên <span class="required">*</span></label></p>
                                        <input type="text" placeholder name="name" value disabled>
                                    </div>
                                    <div class="form-fild billing_address_1">
                                        <p><label>Số điện thoại <span class="required">*</span></label></p>
                                        <input type="text" name="billing_company_name" value disabled>
                                    </div>
                                    <div class="form-fild billing_postcode">
                                        <p><label>Địa chỉ <span class="required">*</span></label></p>
                                        <input type="text" placeholder name="billing_company_name" value disabled>
                                    </div>
                                </div>

                                <div class="your-order-fields mt-30">
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <tbody>
                                            <tr class="order-total">
                                                <th>Tổng tiền</th>
                                                <td><strong><span class="total-amount">$207.00</span></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--Your Order Fields End-->
                                <div class="checkout-payment">
                                    <ul>
                                        <li class="payment_method_cheque-li">
                                            <input id="payment_method_cheque" class="input-radio" name="payment_method" checked="checked" value="bacs" type="radio">
                                            <label for="payment_method_cheque">Thanh toán khi nhận hàng</label>
                                        </li>
                                    </ul>
                                    <button class="order-btn" type="submit">Đặt hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Checkout Area End-->
            </div>
        </div>
    </div>
@endsection
