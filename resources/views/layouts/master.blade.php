<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="Saving Investment Platform">

    <!-- Necessary CSS Files -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">                                                <!-- Bootstrap CSS Only GRID -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/google-font.css') }}">                                                  <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">                                             <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">                                                   <!-- Swiper slider -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mb.YTPlayer.min.css') }}">                                       <!-- Video background -->
    <link rel="stylesheet" href="{{ asset('css/template.css') }}"> 
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
    @yield('styles')

    <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="top" class="light-skin fixed-navbar sidebar-scroll">

@include('partials.header')

@yield('content')

@include('partials.footer')

@include('cookieConsent::index')

<!---  Script  --->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('js/jquery.countimator.min.js') }}"></script>        <!-- Counter -->
<script src="{{ asset('js/jquery.sticky.min.js') }}"></script>             <!-- Sticky Header -->
<script src="{{ asset('js/swiper.jquery.min.js') }}"></script>             <!-- Carousel Slider -->
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>              <!-- Isotope -->
<script src="{{ asset('js/jquery.tabslet.min.js') }}"></script>            <!-- Tabs -->
<script src="{{ asset('js/tweetie.min.js') }}"></script>                   <!-- Tweets -->
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>           <!-- Scroll up -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>   <!-- Google map -->
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>         <!-- Header slider scripts -->
<script src="{{ asset('js/hammer.min.js') }}"></script>
<script src="{{ asset('js/sequence.min.js') }}"></script>
<script src="{{ asset('js/venobox.min.js') }}"></script>                   <!-- Light box -->
<script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>        <!-- Video background -->
<script src="{{ asset('js/template.js') }}"></script>                      <!-- Theme Options -->

<script src="{{ asset('js/retina.js') }}"></script>                      <!-- Retina js -->
<script src="{{ asset('js/retina.min.js') }}"></script>    
  <!--ADMIN SCRIPT -->
  @yield('scripts')

</body>

</html>