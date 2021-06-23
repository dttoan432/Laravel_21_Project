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
                        <h3 class="card-title">Tạo mới sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('backend.product.store') }}" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm </label>
                                <input type="text" class="form-control" id="" name="name" value="{{ old('name') }}"
                                       placeholder="Nhập tên sản phẩm">

                                @error('name')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thương hiệu sản phẩm</label>
                                <select class="form-control select2" name="trademark_id" style="width: 100%;">
                                    @foreach($trademarks as $trademark)
                                        <option value="{{ $trademark->id }}">{{ $trademark->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="text" class="form-control" value="{{ old('quantity') }}" name="quantity"
                                       placeholder="Nhập số lượng sản phẩm">

                                @error('quantity')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá gốc</label>
                                        <input type="text" class="form-control" value="{{ old('origin_price') }}"
                                               name="origin_price" placeholder="Nhập giá gốc">

                                        @error('origin_price')
                                        <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input type="text" class="form-control" value="{{ old('sale_price') }}"
                                               name="sale_price" placeholder="Nhập giá bán">

                                        @error('sale_price')
                                        <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea class="" id="editor_content" name="content"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                @error('content')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="listImg" accept="image/*"
                                               name="image[]" multiple required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                                <style>
                                    .gallery > img {
                                        width: 300px;
                                        margin-right: 20px;
                                    }
                                </style>
                                <div class="gallery d-flex flex-wrap" style="margin-top: 20px;"></div>
                                @error('image[]')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái sản phẩm</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    @foreach(\App\Models\Product::$status_text as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.product.index') }}" class="btn btn-danger">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
        <script>
            function previewImages() {
                var preview = document.querySelector('.gallery');

                if (this.files) {
                    [].forEach.call(this.files, readAndPreview);
                }

                function readAndPreview(file) {
                    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                        return alert(file.name + " is not an image");
                    }

                    var reader = new FileReader();

                    reader.addEventListener("load", function () {
                        var image = new Image();
                        // image.width = 150;
                        // image.height = 150;
                        image.title = file.name;
                        image.src = this.result;

                        preview.appendChild(image);
                    });

                    reader.readAsDataURL(file);

                }
            }

            document.querySelector('#listImg').addEventListener("change", previewImages);
        </script>
    </div>
@endsection
