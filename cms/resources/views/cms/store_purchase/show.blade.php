@extends('cms.layouts.masterpage')
@section('title', 'Purchase Detail')
@section('top-styles')
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/bootstrap-tagsinput.css">


<style>
.widget-content-area {
    padding: 0px;
}
thead.datatable {
    background: #0e1726;
}
.table > thead > tr > th {
    color: #ffffff;
}
</style>
@endsection
@section('header')
    @parent
@endsection
@section('leftside')
    @parent
@endsection
@section('content')
<!--  BEGIN MAIN CONTAINER  -->
    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content ">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Purchase Detail</li>
                    </ol>
                        <br>
                        <form action="{{ $isEdit ? route('stock_purchase.update', [$processings->id]) : route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($isEdit)
                            <input type="hidden" name="_method" value="put">
                        @endif
                        <div style="background: rgba(0, 0, 0, 0.8);">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Purchase Detail / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('stock_purchase')}}" class="btn btn-danger"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                &nbsp; | &nbsp; Go Back</a>

                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                &nbsp; | &nbsp; {{ $isEdit ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                            <div class="container-fluid">
                            	<div class="row">
                                    <div class="form-group col-md-6 mt-2">
                                        <h3 style="font-variant: petite-caps;">Personal Information</h3>
                                    </div>
                                    <div class="form-group col-md-6  mt-2">
                                        <h5 style="font-variant: petite-caps; float: right;">Order Number: <b>{!! $processings->order_number !!}</b></h5>
                                    </div>
                            		<div class="form-group col-md-3">
                                        <label for="">Name</label>
                                        <input type="text" name="client_name" value="{{ $processings->client_name ?? old('client_name') ?? null }}"
                                            class="form-control" placeholder="Enter Name..." required>
                                        @if ($errors->has('client_name'))
                                            <div class="error">{{ $errors->first('client_name') }}</div>
                                        @endif
                                	</div>

    	                            <div class="form-group col-md-3">
                                        <label for="">Country</label>
                                        <input type="text" name="client_country" value="{{ $processings->client_country ?? old('client_country') ?? null }}"
                                            class="form-control" placeholder="Enter Country..." required>
                                        @if ($errors->has('client_country'))
                                            <div class="error">{{ $errors->first('client_country') }}</div>
                                        @endif
    	                            </div>

    	                            <div class="form-group col-md-3">
                                        <label for="">Address</label>
                                        <input type="text" name="client_address" value="{{ $processings->client_address ?? old('client_address') ?? null }}"
                                            class="form-control" placeholder="Enter Address..." required>
                                        @if ($errors->has('client_address'))
                                            <div class="error">{{ $errors->first('client_address') }}</div>
                                        @endif
    	                            </div>

    	                            <div class="form-group col-md-3">
                                        <label for="">Number</label>
                                        <input type="text" name="client_number" value="{{ $processings->client_number ?? old('client_number') ?? null }}"
                                            class="form-control" placeholder="Enter Number..." required>
                                        @if ($errors->has('client_number'))
                                            <div class="error">{{ $errors->first('client_number') }}</div>
                                        @endif
    	                            </div>

    	                            <div class="form-group col-md-3">
    	                                <label for="">Alternate Number</label>
                                        <input type="text" name="client_alternate_number" value="{{ $processings->client_alternate_number ?? old('client_alternate_number') ?? null }}"
                                            class="form-control" placeholder="Enter Alternate Number..." required>
                                        @if ($errors->has('client_alternate_number'))
                                            <div class="error">{{ $errors->first('client_alternate_number') }}</div>
                                        @endif
    	                            </div>

    	                            <div class="form-group col-md-3">
    	                                <label for="">Email</label>
    	                                <h5 class=""><b>{!! $processings->client_email !!}</b></h5>
    	                            </div>

                                    @if($processings->client_shipaddress)
        	                            <div class="form-group col-md-3">
                                            <label for="">Ship Address</label>
                                            <h5 class=""><b>{!! $processings->client_shipaddress !!}</b></h5>
                                    	</div>
                                    @endif

                                    <div class="form-group col-md-3">
                                        <label for="">Total Amount</label>
                                        <h5 class=""><b>{{ number_format($processings->amount, 2) }} AED</b></h5>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">Received By</label>
                                        <h5 class=""><b>{!! $processings->received_by !!}</b></h5>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="">Important Note</label>
                                        <h5 class=""><b>{!! $processings->client_note !!}</b></h5>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Status</label>
                                        <h5 class=""><b>{!! $processings->order_status !!}</b></h5>

                                        <select class="basic" name="order_status" onchange="showDiv(this)" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Please Select</option>
                                                <option {{$isEdit && $processings->order_status == 'Pending' ? 'selected' : null}} value="Pending">Pending</option>
                                                <option {{$isEdit && $processings->order_status == 'Approved' ? 'selected' : null}} value="Approved">Approved</option>
                                                <option {{$isEdit && $processings->order_status == 'Cancelled' ? 'selected' : null}} value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt10" id="hidden_div" style="display:none;">
                                        <label>Reason Cancel</label>
                                        <textarea cols="200" class="summernote" name="reason_cancel">{!! $processings->reason_cancel ?? null !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <h3 style="font-variant: petite-caps;">Order Detail</h3>
                                </div>
                                    <table style="width: 100%; font-size: 20px;">
                                    <tr style="color: white;background: black;font-weight: 700; font-size: 20px;">
                                        <th style="padding: 15px;">Product Name</th>
                                        <th style="padding: 15px;"></th>
                                        <th style="padding: 15px;"></th>
                                        <th style="padding: 15px;text-align: right;">Total</th>
                                    </tr>
                                    @php
                                        $orderDetails = json_decode($processings->order_details, true);
                                    @endphp
                                    @if(!is_null($orderDetails))
                                        @foreach(json_decode($orderDetails, true) as $key => $value)
                                            @if(is_numeric($key))
                                                <tr>
                                                    <td style="padding: 18px;">
                                                        @if (isset($value['product']))                                                                            
                                                            @if($value['product'] == "visa")
                                                                <span style="font-size: 11px; text-align: center;font-weight: 500;color: #e87810;">(Visa)</span>
                                                            @endif
                                                        @endif

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
                                                    <td style="padding: 18px;"></td>
                                                    <td style="padding: 18px;"></td>
                                                    <td style="padding: 18px; text-align: right;">
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
                                                </tr>
                                                @if(!$loop->last)
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif

                                    @if($processings->discount_amount ?? 0)
                                    <tr style="color: black; background: #e9ecef; font-weight: 700; font-size: 20px;">
                                        <td style="padding: 15px;">Discount Amount</td>
                                        <td style="padding: 15px;"></td>
                                        <td style="padding: 15px;"></td>
                                        @if($processings->discount_type == "price")
                                            <td style="padding: 15px; text-align: right;">{{ number_format($processings->discount_amount, 2) }} AED</td>
                                        @else
                                            <td style="padding: 15px; text-align: right;">{{ number_format($processings->discount_amount, 2) }} %</td>
                                        @endif
                                    </tr> 
                                    @endif

                                    <tr style="color: white;background: black;font-weight: 700; font-size: 20px;">
                                        <td style="padding: 15px;">Grand Total</td>
                                        <td style="padding: 15px;"></td>
                                        <td style="padding: 15px;"></td>
                                        <td style="padding: 15px; text-align: right;">{{ number_format($processings->amount, 2) }} AED</td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottom-mid-scripts')
<!-- Required datatable js -->
<script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
function showDiv(select){
   if(select.value=="Cancelled"){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
</script>
<script>
        $(document).ready(function() {
            $('form').parsley();

            $('.summernote').summernote(
                {
                    height: 300,
                }
            );

            $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            
            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
            });

            var secondUpload = new FileUploadWithPreview('mySecondImage')

        });

    </script>
@endsection
@section('bottom-bot-scripts')
@endsection