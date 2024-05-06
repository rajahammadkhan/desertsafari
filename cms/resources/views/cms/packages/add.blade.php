@extends('cms.layouts.masterpage')
@section('title', 'Packages')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
    width: 360px;
    height: 215px;
}

.photo img {
    width: 100%;
    height: 100%;
}

.img-thumbnail:hover {
  box-shadow: 0 0 2px 1px #000;
}   
.note-editor .note-editing-area .note-editable {
  outline: none;
  background: white;
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
                    <li class="breadcrumb-item">All Packages</li>
                    <li class="breadcrumb-item"><a href="{{route('packages')}}">Packages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('package.update', [$package->id]) : route('package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="id" value="{{ $package->id ?? null }}">
                    @endif
                    <div style="background: black;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Packages / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('packages')}}" class="btn btn-danger"> 
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
                            
                            <div class="col-md-3">
                                <label>Featured Image <small>( Dimension : 1920 x 874 )</small> <span class="text-danger"> *</span> </label>
                                <input {{!$isEdit ? 'required' : null}} type="file" name="featured_image"  class="file" accept="image/*" value="{{ $package->featured_image ?? null }}">
                                <div class="images">
                                    <div class="photo">
                                        <img src="{{url('')}}/uploads/{{$package->featured_image ?? 'placeholder-small.jpg'}}" id="preview" class="img-thumbnail browse">
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Packages Type <span class="text-danger"> * </span></label>
                                        @if($isEdit)
                                        <select class="basic" name="type" required>
                                            <option selected disabled>Please Select</option>
                                                <option {{$isEdit && $package->activity_type == 'Best Vacation Packages - UAE' ? 'selected' : null}} value="Best Vacation Packages - UAE">Best Vacation Packages - UAE</option>
                                                <option {{$isEdit && $package->activity_type == 'Hoiday packages' ? 'selected' : null}} value="Hoiday packages">Hoiday packages</option>
                                                <option {{$isEdit && $package->activity_type == 'Combo package' ? 'selected' : null}} value="Combo package">Combo package</option>
                                        </select>
                                        @else
                                        <select class="basic" name="type" required>
                                            <option selected disabled>Please Select</option>
                                                <option value="Best Vacation Packages - UAE">Best Vacation Packages - UAE</option>
                                                <option value="Hoiday packages">Hoiday packages</option>
                                                <option value="Combo package">Combo package</option>
                                        </select>
                                        @endif
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="">Name <span class="text-danger"> * </span></label>
                                        <input type="text" name="name" value="{{ $package->name ?? old('name') ?? null }}"
                                            class="form-control" placeholder="Enter Name..." required>
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Price <span class="text-danger"> * </span></label>
                                        <input type="text" name="price" value="{{ $package->price ?? old('price') ?? null }}"
                                            class="form-control" placeholder="Enter Price..." required>
                                        @if ($errors->has('price'))
                                            <div class="error">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Operating Hours <span class="text-danger"> * </span></label>
                                        <input type="text" name="operating_hours" value="{{ $package->operating_hours ?? old('operating_hours') ?? null }}"
                                            class="form-control" placeholder="Enter Operating Hours..." required>
                                        @if ($errors->has('operating_hours'))
                                            <div class="error">{{ $errors->first('operating_hours') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Instant Confirmation <span class="text-danger"> * </span></label>
                                        <input type="text" name="instant_confirmation" value="{{ $package->instant_confirmation ?? old('instant_confirmation') ?? null }}"
                                            class="form-control" placeholder="Enter Instant Confirmation..." required>
                                        @if ($errors->has('instant_confirmation'))
                                            <div class="error">{{ $errors->first('instant_confirmation') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Mobile Voucher Accepted <span class="text-danger"> * </span></label>
                                        <input type="text" name="mobile_voucher_accepted" value="{{ $package->mobile_voucher_accepted ?? old('mobile_voucher_accepted') ?? null }}"
                                            class="form-control" placeholder="Enter Mobile Voucher Accepted..." required>
                                        @if ($errors->has('mobile_voucher_accepted'))
                                            <div class="error">{{ $errors->first('mobile_voucher_accepted') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Non Refundable <span class="text-danger"> * </span></label>
                                        <input type="text" name="non_refundable" value="{{ $package->non_refundable ?? old('non_refundable') ?? null }}"
                                            class="form-control" placeholder="Enter Non Refundable..." required>
                                        @if ($errors->has('non_refundable'))
                                            <div class="error">{{ $errors->first('non_refundable') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Language <span class="text-danger"> * </span></label>
                                        <input type="text" name="language" value="{{ $package->language ?? old('language') ?? null }}"
                                            class="form-control" placeholder="Enter Language..." required>
                                        @if ($errors->has('language'))
                                            <div class="error">{{ $errors->first('language') }}</div>
                                        @endif
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label for="">Select Emirates <span class="text-danger"> *</span></label>
                                        @if($isEdit)
                                        <select class="basic" name="country_state" required>
                                            <option selected disabled>Please Select</option>
                                                <option {{$isEdit && $package->country_state == 'Abu Dhabi' ? 'selected' : null}} value="Abu Dhabi">Abu Dhabi</option>
                                                <option {{$isEdit && $package->country_state == 'Ajman' ? 'selected' : null}} value="Ajman">Ajman</option>
                                                <option {{$isEdit && $package->country_state == 'Al Ain' ? 'selected' : null}} value="Al Ain">Al Ain</option>
                                                <option {{$isEdit && $package->country_state == 'Dubai' ? 'selected' : null}} value="Dubai">Dubai</option>
                                                <option {{$isEdit && $package->country_state == 'Fujairah' ? 'selected' : null}} value="Fujairah">Fujairah</option>
                                                <option {{$isEdit && $package->country_state == 'Ras Al-Khaimah' ? 'selected' : null}} value="Ras Al-Khaimah">Ras Al-Khaimah</option>
                                                <option {{$isEdit && $package->country_state == 'Sharjah' ? 'selected' : null}} value="Sharjah">Sharjah</option>
                                        </select>
                                        @else
                                        <select class="basic" name="country_state" required>
                                            <option selected disabled>Please Select</option>
                                                <option value="Abu Dhabi">Abu Dhabi</option>
                                                <option value="Ajman">Ajman</option>
                                                <option value="Al Ain">Al Ain</option>
                                                <option value="Dubai">Dubai</option>
                                                <option value="Fujairah">Fujairah</option>
                                                <option value="Ras Al-Khaimah">Ras Al-Khaimah</option>
                                                <option value="Sharjah">Sharjah</option>
                                        </select>
                                        @endif
                                    </div>  
                                    <div class="form-group col-md-3">
                                        <label for="">Transfer Options Available <span class="text-danger"> * </span></label>
                                        <input type="text" name="transfer_options_available" value="{{ $package->transfer_options_available ?? old('transfer_options_available') ?? null }}"
                                            class="form-control" placeholder="Enter Transfer Options Available..." required>
                                        @if ($errors->has('transfer_options_available'))
                                            <div class="error">{{ $errors->first('transfer_options_available') }}</div>
                                        @endif
                                    </div>   
                                    <div class="form-group col-md-6">
                                        <label for="">Google Map Link <span class="text-danger"> * </span></label>
                                        <input type="text" name="google_map_link" value="{{ $package->google_map_link ?? old('google_map_link') ?? null }}"
                                            class="form-control" placeholder="Enter Google Map Link..." required>
                                        @if ($errors->has('google_map_link'))
                                            <div class="error">{{ $errors->first('google_map_link') }}</div>
                                        @endif
                                    </div>                                    
                                </div>
                            </div>

                            <div class="form-group col-md-11 mt10">    
                                <h5><b>Package Price & Options</b></h5>
                            </div>
                            <div class="form-group col-md-1">
                                @if($isEdit)
                                @else
                                <button type="button" class="btn btn-dark waves-effect waves-light btn-sm add_more1">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div class="addMore">
                                    <div class="addmore_cont">
                                        <div class="addMore_btn">
                                            @if($isEdit)
                                                @foreach($package->features as $key => $feature)
                                                <hr>
                                                    <div class="row addmore_cont1 ml30">
                                                        <input type="hidden" name="featureid[]" value="{{$feature->id}}" class="radio_counter1" />
                                                        
                                                        <div class="form-group col-md-3">
                                                            <label for="">Package Name <span class="text-danger"> * </span></label>
                                                            <input type="text" name="activity_name[]" value="{{$feature->activity_name}}"
                                                                class="form-control" placeholder="Package Name...">
                                                            @if ($errors->has('activity_name'))
                                                                <div class="error">{{ $errors->first('activity_name') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-2">
                                                            <label for="">Package Date <span class="text-danger"> * </span></label>
                                                            <input type="date" name="tour_date[]" value="{{$feature->tour_date}}"
                                                                class="form-control" placeholder="Private Transfer Price...">
                                                            @if ($errors->has('tour_date'))
                                                                <div class="error">{{ $errors->first('tour_date') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-2">
                                                            <label for="">Without Transfer Price <span class="text-danger"> * </span></label><br>

                                                            <select class="form-control" style="padding: 8px 10px;" name="without_transfer_option_price[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option {{$isEdit && $feature->without_transfer_option_price == '0' ? 'selected' : null}} value="0">0</option>
                                                                    <option {{$isEdit && $feature->without_transfer_option_price == '1' ? 'selected' : null}} value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('without_transfer_option_price'))
                                                                <div class="error">{{ $errors->first('without_transfer_option_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Sharing Transfer Price <span class="text-danger"> * </span></label><br>

                                                            <select class="form-control" style="padding: 8px 10px;" name="sharing_transfer_option_price[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option {{$isEdit && $feature->sharing_transfer_option_price == '0' ? 'selected' : null}} value="0">0</option>
                                                                    <option {{$isEdit && $feature->sharing_transfer_option_price == '1' ? 'selected' : null}} value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('sharing_transfer_option_price'))
                                                                <div class="error">{{ $errors->first('sharing_transfer_option_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Private Transfer Price <span class="text-danger"> * </span></label><br>
                                                            <select class="form-control" style="padding: 8px 10px;" name="private_transfer_option_price[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option {{$isEdit && $feature->private_transfer_option_price == '0' ? 'selected' : null}} value="0">0</option>
                                                                    <option {{$isEdit && $feature->private_transfer_option_price == '1' ? 'selected' : null}} value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('private_transfer_option_price'))
                                                                <div class="error">{{ $errors->first('private_transfer_option_price') }}</div>
                                                            @endif
                                                        </div>

                                                    <!-- Without Transfer Price -->
                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Adult Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="adult_price[]" value="{{$feature->adult_price}}"
                                                                class="form-control" placeholder="Without Adult Price...">
                                                            @if ($errors->has('adult_price'))
                                                                <div class="error">{{ $errors->first('adult_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Child Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="child_price[]" value="{{$feature->child_price}}"
                                                                class="form-control" placeholder="Without Child Price...">
                                                            @if ($errors->has('child_price'))
                                                                <div class="error">{{ $errors->first('child_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Without Infant Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="infant_price[]" value="{{$feature->infant_price}}"
                                                                class="form-control" placeholder="Without Infant Price...">
                                                            @if ($errors->has('infant_price'))
                                                                <div class="error">{{ $errors->first('infant_price') }}</div>
                                                            @endif
                                                        </div>

                                                    <!-- Sharing Transfer Price -->
                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Adult Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="adult_price_st[]" value="{{$feature->adult_price_st}}"
                                                                class="form-control" placeholder="Sharing Adult Price...">
                                                            @if ($errors->has('adult_price_st'))
                                                                <div class="error">{{ $errors->first('adult_price_st') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Child Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="child_price_st[]" value="{{$feature->child_price_st}}"
                                                                class="form-control" placeholder="Sharing Child Price...">
                                                            @if ($errors->has('child_price_st'))
                                                                <div class="error">{{ $errors->first('child_price_st') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Sharing Infant Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="infant_price_st[]" value="{{$feature->infant_price_st}}"
                                                                class="form-control" placeholder="Sharing Infant Price...">
                                                            @if ($errors->has('infant_price_st'))
                                                                <div class="error">{{ $errors->first('infant_price_st') }}</div>
                                                            @endif
                                                        </div>

                                                    <!-- Private Transfer Price -->
                                                        <div class="form-group col-md-4">
                                                            <label for="">Private Adult Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="adult_price_pt[]" value="{{$feature->adult_price_pt}}"
                                                                class="form-control" placeholder="Private Adult Price...">
                                                            @if ($errors->has('adult_price_pt'))
                                                                <div class="error">{{ $errors->first('adult_price_pt') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Private Child Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="child_price_pt[]" value="{{$feature->child_price_pt}}"
                                                                class="form-control" placeholder="Private Child Price...">
                                                            @if ($errors->has('child_price_pt'))
                                                                <div class="error">{{ $errors->first('child_price_pt') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Private Infant Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="infant_price_pt[]" value="{{$feature->infant_price_pt}}"
                                                                class="form-control" placeholder="Private Infant Price...">
                                                            @if ($errors->has('infant_price_pt'))
                                                                <div class="error">{{ $errors->first('infant_price_pt') }}</div>
                                                            @endif
                                                        </div>

                                                        <!-- More -->
                                                        <div class="form-group col-md-12">
                                                            <h5 class="text-center">More Booking Policy</h5>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Pickup Timings <span class="text-danger"> * </span></label>
                                                            <input type="text" name="without_pickup_timings[]" value="{{$feature->without_pickup_timings}}"
                                                                class="form-control" placeholder="Without Pickup Timings...">
                                                            @if ($errors->has('without_pickup_timings'))
                                                                <div class="error">{{ $errors->first('without_pickup_timings') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Pickup Timings <span class="text-danger"> * </span></label>
                                                            <input type="text" name="sharing_pickup_timings[]" value="{{$feature->sharing_pickup_timings}}"
                                                                class="form-control" placeholder="Sharing Pickup Timings...">
                                                            @if ($errors->has('sharing_pickup_timings'))
                                                                <div class="error">{{ $errors->first('sharing_pickup_timings') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="">Private Pickup Timings <span class="text-danger"> * </span></label>
                                                            <input type="text" name="private_pickup_timings[]" value="{{$feature->private_pickup_timings}}"
                                                                class="form-control" placeholder="Private Pickup Timings...">
                                                            @if ($errors->has('private_pickup_timings'))
                                                                <div class="error">{{ $errors->first('private_pickup_timings') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Duration Approx <span class="text-danger"> * </span></label>
                                                            <input type="text" name="without_duration_approx[]" value="{{$feature->without_duration_approx}}"
                                                                class="form-control" placeholder="Without Duration Approx...">
                                                            @if ($errors->has('without_duration_approx'))
                                                                <div class="error">{{ $errors->first('without_duration_approx') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Duration Approx <span class="text-danger"> * </span></label>
                                                            <input type="text" name="sharing_duration_approx[]" value="{{$feature->sharing_duration_approx}}"
                                                                class="form-control" placeholder="Sharing Duration Approx...">
                                                            @if ($errors->has('sharing_duration_approx'))
                                                                <div class="error">{{ $errors->first('sharing_duration_approx') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="">Private Duration Approx <span class="text-danger"> * </span></label>
                                                            <input type="text" name="private_duration_approx[]" value="{{$feature->private_duration_approx}}"
                                                                class="form-control" placeholder="Private Duration Approx...">
                                                            @if ($errors->has('private_duration_approx'))
                                                                <div class="error">{{ $errors->first('private_duration_approx') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="">Cancellation Policy <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="cancellation_policy[]" placeholder="Cancellation Policy 1, Cancellation Policy 2, ...">{{$feature->cancellation_policy}}</textarea>
                                                            @if ($errors->has('cancellation_policy'))
                                                                <div class="error">{{ $errors->first('cancellation_policy') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-5">
                                                            <label for="">Child Policy <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="child_policy[]" placeholder="Child Policy 1, Child Policy 2, ...">{{$feature->child_policy}}</textarea>
                                                            @if ($errors->has('child_policy'))
                                                                <div class="error">{{ $errors->first('child_policy') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="">Inclusions <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="inclusions[]" placeholder="Inclusions 1, Inclusions 2, ...">{{$feature->inclusions}}</textarea>
                                                            @if ($errors->has('inclusions'))
                                                                <div class="error">{{ $errors->first('inclusions') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-5">
                                                            <label for="">Exclusion <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="exclusion[]" placeholder="Exclusion 1, Exclusion 2, ...">{{$feature->exclusion}}</textarea>
                                                            @if ($errors->has('exclusion'))
                                                                <div class="error">{{ $errors->first('exclusion') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-1 mt-1">
                                                            <a href="javascript:void(0);" class="remove" id="{{$feature->id}}">
                                                                <svg viewBox="0 0 24 24" width="32" height="32" stroke="#e20810" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                            </a>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row addmore_cont1 ml30">
                                                        <input type="hidden" value="1" class="radio_counter1" />
                                                        
                                                        <div class="form-group col-md-3">
                                                            <label for="">Package Name <span class="text-danger"> * </span></label>
                                                            <input type="text" name="activity_name[]" value=""
                                                                class="form-control" placeholder="Package Name...">
                                                            @if ($errors->has('activity_name'))
                                                                <div class="error">{{ $errors->first('activity_name') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-2">
                                                            <label for="">Package Date <span class="text-danger"> * </span></label>
                                                            <input type="date" name="tour_date[]" value=""
                                                                class="form-control" placeholder="Private Transfer Price...">
                                                            @if ($errors->has('tour_date'))
                                                                <div class="error">{{ $errors->first('tour_date') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-2">
                                                            <label for="">Without Transfer Price <span class="text-danger"> * </span></label><br>

                                                            <select class="form-control" style="padding: 8px 10px;" name="without_transfer_option_price[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('without_transfer_option_price'))
                                                                <div class="error">{{ $errors->first('without_transfer_option_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Sharing Transfer Price <span class="text-danger"> * </span></label><br>

                                                            <select class="form-control" style="padding: 8px 10px;" name="sharing_transfer_option_price[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('sharing_transfer_option_price'))
                                                                <div class="error">{{ $errors->first('sharing_transfer_option_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="">Private Transfer Price <span class="text-danger"> * </span></label><br>
                                                            <select class="form-control" style="padding: 8px 10px;" name="private_transfer_option_price[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('private_transfer_option_price'))
                                                                <div class="error">{{ $errors->first('private_transfer_option_price') }}</div>
                                                            @endif
                                                        </div>

                                                    <!-- Without Transfer Price -->
                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Adult Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="adult_price[]" value=""
                                                                class="form-control" placeholder="Without Adult Price...">
                                                            @if ($errors->has('adult_price'))
                                                                <div class="error">{{ $errors->first('adult_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Child Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="child_price[]" value=""
                                                                class="form-control" placeholder="Without Child Price...">
                                                            @if ($errors->has('child_price'))
                                                                <div class="error">{{ $errors->first('child_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Without Infant Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="infant_price[]" value=""
                                                                class="form-control" placeholder="Without Infant Price...">
                                                            @if ($errors->has('infant_price'))
                                                                <div class="error">{{ $errors->first('infant_price') }}</div>
                                                            @endif
                                                        </div>

                                                    <!-- Sharing Transfer Price -->
                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Adult Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="adult_price_st[]" value=""
                                                                class="form-control" placeholder="Sharing Adult Price...">
                                                            @if ($errors->has('adult_price_st'))
                                                                <div class="error">{{ $errors->first('adult_price_st') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Child Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="child_price_st[]" value=""
                                                                class="form-control" placeholder="Sharing Child Price...">
                                                            @if ($errors->has('child_price_st'))
                                                                <div class="error">{{ $errors->first('child_price_st') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Sharing Infant Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="infant_price_st[]" value=""
                                                                class="form-control" placeholder="Sharing Infant Price...">
                                                            @if ($errors->has('infant_price_st'))
                                                                <div class="error">{{ $errors->first('infant_price_st') }}</div>
                                                            @endif
                                                        </div>

                                                    <!-- Private Transfer Price -->
                                                        <div class="form-group col-md-4">
                                                            <label for="">Private Adult Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="adult_price_pt[]" value=""
                                                                class="form-control" placeholder="Private Adult Price...">
                                                            @if ($errors->has('adult_price_pt'))
                                                                <div class="error">{{ $errors->first('adult_price_pt') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Private Child Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="child_price_pt[]" value=""
                                                                class="form-control" placeholder="Private Child Price...">
                                                            @if ($errors->has('child_price_pt'))
                                                                <div class="error">{{ $errors->first('child_price_pt') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Private Infant Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="infant_price_pt[]" value=""
                                                                class="form-control" placeholder="Private Infant Price...">
                                                            @if ($errors->has('infant_price_pt'))
                                                                <div class="error">{{ $errors->first('infant_price_pt') }}</div>
                                                            @endif
                                                        </div>

                                                        <!-- More -->
                                                        <div class="form-group col-md-12">
                                                            <h5 class="text-center">More Booking Policy</h5>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Pickup Timings <span class="text-danger"> * </span></label>
                                                            <input type="text" name="without_pickup_timings[]" value=""
                                                                class="form-control" placeholder="Without Pickup Timings...">
                                                            @if ($errors->has('without_pickup_timings'))
                                                                <div class="error">{{ $errors->first('without_pickup_timings') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Pickup Timings <span class="text-danger"> * </span></label>
                                                            <input type="text" name="sharing_pickup_timings[]" value=""
                                                                class="form-control" placeholder="Sharing Pickup Timings...">
                                                            @if ($errors->has('sharing_pickup_timings'))
                                                                <div class="error">{{ $errors->first('sharing_pickup_timings') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="">Private Pickup Timings <span class="text-danger"> * </span></label>
                                                            <input type="text" name="private_pickup_timings[]" value=""
                                                                class="form-control" placeholder="Private Pickup Timings...">
                                                            @if ($errors->has('private_pickup_timings'))
                                                                <div class="error">{{ $errors->first('private_pickup_timings') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Without Duration Approx <span class="text-danger"> * </span></label>
                                                            <input type="text" name="without_duration_approx[]" value=""
                                                                class="form-control" placeholder="Without Duration Approx...">
                                                            @if ($errors->has('without_duration_approx'))
                                                                <div class="error">{{ $errors->first('without_duration_approx') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Sharing Duration Approx <span class="text-danger"> * </span></label>
                                                            <input type="text" name="sharing_duration_approx[]" value=""
                                                                class="form-control" placeholder="Sharing Duration Approx...">
                                                            @if ($errors->has('sharing_duration_approx'))
                                                                <div class="error">{{ $errors->first('sharing_duration_approx') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="">Private Duration Approx <span class="text-danger"> * </span></label>
                                                            <input type="text" name="private_duration_approx[]" value=""
                                                                class="form-control" placeholder="Private Duration Approx...">
                                                            @if ($errors->has('private_duration_approx'))
                                                                <div class="error">{{ $errors->first('private_duration_approx') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="">Cancellation Policy <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="cancellation_policy[]" placeholder="Cancellation Policy 1, Cancellation Policy 2, ..."></textarea>
                                                            @if ($errors->has('cancellation_policy'))
                                                                <div class="error">{{ $errors->first('cancellation_policy') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-5">
                                                            <label for="">Child Policy <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="child_policy[]" placeholder="Child Policy 1, Child Policy 2, ..."></textarea>
                                                            @if ($errors->has('child_policy'))
                                                                <div class="error">{{ $errors->first('child_policy') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="">Inclusions <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="inclusions[]" placeholder="Inclusions 1, Inclusions 2, ..."></textarea>
                                                            @if ($errors->has('inclusions'))
                                                                <div class="error">{{ $errors->first('inclusions') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-5">
                                                            <label for="">Exclusion <span class="text-danger"> Comma Separator (, )</span></label>
                                                            <textarea cols="200" class="form-control" name="exclusion[]" placeholder="Exclusion 1, Exclusion 2, ..."></textarea>
                                                            @if ($errors->has('exclusion'))
                                                                <div class="error">{{ $errors->first('exclusion') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-1 mt-1">
                                                            <a href="javascript:void(0);" id="remove" class="remove">
                                                                <svg viewBox="0 0 24 24" width="32" height="32" stroke="#e20810" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                            </a>
                                                        </div>

                                                    </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label>About Experience</label>
                                <textarea cols="200" class="summernote" name="about_experience">{!! $package->about_experience ?? null !!}</textarea>
                            </div> 

                            <div class="col-md-12 mt-4">
                                <label>Highlights</label>
                                <textarea cols="200" class="summernote" name="highlights">{!! $package->highlights ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12 mt-4">
                                <label>Tour Inclusions</label>
                                <textarea cols="200" class="summernote" name="tour_inclusions">{!! $package->tour_inclusions ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12 mt-4">
                                <label>Important Information</label>
                                <textarea cols="200" class="summernote" name="important_information">{!! $package->important_information ?? null !!}</textarea>
                            </div> 

                            <div class="col-md-12 mt-4">
                                <label>Booking Policy</label>
                                <textarea cols="200" class="summernote" name="booking_policy">{!! $package->booking_policy ?? null !!}</textarea>
                            </div> 

                            @if($isEdit)

                            <div class="col-md-12 mt30">
                                <div class="custom-file-container" data-upload-id="galleryImages">
                                    <label>Gallery Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <br>
                                     @foreach($package->images as $key => $feature)
                                   
                                    <div class="custom-file-container__image-multi-preview" data-upload-token="c83aznuntollow3fc9m91" style="background-image: url('{{url('')}}/uploads/{{$feature->image}}'); ">
                                        <a href="javascript:void(0)" class="imagedelete" id="{{$feature->id}}">
                                            <span class="custom-file-container__image-multi-preview__single-image-clear">
                                                <span class="custom-file-container__image-multi-preview__single-image-clear__icon" data-upload-token="c83aznuntollow3fc9m91">×</span>
                                            </span>
                                        </a>
                                    </div>
                                    @endforeach  
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" name="multi_images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>

                            @else
                            <div class="col-md-12 mt30">
                                <div class="custom-file-container" data-upload-id="galleryImages">
                                    <label>Gallery Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" name="multi_images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>

                                    <div class="custom-file-container__image-preview"></div>
                                    
                                </div>
                            </div>
                            @endif                                             
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
    <script src="{{ url('') }}/assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ url('') }}/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/axios.min.js"></script>
@endsection
@section('bottom-bot-scripts')
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
            $('.file').change(function(e) {
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

            var secondUpload = new FileUploadWithPreview('galleryImages');

            var num = 1;

            $(document).on('click' , '.add_more1' , function(){
                
                $('.addMore_btn').append(

                `
                <hr>
                <div class="row addmore_cont1 ml30">
                    
                    <input type="hidden" value="1" class="radio_counter1" />

                    <div class="form-group col-md-3">
                        <label for="">Package Name <span class="text-danger"> * </span></label>
                        <input type="text" name="activity_name[]" value=""
                            class="form-control" placeholder="Package Name...">
                        @if ($errors->has('activity_name'))
                            <div class="error">{{ $errors->first('activity_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Package Date <span class="text-danger"> * </span></label>
                        <input type="date" name="tour_date[]" value=""
                            class="form-control" placeholder="Private Transfer Price...">
                        @if ($errors->has('tour_date'))
                            <div class="error">{{ $errors->first('tour_date') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Without Transfer Price <span class="text-danger"> * </span></label><br>

                        <select class="form-control" style="padding: 8px 10px;" name="without_transfer_option_price[]" required>
                            <option selected disabled>Please Select</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                        </select>
                        @if ($errors->has('without_transfer_option_price'))
                            <div class="error">{{ $errors->first('without_transfer_option_price') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Sharing Transfer Price <span class="text-danger"> * </span></label><br>

                        <select class="form-control" style="padding: 8px 10px;" name="sharing_transfer_option_price[]" required>
                            <option selected disabled>Please Select</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                        </select>
                        @if ($errors->has('sharing_transfer_option_price'))
                            <div class="error">{{ $errors->first('sharing_transfer_option_price') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Private Transfer Price <span class="text-danger"> * </span></label><br>
                        <select class="form-control" style="padding: 8px 10px;" name="private_transfer_option_price[]" required>
                            <option selected disabled>Please Select</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                        </select>
                        @if ($errors->has('private_transfer_option_price'))
                            <div class="error">{{ $errors->first('private_transfer_option_price') }}</div>
                        @endif
                    </div>

                <!-- Without Transfer Price -->
                    <div class="form-group col-md-4">
                        <label for="">Without Adult Price <span class="text-danger"> * </span></label>
                        <input type="text" name="adult_price[]" value=""
                            class="form-control" placeholder="Without Adult Price...">
                        @if ($errors->has('adult_price'))
                            <div class="error">{{ $errors->first('adult_price') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Without Child Price <span class="text-danger"> * </span></label>
                        <input type="text" name="child_price[]" value=""
                            class="form-control" placeholder="Without Child Price...">
                        @if ($errors->has('child_price'))
                            <div class="error">{{ $errors->first('child_price') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Without Infant Price <span class="text-danger"> * </span></label>
                        <input type="text" name="infant_price[]" value=""
                            class="form-control" placeholder="Without Infant Price...">
                        @if ($errors->has('infant_price'))
                            <div class="error">{{ $errors->first('infant_price') }}</div>
                        @endif
                    </div>

                <!-- Sharing Transfer Price -->
                    <div class="form-group col-md-4">
                        <label for="">Sharing Adult Price <span class="text-danger"> * </span></label>
                        <input type="text" name="adult_price_st[]" value=""
                            class="form-control" placeholder="Sharing Adult Price...">
                        @if ($errors->has('adult_price_st'))
                            <div class="error">{{ $errors->first('adult_price_st') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Sharing Child Price <span class="text-danger"> * </span></label>
                        <input type="text" name="child_price_st[]" value=""
                            class="form-control" placeholder="Sharing Child Price...">
                        @if ($errors->has('child_price_st'))
                            <div class="error">{{ $errors->first('child_price_st') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Sharing Infant Price <span class="text-danger"> * </span></label>
                        <input type="text" name="infant_price_st[]" value=""
                            class="form-control" placeholder="Sharing Infant Price...">
                        @if ($errors->has('infant_price_st'))
                            <div class="error">{{ $errors->first('infant_price_st') }}</div>
                        @endif
                    </div>

                <!-- Private Transfer Price -->
                    <div class="form-group col-md-4">
                        <label for="">Private Adult Price <span class="text-danger"> * </span></label>
                        <input type="text" name="adult_price_pt[]" value=""
                            class="form-control" placeholder="Private Adult Price...">
                        @if ($errors->has('adult_price_pt'))
                            <div class="error">{{ $errors->first('adult_price_pt') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Private Child Price <span class="text-danger"> * </span></label>
                        <input type="text" name="child_price_pt[]" value=""
                            class="form-control" placeholder="Private Child Price...">
                        @if ($errors->has('child_price_pt'))
                            <div class="error">{{ $errors->first('child_price_pt') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Private Infant Price <span class="text-danger"> * </span></label>
                        <input type="text" name="infant_price_pt[]" value=""
                            class="form-control" placeholder="Private Infant Price...">
                        @if ($errors->has('infant_price_pt'))
                            <div class="error">{{ $errors->first('infant_price_pt') }}</div>
                        @endif
                    </div>

                    <!-- More -->
                    <div class="form-group col-md-12">
                        <h5 class="text-center">More Booking Policy</h5>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Without Pickup Timings <span class="text-danger"> * </span></label>
                        <input type="text" name="without_pickup_timings[]" value=""
                            class="form-control" placeholder="Without Pickup Timings...">
                        @if ($errors->has('without_pickup_timings'))
                            <div class="error">{{ $errors->first('without_pickup_timings') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Sharing Pickup Timings <span class="text-danger"> * </span></label>
                        <input type="text" name="sharing_pickup_timings[]" value=""
                            class="form-control" placeholder="Sharing Pickup Timings...">
                        @if ($errors->has('sharing_pickup_timings'))
                            <div class="error">{{ $errors->first('sharing_pickup_timings') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Private Pickup Timings <span class="text-danger"> * </span></label>
                        <input type="text" name="private_pickup_timings[]" value=""
                            class="form-control" placeholder="Private Pickup Timings...">
                        @if ($errors->has('private_pickup_timings'))
                            <div class="error">{{ $errors->first('private_pickup_timings') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Without Duration Approx <span class="text-danger"> * </span></label>
                        <input type="text" name="without_duration_approx[]" value=""
                            class="form-control" placeholder="Without Duration Approx...">
                        @if ($errors->has('without_duration_approx'))
                            <div class="error">{{ $errors->first('without_duration_approx') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Sharing Duration Approx <span class="text-danger"> * </span></label>
                        <input type="text" name="sharing_duration_approx[]" value=""
                            class="form-control" placeholder="Sharing Duration Approx...">
                        @if ($errors->has('sharing_duration_approx'))
                            <div class="error">{{ $errors->first('sharing_duration_approx') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Private Duration Approx <span class="text-danger"> * </span></label>
                        <input type="text" name="private_duration_approx[]" value=""
                            class="form-control" placeholder="Private Duration Approx...">
                        @if ($errors->has('private_duration_approx'))
                            <div class="error">{{ $errors->first('private_duration_approx') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Cancellation Policy <span class="text-danger"> Comma Separator (, )</span></label>
                        <textarea cols="200" class="form-control" name="cancellation_policy[]" placeholder="Cancellation Policy..."></tex 1, Policy..."></tex 2tarea, >
                        @if ($errors->has('cancellation_policy'))
                            <div class="error">{{ $errors->first('cancellation_policy') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-5">
                        <label for="">Child Policy <span class="text-danger"> Comma Separator (, )</span></label>
                        <textarea cols="200" class="form-control" name="child_policy[]" placeholder="Child Policy 1, Child Policy 2, ..."></textarea>
                        @if ($errors->has('child_policy'))
                            <div class="error">{{ $errors->first('child_policy') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Inclusions <span class="text-danger"> Comma Separator (, )</span></label>
                        <textarea cols="200" class="form-control" name="inclusions[]" placeholder="Inclusions 1, Inclusions 2, ..."></textarea>
                        @if ($errors->has('inclusions'))
                            <div class="error">{{ $errors->first('inclusions') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-5">
                        <label for="">Exclusion <span class="text-danger"> Comma Separator (, )</span></label>
                        <textarea cols="200" class="form-control" name="exclusion[]" placeholder="Exclusion 1, Exclusion 2, ..."></textarea>
                        @if ($errors->has('exclusion'))
                            <div class="error">{{ $errors->first('exclusion') }}</div>
                        @endif
                    </div>

                    <div class="col-md-1 mt-1">
                        <a href="javascript:void(0);" id="remove" class="remove">
                            <svg viewBox="0 0 24 24" width="32" height="32" stroke="#e20810" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        </a>
                    </div>`
                );

                $('form').parsley();

                
                $('.remove').click(function () {
                    $(this).parent().parent().remove();
                });
            });

            
            $('.imagedelete').click(function () {
              var deleteId = $(this).attr('id');

              swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Yes, delete it!'
              }).then(function (result) {
                if (result.value) {
                axios
                  .post('{{route("packageimage.destroy")}}', {
                    _method: 'delete',
                    _token: '{{csrf_token()}}',
                    deleteId: deleteId,
                  })
                  .then(function (response) {

                    swal(
                      'Deleted!',
                      'Image has been deleted.',
                      'success'
                    )

                    table.draw();
                  })
                  .catch(function (error) {
                    console.log(error);
                    swal(
                      'Failed!',
                      error.response.data.error,
                      'error'
                    )
                  });
                }
                location.reload(true);
              });
            });

            $('.remove').click(function () {
              var deletefeatureId = $(this).attr('id');

              swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Yes, delete it!'
              }).then(function (result) {
                if (result.value) {
                axios
                  .post('{{route("packagefeature.destroy")}}', {
                    _method: 'delete',
                    _token: '{{csrf_token()}}',
                    deletefeatureId: deletefeatureId,
                  })
                  .then(function (response) {

                    swal(
                      'Deleted!',
                      'Feature has been deleted.',
                      'success'
                    )

                    table.draw();
                  })
                  .catch(function (error) {
                    console.log(error);
                    swal(
                      'Failed!',
                      error.response.data.error,
                      'error'
                    )
                  });
                }
              });               
            });
        });

    </script>
@endsection
