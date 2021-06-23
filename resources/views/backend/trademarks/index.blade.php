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
                        <h3 class="card-title">Thương hiệu</h3>

                        {{--                        <div class="card-tools">--}}
                        {{--                            <div class="input-group input-group-sm" style="width: 150px;">--}}
                        {{--                                <input type="text" name="table_search" class="form-control float-right"--}}
                        {{--                                       placeholder="Search">--}}

                        {{--                                <div class="input-group-append">--}}
                        {{--                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên thương hiệu</th>
                                <th>Người tạo</th>
                                <th>Thời gian tạo</th>
                                <th>Thời gian cập nhật</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($trademarks as $trademark)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $trademark->name}}</td>
                                    <td>{{ $trademark->user->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($trademark->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($trademark->updated_at)) }}</td>
                                    <td class="project-actions text-right">
                                        @can('update', $trademark)
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('backend.trademark.edit', $trademark->id) }}">
                                                <i class="fas fa-user-edit"></i> Sửa
                                            </a>
                                        @endcan
                                        @can('delete', $trademark)
                                            <form action="{{ route('backend.trademark.destroy', $trademark->id) }}"
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
                    <div style="margin: 0 auto; margin-top: 20px;">{!! $trademarks->links() !!}</div>
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
