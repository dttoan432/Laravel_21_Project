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
                        <h3 class="card-title">Thay đổi danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('backend.category.update', $category->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="" name="name" value="{{ $category->name }}">
                            </div>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control select2" name="parent_id" style="width: 100%;">
                                    <option value="0">--Chọn danh mục---</option>
                                    @foreach($categories as $cate)
                                        <option value="{{$cate->id}}"
                                        @if($cate->id == $category->parent_id)
                                            {{ 'selected' }}
                                            @endif
                                        >{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Thương hiệu liên quan</label>
                                @for ($j = 0; $j < count($trademarks); $j++)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="trademark_id[]"
                                               value="{{ $trademarks[$j]->id }}" id="flexSwitchCheckChecked"
                                               style="margin-left: -1.25rem;"

                                        @for ($i = 0; $i < count($category->trademarks); $i++)
                                            @if ($category->trademarks[$i]->id == $trademarks[$j]->id)
                                                {{ 'checked' }}
                                                @endif
                                            @endfor

                                        >
                                        <label class="form-check-label" for="flexSwitchCheckChecked"
                                               style="margin-left: 1.25rem;">{{ $trademarks[$j]->name }}</label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-success">Thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection
