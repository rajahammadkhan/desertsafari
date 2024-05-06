<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Purchased Service</title>
    <meta name="description" content="Purchased Service">
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px;" leftmargin="0">
    <div class="invoice" style="width: 100%; max-width: 700px; background-color: #ffffff; box-shadow: 1px rgba(0, 0, 0, 0.5); border-radius: 10px; padding: 20px; box-sizing: border-box; margin: 20px auto;">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td style="text-align: left;">
                    <img src="https://cms.desertsafari4x4.com/laravel_files/public/uploads/18F53yLv8syKrqwZNCi23qECn05qkFUklgQ6G8LJ.png" alt="{{ getSettings('site_name') }}" style="max-height: 60px;">
                </td>
                <td style="text-align: center; font-size: 24px; font-weight: bold; color: #333;">
                    Order Slip
                </td>
                <td style="text-align: right; font-size: 14px; color: #666;">
                    <p>Date: {{ $booking->updated_at->format('F j, Y') }}</p>
                    <p>Order No #: {{ $booking->order_number }}</p>
                </td>
            </tr>
        </table>
        <hr>
        <div>
            <h4 style="font-size: 15px;">Personal Information: <span style="float: right; font-size: 15px;">Status: <span style="font-weight: 600;">{{ $booking->order_status }}</span></span></h4>

            <div>
                <span><b>Name:</b> <span style="font-size: 15px;">{{ $booking->client_name }}</span> </span>
                <span style="float:right"><b>Email:</b> <span style="font-size: 15px;">{{ $booking->client_email }}</span> </span>
            </div>

            <br>

            <div>
                <span><b>Number:</b> <span style="font-size: 15px;">{{ $booking->client_number }}</span> </span>
                <span style="float:right"><b>Alternate Number:</b> <span style="font-size: 15px;">{{ $booking->client_alternate_number }}</span> </span>
            </div>
            
            <br>

            <div>
                <span><b>Country:</b> <span style="font-size: 15px;">{{ $booking->client_country }}</span> </span>
            </div>
            
            <br>

            <div>
                <span><b>Address:</b> <span style="font-size: 15px;">{{ $booking->client_address }}</span> </span>
            </div>
            
            <br>

            <div>
                @if($booking->client_shipaddress != null)
                    <span><b>Ship Address:</b> <span style="font-size: 15px;">{{ $booking->client_shipaddress }}</span> </span>
                @else
                @endif
            </div>
        </div>

        <hr style="margin: 0.6rem;">

        <div>
            <h4>Product Information: <span style="float: right; font-size: 15px;">Received: <span style="color: #e87810; font-weight: 800">{{ $booking->received_by }}</span></span></h4>
            
        </div>

        <table class="invoice-table" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
          <thead>
            <tr style="color: white;background: black;font-weight: 700;">
                <th style="text-align: center; border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333; background-color: #f9f9f9;">Service Name</th>
                <th width="100" style="text-align: center; border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333; background-color: #f9f9f9;">Total</th>
            </tr>
          </thead>
          <tbody>
                @php
                    $orderDetails = json_decode($booking->order_details, true);
                @endphp
                @if(!is_null($orderDetails))
                    @foreach(json_decode($orderDetails, true) as $key => $value)
                        @if(is_numeric($key))

                        <tr>
                            <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;">
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
                            <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;"> 
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
                <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;">Total</td>
                <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;"><span style="float:right">{{ number_format($totalinvice, 2) }} AED</span></td>
            </tr> -->
            @if(!empty($booking->discount_amount))
                <tr style="font-weight: 600">
                    <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;">Discount Amount</td>
                    @if($booking->discount_type === "price")
                        <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;"><span style="float:right; color: red">-{{ $booking->discount_amount }}.00 AED</span></td>
                    @else
                        <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;"><span style="float:right; color: red">-{{ $booking->discount_amount }} % AED</span></td>
                    @endif
                </tr> 
            @endif
            <tr style="font-weight: 600">
                <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;">Grand Total</td>
                <td style="border: 1px solid #e2e2e2; padding: 12px; text-align: left; color: #333;"><span style="float:right">{{ number_format($booking->amount, 2) }} AED</span></td>
            </tr>

          </tbody>
        </table>

        <hr style="margin: 0.6rem;">

        <div>
            @if($booking->client_note != null)
                <h4>Note: <br><span style="font-size: 13px; font-weight: 500;">{{ $booking->client_note }}</span> </h4>
            @else
            @endif

             @if($booking->received_by == "Credit Card")
                <h4>Credit Card Link: <br><span style="font-size: 13px; font-weight: 500;">{{ getSettings('cr_card_link') }}</span> </h4>
            @else
            @endif

            @if($booking->reason_cancel != null)
                <h4 style="padding: 10px;background-color: gainsboro;border-radius: 10px;">Reason Cancel Order Note: <span style="color: red;font-size: 14px;font-weight: 999;">(By Admin)</span> <br>
                    <span style="font-size: 13px; font-weight: 500;">{!!$booking->reason_cancel!!}</span> 
                </h4>
            @else
            @endif
        </div>
        </div>  
</body>
</html>