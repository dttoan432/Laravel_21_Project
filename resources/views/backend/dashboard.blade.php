@extends('backend.layouts.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count($countProducts) }}</h3>

                        <p>Sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('backend.product.index') }}" class="small-box-footer">Xem thêm <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count($users) }}</h3>

                        <p>Người dùng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65,000,000 </h3>

                        <p>Doanh thu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm mới nhập</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá nhập</th>
                                <th>Giá bán</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($products as $product)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ number_format($product->origin_price) }}</td>
                                    <td>{{ number_format($product->sale_price) }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->status_text }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div style="margin: 0px auto; margin-top: 30px;">{!!$products->links()!!}</div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            var i = 0;
            $("#tes").click(function () {
                i++;
                $("#cole1").append(function (){
                    return '<input type="text" class="form-control" id="" name="key[]" value="{{ old('name') }}">';
                });
                $("#cole2").append(function (){
                    return '<input type="text" class="form-control" id="" name="val[]" value="{{ old('name') }}">';
                });
            });
        });
    </script>
    <form action="{{ route('backend.option') }}" method="POST" id="boxform">
        @csrf
        <div class="row" id="clone">
            <div class="col-4" id="cole1">
                <div class="form-group">
                    <input type="text" class="form-control" id="" name="key[]" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-8" id="cole2">
                <div class="form-group">
                    <input type="text" class="form-control" id="" name="val[]" value="{{ old('name') }}">
                </div>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Add</button>
    </form>
    <button id="tes">Click</button>


@endsection
