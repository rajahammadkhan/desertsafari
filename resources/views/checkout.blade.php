@extends('layouts.master')

@section('top-styles')
<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style type="text/css">
        #req{
            color: red;
            font-weight: 600;
        }

        .highlight {
            border: 1px solid red; /* Add your desired highlighting styles here */
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <!-- intlTelInput library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>

    <!-- intlTelInput utils script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js"></script>
<style type="text/css">
    .hidden {
    display: none;
}
</style>
@endsection

@section('content')  
<!-- Start Page Title -->
<!--         <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="checkout-area ptb-100">
            <div class="container">
                <div class="user-actions">
                    <i class='bx bx-log-in'></i>
                    <span>Returning customer? <a href="{{ route('login') }}">Click here to login</a></span>
                </div>

                <form>
                    <checkout ></checkout>
                    
                </form>
            </div>
        </section> -->
        <!-- End Checkout Area -->

        <main class="main">
            <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Checkout<span>Desert Safari</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="checkout">
                    <div class="container">
                        
                        
                            <!-- <checkout :session-data="{{ json_encode(session('cart')) }}"></checkout> -->
                        <form id="checkout-form">
                            <div class="row">

                                <div class="col-lg-9">
                                    <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                    @guest
                                        @if (Route::has('login'))
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkout-user-auth" name="user" onclick="toggleUserAuth()"> 
                                                <label class="custom-control-label" for="checkout-user-auth">Do you have any account?</label>
                                            </div><!-- End .custom-checkbox -->

                                            <div id="userAuthField" style="display: none;">
                                                <center>
                                                    <a href="{{ route('login') }}" class="btn btn-outline-primary-2" style="min-width: 60%;">
                                                        <span>LOG IN</span>
                                                        <i class="icon-long-arrow-right"></i>
                                                    </a>
                                                </center>
                                            </div>                                               

                                            <div class="row mt-2">
                                                <div class="col-lg-6 col-md-6">
                                                    <label>First Name <span id="req">*</span></label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                                                </div><!-- End .col-lg-6 col-md-6 -->

                                                <div class="col-lg-6 col-md-6">
                                                    <label>Last Name <span id="req">*</span></label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                                                </div><!-- End .col-lg-6 col-md-6 -->
                                            </div><!-- End .row -->

                                            <label>Email Address <span id="req">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                                        @endif

                                        @else 
                                            <div class="row mt-2">
                                                <div class="col-lg-6 col-md-6">
                                                    <label>First Name <span id="req">*</span></label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ Auth::user()->name }}" placeholder="First Name" required>
                                                </div><!-- End .col-lg-6 col-md-6 -->

                                                <div class="col-lg-6 col-md-6">
                                                    <label>Last Name <span id="req">*</span></label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ Auth::user()->lname }}" placeholder="Last Name" required>
                                                </div><!-- End .col-lg-6 col-md-6 -->
                                            </div><!-- End .row -->

                                            <label>Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Email Address" required readonly="true">
                                    @endguest


                                    <label>Street Address <span id="req">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>


                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <label>State / County <span id="req">*</span></label>
                                            <input type="text" class="form-control" name="statecountry" id="statecountry" placeholder="State / Country" required>
                                        </div><!-- End .col-lg-6 col-md-6 -->

                                        <div class="col-lg-6 col-md-6">
                                            <label>Town / City <span id="req">*</span></label>
                                            <input type="text" class="form-control" name="towncity" id="towncity" placeholder="Town / City" required>
                                        </div><!-- End .col-lg-6 col-md-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <label>Postcode / ZIP <span id="req">*</span></label>
                                            <input type="text" class="form-control" name="postcodezip" id="postcodezip" placeholder="Postcode / Zip" required>
                                        </div><!-- End .col-lg-6 col-md-6 -->
                                        @guest
                                            @if (Route::has('login'))
                                                <div class="col-lg-6 col-md-6">
                                                    <label>Number <span id="req">*</span> <span id="numberoutput" style="color: green;font-size: 1.2rem;font-weight: 500;"></span></label><br>
                                                    <input id="number" class="form-control" type="tel" name="number" style="width: 125%;" required/>
                                                </div><!-- End .col-lg-6 col-md-6 -->
                                            @endif

                                            @else
                                                <div class="col-lg-6 col-md-6">
                                                    <label>Number <span id="req">*</span> <span id="numberoutput" style="color: green;font-size: 1.2rem;font-weight: 500;"></span></label><br>
                                                    <input id="number" class="form-control" type="tel" name="number" style="width: 125%;" value="{{ Auth::user()->phone }}" required/>
                                                </div><!-- End .col-lg-6 col-md-6 -->
                                        @endguest
                                        

                                        <div class="col-lg-6 col-md-6">
                                            <label>Alternate Number <span id="alternumberoutput" style="color: green;font-size: 1.2rem;font-weight: 500;"></span></label>                                            
                                            <input id="alternumber" class="form-control" type="tel" name="alternumber" style="width: 125%;" required/>
                                            <!-- <input type="tel" class="form-control" name="alternumber" id="alternumber" placeholder="Alternate Number" required> -->
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <label>Total Price</label>
                                            <div class="form-group">
                                                @php 
                                                    $total = 0;
                                                    $discounttotal = 0;
                                                @endphp

                                                @if(session('cart'))

                                                        @foreach(session('cart') as $id => $details)
                                                            @php
                                                                $productType = $details['product_activity'] ?? $details['product_visa'];
                                                            @endphp

                                                            @if($productType === "activity" || $productType === "visa")
                                                            
                                                                @php
                                                                    $totalAmountKey = $productType === 'activity' ? 'activity_total_amount' : 'visa_total_amount';
                                                                    $totalAmount = json_decode($details[$totalAmountKey], true);
                                                                @endphp

                                                                @foreach($totalAmount as $formattedTotal)
                                                                    @if ($formattedTotal == 0)
                                                                
                                                                    @else                                                            
                                                                        @php
                                                                            $total += floatval($formattedTotal);
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                @endif

                                                @if(session('coupon'))
                                                    @foreach(session('coupon') as $coupon)
                                                        @if($coupon['couponDiscount'] === "price")
                                                            @php
                                                                $discounttotal = floatval($total - $coupon['couponPrice']);
                                                            @endphp
                                                        @else
                                                            @php
                                                                $multiple = $coupon['couponPrice'] / 100;
                                                                $discounttotal1 = floatval($total * $multiple);
                                                                $discounttotal = floatval($total - $discounttotal1);
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                                
                                                
                                                @if($discounttotal != 0)
                                                    <input type="text" class="form-control" name="non" value="{{ number_format($discounttotal, 2) }}" placeholder="Total Price" readonly>    
                                                    <input type="hidden" class="form-control" name="totalprice" id="totalprice" value="{{ $discounttotal }}" placeholder="Total Price" readonly>    
                                                @else
                                                    <input type="text" class="form-control" name="non" value="{{ number_format($total, 2) }}" placeholder="Total Price" readonly>
                                                    <input type="hidden" class="form-control" name="totalprice" id="totalprice" value="{{ $total }}" placeholder="Total Price" readonly>
                                                @endif

                                            </div>

                                        </div>
                                        @guest
                                            @if (Route::has('login'))
                                                <div class="col-lg-6 col-md-6">
                                                    <label>Password <span id="req">*</span></label>
                                                    <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" placeholder="Password" required>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <label>Confirm Password <span id="req">*</span></label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="password2" autocomplete="new-password" placeholder="Confirm Password" required>
                                                </div>
                                            @endif

                                            @else 
                                            <div class="col-lg-6 col-md-6">
                                                <label>Password <span id="req">*</span></label>
                                                <input type="hidden" class="form-control" name="password" id="password" value="" autocomplete="new-password" placeholder="Password" required>
                                                <input type="hidden" class="form-control" name="password_confirmation" id="password2" value="" autocomplete="new-password" placeholder="Password" required>
                                            </div>
                                        @endguest
                                    </div><!-- End .row -->                    

                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkout-diff-address" name="differentaddress" onclick="toggleShipAddress()">
                                        <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                                    </div><!-- End .custom-checkbox -->

                                    <div class="col-lg-12 col-md-6" id="shipAddressField" style="display: none;">
                                        <div class="form-group">
                                            <label>Ship Address </label>
                                            <input type="text" class="form-control" name="shipaddress" id="shipaddress" placeholder="Ship Address">
                                        </div>
                                    </div>

                                    <label>Order notes (optional)</label>
                                    <textarea class="form-control" cols="30" rows="4" name="note" id="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                </div><!-- End .col-lg-9 -->
                                <aside class="col-lg-3">
                                    <div class="summary">
                                        <div class="checkout-discount" style="max-width: 100%;">
                                            <form id="coupon-form">
                                                @php
                                                    $cart = session('cart');
                                                    $firstCartItem = reset($cart);
                                                    $user_id = $firstCartItem['user_id'];
                                                @endphp
                                                @if(session('coupon'))
                                                    @foreach(session('coupon') as $coupon)
                                                        @if(session('cart'))
                                                            <!-- @foreach(session('cart') as $id => $details)
                                                                <p>{{ $coupon['code'] }}</p>
                                                                <p>{{ $details['user_id'] }}</p>
                                                                <input type="hidden" class="form-control" name="discount_code_id" id="discount_code_id" value="{{ $details['user_id'] }}" placeholder="Have a coupon? Click here to enter your code">
                                                                <input type="text" class="form-control" name="discount_code" id="discount_code" value="{{ $coupon['code'] }}" placeholder="Have a coupon? Click here to enter your code">
                                                            @endforeach -->
                                                            <input type="hidden" class="form-control" name="discount_code_id" id="discount_code_id" value="{{ $user_id }}" placeholder="Have a coupon? Click here to enter your code">
                                                            <input type="text" class="form-control" name="discount_code" id="discount_code" value="{{ $coupon['code'] }}" placeholder="Have a coupon? Click here to enter your code">

                                                        @endif
                                                    @endforeach
                                                @else

                                                    @if(session('cart'))
                                                        <!-- @foreach(session('cart') as $id => $details)
                                                            <input type="hidden" class="form-control" name="discount_code_id" id="discount_code_id" value="{{ $details['user_id'] }}" placeholder="Have a coupon? Click here to enter your code">
                                                            <input type="text" class="form-control" name="discount_code" id="discount_code" placeholder="Have a coupon? Click here to enter your code">
                                                        @endforeach -->
                                                        <input type="hidden" class="form-control" name="discount_code_id" id="discount_code_id" value="{{ $user_id }}" placeholder="Have a coupon? Click here to enter your code">
                                                        <input type="text" class="form-control" name="discount_code" id="discount_code" placeholder="Have a coupon? Click here to enter your code">
                                                      @endif  
                                                @endif
                                              <button class="btn btn-outline-primary-2 btn-order btn-block" type="button" onclick="applyCoupon()">
                                                <span class="btn-text">Apply Coupon</span>
                                                <span class="btn-hover-text">Add Coupon</span>
                                              </button>
                                            </form>
                                        </div>
                                        <h3 class="summary-title mt-2">Your Order</h3><!-- End .summary-title -->

                                        <table class="table table-summary">
                                            <thead>
                                                <tr>
                                                    <th>Items</th>
                                                    <th style="width: 40%;">Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <h6 class="mt-2 mb-0">Service</h6>
                                                </tr>
                                                @if(session('cart'))
                                                    @php 
                                                        $total = 0; 
                                                        $abxsad = [];
                                                    @endphp

                                                    @foreach(session('cart') as $id => $details)
                                                        @php
                                                            $abxsad[] = array_merge($details);
                                                            $productType = $details['product_activity'] ?? $details['product_visa'];
                                                        @endphp

                                                        @if($productType === "activity" || $productType === "visa")

                                                            <tr>
                                                              <td>
                                                                @php
                                                                    $packagesKey = $productType === 'activity' ? 'activity_packages' : 'visa_packages';
                                                                    $packages = json_decode($details[$packagesKey], true);
                                                                @endphp
                                                                @foreach($packages as $package)
                                                                    {{ $loop->first ? '' : ' ' }}{{ $package }} 
                                                                    @if($productType === "visa")
                                                                        <b><span>Visa</span></b>
                                                                    @endif 
                                                                    <br>
                                                                @endforeach
                                                              </td>
                                                              
                                                              <td>
                                                                  @php
                                                                    $totalAmountKey = $productType === 'activity' ? 'activity_total_amount' : 'visa_total_amount';
                                                                    $totalAmount = json_decode($details[$totalAmountKey], true);
                                                                @endphp
                                                                @foreach($totalAmount as $formattedTotal)
                                                                    @if ($formattedTotal == 0)
                                                                        0.00 <br>AED<br>
                                                                    @else
                                                                        {{ number_format(floatval($formattedTotal), 2) }} <br>AED<br>
                                                                        @php
                                                                            $total += floatval($formattedTotal);
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                              </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                        
                                                @endif

                                                <input type="hidden" name="orderdetails" id="orderdetails" value="{{ json_encode($abxsad) }}">

                                                @if(session('cart'))
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>{{ number_format($total, 2) }} <br>AED</td>
                                                </tr><!-- End .summary-subtotal -->

                                                @php
                                                    $discounttotal = 0;
                                                @endphp

                                                @if(session('coupon'))
                                                    @foreach(session('coupon') as $coupon)
                                                        @if($coupon['couponDiscount'] === "price")
                                                            <input type="hidden" name="discount_get_price" id="discount_get_price" value="{{ $coupon['couponPrice'] }}">
                                                            <input type="hidden" name="discount_get_type" id="discount_get_type" value="{{ $coupon['couponDiscount'] }}">
                                                        
                                                            <tr class="summary-subtotal" >
                                                                <td>Discount Code:</td>
                                                            
                                                                <td id="discount_get_price">{{ number_format($coupon['couponPrice'], 2) }} <br>AED </td>
                                                                @php
                                                                    $discounttotal = floatval($total - $coupon['couponPrice']);
                                                                @endphp
                                                            </tr><!-- End .summary-subtotal -->
                                                        @else
                                                            <input type="hidden" name="discount_get_price" id="discount_get_price" value="{{ $coupon['couponPrice'] }}">
                                                            <input type="hidden" name="discount_get_type" id="discount_get_type" value="{{ $coupon['couponDiscount'] }}">
                                                        
                                                            <tr class="summary-subtotal" >
                                                                <td>Discount Code:</td>
                                                            
                                                                <td id="discount_get_price">{{ number_format($coupon['couponPrice']) }} % <br>AED </td>
                                                                @php
                                                                    $multiple = $coupon['couponPrice'] / 100;
                                                                    $discounttotal1 = floatval($total * $multiple);
                                                                    $discounttotal = floatval($total - $discounttotal1);
                                                                @endphp
                                                            </tr><!-- End .summary-subtotal -->
                                                        @endif
                                                    @endforeach
                                                @endif

                                                <input type="hidden" name="discount_get_price" id="discount_get_price" value="">
                                                <input type="hidden" name="discount_get_type" id="discount_get_type" value="">

                                                <tr class="summary-total">
                                                    <td>Total:</td>
                                                    @if($discounttotal != 0)
                                                        <td>{{ number_format($discounttotal, 2) }} <br>AED</td>
                                                    @else
                                                        <td>{{ number_format($total, 2) }} <br>AED</td>
                                                    @endif
                                                </tr><!-- End .summary-total -->
                                                @endif
                                            </tbody>
                                        </table><!-- End .table table-summary -->

                                        <div class="accordion-summary" id="accordion-payment" >
                                            <div class="card">
                                                <div class="card-header">
                                                    <h2 class="card-title mb-1">
                                                        <input type="radio" id="cash-on-delivery" name="payment_clear" value="Cash" checked>
                                                        <label for="cash-on-delivery">Cash on Delivery</label>
                                                    </h2>
                                                </div>

                                                <div class="card-header">
                                                    <h2 class="card-title mb-1">
                                                        <input type="radio" id="bank-on-delivery" name="payment_clear" value="Bank">
                                                        <label for="bank-on-delivery">Direct bank transfer</label>
                                                    </h2>
                                                </div>                                                

                                                <div id="bank-detail" class="hidden">
                                                    <div class="card-body">
                                                        <h6 style="margin-bottom: 1rem;">{{ getSettings('bank_name') }} </h6>
                                                        <h6 style="font-size: 1.4rem;">{{ getSettings('acc_no') }} </h6>    
                                                        After Payment Share ScreenShot:<br> {{ getSettings('contact_no') }}                                                    
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .collapse -->
                                                
                                                <div class="card-header">
                                                    <h2 class="card-title mb-1">
                                                        <input type="radio" id="cr-on-delivery" name="payment_clear" value="Credit Card">
                                                        <label for="cr-on-delivery" class=" mb-1">Credit Card</label>
                                                        <img src="assets/images/payments-summary.png" alt="Payments Cards">
                                                    </h2>
                                                </div>
                                                <input type="hidden" name="final_delivery" id="final_delivery" value="Cash" readonly>

                                            </div><!-- End .card -->
                                            </div>
                                            <button class="btn btn-outline-primary-2 btn-order btn-block" type="button" onclick="placeOrder()">
                                                <span class="btn-text">Place Order</span>
                                                <span class="btn-hover-text">Proceed to Checkout</span>
                                            </button>   
                                        </div>

                                    </div><!-- End .summary -->
                                </aside><!-- End .col-lg-3 -->
                            </div>

                        </form>
                    </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
