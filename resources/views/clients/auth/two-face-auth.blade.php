@extends('clients.layouts.master')
@section('title')
  <title> Xác Minh Đăng Nhập 2 Bước</title>  
@endsection
@section('content')
<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Xác Minh 2 Bước</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="default-modal" class="form-label text-muted">Hướng dẫn</label>
                        <input class="form-check-input code-switcher" type="checkbox" id="default-modal">
                    </div>
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <p class="text-muted text-muted">Vui lòng cài đặt ứng dụng <code>Google Authentication</code> Trên googlePlay hoặc Appstore.</p>
                <div class="live-preview">
                    <div>
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#myModal">Bật Xác Minh 2 bước</button>
                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                       
                                        <h5 class="modal-title text-center" id="myModalLabel">QUÉT MÃ PHÍA DƯỚI</h5>
                                       
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                        <h5 class="fs-15">
                                            <img src="{{ $qrCodeUrl }}" />
                                        </h5>
                                        <hr>
                                        <p class="text-muted">
                                           Hoặc Nhập Thủ công với tên tài khoản <b style="color: blue">{{auth()->user()->username}}</b> và khóa thiết lập là:<br>
                                            <b style="color: red">{{ $secretCode }}</b>
                                        </p>
                                    </center>
                                        <!-- Success Alert -->
<div class="alert alert-success alert-dismissible alert-label-icon rounded-label fade show" role="alert">
    <i class="ri-notification-off-line label-icon"></i><strong>Sau khi quét thành công</strong> - Vui lòng nhập mã vào phía bên dưới để xác thực hoàn tất bật xác minh 2 bước
    </div>
     
    <form action="{{route('enable2FA')}}" method="POST">
        <div class="row g-3">
            <div class="col-xxl-6">
                <div>
                    <label for="verifycode" class="form-label">Mã Xác Thực</label>
                    @csrf
                    <input type="number" class="form-control" id="code" name="code" placeholder="Nhập Mã xác thực">
                    <input type="text" name="secretcode" value="{{ $secretCode }}" hidden>
                </div>
            </div><!--end col-->
            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Xác Thực</button>
                </div>
            </div><!--end col-->
        </form>
     </div>
     


                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                </div>
                <div class="d-none code-view">
                    <pre class="language-markup" style="height: 275px;">
                <code>
-Bước 1 : Tải app <br>
-Bước 2: Quét Mã
                </code>  
             </pre>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
</div>
@endsection

@push('script')
<script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<script src="{{ URL::asset('assets/js/pages/modal.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endpush