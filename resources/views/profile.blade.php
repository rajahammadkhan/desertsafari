@extends('layouts.master')

@section('top-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bulma.min.css">
<style>
    .modal-content{
        padding: 20px;
    }

    #Pending{
        color: rgb(102, 191, 1);
        font-weight: 600;
    }
    #Cancelled{
        color: red;
        font-weight: 500;
    }
    #Approved{
        color: green;
        font-weight: 700;
    }
    .table th
    {
        padding: 0px 10px;
    }
    .table td
    {
        padding: 0px 15px;
    }

    @media print {
      @page {
          size: A4;
          margin: 15mm;
      }
    }
    .invoice {
      width: 100%;
      max-width: 600px;
      background-color: #ffffff;
      border: 1px solid #e2e2e2;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      padding: 20px;
      box-sizing: border-box;
      margin: 20px auto;
      display: none;
    }
    .invoice-header {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .invoice-logo img {
      max-height: 60px;
    }
    .invoice-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin: 0;
      flex-basis: 100%;
      text-align: center;
    }
    .invoice-details {
      font-size: 14px;
      color: #666;
      flex-basis: 50%;
      text-align: left;
    }
    .invoice-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .invoice-table th,
    .invoice-table td {
      border: 1px solid #e2e2e2;
      padding: 12px;
      text-align: left;
      color: #333;
    }
    .invoice-table th {
      background-color: #f9f9f9;
    }
    .invoice-total {
      text-align: right;
      font-weight: bold;
      font-size: 18px;
      color: #333;
      margin-top: 20px;
    }

    /* Responsive Styles */
    @media screen and (max-width: 600px) {
      .invoice-details {
        flex-basis: 100%;
        margin-top: 10px;
        text-align: center;
      }
    }
    select.form-control:not([size]):not([multiple]){
        width: 50%;
    }
  </style>
@endsection