async function applyCoupon() {
    const discountCode = document.getElementById('discount_code').value;
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;

    try {
        const response = await fetch('/apply-coupon', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: 'discount_code=' + encodeURIComponent(discountCode)
        });

        const data = await response.json();

        if (data.success) {
            toastr.success('Valid Coupon Applied Successfully');
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        }  else {
            toastr.error('Invalid or expired coupon code');
        }
    } catch (error) {
        console.error('Error:', error);
        toastr.error('An error occurred while applying the coupon');
    }
}
</script>


<script>
function toggleShipAddress() {
    var shipAddressField = document.getElementById('shipAddressField');
    var checkbox = document.getElementById('checkout-diff-address');
    
    if (checkbox.checked) {
        shipAddressField.style.display = 'block';
    } else {
        shipAddressField.style.display = 'none';
    }
}

function toggleUserAuth() {
    var userAuthField = document.getElementById('userAuthField');
    var userAuthcheckbox = document.getElementById('checkout-user-auth');
    
    if (userAuthcheckbox.checked) {
        userAuthField.style.display = 'block';
    } else {
        userAuthField.style.display = 'none';
    }
}
</script>

<script>

    async function placeOrder() {
    // Validate the form
    if (validateForm()) {
        try {
            // Call the getUserAddress function to process the payment
            await getUserAddress();

            // If successful, you can perform additional actions here
            // For example, show a success message, redirect to a thank-you page, etc.
            // For demonstration, let's display a success toastr message and redirect
            toastr.success('Order placed successfully!');
            // setTimeout(() => {
            //     window.location.href = '/thank-you'; // Redirect to thank-you page
            // }, 2000);
        } catch (error) {
            // Handle errors, display error message, etc.
            toastr.error('An error occurred while placing the order');
        }
    } else {
        // Display form validation error message to the user
    }
}


