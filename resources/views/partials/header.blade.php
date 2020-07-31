
<!-- Wrapper -->
<div class="site-wrapper">

    <!-- Top Bar -->
    <div class="site-top-bar">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- Left section -->
                    <div class="site-top-bar-left-section">

                        <div id="google_translate_element"></div>

                    </div>
                    <!-- End Left Section -->


                    <!-- Right Section -->
                    <div class="site-top-bar-right-section">

                        <!-- Link -->
                        <a href="tel:+1801454587">
                            <!-- Icon -->
                            <i class="fa fa-phone"></i>
                            <!-- Text -->
                            <span>+1 801 4545 87</span>
                        </a>

                        <!-- Link -->
                        <a href="mailto:admin@premiumsave.cash">
                            <!-- Icon -->
                            <i class="fa fa-envelope"></i>
                            <!-- Text -->
                            <span>admin@premiumsave.cash</span>
                        </a>

                    </div>
                    <!-- End Right Section -->

                </div>
            </div>
        </div>
        <!-- End Bootstrap -->

    </div>
    <!-- End Top Bar -->

    <!-- Header -->
    <header class="site-header" id="sticky-header">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- Logo -->
                    <div class="site-logo">
                        <!-- Link -->
                        <a href="/">
                            <!-- Logo Image -->
                            <img src="/images/logo-icon.png" alt="PremiumSave">
                        </a>
                    </div>
                    <!-- End logo -->

                    <!-- Navigation Toggle Button -->
                    <div class="site-nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- End Nav Toggle Button -->

                    <!-- Navigation -->
                    <nav class="site-nav">
                        <ul>
                            <!-- Active Item (Use the active class) -->
                            @if(Auth::guest()) 
                            <li class="@if(route::is('index')) active @endif"><a href="/">Home</a></li>
                            @else
                            <li class="@if(route::is('home')) active @endif"><a href="{{ route('home') }}">Dashboard</a></li>
                            @endif
                            <li class="@if(route::is('about')) active @endif"><a href="{{ route('about') }}">About us</a></li>
                            <li class="@if(route::is('testimonial')) active @endif"><a href="{{ route('testimonial') }}">testimonial</a></li>
                            <li class="@if(route::is('contact')) active @endif"><a href="{{ route('contact') }}">contact us</a></li>
                            @if(Auth::guest())  
                            <li class="no-hover">
                                <a href="{{ route('register') }}" class="menu-btn">Register</a>
                                <a href="{{ route('login') }}" class="menu-btn ">Login</a>
                            </li>
                            @else
                            <li class="no-hover">
                                <a href="{{ route('logout') }}" class="menu-btn " onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- End Navigation -->

                </div>
            </div>
        </div>
        <!-- End Bootstrap -->

    </header>
    <!-- End Header -->
