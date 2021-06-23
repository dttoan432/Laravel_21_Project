@extends('backend.layouts.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mô tả sản phẩm</h3>
                                </div>
                                <div class="card-body">
{{--                                    {!! $product->content !!}--}}
                                    @for($i = 0; $i < count($product->images); $i++)
                                        <img src="{{ $product->images[$i]->image_url }}" alt="" style="width: 200px">
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Chi tiết sản phẩm</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Số lượng</th>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <th>Giá ban đầu</th>
                                        <td>{{ $product->origin_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Giá bán ra</th>
                                        <td>{{ $product->sale_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Giảm giá</th>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <th>Người tạo</th>
                                        <td>{{ $product->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Danh mục</th>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Trạng thái</th>
                                        <td>{{ $product->status_text }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày tạo</th>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cập nhật</th>
                                        <td>{{ $product->updated_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông số kỹ thuật</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <td>1</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <td>Update software</td>
                                    </tr>
                                    <tr>
                                        <th>Số lượng</th>
                                        <td>2111</td>
                                    </tr>
                                    <tr>
                                        <th>Giá ban đầu</th>
                                        <td>150.000</td>
                                    </tr>
                                    <tr>
                                        <th>Giá bán ra</th>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <th>Giảm giá</th>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <th>Người tạo</th>
                                        <td>Update software</td>
                                    </tr>
                                    <tr>
                                        <th>Danh mục</th>
                                        <td>Update software</td>
                                    </tr>
                                    <tr>
                                        <th>Trạng thái</th>
                                        <td>Update software</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày tạo</th>
                                        <td>11-11-2021</td>
                                    </tr>
                                    <tr>
                                        <th>Cập nhật gần nhất</th>
                                        <td>12-09-2021</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
