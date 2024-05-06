@extends('cms.layouts.masterpage')
@section('title', 'Discounts')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <style>
.error{
    color: red;
}

.file {
  visibility: hidden;
  position: absolute;
}

.img-thumbnail{
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}

.images {
    display: flex;
    flex-wrap: wrap;
}

.photo {
    width: 100%;
    height: 280px;
}

.photo img {
    width: 100%;
    height: 100%;
}

.img-thumbnail:hover {
  box-shadow: 0 0 2px 1px #000;
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
    <div class="overlay">
    </div>
    <div class="cs-overlay">
    </div>
    <div class="search-overlay">
    </div>
    <!--  BEGIN CONTENT AREA  -->   
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Master Files</li>
                    <li class="breadcrumb-item"><a href="{{route('discounts')}}">Discounts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('discount.update', [$discount->id]) : route('discount.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                    @endif
                    <div style="background: rgba(0, 0, 0, 0.8);">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Discounts / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('discounts')}}" class="btn btn-danger"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                &nbsp; | &nbsp; Go Back</a>

                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                &nbsp; | &nbsp; {{ $isEdit ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="form-row mb-4">

                            <div class="form-group col-md-6">
                                <label for="">Discount Type <span class="text-danger"> * </span></label><br>

                                <select class="basic" style="padding: 8px 10px;" name="discount" required>
                                    <option selected disabled>Please Select</option>
                                        <option {{$isEdit && $discount->discount == 'percentage' ? 'selected' : null}} value="percentage">Percentage</option>
                                        <option {{$isEdit && $discount->discount == 'price' ? 'selected' : null}} value="price">Price</option>
                                </select>
                                @if ($errors->has('discount'))
                                    <div class="error">{{ $errors->first('discount') }}</div>
                                @endif
                            </div>
                            
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Coupon Code <span class="text-danger"> * </span></label>
                                        <input type="text" name="coupon_code" value="{{ $discount->coupon_code ?? old('coupon_code') ?? null }}"
                                            class="form-control" placeholder="Enter Coupon Code..." required>
                                        @if ($errors->has('coupon_code'))
                                            <div class="error">{{ $errors->first('coupon_code') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Discount Price <span class="text-danger"> * </span></label>
                                        <input type="text" name="coupon_price" value="{{ $discount->coupon_price ?? old('coupon_price') ?? null }}"
                                            class="form-control" placeholder="Enter Discount Price..." required>
                                        @if ($errors->has('coupon_price'))
                                            <div class="error">{{ $errors->first('coupon_price') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Start Date <span class="text-danger"> * </span></label>
                                        <input type="date" name="start_date" value="{{ $discount->start_date ?? old('start_date') ?? null }}"
                                            class="form-control" placeholder="Enter Start Date..." required>
                                        @if ($errors->has('start_date'))
                                            <div class="error">{{ $errors->first('start_date') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">End Date <span class="text-danger"> * </span></label>
                                        <input type="date" name="end_date" value="{{ $discount->end_date ?? old('end_date') ?? null }}"
                                            class="form-control" placeholder="Enter End Date..." required>
                                        @if ($errors->has('end_date'))
                                            <div class="error">{{ $errors->first('end_date') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Start Time <span class="text-danger"> * </span></label>
                                        <input type="time" name="start_time" value="{{ $discount->start_time ?? old('start_time') ?? null }}"
                                            class="form-control" placeholder="Enter Start Time..." required>
                                        @if ($errors->has('start_time'))
                                            <div class="error">{{ $errors->first('start_time') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">End Time <span class="text-danger"> * </span></label>
                                        <input type="time" name="end_time" value="{{ $discount->end_time ?? old('end_time') ?? null }}"
                                            class="form-control" placeholder="Enter End Time..." required>
                                        @if ($errors->has('end_time'))
                                            <div class="error">{{ $errors->first('end_time') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('bottom-mid-scripts')
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
@section('bottom-bot-scripts')
    
@endsection
