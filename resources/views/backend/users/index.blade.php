@extends('backend.layouts.master')

@section('title')
    Danh sách người dùng
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
                        <h3 class="card-title">Danh sách người dùng</h3>
                        <div class="card-tools">
                            <form action="{{ route('backend.user.index') }}" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px; margin-top: 0;">
                                    <input type="text" name="q" class="form-control float-right"
                                           placeholder="Tìm kiếm" value="{{ $keyU }}">

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
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Quyền hạn</th>
                                <th></th>
                            </tr>
                            </thead>
                            @php
                                $i = 0;
                            @endphp
                            <tbody>
                            @foreach($users as $user)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role_text }}</td>
                                    <td class="project-actions text-right">
                                        @can('view', $user)
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('backend.user.show', $user->id) }}">
                                                <i class="fas fa-street-view"></i> Xem
                                            </a>
                                        @endcan
                                        @can('update', $user)
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('backend.user.edit', $user->id) }}">
                                                <i class="fas fa-user-edit"></i> Sửa
                                            </a>
                                        @endcan
                                        @can('delete', $user)
                                            <form action="{{ route('backend.user.destroy', $user->id) }}"
                                                  method="POST"
                                                  style="display: inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger btn-sm delete-confirm" {{ ($user->role == \App\Models\User::ROLE_MANAGE) ? 'disabled' : '' }}>
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
                    <div style="margin: 0 auto; margin-top: 20px;">{!! $users->links() !!}</div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').click(function (event) {
            var form = $(this).closest("form");
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

    <style>
        .table>:not(:last-child)>:last-child>*{
            border-bottom-color: #dee2e6;
        }
    </style>
@endsection
