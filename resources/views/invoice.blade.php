<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
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
    #table th
    {
        padding: 0px 10px;
    }
    #table td
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
      max-width: 700px;
      background-color: #ffffff;
/*      border: 1px solid #e2e2e2;*/
      box-shadow: 1px rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 20px;
      box-sizing: border-box;
      margin: 20px auto;
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
      margin-top: -50px;
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
  </style>
</head>
<body>
    <div class="invoice">
	    <div class="invoice-header">
	      <div class="invoice-logo">
	        <!-- <img src="https://cms.desertsafari4x4.com/laravel_files/public/uploads/18F53yLv8syKrqwZNCi23qECn05qkFUklgQ6G8LJ.png" alt="Company Logo"> -->
	      </div>
	      <div class="invoice-title">Order Slip</div>
	      <div class="invoice-details" style="float: right">
	        <p>Date: {{ $invoiceData->updated_at->format('F j, Y') }}</p>
	        <p>Order No #: {{ $invoiceData->order_number }}</p>
	      </div>
	    </div>
	    <hr>
	    <div>
	        <h4>Personal Information: <span style="float: right; font-size: 15px;">Status: <span id="{{ $invoiceData->order_status }}">{{ $invoiceData->order_status }}</span></span></h4>

	        <div>
	            <span><b>Name:</b> <span style="font-size: 15px;">{{ $invoiceData->client_name }}</span> </span>
	            <span style="float:right"><b>Email:</b> <span style="font-size: 15px;">{{ $invoiceData->client_email }}</span> </span>
	        </div>

	        <br>

	        <div>
	            <span><b>Number:</b> <span style="font-size: 15px;">{{ $invoiceData->client_number }}</span> </span>
	            <span style="float:right"><b>Alternate Number:</b> <span style="font-size: 15px;">{{ $invoiceData->client_alternate_number }}</span> </span>
	        </div>
	        
	        <br>

	        <div>
	            <span><b>Country:</b> <span style="font-size: 15px;">{{ $invoiceData->client_country }}</span> </span>
	        </div>
	        
	        <br>

	        <div>
	            <span><b>Address:</b> <span style="font-size: 15px;">{{ $invoiceData->client_address }}</span> </span>
	        </div>
	        
	        <br>

	        <div>
	            @if($invoiceData->client_shipaddress != null)
	                <span><b>Ship Address:</b> <span style="font-size: 15px;">{{ $invoiceData->client_shipaddress }}</span> </span>
	            @else
	            @endif
	        </div>
	    </div>

	    <hr style="margin: 0.6rem;">

	    <div>
	        <h4>Product Information: <span style="float: right; font-size: 15px;">Received: <span style="color: #e87810; font-weight: 800">{{ $invoiceData->received_by }}</span></span></h4>
	        
	    </div>

	    <table class="invoice-table">
	      <thead>
	        <tr style="color: white;background: black;font-weight: 700;">
	            <th style="text-align: center;">Service Name</th>
	            <th width="100" style="text-align: center;">Total</th>
	        </tr>
	      </thead>
	      <tbody>
	            @php
	                $orderDetails = json_decode($invoiceData->order_details, true);
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
	        @if(!empty($invoiceData->discount_amount))
	            <tr style="font-weight: 600">
	                <td>Discount Amount</td>
	                @if($invoiceData->discount_type === "price")
	                    <td><span style="float:right; color: red">-{{ $invoiceData->discount_amount }}.00 AED</span></td>
	                @else
	                    <td><span style="float:right; color: red">-{{ $invoiceData->discount_amount }} % AED</span></td>
	                @endif
	            </tr> 
	        @endif
	        <tr style="font-weight: 600">
	            <td>Grand Total</td>
	            <td><span style="float:right">{{ number_format($invoiceData->amount, 2) }} AED</span></td>
	        </tr>

	      </tbody>
	    </table>

	    <hr style="margin: 0.6rem;">

	    <div>
	        @if($invoiceData->client_note != null)
	            <h4 class="mt-1">Note: <br><span style="font-size: 15px;">{{ $invoiceData->client_note }}</span> </h4>
	        @else
	        @endif

	        @if($invoiceData->reason_cancel != null)
	            <h4 style="padding: 10px;background-color: gainsboro;border-radius: 10px;">Reason Cancel Order Note: <span style="color: red;font-size: 14px;font-weight: 999;">(By Admin)</span> <br>
	                <span style="font-size: 15px;">{!!$invoiceData->reason_cancel!!}</span> 
	            </h4>
	        @else
	        @endif
	    </div>
		</div>  
</body>
</html>
