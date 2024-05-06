@extends('layouts.master')

@section('top-styles')
<style type="text/css">
    .summary{
          padding: 2.5rem 2rem 3rem;
    }
</style>
<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('content')  
<!-- Start Page Title -->
        <!-- <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Cart</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
                
        </cart-detail> -->
        <!-- End Cart Area -->

        <main class="main">
            <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <!-- <cart-detail 
                            :cart="cart"
                            link = "{{ route('get_activity', ['slug' => 'arg']) }}"
                            visalink = "{{ route('get_visa', ['slug' => 'arg']) }}"
                            >
                                
                        </cart-detail> -->
                            @php
                                $cartData = session('cart') ?? [];
                            @endphp

                            
                            @if ($cartData)                            
                                <div class="row">
                                    <div class="col-lg-9">
                                        <!-- Activity Table -->
                                        <table class="table table-cart table-mobile">
                                            @if(session('cart'))
                                            @php $total = 0 @endphp
                                                <thead>
                                                    <tr>
                                                        <th>Service</th>
                                                        <th style="width: 120px;">Amount</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(session('cart') as $id => $details)
                                                        @php
                                                            $productType = $details['product_activity'] ?? $details['product_visa'];
                                                        @endphp

                                                        @if($productType === "activity")
                                                            <tr data-id="{{ $details['activity_id'] }}">
                                                                <td class="product-col">
                                                                    <div class="product">
                                                                        <h3 class="product-title">
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
                                                                        </h3>
                                                                        <!-- End .product-title -->
                                                                    </div>
                                                                    <!-- End .product -->
                                                                </td>
                                                                <td class="total-col" style="text-align: right;">
                                                                    @php
                                                                        $totalAmountKey = $productType === 'activity' ? 'activity_total_amount' : 'visa_total_amount';
                                                                        $totalAmount = json_decode($details[$totalAmountKey], true);
                                                                    @endphp
                                                                    @foreach($totalAmount as $formattedTotal)
                                                                        @if ($formattedTotal == 0)
                                                                            0.00 AED<br>
                                                                        @else
                                                                            {{ number_format(floatval($formattedTotal), 2) }} AED<br>
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td class="remove-col" data-th="">
                                                                    <button class="btn-remove remove-from-cart">
                                                                        <i class="icon-close"></i>
                                                                    </button>                                                        
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>

                                                @foreach(session('cart') as $id => $details)
                                                        @php
                                                            $productType = $details['product_activity'] ?? $details['product_visa'];
                                                        @endphp

                                                        @if($productType === "visa")
                                                            <tr data-id="{{ $details['visa_id'] . '_Visa' }}">
                                                                <td class="product-col">
                                                                    <div class="product">
                                                                        <h3 class="product-title">
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
                                                                        </h3>
                                                                        <!-- End .product-title -->
                                                                    </div>
                                                                    <!-- End .product -->
                                                                </td>
                                                                <td class="total-col" style="text-align: right;">
                                                                    @php
                                                                        $totalAmountKey = $productType === 'activity' ? 'activity_total_amount' : 'visa_total_amount';
                                                                        $totalAmount = json_decode($details[$totalAmountKey], true);
                                                                    @endphp
                                                                    @foreach($totalAmount as $formattedTotal)
                                                                        @if ($formattedTotal == 0)
                                                                            0.00 AED<br>
                                                                        @else
                                                                            {{ number_format(floatval($formattedTotal), 2) }} AED<br>
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td class="remove-col" data-th="">
                                                                    <button class="btn-remove remove-from-cart">
                                                                        <i class="icon-close"></i>
                                                                    </button>                                                        
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            @endif


                                        </table>
                                    </div><!-- End .col-lg-9 -->
                                    <aside class="col-lg-3">
                                        <div class="summary summary-cart">
                                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                           

                                            <table class="table table-summary">
                                                <tbody>
                                                    @if(session('cart'))
                                                        @php $total = 0; @endphp

                                                        @foreach(session('cart') as $id => $details)
                                                        @php
                                                            $productType = $details['product_activity'] ?? $details['product_visa'];
                                                        @endphp

                                                        @if($productType === "activity" || $productType === "visa")
                                                            <tr class="summary-subtotal">
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
                                                                        0.00 AED<br>
                                                                    @else
                                                                        {{ number_format(floatval($formattedTotal), 2) }} AED<br>
                                                                        @php
                                                                            $total += floatval($formattedTotal);
                                                                            @endphp
                                                                    @endif
                                                                @endforeach
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                        <tr class="summary-total">
                                                            <td><b>Total Amount</b></td>
                                                            <td><b>{{ number_format($total, 2) }} <br> AED</b></td>
                                                        </tr><!-- End .summary-total -->
                                                    @endif
                                                </tbody>
                                            </table>


                                            <a href="/checkout" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                                        </div><!-- End .summary -->

                                        <a href="/" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                                    </aside><!-- End .col-lg-3 -->
                                </div>

                                @else

                                <div>
                                    <table class="table table-wishlist table-mobile" >
                                        <thead>
                                            <tr>
                                                <th><a href="/">Back To Website</a></th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <center>
                                        <h3>Shopping Cart is Empty</h3>
                                    </center>
                                </div>
                            @endif
                        <!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
        $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);
        toastr.options.closeButton = false;
        toastr.options.progressBar = true;
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {

                    toastr.error('Remove Service');
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);                   
                }
            });
        }
    });
</script>
@endsection