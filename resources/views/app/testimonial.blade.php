@extends('layouts.master')

@section('title')
    Premiumsave :: Testimonial Page
@endsection

@section('content')

  
    <!-- This section classes require for whole page sliders -->
    <div id="sequence" style="display:none;">
        <ul class="seq-canvas">
        </ul>
    </div>

    <!-- End Slider -->

    <!-- Main banner -->
    <div class="inner-page-main-banner testimonials">
		<!-- Bootstrap -->
		<div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- H2 heading -->
                    <h2>Testimonials</h2>
                    <!-- H1 Heading -->
                    <h1>What People say</h1>
                    <!-- Bredcum links -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        	<ul>
                            	<li> <a href="index.html">Home » </a> </li>
                                <li>Testimonials</li>
                            </ul>
                            <p>
                               Premiumsave has helped encouraged people especially at this time when they really needed the help.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <!-- End bootstrap -->
    </div>
    <!-- End Main banner -->

    <!-- testimonials box -->
    <div id="testimonials" class="testimonials-section inner-page-white-section">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- H3 Heading -->
                    <h3>Hear their thoughts</h3>

                    <!-- Paragraph -->
                    <div class="col-xs-12 col-sm-10 col-md-10 col-sm-offset-1 center-text">
                    <p>Premiumsave has helped encouraged people especially at this time when they really needed the help.</p>
					</div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    
                            <!-- Site box -->
                            <div class="site-box">
                                <!-- Icon -->
                                <div class="star"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i> </div>
                                <!-- Paragraph -->
                                <p>
                                <strong>Authentically Pure</strong><br>
                                When my friend told me, I just waved it but on a second thought. I must say a big thank premiumsave
                                </p>
                                
                                <!-- Image -->
                                <figure><img src="/img/iconbg.png" alt="User"></figure>
                                <!-- Title -->
                                <h5>Chidimma Udeh</h5>
                                <!-- description -->
                            </div>
                            <!-- End box -->
    
						</div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    
                            <!-- Site box -->
                            <div class="site-box">
                                <!-- Icon -->
                                <div class="star"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <span class="grey-star"><i class="fa fa-star"></i> </span> </div>
                                <!-- Paragraph -->
                                <p>
                                <strong>Quick reponse!!</strong><br>
                                This is really premium, first among equals. I appreciate!
                                </p>
                                
                                <!-- Image -->
                                <figure><img src="/img/iconbg.png" alt="User"></figure>
                                <!-- Title -->
                                <h5>Emmanuel Jude</h5>
                            </div>
                            <!-- End box -->
    
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    
                            <!-- Site box -->
                            <div class="site-box">
                                <!-- Icon -->
                                <div class="star"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                <!-- Paragraph -->
                                <p>
                                <strong>Great</strong><br>
                                I think they are the best once if you dont want to ask people for help anymore.
                                </p>
                                
                                <!-- Image -->
                                <figure><img src="/img/iconbg.png" alt="User"></figure>
                                <!-- Title -->
                                <h5>Oluwaseyi Adebayor</h5>
                            </div>
                            <!-- End box -->
    
						</div>
                        
    
                        <!-- Clearfix for small view -->
                        <div class="clearfix visible-sm"></div>
    
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bootstrap -->

    </div>
    <!-- End service box -->
    
    <!-- Dont remove this section, it's classes is nececery for swiper slider used in other sections-->
    <div id="team" class="site-team site-white-section" style="display:none;">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                
                <div class="col-xs-12 col-md-10 col-md-push-2">

                    <!-- Swiper slider -->
                    <div class="swiper-container team-section-slider" id="team-section-slider">

                        <!-- Content -->
                        <div class="swiper-wrapper">
                        </div>

                    </div>
                    <!-- End slider -->

                </div>
                <div class="col-xs-12 col-md-2 col-md-pull-10">

                    <!-- Thumbnail -->
                    <div class="swiper-container thumbnail" id="team-thumbnails">
                        <ul class="swiper-wrapper">
                           
                        </ul>
                    </div>
                    <!-- End thumbnail -->

                </div>
            </div>
        </div>
        <!-- End Bootstrap -->

    </div>
    <!-- End team -->


@endsection