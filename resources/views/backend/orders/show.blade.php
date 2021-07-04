@extends('backend.layouts.master')

@section('title')
    Chi tiết đơn hàng
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $order->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-envelope"></i> Email</strong>

                        <p class="text-muted">
                            {{ $order->user->email }}
                        </p>

                        <hr>

                        <strong><i class="fas fa-mobile-alt"></i> Số điện thoại</strong>

                        <p class="text-muted">
                            {{ $order->phone }}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ giao hàng</strong>

                        <p class="text-muted">
                            {{ $order->address }}
                        </p>

                        <hr>

                        <strong><i class="far fa-sticky-note mr-1"></i> Lưu ý khi giao hàng</strong>
                        @if(!empty($order->note))
                            <p class="text-muted">
                                {{ $order->note }}
                            </p>
                        @else
                            <p class="text-muted">
                                Không có
                            </p>
                        @endif

                        <hr>

                        <strong><i class="fas fa-clock"></i> Thời gian tạo</strong>

                        <p class="text-muted">
                            {{ $order->created_at }}
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#product"
                                                    data-toggle="tab">Chi tiết đơn hàng</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="product">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <style>
                                            td {
                                                vertical-align: middle !important;
                                            }

                                            .widspan {
                                                width: 90px;
                                                font-size: 14px;
                                                font-weight: normal;
                                                color: white !important;
                                            }
                                        </style>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($order->products as $item)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->pivot->quantity }}</td>
                                                <td>{{ number_format($item->pivot->price, 0, '.', '.') }} ₫</td>
                                                <td>{{ number_format($item->pivot->price * $item->pivot->quantity, 0, '.', '.') }}
                                                    ₫
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <form action="{{ route('backend.order.update', $order->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-8">
                                            <p><b class="text-primary">Tổng thanh toán:</b> <span>{{ number_format($order->total_price, 0, '.', '.') }} ₫</span>
                                            </p>
                                        </div>

                                        @if($order->status !== 3)
                                            <div class="col-3">
                                                <select name="status" class="form-control form-control-sm">
                                                    @foreach(\App\Models\Order::$status_text as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{ ($key == $order->status) ? 'selected' : '' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-sm btn-success w-100">Xử lý</button>
                                            </div>
                                        @else
                                            <div class="col-4">
                                                <p class="text-right text-danger font-weight-bold">Đã hoàn thành</p>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                                {{--                                    <div class="d-flex justify-content-center">{!! $products->appends(request()->input())->links() !!}</div>--}}
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
