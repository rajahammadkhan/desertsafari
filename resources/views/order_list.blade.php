@extends('layouts.master')

@section('top-styles')
<style type="text/css">
	.default-btn {
	  display: inline-block;
	  border: 1px solid #66bf01;
	  padding: 10px 30px;
	  -webkit-transition: 0.5s;
	  transition: 0.5s;
	  text-transform: uppercase;
	  background-color: #66bf01;
	  color: #ffffff;
	  font-size: 14px;
	  font-weight: 600;
	}

	.default-btn:hover {
	  background-color: transparent;
	  color: #000000;
	  border-color: #000000;
	}

	.default-btn-active {
	  display: inline-block;
	  border: 1px solid #000000;
	  padding: 10px 30px;
	  -webkit-transition: 0.5s;
	  transition: 0.5s;
	  text-transform: uppercase;
	  background-color: transparent;
	  color: #000000;
	  font-size: 14px;
	  font-weight: 600;
	}

	.default-btn-active:hover {
	  background-color: #66bf01;
	  color: #ffffff;
	  border-color: 1px solid #66bf01 !important;
	}
    .product-total{
        text-align: center;
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
    #table {
      border-collapse: collapse;
      width: 100%;
    }

    #table td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    #table tr:nth-child(even) {
      background-color: #dddddd;
    }

      @media (min-width: 576px){
.modal-dialog {
  max-width: 700px !important;
  margin: 1.75rem auto;
}}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')  
<!-- Start Page Title -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>My Order List</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>My Order List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Start Checkout Area -->
        <section class="checkout-area ptb-100">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <a href="{{ route('user.edit', [Auth::user()->id]) }}">
                                <button class="default-btn-active" style="width: 100%;">Profile <span style="font-size: 16px;color: black;"><br>{{ Auth::user()->name }} {{ Auth::user()->lname }}</span></button>
                            </a>
                            <br>
                            <br>
                            <a href="{{ route('order_list') }}">
                                <button class="default-btn" style="width: 100%;">Order List</button>
                            </a>
                            <br>
                            <br>
                            <a href="{{ route('wishlist') }}">
                                <button class="default-btn-active" style="width: 100%;">Wish List</button>
                            </a>
                            <br>
                            <br>
                            <a href="{{ route('gift_card_list') }}">
                                <button class="default-btn-active" style="width: 100%;">Gift Card List</button>
                            </a>
                        </div>
                        @if($processings[0]->client_id < Auth::user()->id)
                        <div class="col-lg-10 col-md-12">
                            <div class="section-title">
                                <h2>Order List is Empty</h2>
                                <br>
                                <a href="/" class="optional-btn">Back To Website</a>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-10 col-md-12">
                            <div class="order-details">
                                <h3 class="title">Your Order</h3>

                                <div class="order-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 120px;text-align: center;">Order No</th>
                                                <th scope="col" style="width: 120px;text-align: center;">Name</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col" style="width: 0px;text-align: center;">Total Amount</th>
                                                <th scope="col" style="width: 0px;text-align: center;">Date</th>
                                                <th scope="col" style="width: 0px;text-align: center;">Order Status</th>
                                                <th scope="col" style="width: 120px;text-align: center;">See More Details</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($processings as $processing)
                                                @if( $processing->client_id  == Auth::user()->id)
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
                                                                    @foreach($orderDetails as $key => $value)
                                                                        @if(is_numeric($key))
                                                                        <span>
                                                                            {{ $value['name'] }}
                                                                        </span>
                                                                        <span>
                                                                        @if (isset($value['recipient_name']))                                                                            
                                                                            @if($value['recipient_name']  != null)
                                                                                <span style="font-size: 15px; text-align: center;font-weight: 700;color: #66bf01;">Gift Card</span>
                                                                            @endif
                                                                        @endif
                                                                        </span>

                                                                            @if(!$loop->last)
                                                                                <br>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                        </td>

                                                        <td class="product-total">
                                                            <span class="subtotal-amount">{{ $processing->amount }}.00</span>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="subtotal-amount">{{ Carbon\Carbon::parse($processing->created_at)->format('F d, Y') }}</span>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="subtotal-amount" id="{{ $processing->order_status }}">{{ $processing->order_status }}</span>
                                                        </td>
                                                        <td class="product-total" style="font-size: 25px; color: red;">
                                                            <span class="subtotal-amount"><i class='bx bxs-detail' data-bs-toggle="modal" data-bs-target="#myModal{{ $processing->id }}"></i></span>
                                                        </td>
                                                    </tr>
                                                    @endif
                                            @endforeach

                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach($processings as $processing)
                                                @if( $processing->client_id  == Auth::user()->id)
                                                    @php
                                                        $total += $processing->amount;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td class="order-subtotal"></td>
                                                <td class="order-subtotal"></td>
                                                <td class="total-price">
                                                    <span>Order Total</span>
                                                </td>
                                                
                                                
                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">{{ $total }}.00</span>
                                                </td>
                                                <td class="order-subtotal"></td>
                                                <td class="order-subtotal"></td>
                                                <td class="order-subtotal"></td>

                                                
                                            </tr>

                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
            </div>
        </section>
        <!-- End Checkout Area -->

        <!-- The Modal -->
        @foreach($processings as $processing)
            @if( $processing->client_id  == Auth::user()->id)
                <div class="modal" id="myModal{{ $processing->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Hello {{ $processing->client_name }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <div>
                            
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h5>Personal Information:</h5>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6" style="text-align: end;">
                                    <h5>Status: <span id="{{ $processing->order_status }}">{{ $processing->order_status }}</span> </h5>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h6>Order No: <span style="font-size: 15px; font-weight: 300">{{ $processing->order_number }}</span> </h6>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h6>Name: <span style="font-size: 15px; font-weight: 300">{{ $processing->client_name }}</span> </h6>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h6>Email: <span style="font-size: 15px; font-weight: 300">{{ $processing->client_email }}</span> </h6>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h6>Number: <span style="font-size: 15px; font-weight: 300">{{ $processing->client_number }}</span> </h6>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h6>Alternate Number: <span style="font-size: 15px; font-weight: 300">{{ $processing->client_alternate_number }}</span> </h6>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h6>Country: <span style="font-size: 15px; font-weight: 300">{{ $processing->client_country }}</span> </h6>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h6>Address: <span style="font-size: 15px; font-weight: 300">{{ $processing->client_address }}</span> </h6>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    @if($processing->client_shipaddress != null)
                                        <h6>Ship Address: <span style="font-size: 15px; font-weight: 300">{{ $processing->client_shipaddress }}</span> </h6>
                                    @else
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h5>Product Information:</h5>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6" style="text-align: end;">
                                    <h5>Received: <span style="color: #0d6efd; font-weight: 900">{{ $processing->received_by }}</span></h5>
                                </div>
                            </div>
                            <table id="table">
                                <tr style="color: white;background: black;font-weight: 700;">
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total</th>
                                </tr>
                                @php
                                    $orderDetails = json_decode($processing->order_details, true);
                                @endphp
                                @if(!is_null($orderDetails))
                                    @foreach($orderDetails as $key => $value)
                                        @if(is_numeric($key))
                                            <tr>
                                                <td>{{ $value['name'] }} 
                                                    @if (isset($value['recipient_name']))                                                                            
                                                        @if($value['recipient_name']  != null)
                                                            <span style="font-size: 12px; text-align: center;font-weight: 700;color: #66bf01;">Gift Card</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $value['quantity'] }}</td>
                                                <td>{{ $value['price'] }}</td>
                                                <td>{{ $value['total'] }}</td>
                                            </tr>
                                            @if(!$loop->last)
                                            @endif
                                        @endif
                                    @endforeach
                                @endif  
                                <tr style="color: white;background: black;font-weight: 700;">
                                    <td>Grand Total</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $processing->amount }}</td>
                                </tr>
                            </table>

                            @php
                                $orderDetails = json_decode($processing->order_details, true);
                            @endphp
                            @if(!is_null($orderDetails))
                                @foreach($orderDetails as $key => $value)
                                    @if(is_numeric($key))
                                        @if (isset($value['gift']))                                                                            
                                            @if($value['gift']  != null)
                                                <br>
                                                <div class="row">
                                                    <div class="col-12 col-md-8 col-lg-8">
                                                        <h5>Gift Card Information: <span>{{ $value['name'] }} </span></h5>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4" style="text-align: right;">
                                                        <p style="font-size: 16px;font-style: italic;font-weight: 800;">Template: <span style="font-size: 13px; font-weight: 600; color: rgb(102, 191, 1);">{{ $value['template'] }} </span></p>
                                                    </div>
                                                </div>
                                                <table id="table">
                                                    @if (isset($value['sender_email']))
                                                        <tr>                                                               
                                                            <td>                                                          
                                                                <p><b style="font-size: 15px;color: black;">S. Name:</b> <span>{{ $value['sender_name'] }}</span></p>                                                         
                                                            </td>

                                                            <td>                                                          
                                                                <p><b style="font-size: 15px;color: black;">S. Email:</b> <span>{{ $value['sender_email'] }}</span></p>                                                         
                                                            </td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>                                                     
                                                                <p><b style="font-size: 15px;color: black;">R. Name:</b> <span>{{ $value['recipient_name'] }}</span></p>                                                 
                                                            </td>

                                                            <td>                                                          
                                                                <p><b style="font-size: 15px;color: black;">R. Email:</b> <span>{{ $value['recipient_email'] }}</span></p>                                                         
                                                            </td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>                                                          
                                                                <p><b style="font-size: 15px;color: black;">Delivery Date:</b> <span>{{ $value['delivery_date'] }}</span></p>                                                         
                                                            </td> 

                                                            <td>                                                          
                                                                <p><b style="font-size: 15px;color: black;">Expiry Date:</b> <span>{{ $value['expiry_date'] }} Days</span></p>                                                         
                                                            </td>                                                            
                                                        </tr>
                                                    @endif
                                                </table>

                                            @endif
                                            @if(!$loop->last)
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endif  

                            @if($processing->client_note != null)
                                <h6>Note: <br><span style="font-size: 15px; font-weight: 300">{{ $processing->client_note }}</span> </h6>
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
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript">
      $("#aler").show();
        setTimeout(function() { $("#aler").hide(); }, 3000);
  </script>
@endsection