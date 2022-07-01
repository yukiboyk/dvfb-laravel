@stack('css')
<!-- Layout config Js -->
<script src="{{ URL::asset('assets/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ URL::asset('assets/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
{{-- add font --}}
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;500&family=Roboto+Condensed&display=swap" rel="stylesheet">       
<style>
    html,
    body{
        font-family: 'Oswald', sans-serif;}
    .ribbon-box .ribbon-primary {
        background: #00266D;
    }
    .ribbon-box .ribbon-primary.ribbon-shape::after {
        border-left-color: #00266D;
        border-bottom-color: #00266D;
    }
    .ribbon-box .ribbon-primary.ribbon-shape::before {
        border-left-color: #00266D;
        border-top-color: #00266D;
    }
    [data-layout=vertical][data-sidebar=dark] .navbar-menu {
    
        background: linear-gradient(#00266D, #00266D, #10101F);
        border-right: #00266D;
    }
    [data-layout=vertical][data-sidebar=dark] .navbar-nav .nav-link {
        color: #dfdfdf;
    }
    [data-layout=vertical][data-sidebar=dark] .menu-title {
        color: #838fb9;
    }
    [data-layout=vertical][data-sidebar=dark] .navbar-nav .nav-sm .nav-link {
        color: #c0c0c0;
    }
    [data-topbar=dark] #page-topbar {
        background-color: linear-gradient(#00266D, #00266D, #10101F);
        border-color: #00266D;
    }
    .navbar-menu .navbar-nav .nav-link {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 0.625rem 1.5rem;
        color: var(--vz-vertical-menu-item-color);
        font-size: 16px;
        font-family: 'Oswald', sans-serif;}
    .navbar-menu .navbar-nav .nav-sm .nav-link {
        padding: 0.55rem 1.5rem!important;
        color: var(--vz-vertical-menu-sub-item-color);
        white-space:pre-line;
        position: relative;
        font-size: .813rem;
        font-family: 'Oswald', sans-serif; 
    
    }
    .menu-icon {
        font-size: 16px;
        line-height: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        transition: transform 0.5s;
        margin-right: 10px;
        color: #6d8bb0;
    }
    </style>