async function getUserAddress() {
    const firstName = document.getElementById('first_name').value;
    const lastName = document.getElementById('last_name').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const townCity = document.getElementById('towncity').value;
    const stateCountry = document.getElementById('statecountry').value;
    const postcodeZip = document.getElementById('postcodezip').value;
    const number = document.getElementById('number').value;
    const alterNumber = document.getElementById('alternumber').value;
    const discountCode = document.getElementById('discount_code').value;
    const discountgetType = document.getElementById('discount_get_type').value;
    const discountgetPrice = document.getElementById('discount_get_price').value;
    const shipAddress = document.getElementById('shipaddress').value;
    const totalAmount = document.getElementById('totalprice').value;
    const CheckedCash = document.getElementById('final_delivery').value;
    const msgnote = document.getElementById('note').value;
    const orderDetail = document.getElementById('orderdetails').value;
    const Password = document.getElementById('password').value;
    // Add more fields as needed

    if (!validateForm()) {
        return; // Exit if the form is not valid
    }

    try {
        const response = await axios.post('/process/user/payment', {
            discountcode: discountCode,
            firstname: firstName,
            lastname: lastName,
            email: email,
            address: address,
            towncity: townCity,
            statecountry: stateCountry,
            postcodezip: postcodeZip,
            number: number,
            alternumber: alterNumber,
            coupontype: discountgetType,
            couponprice: discountgetPrice,
            Famount: totalAmount,
            shipaddress: shipAddress,
            isCheckedbank: CheckedCash,
            note: msgnote,
            order: orderDetail,
            pass: Password,
        });

        if (response.data.success) {
            // toastr.success(response.data.success);
            setTimeout(() => {
                window.location.href = '/';
            }, 2000);
        } else {
            toastr.error(response.data.error);
        }
    } catch (error) {
        console.error('Error:', error);
        toastr.error('An error occurred while processing the payment');
    }
}


