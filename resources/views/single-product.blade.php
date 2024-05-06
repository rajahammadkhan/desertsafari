@extends('layouts.master')

@php
    $explodedName = explode(" ", $activity->name);
    $first = preg_replace('/\W\w+\s*(\W*)$/', '$1', $activity->name);
@endphp
@section('title') {{$first}} {{$explodedName[count($explodedName)-1]}} | @endsection

@section('top-styles')
<style>
    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
      cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 10px;
        font-weight: bold;
        font-size: 20px;
        -webkit-user-select: none;
        background-color: rgba(0, 0, 0, 1);
    }

    /* Position the "next button" to the right */
    .next {
      right: 1rem;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.9);
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* Six columns side by side */
    .column {
      float: left;
      width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
      opacity: 0.6;
    }

    .active,
    .demo:hover {
      opacity: 1;
    }

    table {
      width: 100%;
      border-radius: 200px;
    }

    td, th {
        text-align: left;
        padding: 3px 15px;
        border-bottom: 1px solid rgba(211,211,211,0.4);
        font-size: 12px;
    }

    tr:last-child td,
    tr:last-child th {
      border: 0px;
    }

    tr:nth-child(even) {
    /*  background-color: #dddddd;*/
    }
    #price{
        color: black;
        font-size: 16px;
        font-style: italic;
        font-weight: 600;
        width: auto;
        display: flex;
        float: right;
        gap: 3px;
    }

    #price b{
        color: black;
        font-size: 25px;
        font-style: italic;
        font-weight: 900;
        width: auto;
        display: flex;
        float: right;
    }

    .product-details-action .btn-cart {
      color: #001433;
      border-color: #001433;
      font-size: 1.4rem;
      text-transform: uppercase;
      box-shadow: none;
      transition: box-shadow .35s ease, color 0s ease;
    }
    .product-details-action {
      gap: 10px;
      justify-content: center;
    }

    .product-details-action .btn-enquiry {
      color: #001433;
      border: 0.1rem solid #001433;
      font-size: 1.4rem;
      text-transform: uppercase;
      box-shadow: none;
      transition: box-shadow .35s ease, color 0s ease;
      padding: 1rem 1.5rem;
      max-width: 198px;
      gap: 5px;
    }

    .product-details-action .btn-enquiry:hover {
      color: white !important;
      border: 0.1rem solid #e87810;
      background-color: #e87810;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fff;
      margin: 15% auto;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    #image-slider{
        width:100%; 
        height: 350px; 
        object-fit: cover;
    }
    .visa{
        flex-wrap: wrap;
        gap: 20px;
        padding: 15px;
        border-radius: 8px;
        display: flex;
        box-shadow: 0.2px 0.2px 3px gray;
    }
    .visainner{
        display: flex;
        gap: 15px;
    }
    .visainner span{
        width: 100%;
    }
    .visainner span label{
        font-size: 12px; 
        margin: 0.5rem;
    }
    .visaprice{
        float: right;
        width: 100%;
        display: flex;
        justify-content: inherit;
    }
    .visaprice span{
        float: right;
/*        background-color: rgba(211, 211, 211, 0.4);*/
        border-radius: 5px;
        padding: 5px 15px;
    }
    .visaprice span label{
        font-size: 12px;
        margin: 0rem;
    }
    #calendar p{
        width: 100%;
        background-color: #001433;
        color: white;
        border-radius: 5px;
        padding: 5px;
    }
    @media screen and (max-width: 580px){
        .product-details-action {
          flex-flow: row wrap;
          align-items: flex-start;
        }
        #image-slider{
            width:100%; 
            height: 180px; 
            object-fit: cover;
        }
        .visainner{
            display: block;
        }
        .visainner span{
            min-width: 30%;
        }
        #calendar p{
            text-align: center;
        }

        .visaprice{
            float: right;
            width: 100%;
            display: flex;
            justify-content: inherit;
        }
        .visaprice span{
            float: right;
    /*        background-color: rgba(211, 211, 211, 0.4);*/
            border-radius: 5px;
            padding: 5px 15px;
        }
        .visaprice span label{
            font-size: 12px;
            margin: 0rem;
        }
    }

     /* Assign full width inputs*/ 
    input[type=text], 
    input[type=email],
    select,
    textarea { 
        width: 100%; 
        padding: 12px 40px; 
        margin: 8px 0; 
        display: inline-block; 
        border: 1px solid #ccc; 
        box-sizing: border-box; 
    } 

    select,
    textarea {
      width: 100%;
      padding: 12px 40px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .inputicon {
        position: relative;
    }
      
    .inputicon i{
        position: absolute;
        left: 25px;
        top: 20px;
        color: gray;
    }
      
    .fontpassword {
        position: relative;
    }
      
    .fontpassword i{
        position: absolute;
        left: 15px;
        top: 40px;
        color: gray;
    }
    .select2-container {
        z-index: 9999;
        width: 100% !important;
        height: 40px;
        padding: 5px 30px;
        font-size: 1.4rem;
        line-height: 1.5;
        font-weight: 300;
        color: #777;
        border: 1px solid #ebebeb;
        border-radius: 0;
        margin-bottom: 2rem;
        transition: all 0.3s;
        box-shadow: none;
        text-align: left;
        background-color: #fafafa;
    }
    .select2-container--default .select2-selection--single {
        background-color: transparent !important;
        border: 1px solid transparent !important;
        border-radius: 4px;
    }

    input[type="checkbox"] {
      /* Hide the default checkbox */
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      /* Provide a fallback for older browsers */
      display: inline-block;
      width: 16px;
      height: 16px;
      border: 1px solid #999;
      border-radius: 3px;
      background-color: #fff;
      vertical-align: middle;
      position: relative;
    }

    /* Custom checkbox styles */
    input[type="checkbox"]:checked {
      /* Styles for the checked state */
      background-color: #e87810;
      border-color: #e87810;
    }

    input[type="checkbox"] + label {
      /* Styles for the label next to the checkbox */
      margin-left: 5px;
      vertical-align: middle;
    }

    /* Custom checkbox checkmark color */
    input[type="checkbox"] + label:after {
      color: #e7740e;
    }
    #btn-cart_hover{
        background-color: transparent; 
    }
    #btn-cart_hover:hover{
        background-color: rgb(0, 20, 51); 
        color: white;
    }
