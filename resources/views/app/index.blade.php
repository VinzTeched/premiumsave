@extends('layouts.master')

@section('title')
    Home | PremiumSave 
@endsection

@section('content')
   
<!-- ========== MAIN CONTENT ========== -->
<!-- Main Slider -->
    <div class="site-main-slider slider-version-1">

        <!-- Sequence slider -->
        <div id="sequence">
            <ul class="seq-canvas">
                <li class="sequence-slide">

                    <!-- Background Image -->
                    <div class="sequence-bg" style="background-image: url(images/slider-bg-image-3.jpg)"></div>

                    <!-- Caption -->
                    <div class="sequence-caption">

                        <!-- Bootstrap -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">

                                    <!-- H2 heading -->
                                    <h2>Here at Premium Save</h2>
                                    <!-- H1 Heading -->
                                    <h1>We help you save and invest your money</h1>
                                    <!-- Paragraph -->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                            <p>
                                                Premium Save is strictly devoted to growing and building more businesses by encouraging saving and investment through quick investment and cash out.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <a href="{{ route('register') }}" class="theme-btn color-btn">Get Started</a>
                                    <a href="#" class="theme-btn">Learn More</a>

                                </div>
                            </div>
                        </div>
                        <!-- End bootstrap -->

                    </div>
                    <!-- End caption -->
                </li>
                <li class="sequence-slide">

                    <!-- Background Image -->
                    <div class="sequence-bg" style="background-image: url(images/slider-bg-image-2.jpg)"></div>

                    <!-- Caption -->
                    <div class="sequence-caption">

                        <!-- Bootstrap -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">

                                    <!-- H2 heading -->
                                    <h2>We are experienced </h2>
                                    <!-- H1 Heading -->
                                    <h1>We are know for investment strategies</h1>
                                    <!-- Paragraph -->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                            <p>
                                                Premium Save is known for keen interest in saving and investment opportunities. It is safe to say that this isn't our first rodeo. We have been doing this before and we do it best.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <a href="{{ route('register') }}" class="theme-btn">Get Started</a>
                                    <a href="#" class="theme-btn">Know More</a>

                                </div>
                            </div>
                        </div>
                        <!-- End bootstrap -->

                    </div>
                    <!-- End caption -->

                </li>
            </ul>
        </div>

        <!-- Pagination -->
        <ul class="seq-pagination">
            <li>Step 1</li>
            <li>Step 2</li>
            <li>Step 3</li>
        </ul>

        <!-- Navigation -->
        <button type="button" class="seq-prev"><span class="icon-slider-arrow-left"></span></button>
        <button type="button" class="seq-next"><span class="icon-slider-arrow-right"></span></button>

    </div>
    <!-- End Slider -->

      <!-- Site Features -->
    <div id="Features" class="site-features site-white-section">

        <!-- Bootstrap -->
        <div class="container">
            <!-- upper section -->
            <div class="upper-section">
                  <div class="row">
                <div class="col-xs-12">

                    <!-- Clearfix -->
                    <div class="clearfix"></div>

                    <!-- Features -->
                    <div class="site-features-container">

                        <!-- Bootstrap nested columns -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 no-right-padding">

                                <!-- Link -->
                                <div class="site-box" >

                                    <!-- Figure -->
                                    <figure>
                                        <img src="images/stat-2.png" alt="image">
                                    </figure>

                                    <!-- H3 heading -->
                                    <h3>Quick and Easy Deposit/ Withdrawal</h3>

                                    <!-- Paragraph -->
                                    <p>
                                        We offer the best way that is made easy to make payment into the system!
                                    </p>
                                    
                                    <!-- Read more -->
                                    <a class="site-permalink" href="#">
                                        <span>MORE</span>
                                        <i class="icon-service-arrow"></i>
                                    </a>
                                    
                                    <!-- nomber -->
                                    <div class="nomber">01
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-4 no-padding-3">

                                <!-- Link -->
                                <div class="site-box" >

                                    <!-- Figure -->
                                    <figure>
                                        <img src="images/feature-2.png" alt="image">
                                    </figure>

                                    <!-- H3 heading -->
                                    <h3>Make Money using PremiumSave</h3>

                                    <!-- Paragraph -->
                                    <p>
                                        You will get profit of 50% ROI in 3 days on your first Investment and subsequently get 50% in 7 days!
                                    </p>
                                    
                                    <!-- Read more -->
                                    <a class="site-permalink" href="#">
                                        <span>MORE</span>
                                        <i class="icon-service-arrow"></i>
                                    </a>
                                    
                                    <!-- nomber -->
                                    <div class="nomber">02
                                    </div>

                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-4 no-left-padding">

                                <!-- Link -->
                                <div class="site-box no-border" >

                                    <!-- Figure -->
                                    <figure>
                                        <img src="images/feature-3.png" alt="image">
                                    </figure>

                                    <!-- H3 heading -->
                                    <h3>24/7 Support</h3>

                                    <!-- Paragraph -->
                                    <p>
                                        Our wonderful and friendly support is there to guide with enquiries or any account related issue.
                                    </p>
                                    
                                    <!-- Read more -->
                                    <a class="site-permalink" href="#">
                                        <span>MORE</span>
                                        <i class="icon-service-arrow"></i>
                                    </a>
                                    
                                    <!-- nomber -->
                                    <div class="nomber">03
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            </div>
        </div>
        <!-- End Bootstrap -->

    </div>
    <!-- End Site Features  -->
    
    <!-- About Us -->
    <div id="about" class="site-about site-white-section">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- H1 Heading -->
                    <h1>About Us</h1>

                    <!-- H2 heading -->
                    <h2>Let's give you opportunities</h2>

                    <!-- Clearfix -->
                    <div class="clearfix"></div>

                    <!-- Left colom -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="left-colom">
                              <!-- H3 heading -->
                                <h3>We Will Always Stand By You At This Difficult Time <span class="color-text">Your success is our goal</span> </h3>
                            
                        </div>
                    </div>
                    
                    <!-- Right colom -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="right-colom">
                              <!-- Paragraph -->
                                <p>
