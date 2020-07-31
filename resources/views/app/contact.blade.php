@extends('layouts.master')

@section('title')
    Premiumcash | Contact Us
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

@section('content')
   
<!-- ========== MAIN CONTENT ========== -->

    <!-- This section classes require for whole page sliders -->
    <div id="sequence" style="display:none;">
        <ul class="seq-canvas">
        </ul>
    </div>

    <!-- End Slider -->

    <!-- Main banner -->
    <div class="inner-page-main-banner contact-us">
         @include('inc.messages')
		<!-- Bootstrap -->
		<div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- H2 heading -->
                    <h2>Contact us</h2>
                    <!-- H1 Heading -->
                    <h1>Get in touch</h1>
                    <!-- Bredcum links -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        	<ul>
                            	<li> <a href="/">Home » </a> </li>
                                <li>Contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <!-- End bootstrap -->
    </div>
    <!-- End Main banner -->
    
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

    <!-- contact box -->
    <div id="contact-us" class="contact-section inner-page-grey-section">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                	
                    <!-- Site box -->
					<div class="site-box">
                        <!-- 3 colom -->
						<div class="inner">
                            
                            <!-- email -->
                        	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            	<div class="ttl mail">
	                            	<!-- Icon -->
    	                            <figure><i class="fa fa-envelope"></i></figure>
        	                        <!-- Location -->
            	                    <h4> Email us </h4>
								</div>
                                <div class="clearfix"> </div>
                                <a class="email" href="contact@premiumsave.cash">contact@premiumsave.cash</a>
                                <div class="clearfix"> </div>
                                <a class="email" href="mailto:info@corbiz.com">premiumsaveltd@gmail.com</a>
                            </div>
                            
                    	</div>
                        
                        <!-- Form -->
                        <div class="col-xs-12 col-sm-12 col-md-12 no-right-padding">
		                    <div class="inner">
    	                		<div class="form-box">
                                <!-- H3 Heading -->
                                <h4>Drop us a message</h4>
                                <!-- Contact form -->
                               
			  		@include('inc.messages')
					<form action="{{ route('contact-form-submit') }}" method="POST" >
						{{ csrf_field() }}
                        <!-- Name -->
                        <div class="form-ttl">Name </div>
                        <label><input type="text" name="name" placeholder="Your answer here" required="required"></label>
                        <!-- Email -->
                        <div class="form-ttl">Email </div>
                        <label><input type="email" name="email" placeholder="Your answer here" required="required"></label>
                        <!-- Phone -->
                        <div class="form-ttl">Phone </div>
                        <label><input type="tel" name="phone" maxlength="12" placeholder="Your answer here" required="required"></label>

                        <!-- Phone -->
                        <div class="form-ttl">Subject </div>
                        <label><input type="text" name="subject" placeholder="Your answer here" required="required"></label>
                        <!-- Message -->
                        <div class="form-ttl">Message </div>
                        <label><textarea name="message" placeholder="Your answer here" required></textarea></label>
                        <!-- Submit -->
                        <button type="submit">Send request <i class="fa fa-spin fa-spinner"></i></button>
                    </form>
					</div>
            	</div>
			</div>
        </div>
                    
                    

        </div>
    </div>
</div>
        <!-- End Bootstrap -->

</div>
    <!-- End contact box -->


@endsection


@section('scripts')

<!-- Toastr -->
<script src="{{ URL::to('plugins/toastr/toastr.min.js') }}"></script>
<!-- jQuery -->
@if(session()->has('conmessage'))
<script type="text/javascript">

    toastr.success('Message sent successfully');
    toastr.options.timeOut = 5000;
    toastr.options.fadeOut = 4000;

</script>
@endif

@endsection
