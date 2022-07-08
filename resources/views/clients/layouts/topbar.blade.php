<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{route('homeDashboard')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
                        </span>
                    </a>

                    <a href="{{route('homeDashboard')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                id="topnav-hamburger-icon">
                <i data-feather="align-left"></i>
                <span class="hamburger-icon">
                   
                </span>
            </button>
                <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                            id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                id="search-close-options"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-cart-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='bx bx-shopping-bag fs-22'></i>
                        <span
                            class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-info">7<span
                                class="visually-hidden">unread messages</span></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0"
                        aria-labelledby="page-header-cart-dropdown">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-soft-warning fs-13"> 7 items</span>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 300px;">
                            <div class="p-2">
                                <div class="d-block dropdown-item text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-1.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details" class="text-reset">Branded
                                                    T-Shirts</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>10 x $32</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$320</h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block dropdown-item text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-2.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details"
                                                    class="text-reset">Bentwood Chair</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>5 x $18</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$89</h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block dropdown-item text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-3.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details" class="text-reset">
                                                    Borosil Paper Cup</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>3 x $250</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$750</h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block dropdown-item text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-6.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details" class="text-reset">Gray
                                                    Styled T-Shirt</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>1 x $1250</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$1250</h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block dropdown-item text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/images/products/img-5.png') }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details"
                                                    class="text-reset">Stillbird Helmet</a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>2 x $495</span>
                                            </p>
                                        </div>
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal">$990</h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border d-grid">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <h5 class="m-0 text-muted">Total:</h5>
                                <div class="px-2">
                                    <h5 class="m-0">$1258.58</h5>
                                </div>
                            </div>

                            <a href="apps-ecommerce-checkout" class="btn btn-success text-center">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div> --}}

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="https://ui-avatars.com/api/?background=random&name={{Auth::user()->fullname}}"
                                alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{Auth::user()->fullname}}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{!! Auth::user()->nameRole !!}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h5 class="dropdown-header">Xin Chào : <strong>{{Auth::user()->fullname}}</strong></h5>
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('viewProfile')}}"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Trang Cá Nhân</span></a>
                        <a class="dropdown-item" href="pages-profile"><i
                                class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Số Dư : <b>{{Auth::user()->formatBalance}} coin</b></span></a>
                        <a class="dropdown-item" href="{{route('showSetting2FA')}}"><span
                                class="badge bg-soft-success text-success mt-1 float-end">New</span><i
                                class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Bảo Mật 2FA</span></a>
                            @if (Auth::user()->role === 9)
                            <a class="dropdown-item" href="auth-lockscreen-basic"><i
                                class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle text-danger">Admin Panel</span></a> 
                            @endif
                        <a class="dropdown-item " href="javascript:void();"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off font-size-16 align-middle me-1"></i> <span
                                key="t-logout">Đăng Xuất</span></a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
