<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="author" content="www.vinzdesign.com" />
	<meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />
    <title>@yield('title')</title>
	
	<link rel="stylesheet" href="{{ URL::to('assets/css/vinz_style.css') }}" />
	<link rel="stylesheet" href="{{ URL::to('assets/css/mmenu.css') }}" />
	<link rel="stylesheet" href="{{ URL::to('assets/css/hover-min.css') }}" />
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ URL::to('assets/image/icon.png') }}">
	<!-- Google Fonts -->
	<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="{{ URL::to('assets/vendor/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::to('assets/vendor/fakeLoader.js-master/css/fakeLoader.css') }}">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/dzsparallaxer/dzsparallaxer.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">

	<!-- CSS Front Template -->
	<link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	
	@section('head')
	@show
	
	<style type="text/css">
		.sticky{
			position: fixed;
			top: 0;
			width: 100%;
			z-index: 999;
		}
		.sticky + .top-nav{
			padding-top: 80px;
		}
		.mm-menu{
			--mm-color-background:#005;
			}
		<!-- copy to style.css -->

		<!-- copy to style.css -->
	</style>	
	
    @yield('styles')
</head>
<body>



	@include('partials.header')

	@yield('content')

	@include('partials.footer')


	@include('cookieConsent::index')
	

	<!-- main scripts -->
	<script src="{{ URL::asset('assets/js/mmenu.polyfills.js') }}"></script>
	<script src="{{ URL::asset('assets/js/mmenu.js') }}"></script>

	<!-- JS Global Compulsory -->
	<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

	<script src="{{ URL::to('assets/vendor/fakeLoader.js-master/js/fakeLoader.js') }}"></script>

       <div class="fakeLoader"></div>

        <script>
            $(document).ready(function () {
                $.fakeLoader({
                    bgColor: '#ffd65c',
                    spinner:"spinner4"
                });
            });
        </script>
	<!-- JS Implementing Plugins -->
	<script src="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
	<script src="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/dzsparallaxer/dzsparallaxer.js') }}"></script>
	<script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>

	<!-- JS Front -->
	<script src="{{ asset('assets/js/hs.core.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.header.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.unfold.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.malihu-scrollbar.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.validation.js') }}"></script>
	<script src="{{ asset('assets/js/helpers/hs.focus-state.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.show-animation.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.scroll-effect.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.slick-carousel.js') }}"></script>
	<script src="{{ asset('assets/js/components/hs.go-to.js') }}"></script>

	@section('footerSection')
	@show
  <!-- JS Plugins Init. -->
  <script>
    $(window).on('load', function () {
      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 768,
        hideTimeOut: 0
      });
    });

    $(document).on('ready', function () {
      // initialization of header
      $.HSCore.components.HSHeader.init($('#header'));

      // initialization of unfold component
      $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
        afterOpen: function () {
          $(this).find('input[type="search"]').focus();
        }
      });

      // initialization of malihu scrollbar
      $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

      // initialization of show animations
      $.HSCore.components.HSShowAnimation.init('.js-animation-link');

      // initialization of form validation
      $.HSCore.components.HSValidation.init('.js-validate', {
        rules: {
          confirmPassword: {
            equalTo: '#password'
          }
        }
      });

      // initialization of forms
      $.HSCore.helpers.HSFocusState.init();

      // initialization of scroll effect component
      $.HSCore.components.HSScrollEffect.init('.js-scroll-effect');

      // initialization of slick carousel
      $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');
    });

	<!--menun-->
	document.addEventListener(
		"DOMContentLoaded", () => {
			new Mmenu( "#menu", {
			   "extensions": [
				  "pagedim-black",
				  "theme-dark"
			   ],
			   "navbars": [
				  {
					 "position": "top",
					 "title": "Vinz",
					 "content": [
						"searchfield"
					 ]
				  },
				  {
					 "position": "top",
					 "content": [
						"prev",
						"title"
					 ]
				  },
				  /*{
					 "position": "bottom",
					 "content": [
						"<a class='fa fa-envelope' href='#/'></a>",
						"<a class='fa fa-twitter' href='#/'></a>",
						"<a class='fa fa-facebook' href='#/'></a>"
					 ]
				  }*/
			   ]
			});
		}
	);
  
 </script>
 
@yield('scripts')
 
</body>
</html>