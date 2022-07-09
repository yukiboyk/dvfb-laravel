@extends('clients.layouts.master')
@section('title') 
<title> Trang Cá Nhân | {{webSetting('name_website')}} </title>
@endsection
@section('content')


<div class="row">
    <div class="col-xxl-3">
        
        <!--end card-->
<!-- Danger Alert -->
<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
    <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong> - Label icon arrow  alert
    <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
    </div>
    
    <div class="card ribbon-box border shadow-none overflow-hidden">
        <div class="card-body text-muted">
        <div class="ribbon ribbon-info ribbon-shape trending-ribbon">
        <span class="trending-ribbon-text">Thông Tin Tài Khoản</span> <i class="ri-flashlight-fill text-white align-bottom float-end ms-1"></i>
        </div>
        <p> 
            
                <div class="card-body">
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                <i class="ri-user-follow-line"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" value="{{Auth::user()->username}}" disabled>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-primary">
                                <i class="ri-mail-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-success">
                                <i class="ri-money-dollar-circle-line"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" value="{{Auth::user()->formatBalance}} coin" disabled>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-danger">
                                <i class="ri-add-circle-line"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pinterestName"
                            placeholder="Username" value="{{Auth::user()->created_at}}" disabled>
                    </div>
                    

                </div>
           
        </p>
        </div>
        </div>
    

       
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                            role="tab">
                            <i class="fas fa-home"></i>
                            Nhật Kí Hoạt Động
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i>
                            Đổi Mật Khẩu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab">
                            <i class="far fa-envelope"></i>
                            Bảo Mật
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <div class="col-lg-12">
                                    <div class="card-body" style="">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100% ;text-align: center">
                                            <thead>
                                                <tr>
                                                    <th data-ordering="false">ID</th>
                                                    <th data-ordering="false">Trạng Thái</th>
                                                    <th data-ordering="false">IP log</th>
                                                    <th data-ordering="false">Thời Gian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($checkLogs as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->content}}</td>
                                                    <td>{{$item->ip}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           
                            <!--end col-->
                       
                    </div>

                   <div class="tab-pane" id="changePassword" role="tabpanel">
                    <div id="save_msgList" role="alert">

                    </div>
                        <form action="{{route('changePassword')}}" method="POST" id="ajaxSubmitForm">
                            @csrf
                            <div class="row g-2">
                                <div class="col-lg-4">
                                    <div>
                                        <label for="oldpasswordInput" class="form-label">Mật Khẩu Cũ*</label>
                                        <input type="password" class="form-control" name="oldpassword"
                                            id="oldpasswordInput"
                                            placeholder="Nhập Mật Khẩu Cũ">
                                    </div>
                                </div>
                               
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="newpasswordInput" class="form-label">Mật Khẩu Mới*</label>
                                        <input type="password" class="form-control" name="newpassword"
                                            id="newpasswordInput" placeholder="Nhập mật khẩu mới">
                                    </div>    
                                </div>
                               
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="confirmpasswordInput" class="form-label">Nhập Lại Mật Khẩu*</label>
                                        <input type="password" class="form-control" name="cnewpassword"
                                            id="confirmpasswordInput"
                                            placeholder="Nhập Lại Mật khẩu mới">
                                    </div>
                                 
                                </div>
                               
                                <!--end col-->
                                
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button class="btn btn-primary mr-1 mb-2 mt-4" type="submit" id="btnsubmit"> XÁC NHẬN </button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                        
                    </div>
                    <!--end tab-pane-->
        
                    <div class="tab-pane" id="privacy" role="tabpanel">
                        <div class="mb-4 pb-2">
                            <h5 class="card-title text-decoration-underline mb-3">Security:</h5>
                            <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0">
                                <div class="flex-grow-1">
                                    <h6 class="fs-14 mb-1">Two-factor Authentication</h6>
                                    <p class="text-muted">Two-factor authentication is an enhanced
                                        security meansur. Once enabled, you'll be required to give
                                        two types of identification when you log into Google
                                        Authentication and SMS are Supported.</p>
                                </div>
                                <div class="flex-shrink-0 ms-sm-3">
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm btn-primary">Enable Two-facor
                                        Authentication</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
@push('script')

    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>

@endpush
