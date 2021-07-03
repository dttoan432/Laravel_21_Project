@extends('backend.layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('script_top')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê doanh thu</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{--                            <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
                            {{--                                <i class="fas fa-times"></i>--}}
                            {{--                            </button>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-2">
                                    <label for="">Từ ngày</label>
                                    <input type="text" id="datepicker" class="form-control form-control-sm">
                                    </p>
                                </div>
                                <div class="col-2">
                                    <label for="">Đến ngày</label>
                                    <input type="text" id="datepicker2" class="form-control form-control-sm">

                                </div>
                                <div class="col-1">
                                    <label for="">&nbsp;</label>
                                    <button type="button" id="btn-dashboard-filter"
                                            class="btn btn-sm btn-success d-block">
                                        Lọc
                                        kết
                                        quả
                                    </button>
                                </div>
                                <div class="col-2">
                                    <label for="">Lọc theo</label>
                                    <select class="form-control form-control-sm filter-option">
                                        <option value="this_week">Tuần này</option>
                                        <option value="last_week">Tuần trước</option>
                                        <option value="this_month" selected>Tháng này</option>
                                        <option value="last_month">Tháng trước</option>
                                        <option value="this_year">Năm nay</option>
                                    </select>
                                </div>
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    <label for="">Doanh thu</label>
                                    <p id="revenue"></p>
                                </div>
                                <div class="col-2">
                                    <label for="">Lợi nhuận</label>
                                    <p id="profit"></p>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <div id="chart" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{--                            <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
                            {{--                                <i class="fas fa-times"></i>--}}
                            {{--                            </button>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div id="donut" class="morris-donut-inverse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_bot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({
                prevText: 'Tháng trước',
                nextText: 'Tháng sau',
                dateFormat: 'yy-mm-dd',
                dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
                duration: 'slow'
            });
            $("#datepicker2").datepicker({
                prevText: 'Tháng trước',
                nextText: 'Tháng sau',
                dateFormat: 'yy-mm-dd',
                dayNamesMin: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
                duration: 'slow'
            });
        });

        $(document).ready(function () {
            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0
            })

            //Thống kê doanh thu
            var chart = new Morris.Area({
                element: 'chart',
                lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                pointFillColors: ['#ffffff'],
                pointStrokeColors: ['black'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                parseTime: false,
                resize: true,
                xkey: 'period',
                ykeys: ['order', 'revenue', 'profit', 'quantity'],
                behaveLikeLine: true,
                labels: ['đơn hàng', 'doanh thu', 'lợi nhuận', 'sản phẩm'],
            });

            $('#btn-dashboard-filter').click(function () {
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                $.ajax({
                    url: '{{ route('backend.statistic.day') }}',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {from_date: from_date, to_date: to_date, _token: _token},
                    success: function (data) {
                        chart.setData(data);
                        var revenue = 0;
                        var profit = 0;
                        for (var i = 0; i < data.length; i++) {
                            revenue += data[i]['revenue'];
                            profit += data[i]['profit'];
                        }
                        ;

                        $('#revenue').empty();
                        $('#revenue').append(formatter.format(revenue));

                        $('#profit').empty();
                        $('#profit').append(formatter.format(profit));
                    },
                    error: function () {
                        swal("Không có dữ liệu");
                    }
                });
            });

            filter30day();

            function filter30day() {
                var filter_value = 'this_month';
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('backend.statistic.option') }}',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {filter_value: filter_value, _token: _token},
                    success: function (data) {
                        chart.setData(data);
                        var revenue = 0;
                        var profit = 0;
                        for (var i = 0; i < data.length; i++) {
                            revenue += data[i]['revenue'];
                            profit += data[i]['profit'];
                        };

                        $('#revenue').empty();
                        $('#revenue').append(formatter.format(revenue));

                        $('#profit').empty();
                        $('#profit').append(formatter.format(profit));
                    },
                    error: function () {
                        swal("Không có dữ liệu");
                    }
                });
            }

            $('.filter-option').change(function () {
                var filter_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('backend.statistic.option') }}',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {filter_value: filter_value, _token: _token},
                    success: function (data) {
                        chart.setData(data);
                        var revenue = 0;
                        var profit = 0;
                        for (var i = 0; i < data.length; i++) {
                            revenue += data[i]['revenue'];
                            profit += data[i]['profit'];
                        }
                        ;

                        $('#revenue').empty();
                        $('#revenue').append(formatter.format(revenue));

                        $('#profit').empty();
                        $('#profit').append(formatter.format(profit));
                    },
                    error: function () {
                        swal("Không có dữ liệu");
                    }
                });
            });


            //Thống kê sản phẩm
            var colorDanger = "#FF1744";
            Morris.Donut({
                element: 'donut',
                resize: true,
                // gridTextFamily: 'sans-serif',
                colors: [
                    '#E0F7FA',
                    '#B2EBF2',
                    '#80DEEA',
                    '#4DD0E1',
                    '#26C6DA',
                    '#00BCD4',
                    '#00ACC1',
                    '#0097A7',
                    '#00838F',
                    '#006064'
                ],
                //labelColor:"#cccccc", // text color
                //backgroundColor: '#333333', // border color
                data: [
                    {label: "Don hang", value: {{ $orders }}, color: colorDanger},
                    {label: "San pham", value: {{ $products }} },
                    {label: "Nguoi dung", value: {{ $users }} },
                    {{--{label: "Danh muc", value: {{ $categories }} },--}}
                    {{--{label: "Thuong hieu", value: {{ $trademarks }}}--}}
                ]
            });

        });
    </script>
@endsection