</style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('content')  
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product') }}">Activity</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$activity->name}}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div >  
                            @foreach($activity->gallery_images as $gallery)                          
                              <div class="mySlides">
                                <img src="{{config('fashion.file_path').$gallery->image}}" alt="{{$activity->name}}" id="image-slider">
                              </div>
                            @endforeach
                                
                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                              <a class="next" onclick="plusSlides(1)">❯</a>

                            </div>
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title mt-2">{{$activity->name}}</h1><!-- End .product-title -->

                                <div class="product-price">
                                    <small>From </small> <span style="font-weight: 600;margin-left: 10px;font-size: 2.6rem;font-style: italic;"> AED {{number_format($activity->price)}}.00</span>
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <span style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{!! $activity->about_experience !!}</span>
                                </div><!-- End .product-content -->

                                <div class="product-details-action">
                                    <a href="#" class="btn-product btn-enquiry" id="openModalBtn"><i class="fa-solid fa-gears fa-beat-fade"></i> Quick Enquiry</a>

                                    <!-- <add-to-cart-button-detail product-id="{{ $activity->id }}" user-id="{{ Auth::user()->id ?? 0 }}">sad</add-to-cart-button-detail> -->
                                    <!-- <add-to-cart-button product-id="{{ $activity->id }}" user-id="{{ Auth::user()->id ?? 0 }}"></add-to-cart-button> -->

                                    <a href="#activity-form_data" class="btn-product btn-cart" id="btn-cart_hover">Add to Cart</a>
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <input type="text" class="filter" id="share_url" placeholder="Blog Post URL" readonly style="display: none;">
                                        <a class="social-icon" id="shareWithFb" title="Facebook"><i class="icon-facebook-f"></i></a>
                                        <a class="social-icon" id="shareWithTwitter" title="Twitter"><i class="icon-twitter"></i></a>
                                        <a class="social-icon" id="shareWithWhatsapp" title="Whatsapp"><i class="icon-whatsapp"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="product-details">
                                <div class="visa">
                                    <p><i class="fa-regular fa-clock"></i> {{$activity->operating_hours}}</p>    
                                    <p><i class="fa fa-bolt"></i> {{$activity->instant_confirmation}}</p>    
                                    <p><i class="fa fa-print"></i> {{$activity->mobile_voucher_accepted}}</p>    
                                    <p><i class="fa fa-check-circle-o"></i> {{$activity->non_refundable}}</p>    
                                    <p><i class="fa fa-globe"></i> {{$activity->language}}</p>    
                                    <p><i class="fa fa-car"></i> {{$activity->transfer_options_available}}</p>    
                                    <p><a href="{{$activity->google_map_link}}" target="_blank"><i class="fa fa-map-marker"></i> Google Map</a></p>    
                                </div>

                                <h1 class="product-title mt-2" id="activity-form_data">{{$activity->name}}</h1><!-- End .product-title -->

                                <!--<form action="" method="Get">
                                    @csrf
                                    <div class="visa">
                                        @foreach($activity->activityprice as $activityoption)
                                          <div style="width: 100%;">
                                            <h6>
                                              <input type="checkbox" name="selected_packages[]" id="selected_package_{{ $activityoption->id }}" value="{{$activityoption->activity_name}}" {{ $loop->first ? 'checked' : '' }}>
                                              <label for="selected_package_{{ $activityoption->id }}" style="font-size: 1.6rem;margin: 0;font-weight: 500;color: #001433;">{{$activityoption->activity_name}}</label>
                                            </h6>
                                            <div class="visainner">
                                              <span>                                                    
                                                <label>Transfer Option</label>
                                                <select class="form-control" style="margin: 0;" name="transfer_option" id="transfer_option{{ $activityoption->id }}">
                                                    @if(!empty($activityoption->without_transfer_option_price))
                                                      <option value="{{$activityoption->without_transfer_option_price}}">Without Transfer</option>
                                                    @endif

                                                    @if(!empty($activityoption->sharing_transfer_option_price))
                                                      <option value="{{$activityoption->sharing_transfer_option_price}}">Sharing Transfer</option>
                                                    @endif

                                                    @if(!empty($activityoption->private_transfer_option_price))
                                                      <option value="{{$activityoption->private_transfer_option_price}}">Private Transfer</option>
                                                    @endif
                                                </select>
                                                <p id="totalamount_transfer_option{{ $activityoption->id }}"></p>
                                              </span>

                                              <span>                                                    
                                                <label>Tour Date</label>
                                                <input type="date" class="form-control" style="margin: 0;" max="travel_date_end" name="travel_date" />
                                              </span>

                                              @if(!empty($activityoption->adult_price))
                                                  <span>                                                    
                                                    <label>Adult</label>
                                                    <select class="form-control" id="adult_price{{ $activityoption->id }}" name="adult_price" style="margin: 0;">
                                                      @for ($i = 0; $i <= 500; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                      @endfor
                                                    </select>
                                                    {{ $activityoption->adult_price }} 
                                                    <p id="total_Amount_adult_price{{ $activityoption->id }}"></p> 
                                                  </span>
                                                  @else
                                                  <span>                                                    
                                                    <label>Adult</label>
                                                    <select class="form-control" id="adult_price{{ $activityoption->id }}" name="adult_price" style="margin: 0;" readonly>
                                                      <option value="0">0</option>
                                                    </select>
                                                    {{ $activityoption->adult_price }} 
                                                    <p id="total_Amount_adult_price{{ $activityoption->id }}"></p> 
                                                  </span>
                                              @endif

                                              @if(!empty($activityoption->child_price))
                                                <span>                                                    
                                                  <label>Child 4-12 Yrs</label>
                                                  <select class="form-control" id="child_price{{ $activityoption->id }}" name="child_price" style="margin: 0;">
                                                    @for ($i = 0; $i <= 500; $i++)
                                                      <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                  </select>
                                                  {{ $activityoption->child_price }} 
                                                  <p id="total_Amount_child_price{{ $activityoption->id }}"></p> 
                                                </span>
                                                @else
                                                <span>                                                    
                                                  <label>Child 4-12 Yrs</label>
                                                  <select class="form-control" id="child_price{{ $activityoption->id }}" name="child_price" style="margin: 0;" readonly>
                                                      <option value="0">0</option>
                                                  </select>
                                                  {{ $activityoption->child_price }} 
                                                  <p id="total_Amount_child_price{{ $activityoption->id }}"></p> 
                                                </span>
                                            @endif

                                                <p id="total_Amount{{ $activityoption->id }}"></p> 

                                            @if(!empty($activityoption->infant_price))
                                              <span>                                                    
                                                <label>Infant 0-0 Yrs</label>
                                                <select class="form-control" id="infant_price{{ $activityoption->id }}" name="infant_price" style="margin: 0;">
                                                  @for ($i = 0; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                  @endfor
                                                </select>
                                                {{ $activityoption->infant_price }} 
                                                  <p id="total_Amount_infant_price{{ $activityoption->id }}"></p> 
                                              </span>
                                              @else
                                              <span>                                                    
                                                <label>Infant 0-0 Yrs</label>
                                                <select class="form-control" id="infant_price{{ $activityoption->id }}" name="infant_price" style="margin: 0;" readonly>
                                                  <option value="0">0</option>
                                                </select>
                                                {{ $activityoption->infant_price }} 
                                                  <p id="total_Amount_infant_price{{ $activityoption->id }}"></p> 
                                              </span>

                                            @endif

                                                <div class="visaprice">
                                                    <span>                                                    
                                                        <label>Total Amount</label>
                                                        <b id="price">
                                                            <b id="total_Amount{{ $activityoption->id }}">
                                                                {{number_format($activityoption->without_transfer_option_price)}}.00
                                                            </b> 
                                                            AED
                                                        </b>    
                                                    </span>
                                                </div>  
                                            </div>
                                          </div>
                                        @endforeach
                                    </div>
                                    <div class="product-details-action" style="float: right;">
                                        <a href="#" class="btn-product btn-cart mt-1">add to cart</a> 
                                        <button type="submit" class="btn-product btn-cart mt-1" id="btn-cart_hover">add to cart</button>
                                    </div>
                                </form>  -->
                                <add-to-cart-form :activityoption="{{ $activity->activityprice }}" :activity="{{ $activity->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-cart-form>


                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <div class="row">
                        @if($activity->about_experience)
                            <div class="col-md-12">
                                <div class="product-details visa">
                                    <h6 class="product-title">About The Experience</h6><!-- End .product-title -->
                                    <br>
                                    {!! $activity->about_experience !!}
                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-12 -->
                        @endif

                        @if($activity->highlights)
                            <div class="col-md-12">
                                <div class="product-details visa">
                                    <h6 class="product-title">Highlights</h6><!-- End .product-title -->
                                    <br>
                                    {!! $activity->highlights !!}
                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-12 -->
                        @endif

                        @if($activity->tour_inclusions)
                            <div class="col-md-12">
                                <div class="product-details visa">
                                    <h6 class="product-title">Tour Inclusions</h6><!-- End .product-title -->
                                    <br>
                                    {!! $activity->tour_inclusions !!}
                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-12 -->
                        @endif

                        @if($activity->important_information)
                            <div class="col-md-12">
                                <div class="product-details visa">
                                    <h6 class="product-title">Important Information</h6><!-- End .product-title -->
                                    <br>
                                    {!! $activity->important_information !!}
                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-12 -->
                        @endif

                        @if($activity->booking_policy)
                            <div class="col-md-12">
                                <div class="product-details visa">
                                    <h6 class="product-title">Booking Policy</h6><!-- End .product-title -->
                                    <br>
                                    {!! $activity->booking_policy !!}
                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-12 -->
                        @endif
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Quick Enquiry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-div mt-2 text-center">
            <div style="border: 1px solid #ddd;padding: 10px;border-radius: 10px;">
                <h6>Travel Expert will Assist you!</h6>            
                <div class="row" style="display: flex;justify-content: center;font-size: 17px;">
                    <div class="col-md-6">
                        <a href="tel:{{ getSettings('contact_no') }}"><i class="fa fa-phone" aria-hidden="true"></i> {{ getSettings('contact_no') }}</a>
                    </div>

                    <div class="col-md-6">
                        <?php
                        $contactNo = getSettings('contact_no');
                        $formattedNumber = str_replace(' ', '', $contactNo);
                        ?>
                        <a href="https://wa.me/<?php echo $formattedNumber; ?>"><i class="fa fa-whatsapp" aria-hidden="true" style="color: forestgreen;"></i> {{ getSettings('contact_no') }}</a>
                        <!-- <a href="https://wa.me/str_replace(' ', '', {{ getSettings('contact_no') }})"><i class="fa fa-whatsapp" aria-hidden="true"></i> {{ getSettings('contact_no') }}</a> -->
                        
                    </div>

                </div>
            </div>  
            <p>OR</p>  
            <div style="border: 1px solid #ddd;padding: 10px;border-radius: 10px;">
                <h6>Quick Enquiry</h6> 
                <form method="post" action="{{ route('enquiry-us') }}">
                    @csrf
                    <input type="hidden" class="form-control" name="product_name" placeholder="Product Name" value="{{$activity->name}}">
                    <input type="hidden" class="form-control" name="product_link" placeholder="Product Link" value="{{url('')}}/activites/{{$activity->slug}}">
                    <div class="row">
                        <div class="col-md-6 inputicon">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                        </div>

                        <div class="col-md-6 inputicon">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                        </div>

                        <div class="col-md-12 inputicon">
                            <i class="fa-solid fa-envelope-open"></i>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        
                        <div class="col-md-6 inputicon mt-1">
                            <i class="fa-sharp fa-solid fa-earth-americas" style="top: 14px; z-index: 99999;"></i>
                            <select class="form-control" name="country" style="padding: 0px 40px;" id="country">
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Oman">Oman</option>
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Northern Cyprus">Northern Cyprus</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 inputicon">
                            <i class="fa-solid fa-phone"></i>
                            <input type="text" class="form-control" name="number" placeholder="Mobile Number" required>
                        </div>
                        
                        <div class="col-md-12 inputicon">
                            <i class="fa-solid fa-comments"></i>
                            <textarea type="text" class="form-control" name="subject" rows="3" placeholder="Put Your Remark Here" style="padding: 12px 40px;" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Enquiry</button>
                </form> 
            </div>          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script> 
<script>
    var copiedLink = '';
        function copyToClipboard(element, btnElem) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            $temp.remove();
            $(btnElem).html(`<i class="fa fa-link"> </i> `);
            setTimeout(() => {
                $(btnElem).html(`<i class="far fa-clipboard"> </i> `);
            }, 2000);
        }
        $(document).ready(function() {
            copiedLink = $('#share_url').val();
            $('#shareWithTwitter').click(function () {
            window.open("https://twitter.com/intent/tweet?url=" + copiedLink);
        });
        $('#shareWithFb').click(function () {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + copiedLink, 'facebook-share-dialog', "width=626, height=436");
        });
        $('#shareWithWhatsapp').click(function () {
            var win = window.open('https://api.whatsapp.com/send?text=' + copiedLink, '_blank');
            win.focus();
        });
        $(document).on('click', '.ctoCb', function () {
            copyToClipboard($(this).parent().parent().find('input'), $(this));
        });
    });
    document.getElementById("share_url").value = window.location.href;

    var modal = document.getElementById("myModal");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementsByClassName("close")[0];

    openModalBtn.onclick = function() {
      modal.style.display = "block";
    }

    closeModalBtn.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>
