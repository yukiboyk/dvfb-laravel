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
                    <div class="d-flex">
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
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th data-ordering="false">ID</th>
                                                <th data-ordering="false">Trạng Thái</th>
                                                <th data-ordering="false">IP log</th>
                                                <th data-ordering="false">Thời Gian</th>
                                                <th data-ordering="false">Thiết Bị</th>
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
                                                <td>{{$item->device}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                </div>
                            
                    </div>
                   <div class="tab-pane" id="changePassword" role="tabpanel">
                    <div id="save_msgList" role="alert">

                    </div>
                        <form action="{{route('changePassword')}}" method="POST" id="changePasswordForm">
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
                            <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                <div class="flex-grow-1">
                                    <h6 class="fs-14 mb-1">Secondary Verification</h6>
                                    <p class="text-muted">The first factor is a password and the
                                        second commonly includes a text with a code sent to your
                                        smartphone, or biometrics using your fingerprint, face, or
                                        retina.</p>
                                </div>
                                <div class="flex-shrink-0 ms-sm-3">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Set
                                        up secondary method</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                <div class="flex-grow-1">
                                    <h6 class="fs-14 mb-1">Backup Codes</h6>
                                    <p class="text-muted mb-sm-0">A backup code is automatically
                                        generated for you when you turn on two-factor authentication
                                        through your iOS or Android Twitter app. You can also
                                        generate a backup code on twitter.com.</p>
                                </div>
                                <div class="flex-shrink-0 ms-sm-3">
                                    <a href="javascript:void(0);"
                                        class="btn btn-sm btn-primary">Generate backup codes</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="card-title text-decoration-underline mb-3">Application
                                Notifications:</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex">
                                    <div class="flex-grow-1">
                                        <label for="directMessage"
                                            class="form-check-label fs-14">Direct messages</label>
                                        <p class="text-muted">Messages from people you follow</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                role="switch" id="directMessage" checked />
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-14"
                                            for="desktopNotification">
                                            Show desktop notifications
                                        </label>
                                        <p class="text-muted">Choose the option you want as your
                                            default setting. Block a site: Next to "Not allowed to
                                            send notifications," click Add.</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                role="switch" id="desktopNotification" checked />
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-14"
                                            for="emailNotification">
                                            Show email notifications
                                        </label>
                                        <p class="text-muted"> Under Settings, choose Notifications.
                                            Under Select an account, choose the account to enable
                                            notifications for. </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                role="switch" id="emailNotification" />
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-14"
                                            for="chatNotification">
                                            Show chat notifications
                                        </label>
                                        <p class="text-muted">To prevent duplicate mobile
                                            notifications from the Gmail and Chat apps, in settings,
                                            turn off Chat notifications.</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                role="switch" id="chatNotification" />
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mt-2">
                                    <div class="flex-grow-1">
                                        <label class="form-check-label fs-14"
                                            for="purchaesNotification">
                                            Show purchase notifications
                                        </label>
                                        <p class="text-muted">Get real-time purchase alerts to
                                            protect yourself from fraudulent charges.</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                role="switch" id="purchaesNotification" />
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="card-title text-decoration-underline mb-3">Delete This
                                Account:</h5>
                            <p class="text-muted">Go to the Data & Privacy section of your profile
                                Account. Scroll to "Your data & privacy options." Delete your
                                Profile Account. Follow the instructions to delete your account :
                            </p>
                            <div>
                                <input type="password" class="form-control" id="passwordInput"
                                    placeholder="Enter your password" value="make@321654987"
                                    style="max-width: 265px;">
                            </div>
                            <div class="hstack gap-2 mt-3">
                                <a href="javascript:void(0);" class="btn btn-soft-danger">Close &
                                    Delete This Account</a>
                                <a href="javascript:void(0);" class="btn btn-light">Cancel</a>
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

    <script>         
        $.ajaxSetup({
          headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                     }
                    });
                  
    /* UPDATE ADMIN PERSONAL INFO */
    $('#changePasswordForm').on('submit', function(e){
         e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data: new FormData(this),
            processData:false,
            dataType:'JSON',
            contentType:false,
            beforeSend:function(){
              $('#btnsubmit').attr('disabled', 'disabled').html('Loadding...')
            //   $(document).find('span.error-text').text('');
              $('#save_msgList').html("");
              $('#save_msgList').removeClass('alert alert-danger');
            },
            complete: function(){
          $('#btnsubmit').removeAttr('disabled').html('XÁC NHẬN')
            },
            success:function(data){
            if(data.status == 'fails'){
              $.each(data.message, function(prefix, val){
                $('#save_msgList').addClass('alert alert-danger');
                $('#save_msgList').append('<li>' + val + '</li>');
                // $('span.'+prefix+'_error').text(val[0]);
              });
            }else{
              $('#changePasswordForm')[0].reset();
              $('#save_msgList').addClass('alert alert-success');
              $('#save_msgList').html(data.message);
              }
            }
         });
    });

</script>
@endpush
