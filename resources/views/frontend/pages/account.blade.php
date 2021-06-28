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
                    <div class="account_info" style="margin-bottom: 30px;">
                        <form>
                            <h2>Thông tin cá nhân</h2>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ tên</label>
                                <input type="text" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1">
                            </div>
                            <button type="submit" class="btn btn-primary" style="border-radius: 5px">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