function validateForm() {
    // Get form input values
    const firstName = document.getElementById('first_name').value;
    const lastName = document.getElementById('last_name').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const townCity = document.getElementById('towncity').value;
    const stateCountry = document.getElementById('statecountry').value;
    const postcodeZip = document.getElementById('postcodezip').value;
    const number = document.getElementById('number').value;
    const password = document.getElementById('password').value;
    const password2 = document.getElementById('password2').value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    // Add more fields as needed

    // Perform validation checks
    if (!firstName || !lastName || !email || !address || !townCity || !stateCountry || !postcodeZip || !number) {
        // Display validation error messages to the user
        toastr.error('Please fill in all required fields.');

        if (!firstName) {
            document.getElementById('first_name').classList.add('highlight');
        }
        else{
            document.getElementById('first_name').classList.remove('highlight');
        }
        
        if (!lastName) {
            document.getElementById('last_name').classList.add('highlight');
        }
        else{
            document.getElementById('last_name').classList.remove('highlight');
        }

        if (!email || !emailPattern.test(email)) {
            document.getElementById('email').classList.add('highlight');
            toastr.error('Email Not Valid.');
        }
        else{
            document.getElementById('email').classList.remove('highlight');
        }
        
        if (!address) {
            document.getElementById('address').classList.add('highlight');
        }        
        else{
            document.getElementById('address').classList.remove('highlight');
        }

        if (!townCity) {
            document.getElementById('towncity').classList.add('highlight');
        }
        else{
            document.getElementById('towncity').classList.remove('highlight');
        }
        
        if (!stateCountry) {
            document.getElementById('statecountry').classList.add('highlight');
        }
        else{
            document.getElementById('statecountry').classList.remove('highlight');
        }

        if (!postcodeZip) {
            document.getElementById('postcodezip').classList.add('highlight');
        }
        else{
            document.getElementById('postcodezip').classList.remove('highlight');
        }
        
        if (!number) {
            document.getElementById('number').classList.add('highlight');
        }        
        else{
            document.getElementById('number').classList.remove('highlight');
        }

        if (!password) {
            document.getElementById('password').classList.add('highlight');
        }
        else{
            document.getElementById('password').classList.remove('highlight');
        }
        
        if (!password2) {
            document.getElementById('password2').classList.add('highlight');
        }        
        else{
            document.getElementById('password2').classList.remove('highlight');
        }
          
        return false; // Form is not valid
    }

    // Additional validation checks here if needed

    return true; // Form is valid
}

