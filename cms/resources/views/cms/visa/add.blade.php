@extends('cms.layouts.masterpage')
@section('title', 'Visa')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/bootstrap-tagsinput.css">
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
                    <li class="breadcrumb-item">All Visa</li>
                    <li class="breadcrumb-item"><a href="{{route('visas')}}">Visa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('visa.update', [$visa->id]) : route('visa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="id" value="{{ $visa->id ?? null }}">
                    @endif
                    <div style="background: black;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Visa / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('visas')}}" class="btn btn-danger"> 
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
                                <input {{!$isEdit ? 'required' : null}} type="file" name="featured_image"  class="file" accept="image/*" value="{{ $visa->featured_image ?? null }}">
                                <div class="images">
                                    <div class="photo">
                                        <img src="{{url('')}}/uploads/{{$visa->featured_image ?? 'placeholder-small.jpg'}}" id="preview" class="img-thumbnail browse">
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Name <span class="text-danger"> * </span></label>
                                        <input type="text" name="name" value="{{ $visa->name ?? old('name') ?? null }}"
                                            class="form-control" placeholder="Enter Name..." required>
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Price <span class="text-danger"> * </span></label>
                                        <input type="text" name="price" value="{{ $visa->price ?? old('price') ?? null }}"
                                            class="form-control" placeholder="Enter Price..." required>
                                        @if ($errors->has('price'))
                                            <div class="error">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Working Days <span class="text-danger"> * </span></label>
                                        <input type="text" name="working_days" value="{{ $visa->working_days ?? old('working_days') ?? null }}"
                                            class="form-control" placeholder="Enter Working Days..." required>
                                        @if ($errors->has('working_days'))
                                            <div class="error">{{ $errors->first('working_days') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Easy Documentation <span class="text-danger"> * </span></label>
                                        <input type="text" name="easy_documentation" value="{{ $visa->easy_documentation ?? old('easy_documentation') ?? null }}"
                                            class="form-control" placeholder="Enter Easy Documentation..." required>
                                        @if ($errors->has('easy_documentation'))
                                            <div class="error">{{ $errors->first('easy_documentation') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Online Payment <span class="text-danger"> * </span></label>
                                        <input type="text" name="online_payment" value="{{ $visa->online_payment ?? old('online_payment') ?? null }}"
                                            class="form-control" placeholder="Enter Online Payment..." required>
                                        @if ($errors->has('online_payment'))
                                            <div class="error">{{ $errors->first('online_payment') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Arrival Visa Country <span class="text-danger"> * </span></label>
                                        <input type="text" name="arrival_visa_country" value="{{ $visa->arrival_visa_country ?? old('arrival_visa_country') ?? null }}"
                                            class="form-control" placeholder="Enter Arrival Visa Country..." required>
                                        @if ($errors->has('arrival_visa_country'))
                                            <div class="error">{{ $errors->first('arrival_visa_country') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Restricted Visa Country <span class="text-danger"> * </span></label>
                                        <input type="text" name="restricted_visa_country" value="{{ $visa->restricted_visa_country ?? old('restricted_visa_country') ?? null }}"
                                            class="form-control" placeholder="Enter Restricted Visa Country..." required>
                                        @if ($errors->has('restricted_visa_country'))
                                            <div class="error">{{ $errors->first('restricted_visa_country') }}</div>
                                        @endif
                                    </div>                                    
                                </div>
                            </div>

                            <div class="form-group col-md-11 mt10">    
                                <h5><b>Visa Prices & Options</b></h5>
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
                                                @foreach($visa->features as $key => $feature)
                                                <hr>
                                                    <div class="row addmore_cont1 ml30">
                                                        <input type="hidden" name="featureid[]" value="{{$feature->id}}" class="radio_counter1" />

                                                        <div class="form-group col-md-4">
                                                            <label for="">Visa Name <span class="text-danger"> * </span></label>
                                                            <input type="text" name="visa_name[]" value="{{$feature->visa_name}}"
                                                                class="form-control" placeholder="Visa Name...">
                                                            @if ($errors->has('visa_name'))
                                                                <div class="error">{{ $errors->first('visa_name') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Processing Type Normal <span class="text-danger"> * </span></label><br>

                                                            <select class="form-control" style="padding: 8px 10px;" name="processing_type_normal[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option {{$isEdit && $feature->processing_type_normal == '0' ? 'selected' : null}} value="0">0</option>
                                                                    <option {{$isEdit && $feature->processing_type_normal == '1' ? 'selected' : null}} value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('processing_type_normal'))
                                                                <div class="error">{{ $errors->first('processing_type_normal') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Processing Type Express <span class="text-danger"> * </span></label><br>

                                                            <select class="form-control" style="padding: 8px 10px;" name="processing_type_express[]" required>
                                                                <option selected disabled>Please Select</option>
                                                                    <option {{$isEdit && $feature->processing_type_express == '0' ? 'selected' : null}} value="0">0</option>
                                                                    <option {{$isEdit && $feature->processing_type_express == '1' ? 'selected' : null}} value="1">1</option>
                                                            </select>
                                                            @if ($errors->has('processing_type_express'))
                                                                <div class="error">{{ $errors->first('processing_type_express') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Travel Date End <span class="text-danger"> * </span></label>
                                                            <input type="date" name="travel_date_end[]" value="{{$feature->travel_date_end}}"
                                                                class="form-control" placeholder="Travel Date End...">
                                                            @if ($errors->has('travel_date_end'))
                                                                <div class="error">{{ $errors->first('travel_date_end') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="">Visa Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="visa_price[]" value="{{$feature->visa_price}}"
                                                                class="form-control" placeholder="Number of Visa...">
                                                            @if ($errors->has('visa_price'))
                                                                <div class="error">{{ $errors->first('visa_price') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Visa Express Price <span class="text-danger"> * </span></label>
                                                            <input type="text" name="visa_price_e[]" value="{{$feature->visa_price_e}}"
                                                                class="form-control" placeholder="Visa Express Price...">
                                                            @if ($errors->has('visa_price_e'))
                                                                <div class="error">{{ $errors->first('visa_price_e') }}</div>
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

                                                    <div class="form-group col-md-4">
                                                        <label for="">Visa Name <span class="text-danger"> * </span></label>
                                                        <input type="text" name="visa_name[]" value=""
                                                            class="form-control" placeholder="Visa Name...">
                                                        @if ($errors->has('visa_name'))
                                                            <div class="error">{{ $errors->first('visa_name') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Processing Type Normal <span class="text-danger"> * </span></label><br>

                                                        <select class="form-control" style="padding: 8px 10px;" name="processing_type_normal[]" required>
                                                            <option selected disabled>Please Select</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                        </select>
                                                        @if ($errors->has('processing_type_normal'))
                                                            <div class="error">{{ $errors->first('processing_type_normal') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">Processing Type Express <span class="text-danger"> * </span></label><br>

                                                        <select class="form-control" style="padding: 8px 10px;" name="processing_type_express[]" required>
                                                            <option selected disabled>Please Select</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                        </select>
                                                        @if ($errors->has('processing_type_express'))
                                                            <div class="error">{{ $errors->first('processing_type_express') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Travel Date End <span class="text-danger"> * </span></label>
                                                        <input type="date" name="travel_date_end[]" value=""
                                                            class="form-control" placeholder="Travel Date End...">
                                                        @if ($errors->has('travel_date_end'))
                                                            <div class="error">{{ $errors->first('travel_date_end') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Visa Price <span class="text-danger"> * </span></label>
                                                        <input type="text" name="visa_price[]" value=""
                                                            class="form-control" placeholder="Number of Visa...">
                                                        @if ($errors->has('visa_price'))
                                                            <div class="error">{{ $errors->first('visa_price') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">Visa Express Price <span class="text-danger"> * </span></label>
                                                        <input type="text" name="visa_price_e[]" value=""
                                                            class="form-control" placeholder="Visa Express Price...">
                                                        @if ($errors->has('visa_price_e'))
                                                            <div class="error">{{ $errors->first('visa_price_e') }}</div>
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
                                <label>Description</label>
                                <textarea cols="200" class="summernote" name="description">{!! $visa->description ?? null !!}</textarea>
                            </div> 

                            <div class="col-md-12">
                                <label>Visa Documents</label>
                                <textarea cols="200" class="summernote" name="visa_documents">{!! $visa->visa_documents ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label>Faq's</label>
                                <textarea cols="200" class="summernote" name="faq">{!! $visa->visa_documents ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label>Term Condition</label>
                                <textarea cols="200" class="summernote" name="term_condition">{!! $visa->visa_documents ?? null !!}</textarea>
                            </div> 

                            <div class="col-md-12 mt30">
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
    <script src="{{ url('') }}/assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
@endsection
@section('bottom-bot-scripts')
    <script>
        $(document).ready(function() {
            $('form').parsley();

            $('.summernote').summernote(
                {
                    height: 300,
                    focus: true
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

            $(document).on('click' , '.add_more1' , function(){
                
                $('.addMore_btn').append(
                `
                <hr>
                <div class="row addmore_cont1 ml30">
                    
                    <input type="hidden" value="1" class="radio_counter1" />

                    <div class="form-group col-md-4">
                        <label for="">Visa Name <span class="text-danger"> * </span></label>
                        <input type="text" name="visa_name[]" value=""
                            class="form-control" placeholder="Visa Name...">
                        @if ($errors->has('visa_name'))
                            <div class="error">{{ $errors->first('visa_name') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Processing Type Normal <span class="text-danger"> * </span></label><br>

                        <select class="form-control" style="padding: 8px 10px;" name="processing_type_normal[]" required>
                            <option selected disabled>Please Select</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                        </select>
                        @if ($errors->has('processing_type_normal'))
                            <div class="error">{{ $errors->first('processing_type_normal') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Processing Type Express <span class="text-danger"> * </span></label><br>

                        <select class="form-control" style="padding: 8px 10px;" name="processing_type_express[]" required>
                            <option selected disabled>Please Select</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                        </select>
                        @if ($errors->has('processing_type_express'))
                            <div class="error">{{ $errors->first('processing_type_express') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Travel Date End <span class="text-danger"> * </span></label>
                        <input type="date" name="travel_date_end[]" value=""
                            class="form-control" placeholder="Travel Date End...">
                        @if ($errors->has('travel_date_end'))
                            <div class="error">{{ $errors->first('travel_date_end') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Visa Price <span class="text-danger"> * </span></label>
                        <input type="text" name="visa_price[]" value=""
                            class="form-control" placeholder="Number of Visa...">
                        @if ($errors->has('visa_price'))
                            <div class="error">{{ $errors->first('visa_price') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Visa Express Price <span class="text-danger"> * </span></label>
                        <input type="text" name="visa_price_e[]" value=""
                            class="form-control" placeholder="Visa Express Price...">
                        @if ($errors->has('visa_price_e'))
                            <div class="error">{{ $errors->first('visa_price_e') }}</div>
                        @endif
                    </div>

                    <div class="col-md-1 mt-1">
                        <a href="javascript:void(0);" id="remove" class="remove">
                            <svg viewBox="0 0 24 24" width="32" height="32" stroke="#e20810" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        </a>
                    </div>



                    `
                );

                $('form').parsley();

                
                $('.remove').click(function () {
                    $(this).parent().parent().remove();
                });
            });
        });

    </script>
@endsection
