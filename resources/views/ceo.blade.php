@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">CEO Message</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">CEO Message</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content pb-0">

            <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-3 mb-lg-0">
                            <h2 class="title">Dear Valued Customers,</h2><!-- End .title -->
                            <!-- <p class="lead text-primary mb-3">Name: CEO</p> -->
                            <p class="mb-2">
                                Welcome to our tour activities website! We are thrilled to have you here and offer you a wide range of exciting activities that will make your travel experiences unforgettable.
                                <br>
                                At our company, we are passionate about creating unique and memorable travel experiences for our customers. Whether you're seeking adventure, cultural immersion, or just relaxation, we have something for everyone.
                                <br>
                                Our team works tirelessly to curate a selection of high-quality activities that meet our customers' needs and expectations. We are committed to providing exceptional customer service and ensuring that every customer has a seamless and enjoyable booking experience.
                                <br>
                                Our mission is not only to offer you the best travel activities but also to inspire you to explore new places and cultures, connect with local communities, and make lasting memories. We believe that travel is not just a way to escape from everyday life, but also an opportunity to learn, grow, and enrich our lives.
                                <br>
                                We are proud of our team's dedication and commitment to delivering outstanding travel experiences, and we are grateful to our customers for their continued support and trust in our services.
                                <br>
                                Thank you for choosing our tour activities website, and we look forward to helping you plan your next adventure!
                                <br>
                                <br>
                                Sincerely,
                            </p>
                        </div><!-- End .col-lg-5 -->

                        <div class="col-lg-6 offset-lg-1">
                            <div class="about-images">
                                <img src="{{url('')}}/assets/images/about/img-1.jpg" alt="" class="about-img-front">
                                <img src="{{url('')}}/assets/images/about/img-2.jpg" alt="" class="about-img-back">
                            </div><!-- End .about-images -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-light-2 pt-6 pb-6 -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
@endsection