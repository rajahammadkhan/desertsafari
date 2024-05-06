@extends('cms.layouts.masterpage')
@section('title', 'Settings')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/components/tabs-accordian/custom-accordions.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 <style>
.error{
    color: red;
} 

.file {
  visibility: hidden;
  position: absolute;
}

.logo-footer {
  visibility: hidden;
  position: absolute;
}

.img-header {
  visibility: hidden;
  position: absolute;
}

.img-thumbnail{
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}
.img-thumbnail-header{
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}

.images {
    display: flex;
    flex-wrap: wrap;
}

.images-header {
    display: flex;
    flex-wrap: wrap;
}

.photo {
    width: 230px;
}

.photo1 {
    width: 230px;
}

.photo img {
    width: 100%;
    height: 100%;
}

.photo-header {
    width: 1850px;
    height: 400px;
}

.photo-header img {
    width: 100%;
    height: 100%;
}

.photo-footer {
    width: 320px;
    height: 120px;
}

.photo-footer img {
    width: 100%;
    height: 100%;
}

.img-thumbnail:hover {
  box-shadow: 0 0 2px 1px #000;
}

.img-thumbnail-header:hover {
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
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
                
                    <form action="{{route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div style="background: rgba(0, 0, 0, 0.8);">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">Settings</h5>
                                </div>

                                <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                    <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                    &nbsp; | &nbsp; Update</button>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div id="toggleAccordion">                                
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Site Logo <small>(Header White Theme)</small> </label>
                                                <input type="file" name="key[site_logo_header_dark]"  class="file" accept="image/*" >
                                                <div class="images">
                                                    <div class="photo">
                                                        <img src="{{url('')}}/uploads/{{getSettings('site_logo_header_dark') ?? 'placeholder.png'}}" id="preview" class="img-thumbnail browse" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label>Site Logo<small>(Header Black Theme)</small> </label>
                                                <input type="file" name="key[site_logo_header_light]"  class="logo-footer"  accept="image/*" >
                                                <div class="images">
                                                    <div class="photo1">
                                                        <img src="{{url('')}}/uploads/{{getSettings('site_logo_header_light') ?? 'placeholder.png'}}" id="preview-footer-logo" class="img-thumbnail browse1" style="width: 100%; background: black;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Website Url </label>
                                                <input type="text" name="key[website_url]" value="{{ getSettings('website_url') ?? null }}" class="form-control" placeholder="Website URL..." required>
                                                    @if ($errors->has('website_url'))
                                                        <div class="error">{{ $errors->first('website_url') }}</div>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="">Website Name </label>
                                                <input type="text" name="key[site_name]" value="{{ getSettings('site_name') ?? null }}" class="form-control" placeholder="Site Name..." required>
                                                    @if ($errors->has('site_name'))
                                                        <div class="error">{{ $errors->first('site_name') }}</div>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">   
                                    <div class="col-md-6 mt10">
                                        <label for="">Email <span class="text-danger">  </span></label>
                                                <input type="text" name="key[info_email]" value="{{ getSettings('info_email') ?? null }}" class="form-control" placeholder="Email..." >
                                        @if ($errors->has('info_email'))
                                            <div class="error">{{ $errors->first('info_email') }}</div>
                                        @endif
                                    </div>                                 
                                    <div class="col-md-6 mt10">
                                        <label for="">Contact No <span class="text-danger">  </span></label>
                                                <input type="text" name="key[contact_no]" value="{{ getSettings('contact_no') ?? null }}" class="form-control" placeholder="Contact No..." >
                                        @if ($errors->has('contact_no'))
                                            <div class="error">{{ $errors->first('contact_no') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">Facebook <span class="text-danger">  </span></label>
                                        <input type="text" name="key[facebook_page]" value="{{ getSettings('facebook_page') ?? null }}" class="form-control" placeholder="Facebook..." >
                                        @if ($errors->has('facebook_pagef'))
                                            <div class="error">{{ $errors->first('facebook_pagef') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">Instagram </label>
                                        <input type="text" name="key[social_instagram]" value="{{ getSettings('social_instagram') ?? null }}" class="form-control" placeholder="Instagram..." >
                                        @if ($errors->has('social_instagram'))
                                            <div class="error">{{ $errors->first('social_instagram') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">LinkedIn </label>
                                        <input type="text" name="key[social_linkedin]" value="{{ getSettings('social_linkedin') ?? null }}" class="form-control" placeholder="LinkedIn..." >
                                        @if ($errors->has('social_linkedin'))
                                            <div class="error">{{ $errors->first('social_linkedin') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">Twitter </label>
                                        <input type="text" name="key[twitter_page]" value="{{ getSettings('twitter_page') ?? null }}" class="form-control" placeholder="Twitter..." >
                                        @if ($errors->has('twitter_page'))
                                            <div class="error">{{ $errors->first('twitter_page') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">Youtube </label>
                                        <input type="text" name="key[social_youtube]" value="{{ getSettings('social_youtube') ?? null }}" class="form-control" placeholder="youtube..." >
                                        @if ($errors->has('social_youtube'))
                                            <div class="error">{{ $errors->first('social_youtube') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">Address <!--  --></label>
                                                <input type="text" name="key[address]" value="{{ getSettings('address') ?? null }}" class="form-control" placeholder="Address..." >
                                        @if ($errors->has('address'))
                                            <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">Bank Name </label>
                                        <input type="text" name="key[bank_name]" value="{{ getSettings('bank_name') ?? null }}" class="form-control" placeholder="Bank Name..." >
                                        @if ($errors->has('bank_name'))
                                            <div class="error">{{ $errors->first('bank_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <label for="">Account Number <!--  --></label>
                                                <input type="text" name="key[acc_no]" value="{{ getSettings('acc_no') ?? null }}" class="form-control" placeholder="Account Number..." >
                                        @if ($errors->has('acc_no'))
                                            <div class="error">{{ $errors->first('acc_no') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mt10">
                                        <label for="">Credit Card Link <!--  --></label>
                                                <input type="text" name="key[cr_card_link]" value="{{ getSettings('cr_card_link') ?? null }}" class="form-control" placeholder="Credit Card Link..." >
                                        @if ($errors->has('cr_card_link'))
                                            <div class="error">{{ $errors->first('cr_card_link') }}</div>
                                        @endif
                                    </div>
                                     <div class="col-md-12 mt10">
                                        <label for="">About Us <small>( Footer )</small> </label>
                                        <textarea rows="4" name="key[footer_about]" class="form-control" required>{{ getSettings('footer_about') ?? null }}</textarea>
                                        @if ($errors->has('footer_about'))
                                            <div class="error">{{ $errors->first('footer_about') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mt10">
                                        <label for="">Google Map <small>( Embedded Code )</small> </label>
                                        <textarea rows="4" name="key[google_location]" class="form-control" required>{{ getSettings('google_location') ?? null }}</textarea>
                                        @if ($errors->has('google_location'))
                                            <div class="error">{{ $errors->first('google_location') }}</div>
                                        @endif
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
    <script src="{{ url('') }}/assets/js/components/ui-accordions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
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

            $(document).on("click", ".browse1", function() {
                var file = $(this).parents().find(".logo-footer");
                file.trigger("click");
            });

            $('.logo-footer').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-footer-logo").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            $(document).on("click", ".browse-img-header", function() {
                var file1 = $(this).parents().find(".img-header");
                file1.trigger("click");
            }); 

            $('.img-header').change(function(e) {
                
                var fileName = e.target.files[0].name;
                
                $("#file").val(fileName);
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-img-header").src = e.target.result;
                };

                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            
        });

        

    </script>
@endsection
