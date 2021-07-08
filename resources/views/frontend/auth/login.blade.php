@extends('frontend.layouts.master')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <section class="heading-banner-area pt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-banner">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Trang chủ</a><span class="breadcome-separator">></span></li>
                                <li>Đăng nhập</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-account-area mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="customer-login-register">
                        <div class="login-form">
                            <form action="{{ route('login.store') }}" method="post">
                                @csrf
                                <div class="form-fild">
                                    <p><label>Email <span class="required">*</span></label></p>
                                    <input type="text" name="email" value>

                                    @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-fild">
                                    <p><label>Mật khẩu <span class="required">*</span></label></p>
                                    <input type="password" name="password" value>

                                    @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="login-submit">
                                    <button type="submit" class="form-button">Đăng nhập</button>
                                    @error('login')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="lost-password">
                                    <a href="#">Quên mật khẩu?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3"></div>
            </div>
        </div>
    </section>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
