@extends('backend.layouts.master')

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
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm mới</h3>

                        <div class="card-tools" style="display: flex">
                            <form action="{{ route('backend.product.filter') }}" method="GET" class="d-flex">
                                <button type="submit" class="btn btn-sm btn-primary" style="margin-right: 10px;">Lọc</button>
                                <select class="form-select form-select-sm" aria-label="Default select example" name="trademark" style="margin-right: 10px;">
                                    <option selected value="-1">Chọn thương hiệu</option>
                                    @foreach($trademarks as $trademark)
                                        <option value="{{ $trademark->id }}">{{ $trademark->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-select form-select-sm" aria-label="Default select example" name="category" style="margin-right: 10px;">
                                    <option selected value="-1">Chọn danh mục</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-select form-select-sm" aria-label="Default select example" name="status" style="margin-right: 10px;">
                                    <option selected value="-1">Chọn trạng thái</option>
                                    @foreach(\App\Models\Product::$status_text as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </form>
                            <form action="{{ route('backend.product.search') }}" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px; margin-top: 0;">
                                    <input type="text" name="key_search" class="form-control float-right"
                                           placeholder="Tìm kiếm" value="{{ old('key_search') }}">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Thương hiệu</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th></th>
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
                                }
                            </style>
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
                                    <td>{{ $product->trademark->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        @if($product->status == 0)
                                            <span
                                                class="badge badge-pill bg-warning widspan">{{ $product->status_text }}</span>
                                        @elseif($product->status == 1)
                                            <span
                                                class="badge badge-pill bg-success widspan">{{ $product->status_text }}</span>
                                        @else
                                            <span
                                                class="badge badge-pill bg-danger widspan">{{ $product->status_text }}</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                           href="{{ route('frontend.product.show', $product->id) }}">
                                            <i class="fas fa-street-view"></i> Xem
                                        </a>
                                        @can('update', $product)
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('backend.product.edit', $product->id) }}">
                                                <i class="fas fa-user-edit"></i> Sửa
                                            </a>
                                        @endcan
                                        @can('delete', $product)
                                            <form action="{{ route('backend.product.destroy', $product->id) }}"
                                                  method="POST" style="display: inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-eraser"></i> Xóa
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div style="margin: 0 auto;">{!! $products->appends(request()->input())->links() !!}</div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
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
@endsection
