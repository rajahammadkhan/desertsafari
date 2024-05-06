@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Frequently Asked Questions</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ's</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="accordion accordion-rounded" id="accordion-1">
                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-1">
                            <h2 class="card-title">
                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                   What kind of activities can I book through your website?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-1">
                            <div class="card-body">
                                You can book a wide range of activities through our website, including sightseeing tours, adventure activities, cultural experiences, and more. We offer activities for individuals, couples, families, and groups.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-2">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    How do I make a booking?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-1">
                            <div class="card-body">
                                You can make a booking on our website by selecting the activity you want to book and providing your personal and payment details. Once you've completed the booking process, you'll receive a confirmation email with all the details of your booking. 
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-3">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    Is it safe to book through your website?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-1">
                            <div class="card-body">
                                Yes, it is safe to book through our website. We use secure payment gateways to process your payment information and we take all necessary measures to protect your personal data.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-4">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    Can I cancel my booking?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-1">
                            <div class="card-body">
                                Yes, you can cancel your booking, but cancellation policies vary depending on the activity and the supplier. You can find the cancellation policy for each activity on the activity page.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-5">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                    What happens if the activity is cancelled?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-1">
                            <div class="card-body">
                                If the activity is cancelled by the supplier, we will notify you as soon as possible and provide you with a full refund or an alternative activity, if available.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-6">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                                    How do I contact customer support? 
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion-1">
                            <div class="card-body">
                                You can contact our customer support team by phone, email, or live chat. Our customer support hours are [insert hours of operation].
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-7">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                                    What if I have special needs or requirements?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion-1">
                            <div class="card-body">
                                If you have special needs or requirements, please let us know at the time of booking so we can make the necessary arrangements to ensure your experience is as enjoyable as possible.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-8">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-8" aria-expanded="false" aria-controls="collapse-8">
                                    What should I bring with me on the activity?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordion-1">
                            <div class="card-body">
                                You should check the activity page for any specific requirements or recommendations. In general, we recommend bringing comfortable clothing and footwear, sunscreen, a hat, and a water bottle.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-9">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-9" aria-expanded="false" aria-controls="collapse-9">
                                    Do you offer any discounts or promotions? 
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-9" class="collapse" aria-labelledby="heading-9" data-parent="#accordion-1">
                            <div class="card-body">
                                Yes, we offer various discounts and promotions throughout the year. You can check our website or sign up for our newsletter to stay updated on the latest offers.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-10">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-10" aria-expanded="false" aria-controls="collapse-10">
                                    How do I leave a review for an activity?
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-10" class="collapse" aria-labelledby="heading-10" data-parent="#accordion-1">
                            <div class="card-body">
                                After your activity is complete, we will send you an email asking you to leave a review. You can also leave a review on our website by visiting the activity page and clicking on the "Leave a review" button.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->
                </div><!-- End .accordion -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
@endsection