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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết danh mục</h3>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 30%;">Tên danh mục</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Danh mục cha</th>
                                <td>{{ $category->parent_id }}</td>
                            </tr>
                            <tr>
                                <th>Ngày tạo</th>
                                <td>{{ $category->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Cập nhật</th>
                                <td>{{ $category->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection
