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
    <link rel="canonical" href="http://premiumsave.cash">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Premiumsave - Saving Investment Platform">
    <meta property="og:description" content="Premiumsave is the best place to invest and earn">
    <meta property="og:url" content="http://premiumsave.cash">
    <meta property="og:site_name" content="Premiumsave.cash">
    <meta property="og:image:secure_url" content="http://premiumsave.cash/images/icon.png" itemprop="image">

    <meta property="og:image:type" content="image/jpeg">

    <meta property="og:image:alt" content="PREMIUMSAVE.CASH">
    <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}"> 

    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
	
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


@include('partials.userheader')

@include('partials.usersidebar')

@yield('content')

@include('partials.userfooter')

@include('cookieConsent::index')
	

<!-- REQUIRED SCRIPTS -->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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

@yield('scripts')

</body>
</html>