<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light">

    <head>
    <meta charset="utf-8" />
    @yield('title')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="dvmxh top 1 the gioi" name="description" />
    <meta content="YukiBoyK" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
        @include('clients.layouts.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('clients.layouts.vendor-scripts')
    </body>
</html>
