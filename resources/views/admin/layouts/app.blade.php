<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title')</title>
	
	 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ URL::to('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ URL::to('css/custom.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::to('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::to('css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


@include('admin.layouts.header')

@include('admin.layouts.sidebar')

@yield('main-content')

@include('admin.layouts.footer')

@include('cookieConsent::index')
	

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('js/pages/dashboard2.js') }}"></script>
@yield('scripts')

</body>
</html>