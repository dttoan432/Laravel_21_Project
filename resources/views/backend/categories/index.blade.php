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
                        <h3 class="card-title">Danh mục</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Danh mục cha</th>
                                <th>Thương hiệu liên quan</th>
{{--                                <th>Thời gian tạo</th>--}}
{{--                                <th>Thời gian cập nhật</th>--}}
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
                            @foreach($categories as $category)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $category->name }}</td>
                                    @if($category->parent_id == 0)
                                        <td><span class="badge badge-pill bg-success widspan font-weight-normal">Danh mục cha</span></td>
                                    @else
                                        @foreach($parents as $parent)
                                            @if($category->parent_id == $parent->id)
                                                <td><span class="badge badge-pill bg-warning widspan font-weight-normal">{{ $parent->name }}</span></td>
                                            @endif
                                        @endforeach
                                    @endif
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Danh sách
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    @foreach($category->trademarks as $trademark)
                                                        <li><span class="dropdown-item" href="#">{{ $trademark->name }}</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
{{--                                    <td>{{ date('d-m-Y', strtotime($category->created_at)) }}</td>--}}
{{--                                    <td>{{ date('d-m-Y', strtotime($category->updated_at)) }}</td>--}}
                                    <td class="project-actions text-right">
                                        @can('update', $category)
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('backend.category.edit', $category->id) }}">
                                                <i class="fas fa-user-edit"></i> Sửa
                                            </a>
                                        @endcan
                                        @can('delete', $category)
                                            <form action="{{ route('backend.category.destroy', $category->id) }}"
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
                    <div style="margin: 0 auto; margin-top: 20px;">{!! $categories->links() !!}</div>
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
