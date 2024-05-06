@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div>
            <div class="page-header page-header-big text-center" style="background-image: url('{{url('')}}/assets/img/banner1.jpg')">
                <h1 class="page-title text-white">Contact Us<span class="text-white">Keep in touch with us</span></h1>
            </div><!-- End .page-header -->
        </div><!-- End .container -->

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                        <p class="mb-3">{{ getSettings('footer_about') }}</p>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="contact-info">
                                    <h3>The Office</h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-map-marker"></i>
                                            Location Office: {{ getSettings('address') }}
                                        </li>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:{{ getSettings('contact_no') }}">{{ getSettings('contact_no') }}</a>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <a href="mailto:{{ getSettings('info_email') }}">{{ getSettings('info_email') }}</a>
                                        </li>
                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-7 -->

                            <div class="col-sm-5">
                                <div class="contact-info">
                                    <h3>The Office</h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-clock-o"></i>
                                            <span class="text-dark">Monday-Sunday</span> <br>10 AM - 7 PM
                                        </li>
                                        <!-- <li>
                                            <i class="icon-calendar"></i>
                                            <span class="text-dark">Sunday</span> <br>10 AM - 7 PM
                                        </li> -->
                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                    <div class="col-lg-6">
                        <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                        <p class="mb-2">Use the form below to get in touch with the sales team</p>

                        @if(session()->has('message'))
                            <center id="aler">
                                <h2 class="title mb-1">THANK YOU!</h2><!-- End .title mb-2 -->
                                <p class="mb-2">{{ session()->get('message') }}</p>
                            </center>
                        @endif

                        <form method="post" id="contactForm" class="contact-form mb-3" action="{{ route('contact-us') }}">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Name</label>
                                    <input type="text" name="name" class="form-control" id="cname" placeholder="Name *" required data-error="Please enter your name">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="cemail" placeholder="Email *" required data-error="Please enter your email">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="cphone" class="sr-only">Phone</label>
                                    <input type="tel" class="form-control" name="phone" id="cphone" placeholder="Phone *" required data-error="Please enter your phone number">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label for="cmessage" class="sr-only">Your Message</label>
                            <textarea name="message" class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Write your message *" required data-error="Please enter your message" ></textarea>

                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>SUBMIT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form><!-- End .contact-form -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

        <!-- Map -->
        <div id="map">
            <iframe src="{{ getSettings('google_location') }}" style="width: 100%;height: 100%;border: none;"></iframe>
        </div>
        <br>
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript">
      $("#aler").show();
        setTimeout(function() { $("#aler").hide(); }, 3000);
  </script>
@endsection