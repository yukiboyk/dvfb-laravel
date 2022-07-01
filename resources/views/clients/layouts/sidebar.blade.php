<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('homeDashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('images/logo1.png') }}" alt="" height="15">
            </span>
            <span class="logo-lg">
                <img  src="{{ URL::asset('images/logo1.png') }}" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('homeDashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('images/logo1.png') }}" alt="" height="15">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('images/logo1.png') }}" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>MENU</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link "
                                href="{{route('homeDashboard')}}">
                                <i class="menu-icon">
                                    <img width="100%" src="{{url('images/icon_home/home.svg')}}">
                                </i> <span>Trang Chủ</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link "
                                href="{{route('viewProfile')}}">
                                <i class="menu-icon">
                                    <img width="100%" src="{{url('images/icon_home/user-profile.svg')}}">
                                </i> <span>Thông Tin Tài Khoản</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#yukinaptien" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="recharge">
                                <i class="menu-icon">
                                    <img width="100%" src="{{url('images/icon_home/naptien.svg')}}">
                                </i>
                                <span>Nạp Tiền</span>
                            </a>
                            <div class="collapse menu-dropdown "
                                id="yukinaptien">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href=""
                                            class="nav-link ">Ngân Hàng & Ví Điện Tử</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href=""
                                            class="nav-link ">Nạp Thẻ Cào</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title"><span>DỊCH VỤ</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#yukidvfb" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="a">
                                <i class="menu-icon">
                                    <img width="100%" src="{{url('images/icon_home/facebook.svg')}}">
                                </i>
                                <span>Dịch Vụ FaceBook</span>
                            </a>
                            <div class="collapse menu-dropdown "
                                id="yukidvfb">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"> 
                                       
                                        <a href="" class="nav-link ">  Tăng Like Bài Viết</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href=""
                                            class="nav-link ">Tăng Phô Lâu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#yukidvtt" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="b">
                                <i class="menu-icon">
                                    <img width="100%" src="{{url('images/icon_home/tiktok.svg')}}">
                                </i>
                                <span>Dịch Vụ TikTok</span>
                            </a>
                            <div class="collapse menu-dropdown "
                                id="yukidvtt">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href=""
                                            class="nav-link ">Tăng Like Bài Viết</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href=""
                                            class="nav-link ">Tăng Phô Lâu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
