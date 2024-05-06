<footer class="footer footer-2">
    <div class="footer-newsletter bg-image" style="background-image: url({{url('')}}/assets/images/backgrounds/bg-2.jpg)">
        <div class="container">
            <div class="heading text-center">
                <h3 class="title">Get The Latest Deals</h3><!-- End .title -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <form method="post" action="{{ route('subscription-form') }}">
                        @csrf
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your Email Address" aria-label="Email Adress" aria-describedby="newsletter-btn" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="newsletter-btn"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>

                    @if(session()->has('message'))
                        <script type="text/javascript">
                            alert("Thank You\nSubmitted Your Email.....");
                        </script>
                    @endif
                </div><!-- End .col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-newsletter bg-image -->

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="widget widget-about">
                        <!-- <img src="{{url('')}}/assets/img/logo.webp" class="footer-logo" alt="Footer Logo" width="105" height="25"> -->
                        <img src="{{config('fashion.file_path').getSettings('site_logo_header_dark')}}" class="footer-logo" alt="{{ getSettings('site_name') }}" width="105" height="25" style="width: 40%;">
                        <p>{{ getSettings('footer_about') }} </p>
                        
                        <div class="widget-about-info">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <span class="widget-about-title">Got Question? Call us 24/7</span>
                                    <a href="tel:{{ getSettings('contact_no') }}">{{ getSettings('contact_no') }}</a>
                                </div><!-- End .col-sm-6 -->
                                <!-- <div class="col-sm-6 col-md-8">
                                    <span class="widget-about-title">Payment Method</span>
                                    <figure class="footer-payments">
                                        <img src="{{url('')}}/assets/images/payments.png" alt="Payment methods" width="272" height="20">
                                    </figure>
                                </div> --><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .widget-about-info -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-12 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Information</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{ route('about-us') }}">About Desert Safari</a></li>
                            <li><a href="#">How to shop on Desert Safari</a></li>
                            <li><a href="{{ route('faqs') }}">FAQ</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                            <li><a href="{{ route('login') }}">Log in</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <!-- <li><a href="#">Payment Methods</a></li> -->
                            <li><a href="{{ route('feedback') }}">Feedback</a></li>
                            <li><a href="{{ route('ceo') }}">CEO Message</a></li>
                            <li><a href="{{ route('cookie_policy') }}">Cookie Policy</a></li>
                            <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('term_condition') }}">Term & Condition</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="{{ route('cart') }}">View Cart</a></li>
                            <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>
                            <!-- <li><a href="#">Track My Order</a></li> -->
                            <li><a href="#">Help</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-64 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <!--<p class="footer-copyright">Copyright © 2023 Desert Safari 4x4. All Rights Reserved. Designed & Developed by <a href="www.bssoftwareagency.com"><u><b>BS Software Agency</b></u></a></p><!-- End .footer-copyright -->
            
            <p class="footer-copyright">Copyright © 2023 Desert Safari 4x4.</p><!-- End .footer-copyright -->

            <div class="social-icons social-icons-color">
                <span class="social-label">Social Media</span>
                <a href="{{ getSettings('facebook_page') }}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                <a href="{{ getSettings('twitter_page') }}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="{{ getSettings('social_instagram') }}" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                <a href="{{ getSettings('social_youtube') }}" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                <a href="{{ getSettings('social_linkedin') }}" class="social-icon social-linkedin" title="linkedin" target="_blank"><i class="icon-linkedin"></i></a>
            </div><!-- End .soial-icons -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->