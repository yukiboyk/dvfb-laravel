@extends('clients.layouts.master')
@section('title') 
<title> Trang Chủ </title>
@endsection
@section('css')
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
         <marquee>
            <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000;font-size: 15px;"><b>Thông báo thử ngiệm sẽ được cài đặt trong admin, Khuyến Mãi 20% giá trị thẻ nạp tù ngày 12/6 đến hết ngày 20/6</b></font>
        </marquee>
    </div>
</div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-xxl-3 col-md-4">
        <div class="card card-animate">
            <div class="card-body bg-soft-success">
                <div class="d-flex mb-3">
                    <div class="flex-grow-1">
                        <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop"
                            colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                        </lord-icon>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="badge badge-soft-danger badge-border">Số Dư Ví</a>
                    </div>
                </div>
                <h3 class="mb-2">$<span class="counter-value" data-target="{{$balance}}">0</span><small
                        class="text-muted fs-13"> coin</small></h3>
                <h6 class="text-muted mb-0">Số Dư Ví</h6>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->

    <div class="col-xxl-3 col-md-4">
        <div class="card card-animate">
            <div class="card-body bg-soft-warning">
                <div class="d-flex mb-3">
                    <div class="flex-grow-1">
                        <lord-icon src="https://cdn.lordicon.com/yeallgsa.json" trigger="loop"
                            colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                        </lord-icon>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="badge badge-soft-danger badge-border">Tổng Nạp</a>
                    </div>
                </div>
                <h3 class="mb-2">$<span class="counter-value" data-target="{{$total_recharge}}">0</span><small
                        class="text-muted fs-13"> coin</small></h3>
                <h6 class="text-muted mb-0">TỔNG NẠP</h6>
            </div>
        </div>
        <!--end card-->
    </div> 
    <!--end col-->
    <div class="col-xxl-3 col-md-4">
        <div class="card card-animate">
            <div class="card-body bg-soft-danger">
                <div class="d-flex mb-3">
                    <div class="flex-grow-1">
                        <lord-icon src="https://cdn.lordicon.com/fhtaantg.json" trigger="loop"
                            colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                        </lord-icon>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="badge badge-soft-danger badge-border">Đơn Hàng</a>
                    </div>
                </div>
                <h3 class="mb-2"><span class="counter-value" data-target="10">0</span><small
                        class="text-muted fs-13"> đơn</small></h3>
                <h6 class="text-muted mb-0">TỔNG ĐƠN HOÀN THÀNH</h6>
            </div>
        </div>
        <!--end card-->
    </div> 
    <!--end col-->
</div>
<!--end row-->

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/crypto-transactions.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
