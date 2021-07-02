<header>
    <div class="header-container">
        <!--Header Top Area Start-->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <!--Header Top Left Area Start-->
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="header-top-menu">
                            <ul>
                                <li class="support"><span>Thời gian làm việc: 08:00 - 19:00</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--Header Top Left Area End-->
                    <!--Header Top Right Area Start-->
                    <div class="col-lg-8 col-md-8 d-lg-block d-md-block d-none text-right">
                        <div class="header-top-menu">
                            <ul>
                                <li class="support"><span>Hỗ trợ: (012) 800 456 789</span></li>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    @if(\Illuminate\Support\Facades\Auth::user()->role == 0 || \Illuminate\Support\Facades\Auth::user()->role == 1)
                                        <li class="account"><a
                                                href="#">{{ \Illuminate\Support\Facades\Auth::user()->name }} <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="ht-dropdown">
                                                <li><a href="{{ route('backend.dashboard') }}">Quản lý</a></li>
                                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="account"><a
                                                href="#">{{ \Illuminate\Support\Facades\Auth::user()->name }} <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="ht-dropdown">
                                                <li><a href="{{ route('frontend.account') }}">Tài khoản</a></li>
                                                <li><a href="{{ route('frontend.order') }}">Đơn hàng</a></li>
                                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    @endif

                                @else
                                    <li class="account"><a href="#">Tài khoản <i class="fa fa-angle-down"></i></a>
                                        <ul class="ht-dropdown">
                                            <li><a href="{{ route('login.form') }}">Đăng nhập</a></li>
                                            <li><a href="{{ route('register.form') }}">Đăng ký</a></li>
                                        </ul>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <!--Header Top Right Area End-->
                </div>
            </div>
        </div>
        <!--Header Top Area End-->
        <!--Header Middel Area Start-->
        <div class="header-middel-area">
            <div class="container">
                <div class="row">
                    <!--Logo Start-->
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="logo">
                            <a href="{{ route('frontend.index') }}"><img src="/frontend/images/logo.png" alt></a>
                        </div>
                    </div>
                    <!--Logo End-->
                    <!--Search Box Start-->
                    <div class="col-lg-6 col-md-5 col-12">
                        <div class="search-box-area">
                            <form action="{{ route('frontend.product.search') }}" method="GET" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="select-area">
                                    <select data-placeholder="Choose a Country..." class="select" tabindex="1" disabled style="cursor: unset;">
                                        <option value>Javenist</option>
                                    </select>
                                </div>
                                <div class="search-box">
                                    <input type="text" name="keyword" id="keywords" placeholder="Tìm kiếm sản phẩm">
                                    <div id="search-ajax"></div>
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Search Box End-->
                    <!--Mini Cart Start-->
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="mini-cart-area">
                            <ul>
                                <li><a href="{{ route('frontend.cart.index') }}"><i class="ion-android-cart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Mini Cart End-->
                </div>
            </div>
        </div>
        <!--Header Middel Area End-->
        <!--Header bottom Area Start-->
        <div class="header-bottom-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Logo Sticky Start-->
                        <div class="logo-sticky">
                            <a href="index.html"><img src="frontend/images/logo.png" alt=""></a>
                        </div>
                        <!--Logo Sticky End-->
                        <!--Main Menu Area Start-->
                        <div class="main-menu-area">
                            <nav>
                                <ul class="main-menu">
                                    <li class="active"><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                                    @if($menus)
                                        @foreach($menus as $menu)
                                            @include('frontend.includes.children-menus', ['menu' => $menu])
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!--Main Menu Area End-->
                    </div>
                </div>
            </div>
        </div>
        <!--Header bottom Area End-->
        <!--Mobile Menu Area Start-->
        <div class="mobile-menu-area d-lg-none d-md-none d-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                                    <li><a href="{{ route('frontend.category', 1) }}">Điện thoại</a></li>
                                    <li><a href="{{ route('frontend.category', 2) }}">Laptop</a></li>
                                    <li><a href="{{ route('frontend.category', 3) }}">Tablet</a></li>
                                    <li><a href="#">Phụ kiện</a>
                                        <ul>
                                            <li><a href="#">pages</a>
                                                <ul>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="services.html">Services</a></li>
                                                    <li><a href="frequently-questions.html">Frequently Questions</a>
                                                    </li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">blog</a>
                                                <ul>
                                                    <li><a href="blog-nosidebar.html">None Sidebar</a></li>
                                                    <li><a href="blog-left-sidebar.html">Sidebar Left</a></li>
                                                    <li><a href="blog-post-gallery.html">Gallery Format</a></li>
                                                    <li><a href="blog-post-audio.html">Audio Format</a></li>
                                                    <li><a href="blog-post-video.html">Video Format</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">shop</a>
                                                <ul>
                                                    <li><a href="shop-full-width.html">Full Width</a></li>
                                                    <li><a href="shop-right-sidebar.html">Sidebar Right</a></li>
                                                    <li><a href="shop-list-view.html">List View</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('frontend.category', 5) }}">Đồng hồ thông minh</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Mobile Menu Area End-->
    </div>

    <style>
        .main-menu > li > a {
            text-transform: none;
            font-size: 14px;
        }

        .mega-menu {
            width: 200px;
            padding: 0;
        }

        .mega-menu > li {
            width: unset;
            padding: 15px;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $('#keywords').keyup(function (){
            var query = $(this).val();
            if (query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/autocomplete-ajax') }}",
                    method: "POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#search-ajax').fadeIn();
                        $('#search-ajax').html(data);
                    }
                });
            } else {
                $('#search-ajax').fadeOut();
            }
        });
        $(document).on('click', 'li_search_ajax', function (){
            $('#keywords').val($(this).text());
            $('#search-ajax').fadeOut();
        });
    </script>
</header>
