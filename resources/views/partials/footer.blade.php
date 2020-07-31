
    <!-- Footer -->
    <footer class="site-footer">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">

                    <!-- Widget -->
                    <div class="widget">

                        <!-- Logo -->
                        <div class="site-logo">
                            <!-- Link -->
                            <a href="/">
                                <!-- Logo Image -->
                                <img src="/images/footer-logo.png" alt="PremiumSave">
                                
                            </a>
                        </div>
                        <!-- End logo -->

                        <!-- Clearfix -->
                        <div class="clearfix"></div>

                        <!-- Paragraph -->
                        <p>PremiumSave is an initiation of Premium Save Investment Ltd, it is dedicated to increasing earning ability of her investor through offering day to day investment payment transaction.</p>
                            

                    </div>
                    <!-- End widget -->

                </div>
                <div class="col-xs-12 col-sm-6 col-md-2">

                    <!-- Widget -->
                    <div class="widget">

                        <!-- H3 heading -->
                        <h3>Our company</h3>

                        <!-- Links -->
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('about') }}">About us</a></li>
                            <li><a href="{{ route('testimonial') }}">Testimonial</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                        </ul>

                    </div>
                    <!-- End widget -->

                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-2">

                    <!-- Widget -->
                    <div class="widget">

                        <!-- H3 heading -->
                        <h3>Walk with me </h3>

                        <!-- Links -->
                        <ul>
                            <li><a href="{{ route('privacy') }}">Terms and Condition</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>

                    </div>
                    <!-- End widget -->

                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4">

                    <!-- Widget -->
                    <div class="widget">

                        <!-- H3 heading -->
                        <h3>Subscribe us</h3>
                        
                        <!-- Paragraph -->
                        <p>Get updated occassionally about our recent activities and investment strategy</p>
                        
                        <!-- Subscribe -->
                        <form action="/" class="site-subscribe">
                            <input type="email" placeholder="Enter your email" required="required" name="form_subscribe">
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>

                    </div>
                    <!-- End widget -->

                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12">
                    <hr>
                </div>
                <div class="col-xs-12 col-sm-6">

                    <!-- Copyright -->
                    <div class="site-copyright">
                        <a target="_blank" href="/">PremiumSave.com</a>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6">

                    <!-- Social Icons -->
                    <div class="site-social-icons">
                        <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Bootstrap -->

    </footer>
    <!-- End Footer -->

    <!-- Preloader -->
    <div class="site-preloader">
        <img src="{{ asset('images/loader.gif') }}" alt="PremiumSave">
    </div>

</div>
<!-- End Wrapper -->