While Nations are shutting down. Businesses are shutting down. People are getting locked up at home.
Only an ONLINE BUSINESS like PREMIUMSAVE INVESTMENT that can still pay you.
We can never SHUT DOWN at this time you need us the most.
When you join us and invest with us, we will ensure you receive your money back with 50% interest.
You can invest at home and also keep your social distance.
We will stand by you and assist all our participants at this critical moment you need us the most.<br>
Please STAY SAFE and PROTECT YOURSELF.
<br>
AT WAZOBIA INVESTMENT, YOUR WELLBEING IS OUR OPTIMUM PRIORITY.</p>
                            
                            <!-- Read more -->
                            <a class="more-text" href="{{ route('about') }}"> Read More »</a>

                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <!-- End Bootstrap -->

    </div>
    <!-- End About Us -->

   
    <!-- Testimonial -->
    <div id="testimonial" class="site-testimonial site-white-section">

        <!-- Bootstrap -->
        <div class="container-fluid wide">
            <div class="row">
                <div class="col-xs-12">

                    <!-- H1 heading -->
                    <h1>Client testimonials</h1>

                    <!-- H2 heading -->
                    <h2>How people feel about us</h2>
                              
                    <div class="col-xs-12 col-md-8 col-md-push-2">
                        <!-- Slider main container -->
                        <div class="swiper-container" id="testimonial-slider">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
    
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <!-- Image -->
                                    <figure><img src="images/iconbg.png" alt="User"></figure>
                                    <!-- H4 heading -->
                                            <h4>Really wonderful</h4>
                                    <!-- Paragraph -->
                                    <p>This is unlike any platform, I've seen in my entire life </p>
                                    <!-- Title -->
                                    <h5>Agozie Onoh</h5>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Image -->
                                    <figure><img src="/images/iconbg.png" alt="User"></figure>
                                    <!-- H4 heading -->
                                            <h4>The Best</h4>
                                    <!-- Paragraph -->
                                    <p>How i wish I could meet you personally to thank you guys</p>
                                    <!-- Title -->
                                    <h5>Ahmed Daura</h5>
                                    <!-- description -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- Image -->
                                    <figure><img src="images/iconbg.png" alt="User"></figure>
                                    <!-- H4 heading -->
                                            <h4>I'm just suprised</h4>
                                    <!-- Paragraph -->
                                    <p>Like wow. Is this real? </p>
                                    <!-- Title -->
                                    <h5>Emmanuel Okoye</h5>
                                </div>
    
                            </div>
                        </div>
                              </div>

                </div>

                <div class="col-xs-12">
                    <!-- If we need pagination -->
                    <div id="testimonial-pagination" class="swiper-pagination"></div>
                </div>
                
                

            </div>
        </div>
        <!-- End bootstrap -->

    </div>
    <!-- End testimonial -->
    
    <!-- Call to action -->
    <div class="site-call-to-action">
        <div style="background: rgba(109, 89, 22, .9);
  padding: 120px 0;">
        <!-- Bootstrap -->
        <div class="container" >
            <div class="row">
                <div class="col-xs-12">

                    <!-- Box -->
                    <div class="site-box">

                        <!-- H1 heading -->
                        <h1>What are you waiting for?</h1>

                        <!-- Bootstrap inner columns -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-offset-2">


                            </div>
                            <div class="col-xs-12">

                                <!-- Button -->
                                <a href="{{ route('about') }}" class="theme-btn"> 
                                <!-- Icon -->
                                <figure><i class="fa fa-phone"></i></figure>
                                Know More</a>
                                
                                <!-- Button -->
                                <a href="{{ route('register') }}" class="theme-btn"> 
                                <!-- Icon -->
                                <figure><i class="fa fa-envelope"></i></figure>
                                Join us Now</a>

                            </div>
                        </div>

                    </div>
                    <!-- End box -->

                </div>
            </div>
        </div>
        <!-- End Bootstrap -->
</div>
    </div>
    <!-- End call to action -->
@endsection
