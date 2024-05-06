@extends('cms.layouts.masterpage')
@section('title', 'users')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
 <style>
.error{
    color: red;
}    
.file {
  visibility: hidden;
  position: absolute;
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
                    <li class="breadcrumb-item">User Management</li>
                    <li class="breadcrumb-item"><a href="{{route('users_data')}}">Users Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('user_data.update', [$user->id]) : route('user_data.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                    @endif
                    <div style="background: rgba(0, 0, 0, 0.8);">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Users Data / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <!-- <a href="{{route('user')}}" class="btn btn-danger"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                &nbsp; | &nbsp; Go Back</a> -->

                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                &nbsp; | &nbsp; {{ $isEdit ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="form-row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $isEdit ? $user->name : null }}"
                                        class="form-control" placeholder="Enter Name..." required>
                                    @if ($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lname" value="{{ $isEdit ? $user->lname : null }}"
                                        class="form-control" placeholder="Enter Last Name..." required>
                                    @if ($errors->has('lname'))
                                        <div class="error">{{ $errors->first('lname') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" value="{{ $isEdit ? $user->date_of_birth : null }}"
                                        class="form-control" placeholder="Enter Date of Birth..." required>
                                    @if ($errors->has('date_of_birth'))
                                        <div class="error">{{ $errors->first('date_of_birth') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ $isEdit ? $user->email : null }}"
                                        class="form-control" placeholder="Enter Email..." required readonly="true">
                                    @if ($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{ $isEdit ? $user->phone : null }}"
                                        class="form-control" placeholder="Enter Phone No." required>
                                    @if ($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
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
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
@endsection
@section('bottom-bot-scripts')

<script type="text/javascript">
    const input = document.getElementById('user_image')

    input.addEventListener('change', (event) => {
      const target = event.target
        if (target.files && target.files[0]) {
          /*Maximum allowed size in bytes
            5MB Example
            Change first operand(multiplier) for your needs*/
          const maxAllowedSize = 1 * 1024 * 1024;
          if (target.files[0].size > maxAllowedSize) {
            // Here you can ask your users to load correct file
            target.value = ''
            alert("File too big! Just upload file size must be kbs");
          }
      }
      
      var fileName = document.getElementById("user_image").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="webp"){
            //TO DO
        }else{
            target.value = ''
            alert("Only webp files are allowed!");
        }  
    });        
</script>
    <script>
        $(document).ready(function() {
            $('form').parsley();
        });

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

    </script>
@endsection
