@extends('clients.layouts.master-auth')
@section('title')
<title>ĐĂNG KÍ THÀNH VIÊN</title>
@endsection
@section('content')

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 1440 120">
            <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
        </svg>
    </div>
</div>

<!-- auth page content -->
<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                    <div>
                        <a href="index" class="d-inline-block auth-logo">
                            <img src="{{ URL::asset('images/logo.png') }}" alt="" height="20">
                        </a>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Đăng kí tài khoản mới</h5>
                            <p class="text-muted">Tạo tài khoản hoàn toàn miễn phí</p>
                        </div>
                        @if($errors->any())
                        <div class="container">
                           <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                       
                    </div>
                    @endif
                    <div class="p-2 mt-4">
                        <form class="needs-validation" novalidate method="POST"
                        action="{{route('rqRegister')}}" >
                        @csrf
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email <span
                                class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" id="useremail"
                                placeholder="example@gmail.com" required>
                               
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Họ Tên <span
                                    class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                    name="fullname" value="{{ old('fullname') }}" id="fullname"
                                    placeholder="Nhập Họ Tên" required>
                                    
                                </div>

                                <div class="mb-2">
                                    <label for="username" class="form-label">Tên Tài Khoản <span
                                        class="text-danger">*</span></label>
                                        <input type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        id="username" value="{{old('username')}}" placeholder="Nhập Tên Tài Khoản" required>
                                        
                                    </div>
                                    <div class=" mb-4">
                                        <label for="input-password">Mật Khẩu<span
                                            class="text-danger">*</span></label>
                                            <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="input-password"
                                            placeholder="Nhập Mật Khẩu" required>
                                            
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit" id="btnsubmit">ĐĂNG KÍ</button>
                                        </div>
                                        
                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title text-muted">---OR---</h5>
                                                <a href="{{route('showFormLogin')}}" class="btn btn-danger w-100" type="submit">ĐĂNG NHẬP</a>
                                            </div>
                                            <div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end auth page content -->

                <!-- footer -->
                <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> DVMXH. Xây dựng và phát triển <i class="mdi mdi-heart text-danger"></i> by Yukiboyk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- end auth-page-wrapper -->
            @endsection
            @push('script')
            <script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
            <script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
            <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
            @endpush
