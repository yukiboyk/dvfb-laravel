@extends('clients.layouts.master')
@section('title') 
<title> Gói Tài Khoản | {{webSetting('name_website')}} </title>
@endsection
@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <div class="text-center mb-4 pb-2">
            <h4 class="fw-semibold fs-22">Cấp Bậc Hiện Tại: {!! Auth::user()->nameRole !!}</h4>
          
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

<div class="row justify-content-center">
    <div class="col-xl-9">
        <div class="row">
            <div class="col-lg-4">
                <div class="card pricing-box">
                    <div class="card-body p-4 m-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="mb-1 fw-semibold">Thành Viên</h5>
                                <p class="text-muted mb-0">Level Member</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary">
                                    <i class="ri-book-mark-line fs-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <h2>0<sup><small>vnđ</small></sup></h2>
                        </div>
                        <hr class="my-4 text-muted">
                        <div>
                            <ul class="list-unstyled text-muted vstack gap-3">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 text-success me-1">
                                            <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <b>Hỗ Trợ</b> 24/7
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 text-danger me-1">
                                            <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <b>KHÔNG CÓ ƯA ĐÃI</b> ở cấp độ này
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="mt-4">
                                <a href="javascript:void(0);"
                                    class="btn btn-soft-success w-100 waves-effect waves-light">Nạp Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            
            <div class="col-lg-4">
                <div class="card pricing-box">
                    <div class="card-body p-4 m-2">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fw-semibold">Cộng Tác Viên</h5>
                                    <p class="text-muted mb-0">Platinum Plan</p>
                                </div>
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary">
                                        <i class="ri-stack-line fs-20"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <h2>1.000.000<sup><small>vnđ</small></sup></h2>
                            </div>
                        </div>
                        <hr class="my-4 text-muted">
                        <div>
                            <ul class="list-unstyled vstack gap-3 text-muted">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 text-success me-1">
                                            <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <b>CÓ ƯA ĐÃI</b> sản phẩm nhất định
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 text-success me-1">
                                            <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <b>HỖ TRỢ MỞ SITE CON</b>
                                        </div>
                                    </div>
                                </li>
                               
                            </ul>
                            <div class="mt-4">
                                <a href="javascript:void(0);"
                                    class="btn btn-soft-success w-100 waves-effect waves-light">Nạp Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="card pricing-box ribbon-box right">
                    <div class="card-body p-4 m-2">
                        <div class="ribbon-two ribbon-two-danger"><span>HOT</span></div>
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fw-semibold">ĐẠI LÝ</h5>
                                    <p class="text-muted mb-0">Đối tác vip</p>
                                </div>
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary">
                                        <i class="ri-medal-line fs-20"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <h2>20.000.000<sup><small>vnđ</small></sup></h2>
                            </div>
                        </div>
                        <hr class="my-4 text-muted">
                        <div>
                            <ul class="list-unstyled vstack gap-3 text-muted">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 text-success me-1">
                                            <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <b>ƯA ĐÃI GIẢM GIÁ TẤT CẢ DỊCH VỤ</b>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 text-success me-1">
                                            <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <b>ĐƯỢC TẠO SITE CON </b>
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                            <div class="mt-4">
                                <a href="javascript:void(0);"
                                    class="btn btn-success w-100 waves-effect waves-light">Nạp Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection
@push('script')
<script src="{{ URL::asset('assets/js/pages/pricing.init.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endpush
