<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>@yield('title')</title>
	<link rel="icon shortcut" href="{{ asset('images/icon.png') }}">
	<link rel="shortcut icon" href="{{ URL::to('assets/image/icon.png') }}">
     
      <link rel="stylesheet" href="{{ URL::to('css/adminlte.min.css') }}">
      <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
      <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/helper.css') }}" />
      <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
   </head>
   <body class="light-skin blank">

@yield('content')

@include('cookieConsent::index')


   </body>
</html>

