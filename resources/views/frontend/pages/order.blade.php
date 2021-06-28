@extends('frontend.layouts.master')

@section('content')
    <div class="account">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-12 account_left">
                    <div class="text_left">
                        <img style="width: 35px" src="images/user.png" alt="">&ensp;
                        <span>Tài khoản của</span>
                        <div>
                            <div style="padding: 15px 0;">
                                <img style="width: 25px" src="images/user1.png" alt="">&ensp;&ensp;
                                <span><a href="">Thông tin tài khoản</a></span>
                            </div>
                            <div>
                                <img style="width: 25px" src="images/note.png" alt="">&ensp;&ensp;
                                <span><a href="">Quản lý đơn hàng</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-md-8 col-12 account_right">
                    <div class="account_listOrder">
                        <h2>Đơn hàng của bạn</h2>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Mã ĐH</th>
                                    <th style="vertical-align: top;">Tổng tiền</th>
                                    <th>Thông tin</th>
                                    <th>Tình trạng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2</td>
                                    <td>12.000.000</td>
                                    <td>
                                        <a href="#">Chi tiết</a>
                                    </td>
                                    <td>
                                        <p class="textt">Đang xử lý</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