@section('content')  
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Desert Safari</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-2 col-lg-2">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-10 col-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">{{ Auth::user()->name }}</span>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">( Log out ) 
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                <br>
                                From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a> and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @if($processings[0]->client_id < Auth::user()->id)
                                    <p>No order has been made yet.</p>
                                    <a href="{{ route('product') }}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                @else
                                    <div>
                                        <div class="order-details">
                                            <h3 class="title">Your Order</h3>

                                            <table id="example" class="table is-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="no-sort text-center">Order No</th>
                                                        <th class="no-sort text-center">Name</th>
                                                        <th class="no-sort text-center">Service Name</th>
                                                        <th class="no-sort text-center">Amount</th>
                                                        <th class="no-sort text-center">Date</th>
                                                        <th class="no-sort text-center">Order Status</th>
                                                        <th class="no-sort text-center">Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($processings as $processing)
                                                            @if( $processing->client_id  == Auth::user()->temp_id)
                                                                <tr>
                                                                    <td class="product-total">
                                                                        <span class="subtotal-amount">{{ $processing->order_number }}</span>
                                                                    </td>
                                                                    <td class="product-total">
                                                                        <span class="subtotal-amount">{{ $processing->client_name }}</span>
                                                                    </td>
                                                                    <td class="product-name">
                                                                           @php
                                                                                $orderDetails = json_decode($processing->order_details, true);
                                                                            @endphp
                                                                            @if(!is_null($orderDetails))
                                                                                @foreach(json_decode($orderDetails, true) as $key => $value)
                                                                                    @if(is_numeric($key))
                                                                                        <span>
                                                                                        </span>
                                                                                        <span>
                                                                                            @if (isset($value['product']))                                                                            
                                                                                                @if($value['product'] == "visa")
                                                                                                    <span style="font-size: 11px; text-align: center;font-weight: 500;color: #e87810;">(Visa)</span>
                                                                                                @endif
                                                                                            @endif
                                                                                        </span>
                                                                                        @if (isset($value['activity_packages']))
                                                                                                @php
                                                                                                    $activityPackages = json_decode($value['activity_packages']);
                                                                                                @endphp
                                                                                                @if (!is_null($activityPackages))
                                                                                                    @foreach ($activityPackages as $package)
                                                                                                        <span>
                                                                                                            {{ $package }}
                                                                                                        </span>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                        @endif

                                                                                        @if (isset($value['visa_packages']))
                                                                                                @php
                                                                                                    $visaPackages = json_decode($value['visa_packages']);
                                                                                                @endphp
                                                                                                @if (!is_null($visaPackages))
                                                                                                    @foreach ($visaPackages as $package)
                                                                                                        <span>
                                                                                                            {{ $package }} <span style="font-size: 11px; text-align: center;font-weight: 500;color: #e87810;">(Visa)</span><br>
                                                                                                        </span>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                        @endif

                                                                                        @if(!$loop->last)
                                                                                            <br>
                                                                                        @endif
                                                                                    @endif
                                                                                    <!-- Your update logic here -->
                                                                                @endforeach
                                                                        @endif
                                                                    </td>

                                                                    <td class="product-total">
                                                                        <span class="subtotal-amount">{{ number_format($processing->amount, 2) }} <br>AED</span>
                                                                    </td>
                                                                    <td class="product-total">
                                                                        <span class="subtotal-amount">{{ Carbon\Carbon::parse($processing->created_at)->format('F d, Y') }}</span>
                                                                    </td>
                                                                    <td class="product-total">
                                                                        <span class="subtotal-amount" id="{{ $processing->order_status }}">{{ $processing->order_status }}</span>
                                                                    </td>
                                                                    <td class="product-total">
                                                                        <span class="subtotal-amount" style="gap: 10px;display: flex;">
                                                                            <!-- <i class='fa fa-print' id="print-button{{ $processing->id }}" style="font-size: 18px; color: black;"></i> -->
                                                                            <!-- <i class='fa fa-print print-button' data-processing-id="{{ $processing->id }}" style="font-size: 18px; color: black; cursor: pointer;"></i> -->
                                                                            <i class='fa fa-file-pdf-o print-button-mobile' data-processing-id="{{ $processing->id }}" style="font-size: 18px; color: red; cursor: pointer;"></i>
                                                                            <i class='fa fa-eye' data-bs-toggle="modal" data-bs-target="#myModal{{ $processing->id }}" style="font-size: 18px; color: black; cursor: pointer;"></i>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                        @endforeach

                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach($processings as $processing)
                                                            @if( $processing->client_id  == Auth::user()->temp_id)
                                                                @php
                                                                    $total += $processing->amount;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <!-- <tr>
                                                            <td class="order-subtotal"></td>
                                                            <td class="order-subtotal"></td>
                                                            <td class="total-price">
                                                                <span>Order Total</span>
                                                            </td>
                                                            
                                                            
                                                            <td class="product-subtotal">
                                                                <span class="subtotal-amount">{{ number_format($total, 2) }} <br>AED</span>
                                                            </td>
                                                            <td class="order-subtotal"></td>
                                                            <td class="order-subtotal"></td>
                                                            <td class="order-subtotal"></td>

                                                            
                                                        </tr> -->
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th style="text-align:right">Order Total:</th>
                                                        <th>{{ number_format($total, 2) }} AED</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @foreach($processings as $processing)
                                    @if( $processing->client_id  == Auth::user()->temp_id)
                                        <div class="modal" id="myModal{{ $processing->id }}">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <!-- Modal Header -->
                                              <div class="modal-header">
                                                <h4 class="modal-title">Hello {{ $processing->client_name }}</h4>
                                                <i class="fa fa-times-circle" aria-hidden="true" data-bs-dismiss="modal"></i>
                                              </div>

                                              <!-- Modal body -->
                                              <div class="modal-body">
                                                <div>
                                                     <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td style="text-align: left;">
                                                                <img src="https://cms.desertsafari4x4.com/laravel_files/public/uploads/18F53yLv8syKrqwZNCi23qECn05qkFUklgQ6G8LJ.png" alt="{{ getSettings('site_name') }}" style="max-height: 60px;">
                                                            </td>
                                                            <td style="text-align: center; font-size: 24px; font-weight: bold; color: #333;">
                                                                Order Slip
                                                            </td>
                                                            <td style="text-align: right; font-size: 14px; color: #666;">
                                                                <p style="margin-bottom: 0.3rem;">Date: {{ $processing->updated_at->format('F j, Y') }}</p>
                                                                <p style="margin-bottom: 0.3rem;">Order No #: {{ $processing->order_number }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <hr style="margin: 0.6rem;">
                                                    
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Personal Information:</h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6" style="text-align: end;">
                                                            <h6>Status: <span id="{{ $processing->order_status }}">{{ $processing->order_status }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Order No: <span style="font-size: 13px; font-weight: 300">{{ $processing->order_number }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Name: <span style="font-size: 13px; font-weight: 300">{{ $processing->client_name }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Email: <span style="font-size: 13px; font-weight: 300">{{ $processing->client_email }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Number: <span style="font-size: 13px; font-weight: 300">{{ $processing->client_number }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Alternate Number: <span style="font-size: 13px; font-weight: 300">{{ $processing->client_alternate_number }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Country: <span style="font-size: 13px; font-weight: 300">{{ $processing->client_country }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Address: <span style="font-size: 13px; font-weight: 300">{{ $processing->client_address }}</span> </h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            @if($processing->client_shipaddress != null)
                                                                <h6>Ship Address: <span style="font-size: 13px; font-weight: 300">{{ $processing->client_shipaddress }}</span> </h6>
                                                            @else
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <hr style="margin: 0.6rem;">

                                                    <div class="row mt-1">
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <h6>Product Information:</h6>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6" style="text-align: end;">
                                                            <h6>Received: <span style="color: #e87810; font-weight: 800">{{ $processing->received_by }}</span></h6>
                                                        </div>
                                                    </div>
                                                    <table id="table" style="width: 100%;">
                                                        <tr style="color: white;background: black;font-weight: 700;">
                                                            <th>Service Name</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th>Total</th>
                                                        </tr>
                                                            @php
                                                                $orderDetails = json_decode($processing->order_details, true);
                                                            @endphp
                                                            @if(!is_null($orderDetails))
                                                                @foreach(json_decode($orderDetails, true) as $key => $value)
                                                                    <tr>
                                                                        @if(is_numeric($key))
                                                                            <td>
                                                                                <span>
                                                                                    @if (isset($value['product']))                                                                            
                                                                                        @if($value['product'] == "visa")
                                                                                            <span style="font-size: 11px; text-align: center;font-weight: 500;color: #e87810;">(Visa)</span>
                                                                                        @endif
                                                                                    @endif
                                                                                </span>
                                                                                @if (isset($value['activity_packages']))
                                                                                    @php
                                                                                        $activityPackages = json_decode($value['activity_packages']);
                                                                                    @endphp
                                                                                    @if (!is_null($activityPackages))
                                                                                        @foreach ($activityPackages as $package)
                                                                                            <span>
                                                                                                {{ $package }}<br>
                                                                                            </span>
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endif

                                                                                @if (isset($value['visa_packages']))
                                                                                    @php
                                                                                        $visaPackages = json_decode($value['visa_packages']);
                                                                                    @endphp
                                                                                    @if (!is_null($visaPackages))
                                                                                        @foreach ($visaPackages as $package)
                                                                                            <span>
                                                                                                {{ $package }} <span style="font-size: 11px; text-align: center;font-weight: 500;color: #e87810;">(Visa)</span><br>
                                                                                            </span>
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endif

                                                                                @if(!$loop->last)
                                                                                @endif
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            
                                                                            <td style="float: right;right: 20px;position: absolute;text-align: right;">    
                                                                                @php $total = 0; @endphp

                                                                                @php
                                                                                    $productType = $value['product_activity'] ?? $value['product_visa'];
                                                                                @endphp

                                                                                @if($productType === "activity" || $productType === "visa")
                                                                                    @php
                                                                                        $totalAmountKey = $productType === 'activity' ? 'activity_total_amount' : 'visa_total_amount';
                                                                                        $totalAmount = json_decode($value[$totalAmountKey], true);
                                                                                    @endphp

                                                                                    @foreach($totalAmount as $formattedTotal)
                                                                                            @if ($formattedTotal == 0)
                                                                                                0.00 AED<br>
                                                                                            @else
                                                                                                {{ number_format(floatval($formattedTotal), 2) }} AED<br>
                                                                                                @php
                                                                                                    $total += floatval($formattedTotal);
                                                                                                @endphp
                                                                                            @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            @endif 

                                                        <!-- <tr style="color: black; font-weight: 700;">
                                                            <td>Total</td>
                                                                <td></td>
                                                                <td></td>
                                                            <td style="float: right;right: 20px;position: absolute;">{{ number_format($total, 2) }} AED</td>
                                                        </tr> -->

                                                        @if(!empty($processing->discount_amount))
                                                            <tr style="color: white;background: gray;font-weight: 700;">
                                                                <td>Discount Amount</td>
                                                                <td></td>
                                                                <td></td>
                                                                @if($processing->discount_type === "price")
                                                                    <td style="float: right;right: 20px;position: absolute;">{{ $processing->discount_amount }}.00 AED</td>
                                                                @else
                                                                    <td style="float: right;right: 20px;position: absolute;">{{ $processing->discount_amount }} % AED</td>
                                                                @endif
                                                            </tr> 
                                                        @endif
                                                        <tr style="color: white;background: black;font-weight: 700;">
                                                            <td>Grand Total</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="float: right;right: 20px;position: absolute;">{{ number_format($processing->amount, 2) }} AED</td>
                                                        </tr>
                                                    </table>

                                                    @if($processing->client_note != null)
                                                        <h6 class="mt-1">Note: <br><span style="font-size: 15px; font-weight: 300">{{ $processing->client_note }}</span> </h6>
                                                    @else
                                                    @endif

                                                    @if($processing->reason_cancel != null)
                                                        <h6 style="padding: 10px;background-color: gainsboro;border-radius: 10px;">Reason Cancel Order Note: <span style="color: red;font-size: 14px;font-weight: 999;">(By Admin)</span> <br>
                                                            <span style="font-size: 15px; font-weight: 300">{!!$processing->reason_cancel!!}</span> 
                                                        </h6>
                                                    @else
                                                    @endif
                                                </div>
                                              </div>

                                              <!-- Modal footer -->
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                              </div>

                                            </div>
                                          </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div><!-- .End .tab-pane -->
                            
                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                                                <p>User Name<br>
                                                User Company<br>
                                                John str<br>
                                                New York, NY 10001<br>
                                                1-234-987-6543<br>
                                                yourmail@mail.com<br>
                                                <a href="#">Edit <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                <p>You have not set up this type of address yet.<br>
                                                <a href="#">Edit <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form method="POST" action="{{ route('user.update', [$user->id]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="First Name" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $user->lname }}" placeholder="Last Name" required autocomplete="lname">

                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Date Of Birth *</label>
                                    <input type="date" class="form-control" placeholder="Date" name="date_of_birth" value="{{ $user->date_of_birth }}">


                                    <label>Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="Email" readonly="true">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    <label>Number *</label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="phone" value="{{ $user->phone }}">

                                    <label>New Password *</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    <label>Confirm Password *</label>
                                    <input type="password" class="form-control" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@foreach($processings as $processing)
    @if( $processing->client_id  == Auth::user()->temp_id)
        <div class="invoice" id="print-content{{ $processing->id }}">
            <div class="invoice-header">
              <div class="invoice-logo">
                <img src="https://cms.desertsafari4x4.com/laravel_files/public/uploads/18F53yLv8syKrqwZNCi23qECn05qkFUklgQ6G8LJ.png" alt="Company Logo">
              </div>
              <div class="invoice-title">Order Slip</div>
              <div class="invoice-details" style="float: right">
                <p>Date: {{ $processing->updated_at->format('F j, Y') }}</p>
                <p>Order No #: {{ $processing->order_number }}</p>
              </div>
            </div>
            <hr>
            <div >
                <h4>Personal Information: <span style="float: right; font-size: 15px;">Status: <span id="{{ $processing->order_status }}">{{ $processing->order_status }}</span></span></h4>

                <div style="display:inline;">
                    <span><b>Name:</b> <span style="font-size: 15px; font-weight: 300">{{ $processing->client_name }}</span> </span>
                    <span style="float:right"><b>Email:</b> <span style="font-size: 15px; font-weight: 300">{{ $processing->client_email }}</span> </span>
                </div>

                <br>

                <div style="display:inline;">
                    <span><b>Number:</b> <span style="font-size: 15px; font-weight: 300">{{ $processing->client_number }}</span> </span>
                    <span style="float:right"><b>Alternate Number:</b> <span style="font-size: 15px; font-weight: 300">{{ $processing->client_alternate_number }}</span> </span>
                </div>
                
                <br>

                <div style="display:inline;">
                    <span><b>Country:</b> <span style="font-size: 15px; font-weight: 300">{{ $processing->client_country }}</span> </span>
                    <span style="float:right"><b>Address:</b> <span style="font-size: 15px; font-weight: 300">{{ $processing->client_address }}</span> </span>
                </div>
                
                <br>

                    @if($processing->client_shipaddress != null)
                        <span><b>Ship Address:</b> <span style="font-size: 15px; font-weight: 300">{{ $processing->client_shipaddress }}</span> </span>
                    @else
                    @endif
            </div>

            <hr style="margin: 0.6rem;">

            <div>
                <h4>Product Information: <span style="float: right; font-size: 15px;">Received: <span style="color: #e87810; font-weight: 800">{{ $processing->received_by }}</span></span></h4>
                
            </div>

            <table class="invoice-table">
              <thead>
                <tr style="color: white;background: black;font-weight: 700;">
                    <th>Service Name</th>
                    <th width="150">Total</th>
                </tr>
              </thead>
              <tbody>
                    @php
                        $orderDetails = json_decode($processing->order_details, true);
                    @endphp
                    @if(!is_null($orderDetails))
                        @foreach(json_decode($orderDetails, true) as $key => $value)
                            @if(is_numeric($key))

                            <tr>
                                <td>
                                    <span>
                                        @if (isset($value['product']))                                                                            
                                            @if($value['product'] == "visa")
                                                <span style="font-size: 11px; text-align: center;font-weight: 500;color: #e87810;">(Visa)</span>
                                            @endif
                                        @endif
                                    </span>
                                    @if (isset($value['activity_packages']))
                                        @php
                                            $activityPackages = json_decode($value['activity_packages']);
                                        @endphp
                                        @if (!is_null($activityPackages))
                                            @foreach ($activityPackages as $package)
                                                <span>
                                                    {{ $package }}<br>
                                                </span>
                                            @endforeach
                                        @endif
                                    @endif

                                    @if (isset($value['visa_packages']))
                                        @php
                                            $visaPackages = json_decode($value['visa_packages']);
                                        @endphp
                                        @if (!is_null($visaPackages))
                                            @foreach ($visaPackages as $package)
                                                <span>
                                                    {{ $package }} <span style="font-size: 11px; text-align: center;font-weight: 500;color: #e87810;">(Visa)</span><br>
                                                </span>
                                            @endforeach
                                        @endif
                                    @endif

                                    @if(!$loop->last)
                                        <br>
                                    @endif
                                </td>
                                <td> 
                                    <span style="float:right">   
                                        @php $totalinvice = 0; @endphp

                                        @php
                                            $productType = $value['product_activity'] ?? $value['product_visa'];
                                        @endphp

                                        @if($productType === "activity" || $productType === "visa")
                                            @php
                                                $totalAmountKey = $productType === 'activity' ? 'activity_total_amount' : 'visa_total_amount';
                                                $totalAmount = json_decode($value[$totalAmountKey], true);
                                            @endphp

                                            @foreach($totalAmount as $formattedTotal)
                                                @if ($formattedTotal == 0)
                                                    0.00 AED<br>
                                                @else
                                                    {{ number_format(floatval($formattedTotal), 2) }} AED<br>
                                                    @php
                                                        $totalinvice += floatval($formattedTotal);
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                    </span>

                                </td>
                            </tr>
                            @endif
                            <!-- Your update logic here -->
                        @endforeach
                    @endif

                <!-- <tr style="font-weight: 600">
                    <td>Total</td>
                    <td><span style="float:right">{{ number_format($totalinvice, 2) }} AED</span></td>
                </tr> -->
                @if(!empty($processing->discount_amount))
                    <tr style="font-weight: 600">
                        <td>Discount Amount</td>
                        @if($processing->discount_type === "price")
                            <td><span style="float:right; color: red">-{{ $processing->discount_amount }}.00 AED</span></td>
                        @else
                            <td><span style="float:right; color: red">-{{ $processing->discount_amount }} % AED</span></td>
                        @endif
                    </tr> 
                @endif
                <tr style="font-weight: 600">
                    <td>Grand Total</td>
                    <td><span style="float:right">{{ number_format($processing->amount, 2) }} AED</span></td>
                </tr>

              </tbody>
            </table>

            <hr style="margin: 0.6rem;">

            <div>
                @if($processing->client_note != null)
                    <h4 class="mt-1">Note: <br><span style="font-size: 15px; font-weight: 300">{{ $processing->client_note }}</span> </h4>
                @else
                @endif

                @if($processing->reason_cancel != null)
                    <h4 style="padding: 10px;background-color: gainsboro;border-radius: 10px;">Reason Cancel Order Note: <span style="color: red;font-size: 14px;font-weight: 999;">(By Admin)</span> <br>
                        <span style="font-size: 15px; font-weight: 300">{!!$processing->reason_cancel!!}</span> 
                    </h4>
                @else
                @endif
            </div>
        </div>  
    @endif
@endforeach

@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sc-2.0.7/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sc-2.0.7/datatables.min.js"></script>


<script type="text/javascript">
    new DataTable('#example', {
        processing: true,
        responsive: true,
        lengthMenu: [
            [10, 20, 30, -1],
            [10, 20, 30, 'All']
        ],
    order: [[4, 'desc']],    
});
</script>
<script type="text/javascript">
    $("#aler").show();
    setTimeout(function() { $("#aler").hide(); }, 3000);
</script>

<script>
    window.onload = function() {
    var printButtons = document.querySelectorAll(".print-button");

    printButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            if (button.disabled) {
                return;
            }

            button.disabled = true;

            var processingId = this.getAttribute("data-processing-id");
            var printContent = document.getElementById("print-content" + processingId).innerHTML;

            var printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Order Slip</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('@media print {');
            printWindow.document.write('@page {');
            printWindow.document.write('size: A4;');
            printWindow.document.write('margin: 15mm;');
            printWindow.document.write('}');
            printWindow.document.write('}');
            printWindow.document.write('.invoice { width: 100%; max-width: 600px; background-color: #ffffff; border: 1px solid #e2e2e2; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 20px; box-sizing: border-box; margin: 20px auto; display: none; }');
            printWindow.document.write('.invoice-header { display: flex; align-items: center; justify-content: space-between; gap: 20px}');
            printWindow.document.write('.invoice-logo img { max-height: 60px; }');
            printWindow.document.write('.invoice-title { font-size: 24px; font-weight: bold; color: #333; margin: 0; flex-basis: 100%; text-align: center; }');
            printWindow.document.write('.invoice-details { font-size: 14px; color: #666; flex-basis: 100%; text-align: left; text-align: right }');
            printWindow.document.write('.invoice-table { width: 100%;}');
            printWindow.document.write('.invoice-table th, .invoice-table td { border: 1px solid #e2e2e2; padding: 12px; color: #333; }');
            printWindow.document.write('.invoice-table th { background-color: #f9f9f9; }');
            printWindow.document.write('.invoice-total { text-align: right; font-weight: bold; font-size: 18px; color: #333; margin-top: 20px; }');
            printWindow.document.write('#Pending{ color: rgb(102, 191, 1); font-weight: 600; }  #Cancelled{ color: red; font-weight: 500; } #Approved{ color: green; font-weight: 700; }');
            printWindow.document.write('</style>');
            printWindow.document.write('<link rel="stylesheet" href="{{url('')}}/assets/css/print.css">');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            // Print the content
            printWindow.print();

            // Close the print window after printing
            printWindow.close();

            // Re-enable the button after a brief delay if needed
            setTimeout(function() {
                button.disabled = false;
            }, 1000); // Enable the button after 1000 milliseconds (1 second)
        });
    });
};
</script>


<script>
    // JavaScript code to handle the button click
    window.onload = function() {
    var printButtons = document.querySelectorAll(".print-button-mobile");
    
    printButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var processingId = this.getAttribute("data-processing-id");
            window.location.href = "/generate-pdf/" + processingId;
        });
    });
};

</script>

@endsection