@extends('backend.layouts.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bell"></i>
                            Chi tiết
                        </h3>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Launch Default Modal
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                            Launch Primary Modal
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                            Launch Secondary Modal
                        </button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                            Launch Info Modal
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                            Launch Danger Modal
                        </button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                            Launch Warning Modal
                        </button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                            Launch Success Modal
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
                            Launch Small Modal
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                            Launch Large Modal
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                            Launch Extra Large Modal
                        </button>
                        <br>
                        <br>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-overlay">
                            Launch Modal with Overlay
                        </button>
                        <div class="text-muted mt-3">
                            Instructions for how to use modals are available on the
                            <a href="https://getbootstrap.com/docs/4.4/components/modal/">Bootstrap documentation</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div>
@endsection