</script>
<script>
    //// AlterNumber
    const alterinput = document.querySelector("#alternumber");
    const alteroutput = document.querySelector("#alternumberoutput");

    const alteriti = window.intlTelInput(alterinput, {
      nationalMode: true,
      utilsScript: "/intl-tel-input/js/utils.js?1690975972744" // just for formatting/placeholders etc
    });

    const alterupdatePlaceholder = () => {
      const selectedCountryData = alteriti.getSelectedCountryData();
      alterinput.placeholder = `+${selectedCountryData.dialCode}`;
    };

    const alterhandleChange = () => {
      let text;
      let isValid = alteriti.isValidNumber();
      if (alterinput.value) {
        text = isValid
          ? "Valid Number!! 👍🏻" 
          : "Not Valid Number!! 👎🏻";
      } else {
        text = "";
      }
      const textNode = document.createTextNode(text);
      alteroutput.innerHTML = "";
      alteroutput.appendChild(textNode);

        if (!isValid) {
            alteroutput.style.color = "red";
        } else {
            alteroutput.style.color = "green";
        }
    };

    // listen to "keyup", but also "change" to update when the user selects a country
    alterinput.addEventListener('change', alterhandleChange);
    alterinput.addEventListener('keyup', alterhandleChange);

    alterinput.addEventListener('countrychange', alterupdatePlaceholder);


    
 </script>
 <script type="text/javascript">
     //// Number
    const input = document.querySelector("#number");
    const output = document.querySelector("#numberoutput");

    const iti = window.intlTelInput(input, {
      nationalMode: true,
      utilsScript: "/intl-tel-input/js/utils.js?1690975972744" // just for formatting/placeholders etc
    });

    const updatePlaceholder = () => {
      const selectedCountryData = iti.getSelectedCountryData();
      input.placeholder = `+${selectedCountryData.dialCode}`;
    };

    const handleChange = () => {
      let text;
      let isValid = iti.isValidNumber();
      if (input.value) {
        text = isValid
          ? "Valid Number!! 👍🏻" 
          : "Not Valid Number!! 👎🏻";
      } else {
        text = "";
      }
      const textNode = document.createTextNode(text);
      output.innerHTML = "";
      output.appendChild(textNode);

        if (!isValid) {
            output.style.color = "red";
        } else {
            output.style.color = "green";
        }
    };

    // listen to "keyup", but also "change" to update when the user selects a country
    input.addEventListener('change', handleChange);
    input.addEventListener('keyup', handleChange);

    input.addEventListener('countrychange', updatePlaceholder);
 </script>

