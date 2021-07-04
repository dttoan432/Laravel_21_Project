@extends('backend.layouts.master')

@section('title')
    Danh sách đơn hàng
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Đơn hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Tổng đơn hàng</th>
                                <th>Thời gian tạo</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            </thead>
                            <style>
                                .widspan {
                                    padding: .25em 10px;
                                    font-size: 14px;
                                }
                            </style>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($orders as $order)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ number_format($order->total_price, 0, '.', '.') }} ₫</td>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        @if($order->status == 0)
                                            <td><span class="badge badge-pill bg-danger widspan font-weight-normal">{{ $order->status_text }}</span></td>
                                        @elseif($order->status == 1)
                                            <td><span class="badge badge-pill bg-warning widspan font-weight-normal">{{ $order->status_text }}</span></td>
                                        @elseif($order->status == 2)
                                            <td><span class="badge badge-pill bg-info widspan font-weight-normal">{{ $order->status_text }}</span></td>
                                        @else
                                            <td><span class="badge badge-pill bg-success widspan font-weight-normal">{{ $order->status_text }}</span></td>
                                        @endif
                                        <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('backend.order.show', $order->id) }}">
                                                    <i class="fas fa-eye"></i> Chi tiết
                                                </a>
                                                <form action="{{ route('backend.order.destroy', $order->id) }}"
                                                      method="POST" style="display: inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm delete-confirm">
                                                        <i class="fas fa-eraser"></i> Xóa
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="margin: 0 auto; margin-top: 20px;">{!! $orders->links() !!}</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if(Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
    @elseif(Session::has('error'))
        <script>
            toastr.error("{!! Session::get('error') !!}");
        </script>
    @endif
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Bạn có muốn xóa không?`,
                text: "Nếu bạn xóa nó, bạn sẽ không thể khôi phục lại được",
                icon: "error",
                buttons: ["Không", "Xóa"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection

@section('script-bot')
    <style>
        .widspan {
            padding: .25em 10px;
            font-size: 14px;
        }
    </style>
@endsection
