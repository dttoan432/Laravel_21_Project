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
                                @foreach($items as $item)
                                    <tr>
                                        <td class="product-remove">
                                            <a href="{{ route('frontend.cart.remove', $item->rowId) }}">×</a>
                                        </td>
                                        <td class="product-cart-img">
                                            <a href="{{ route('frontend.product.show', $item->options->slug) }}"><img
                                                    src="{{ $item->options->image }}" style="width: 150px;" alt></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('frontend.product.show', $item->options->slug) }}">{{ $item->name }}</a>
                                        </td>
                                        <td class="product-quantity">
                                            <input class="input-text" value="{{ $item->qty }}" type="number" min="1" onchange="updateCart(this.value, '{{ $item->rowId }}')" style="width: 50px;">
                                        </td>
                                        <td class="product-price">
                                            <span><ins>{{ number_format($item->price, 0, '.', '.') }} ₫</ins></span>
                                        </td>
                                        <td class="product-total-price">
                                            <span>{{ number_format($item->qty * $item->price, 0, '.', '.') }} ₫</span>
                                        </td>
                                    </tr>
                                @endforeach
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
                    @if(\Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
                        <a class="checkout-button " href="{{ route('frontend.cart.destroy') }}">Xóa toàn bộ</a>
                    @endif
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="shopping-cart-total">
                        <h2>Hóa đơn</h2>
                        <div class="shop-table table-responsive">
                            <table>
                                <tbody>
                                <tr class="order-total">
                                    <td data-title="Tổng tiền"><span><strong>{{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::total(), 0, '.', '.') }} ₫</strong></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="proceed-to-checkout">
                            @if(\Illuminate\Support\Facades\Auth::check() && \Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
                                <a href="{{ route('frontend.checkout') }}" class="checkout-button">Tiếp tục</a>
                            @elseif(\Illuminate\Support\Facades\Auth::check())
                                <p class="text-danger">Chưa có sản phẩm</p>
                            @else
                                <a href="{{ route('login.form') }}" class="checkout-button" id="conti">Đăng nhập</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateCart(qty, rowId){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ route('frontend.cart.update') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {qty: qty, rowId: rowId, _token: _token},
                success: function (data) {
                    location.reload();
                }
            });
        }
    </script>
@endsection
