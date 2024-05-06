@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Terms & Conditions </h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms & Conditions </li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
            	<h2 class="entry-title">
                   Terms & Conditions
                </h2><!-- End .entry-title -->
                <p>
	                All bookings made with Desert Safari 4x4 are subject to the following terms and conditions. Since you’ll be bound by these conditions once the agreement comes into force, we request you to carefully read and understand them. Desert Safari 4x4  reserves the complete right to alter, add, or delete any of these terms and conditions without any prior notice, and such changes naturally apply to you upon booking a tour or package with us. Failure in adhering to our T&C might result in termination of services and deactivation of your account with <a href="www.desertsafari4x4.com">www.desertsafari4x4.com</a>.<br>
					We respect our valued customer's privacy and ensure not to collect any information other than the information relevant to make booking with us. As such, we strive to take care of our customer’s right to privacy in connection with their interaction with this website. Our scope of commitment as part of the use of your information is outlined herein.

                    </p>

                <div class="accordion accordion-rounded mt-3" id="accordion-1">
                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-1">
                            <h2 class="card-title">
                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                   Collection of Personal Information
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-1">
                            <div class="card-body">
                                We collect your information mainly when you contact us to inquire us about our products and services or make a booking with us. This usually includes your name, contact details, email id, physical address, credit card or payment details, travel requisites and referral source. Upon the submission of information, you give consent to Desert Safari 4x4  to use your information to process orders in an accurate and prompt manner.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-2">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    Use of Information
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-1">
                            <div class="card-body">
                                Any personal information of a client obtained through this website will be utilized by Desert Safari 4x4 to process his or her booking, verify credit card details, and provide relevant information associated with client’s travel or any other subsidiary services he or she would like to avail of. This information will also be used for auditing, research and activities focused to improve the performance of our website.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-3">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    Privacy of Your Information
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-1">
                            <div class="card-body">
                                All information provided by our customers during online booking, such as their name, address, email id and credit card details is considered private, and will not be disclosed or sold to anyone except for certain suppliers or third parties whose involvement in the loop is fundamental for the successful processing of your order. But before disclosing your information, we make sure that these third parties abide by our privacy policy and adhere to strict safety measures.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-4">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    Legal Disclosure of Information
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-1">
                            <div class="card-body">
                                We may disclose your information, if we feel that such disclosure is pertinent to protect our company’s rights and / or abide by a court order or a legal proceeding.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-5">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                    Non-Personal Information
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-1">
                            <div class="card-body">
                                Desert Safari 4x4 consistently collects data from website, with the help of patterns via web logs and third-party service providers. But this data is mostly deployed to evaluate the efficiency of our websites’ content and features.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-6">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                                    Opt-Out
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion-1">
                            <div class="card-body">
                                We provide options for visitors to our website to ‘opt-out’ of having their personal information used for certain purposes. For instance, if you don’t want to receive any marketing material by way of newsletter or promotional emails, you can choose to request us not to send advertising information from Desert Safari 4x4 or our affiliate websites.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-7">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                                    Contests and Surveys
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion-1">
                            <div class="card-body">
                                Desert Safari 4x4 conducts contests, drawings and surveys every now and then. Some contents are organized in collaboration with a third-party sponsor, and visitors to our websites will be informed at the time of the contest regarding the involvement of a particular third party and their extent of using your personal information. Since participating in these contests is voluntary, it’s solely at your discretion whether or not to partake in them and reveal your personal information.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->

                    <div class="card card-box card-sm bg-light">
                        <div class="card-header" id="heading-8">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-8" aria-expanded="false" aria-controls="collapse-8">
                                    Secured Transaction
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordion-1">
                            <div class="card-body">
                                In order to maintain accuracy of data and avoid unauthorized access of our client’s personal information, we make sure that all transactions are carried out through our secured server. Moreover, we utilize technical safeguard system such as encryption, socket layers, and firewalls to secure your sensitive information like credit card details.
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