<script>
    // Get a reference to the radio buttons and the final_delivery input field
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    const finalDeliveryInput = document.getElementById('final_delivery');

    // Add a click event listener to each radio button
    radioButtons.forEach(radioButton => {
        radioButton.addEventListener('click', function () {
            // Set the value of final_delivery to the selected radio button's value
            finalDeliveryInput.value = this.value;
        });
    });
</script>

<script type="text/javascript">

const bankRadioButton = document.getElementById('bank-on-delivery');
const cashRadioButton = document.getElementById('cash-on-delivery');
const crRadioButton = document.getElementById('cr-on-delivery');
const bankDetailDiv = document.getElementById('bank-detail');

bankRadioButton.addEventListener('change', function () {
    if (this.checked && this.value === 'Bank') {
        bankDetailDiv.style.display = 'block'; // Show the bank-detail div
    } else {
        bankDetailDiv.style.display = 'none'; // Hide the bank-detail div
    }
});

cashRadioButton.addEventListener('change', function () {
    if (this.checked) {
        bankDetailDiv.style.display = 'none'; // Hide the bank-detail div
    }
});

crRadioButton.addEventListener('change', function () {
    if (this.checked) {
        bankDetailDiv.style.display = 'none'; // Hide the bank-detail div
    }
});



</script>
@endsection