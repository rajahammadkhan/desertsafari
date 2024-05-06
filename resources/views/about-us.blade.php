@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div >
            <div class="page-header page-header-big text-center" style="background-image: url('{{url('')}}/assets/img/banner1.jpg')">
                <h1 class="page-title text-white">About us<span class="text-white">Who we are</span></h1>
            </div><!-- End .page-header -->
        </div><!-- End .container -->

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-lg-0">
                        <h2 class="title">About Us</h2><!-- End .title -->
                        <p>Welcome to the official website of Desert Safari 4x4 , a renowned and trusted destination for all your travel and tour needs. With a wealth of experience in the industry, we pride ourselves on delivering exceptional services and creating memorable experiences for our valued customers. As avid travellers ourselves, we understand the importance of dependability, reliability, and the desire to explore new horizons. </p>
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <div class="mb-5"></div><!-- End .mb-4 -->
            </div><!-- End .container -->

            <div class="bg-light-2 pt-6 mb-lg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-lg-0">                            
                            <!-- <p class="lead text-primary mb-3">Pellentesque odio nisi, euismod pharetra a ultricies <br>in diam. Sed arcu. Cras consequat</p> End .lead text-primary --> 
                            <p class="mb-2">At Desert Safari 4x4 , we are dedicated to curating the best travel and tour options that cater to a diverse range of interests and preferences. Whether you're seeking a thrilling adventure in the great outdoors, a tranquil beach getaway, a cultural immersion in vibrant cities, or a soul-enriching spiritual journey, we have something for everyone. 
                                <br>
                                <br>
                                Our team consists of passionate travel enthusiasts who have scoured the globe in search of the most breathtaking destinations, hidden gems, and unique experiences. We believe that travel is not just about visiting a place but immersing oneself in its culture, history, and traditions. That's why we go the extra mile to handpick exceptional tour packages that provide a deeper understanding and appreciation of each destination.                                
                                <br>
                                <br>

                                On our website, you'll find a treasure trove of travel resources, including informative articles, expert travel tips, destination guides, and captivating travel stories shared by fellow wanderers. We aim to inspire and empower you to embark on your own extraordinary journeys, armed with valuable insights and practical advice.
                            </p>
                        </div><!-- End .col-lg-5 -->

                        <div class="col-lg-6 offset-lg-1">
                            <div class="about-images">
                                <img src="{{url('')}}/assets/images/about/img-1.jpg" alt="" class="about-img-front">
                                <img src="{{url('')}}/assets/img/about.jpg" alt="" class="about-img-back">
                            </div><!-- End .about-images -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-light-2 pt-6 pb-6 -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-12 mb-lg-0">
                        <p>
                            Customer satisfaction is at the core of everything we do. Our dedicated customer support team is readily available to assist you at every step of your travel planning process, ensuring seamless coordination and personalized assistance. From helping you choose the perfect itinerary to addressing any queries or concerns, we are committed to making your travel experience smooth and hassle-free.
                            <br>
                            <br>

                            As a responsible travel company, we also prioritize sustainable and responsible tourism practices. We believe in preserving the natural beauty and cultural heritage of destinations for future generations to enjoy. By partnering with local communities, supporting eco-friendly initiatives, and promoting ethical tourism, we strive to make a positive impact on the places we visit.

                            <br>
                            <br>
                            Your trust and satisfaction are of utmost importance to us. We continually strive to exceed your expectations and deliver unparalleled travel experiences that create lifelong memories. Join us on this incredible journey of discovery and let Desert Safari 4x4 be your trusted companion in unlocking the wonders of the world.
                            <br>
                            <br>
                            <br>
                            Thank you for choosing Desert Safari 4x4 . We are honoured to be a part of your travel dreams and look forward to serving you with excellence and dedication.
                        </p>
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <div class="mb-5"></div><!-- End .mb-4 -->
            </div><!-- End .container -->

        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
@endsection