@foreach($activity->activityprice as $activityoption)
<script type="text/javascript">
    $(document).ready(function() {
      calculateTotalAmount{{ $activityoption->id }}();
    });

    function calculateTotalAmount{{ $activityoption->id }}() {
      var totalAmount = 0;

      // Adult price calculation
      $('#adult_price{{ $activityoption->id }}').change(function() {
        var selectedValue = $(this).val();
        var adultPrice = {{ $activityoption->adult_price }};
        var totalPrice = selectedValue * adultPrice;
        $('#total_Amount_adult_price{{ $activityoption->id }}').text(totalPrice);
        calculateGrandTotal{{ $activityoption->id }}();
      });

      // Child price calculation
      $('#child_price{{ $activityoption->id }}').change(function() {
        var selectedValue = $(this).val();
        var childPrice = {{ $activityoption->child_price }};
        var totalPrice = selectedValue * childPrice;
        $('#total_Amount_child_price{{ $activityoption->id }}').text(totalPrice);
        calculateGrandTotal{{ $activityoption->id }}();
      });

      // Infant price calculation
      $('#infant_price{{ $activityoption->id }}').change(function() {
        var selectedValue = $(this).val();
        var childPrice = {{ $activityoption->infant_price }};
        var totalPrice = selectedValue * childPrice;
        $('#total_Amount_infant_price{{ $activityoption->id }}').text(totalPrice);
        calculateGrandTotal{{ $activityoption->id }}();
      });

      // Transfer option calculation
      $('#transfer_option{{ $activityoption->id }}').change(function() {
        var selectedValue = $(this).val();
        $('#totalamount_transfer_option{{ $activityoption->id }}').text(selectedValue);
        calculateGrandTotal{{ $activityoption->id }}();
      });

      function calculateGrandTotal{{ $activityoption->id }}() {
        totalAmount = 0;
        var adultPrice = {{ $activityoption->adult_price }};
        var selectedAdultValue = $('#adult_price{{ $activityoption->id }}').val();
        var adultTotalPrice = selectedAdultValue * adultPrice;
        totalAmount += adultTotalPrice;

        var childPrice = {{ $activityoption->child_price }};
        var selectedChildValue = $('#child_price{{ $activityoption->id }}').val();
        var childTotalPrice = selectedChildValue * childPrice;
        totalAmount += childTotalPrice;

        var infantPrice = {{ $activityoption->infant_price }};
        var selecteInfantValue = $('#infant_price{{ $activityoption->id }}').val();
        var infantTotalPrice = selecteInfantValue * infantPrice;
        totalAmount += infantTotalPrice;

        var selectedTransferOptionValue = $('#transfer_option{{ $activityoption->id }}').val();
        totalAmount += parseFloat(selectedTransferOptionValue);

        // $('#total_Amount{{ $activityoption->id }}').text(totalAmount.toFixed(2));
        var formattedTotalAmount = totalAmount.toLocaleString(undefined, {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });

        $('#total_Amount{{ $activityoption->id }}').text(formattedTotalAmount);
        $('#total_Amountinput{{ $activityoption->id }}').val(formattedTotalAmount);
      }
    }
  </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
 $(function(){
  $("#country").select2();
 }); 
</script>
  @endforeach
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  @if(isset($success))
  <script>
      $(document).ready(function () {

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;

        toastr.success('Add Service Add to Cart');
    });
  </script>
  @endif
@endsection