@extends('cms.layouts.masterpage')
@section('title', 'products')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
 <style>
.error{
    color: red;
}

.file {
  visibility: hidden;
  position: absolute;
}

.file1 {
  visibility: hidden;
  position: absolute;
}

.file2 {
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


.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

label{
    user-select: none;
}
.boxhide{
    display: none;
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
                    <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('product.update', [$product->id]) : route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                    @endif
                    <div style="background: rgba(0, 0, 0, 0.8);">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Products / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('products')}}" class="btn btn-danger"> 
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
                                <input {{!$isEdit ? 'required' : null}} type="file" name="thumbnail"  class="file" accept="image/*" >
                                <div class="images">
                                    <div class="photo">
                                        <img src="{{url('')}}/uploads/{{$product->thumbnail ?? 'placeholder-small.jpg'}}" id="preview" class="img-thumbnail browse">
                                    </div>
                                    @if ($errors->has('thumbnail'))
                                        <div class="error">{{ $errors->first('thumbnail') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-9">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="category">Select Category <span class="text-danger"> * </span></label>
                                        <select class="basic" id="category" name="category" required {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Category</option>
                                            @foreach ($menus as $parentMenus)  
                                                @if($parentMenus->parent_id == 0)                                             
                                                    <option value="{{$parentMenus->id}}">{{$parentMenus->name}}</option>

                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sub_category">Select Sub Category <span class="text-danger"> * </span></label>
                                        <select class="basic" id="sub_category" name="sub_category" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Sub Category</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sub_category_name">Select Sub Category Name <span class="text-danger"> * </span></label>
                                        <select class="basic" id="sub_category_name" name="sub_category_name" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Sub Category Name</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Name <span class="text-danger"> * </span></label>
                                        <input type="text" name="name" id="name" 
                                            class="form-control" placeholder="Enter Name..." required value="{{ $product->name ?? old('name') ?? null }}">
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="">Price <span class="text-danger"> * </span></label>
                                        <input type="text" name="price" value="{{ $product->price ?? old('price') ?? null }}"
                                            class="form-control" placeholder="Enter Price..." >
                                            @if ($errors->has('price'))
                                            <div class="error">{{ $errors->first('price') }}</div>
                                            @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                            
                                        <label for="">SKU <span class="text-danger"> * </span></label>
                                        <input type="text" name="sku" value="{{ $product->sku ?? old('sku') ?? null }}"
                                            class="form-control" placeholder="SKU" >
                                        @if ($errors->has('sku'))
                                            <div class="error">{{ $errors->first('sku') }}</div>

                                        @endif
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="brand_name">Brand Name <span class="text-danger"> * </span></label>
                                        <select class="basic" id="brand_name" name="brand_name" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Brand Name</option>                                          
                                                @foreach ($brand as $brands)                                    
                                                    <option value="{{$brands->id}}">{{$brands->brand_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="brand_size">Brand Size <span class="text-danger"> * </span></label>
                                        <select class="basic" id="brand_size" name="brand_size" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Brand Size</option>      
                                            <option value="XS">XS</option> 
                                            <option value="S">S</option> 
                                            <option value="M">M</option> 
                                            <option value="L">L</option> 
                                            <option value="XL">XL</option> 
                                            <option value="XXL">XXL</option> 
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="chart_size">Chart Size <span class="text-danger"> * </span></label>
                                        <select class="basic" id="chart_size" name="chart_size" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Chart Size</option>      
                                            <option value="XS">XS</option> 
                                            <option value="S">S</option> 
                                            <option value="M">M</option> 
                                            <option value="L">L</option> 
                                            <option value="XL">XL</option> 
                                            <option value="XXL">XXL</option> 
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="">Weight <span class="text-danger"> * </span></label>
                                        <input type="text" name="weight" value="{{ $product->weight ?? old('weight') ?? null }}"
                                            class="form-control" placeholder="Weight" >
                                        @if ($errors->has('weight'))
                                            <div class="error">{{ $errors->first('weight') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="colors">Colors <span class="text-danger"> * </span></label>
                                        <select class="basic" id="colors" name="colors" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Colors</option>      
                                            <option value="Black">Black </option> 
                                            <option value="Red">Red</option> 
                                            <option value="Yellow">Yellow</option> 
                                            <option value="White">White</option> 
                                            <option value="Blue">Blue</option> 
                                            <option value="Green">Green</option> 
                                            <option value="Yellowgreen">Yellow Green</option> 
                                            <option value="Pink">Pink</option> 
                                            <option value="Violet">Violet</option> 
                                            <option value="Lime">Lime</option> 
                                            <option value="Plum">Plum</option> 
                                            <option value="Teal">Teal</option> 
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="condition">Condition <span class="text-danger"> * </span></label>
                                        <select class="basic" id="condition" name="condition" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Condition</option>      
                                            <option value="Bad">Bad </option> 
                                            <option value="Good">Good</option> 
                                            <option value="Very Good">Very Good</option> 
                                            <option value="Excellent">Excellent</option> 
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="row">
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="shirt_add" > Shirt</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="jeans_add" > Jeans</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="skirts_add" > Skirts</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="blouse_tops_add" > Blouse Tops</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="shorts_add" > Shorts</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="pants_add" > Pants</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="hoodies_sweatshirts_add" > Hoodies Sweatshirts</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="jerseys_add" > Jerseys</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="t_shirt_add" > T Shirts</label>
                                            </div>
                                            <div class="form-group col-2">
                                                <label><input type="checkbox" id="jackets_add" > Jackets</label>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group col-6 boxhide shirt_add">
                                        <label for="shirts">Shirt</label>
                                          
                                        <select class="basic" id="shirts" name="shirts" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Shirt Name</option>                                          
                                                @foreach ($shirts as $shirt)                                    
                                                    <option value="{{$shirt->name}}">{{$shirt->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide jeans_add">
                                        <label for="">Jeans</label>
                                          
                                        <select class="basic" id="jeans" name="jeans" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Jeans Name</option>                                          
                                                @foreach ($jeans as $jean)                                    
                                                    <option value="{{$jean->name}}">{{$jean->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide skirts_add">
                                        <label for="">Skirts</label>
                                          
                                        <select class="basic" id="skirts" name="skirts" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Skirts Name</option>                                          
                                                @foreach ($skirts as $skirt)                                    
                                                    <option value="{{$skirt->name}}">{{$skirt->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide blouse_tops_add">
                                        <label for="">Blouse Tops</label>
                                          
                                        <select class="basic" id="blouse_tops" name="blouse_tops" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Blouse Tops Name</option>                                          
                                                @foreach ($blouse_tops as $blouse_top)                                    
                                                    <option value="{{$blouse_top->name}}">{{$blouse_top->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide shorts_add">
                                        <label for="">Shorts</label>
                                          
                                        <select class="basic" id="shorts" name="shorts" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Shorts Name</option>                                          
                                                @foreach ($shorts as $short)                                    
                                                    <option value="{{$short->name}}">{{$short->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide hoodies_sweatshirts_add">
                                        <label for="">Hoodies Sweatshirts</label>
                                          
                                        <select class="basic" id="hoodies_sweatshirts" name="hoodies_sweatshirts" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Hoodies Sweatshirts Name</option>                                          
                                                @foreach ($hoodies_sweatshirts as $hoodies_sweatshirt)                                    
                                                    <option value="{{$hoodies_sweatshirt->name}}">{{$hoodies_sweatshirt->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide pants_add">
                                        <label for="">Pants</label>
                                          
                                        <select class="basic" id="pants" name="pants" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Pants Name</option>                                          
                                                @foreach ($pants as $pant)                                    
                                                    <option value="{{$pant->name}}">{{$pant->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide jerseys_add">
                                        <label for="">Jerseys</label>
                                          
                                        <select class="basic" id="jerseys" name="jerseys" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Jerseys Name</option>                                          
                                                @foreach ($jerseys as $jersey)                                    
                                                    <option value="{{$jersey->name}}">{{$jersey->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide t_shirt_add">
                                        <label for="">T Shirts</label>
                                          
                                        <select class="basic" id="t_shirts" name="t_shirts" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select T Shirts Name</option>                                          
                                                @foreach ($t_shirts as $t_shirt)                                    
                                                    <option value="{{$t_shirt->name}}">{{$t_shirt->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6 boxhide jackets_add">
                                        <label for="">Jackets</label>
                                          
                                        <select class="basic" id="jackets" name="jackets" {{!$isEdit ? 'required' : null}}>
                                            <option selected disabled>Select Jackets Name</option>                                          
                                                @foreach ($jackets as $jacket)                                    
                                                    <option value="{{$jacket->name}}">{{$jacket->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Size <small>( Separate by a coma ',' )</small></label>
                                <textarea cols="200" class="form-control" name="size" placeholder="Size" {{!$isEdit ? 'required' : null}}>{{ $product->size ?? null }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Additional Information <small>( Separate by a coma ',' )</small> <span class="text-danger"> * </span></label>
                                <textarea cols="200" class="form-control" name="additional_info" placeholder="Additional Information" {{!$isEdit ? 'required' : null}}>{{ $product->additional_info ?? null }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Descriptions <span class="text-danger"> * </span></label>
                                <textarea cols="200" class="form-control" name="descriptions" placeholder="Descriptions" {{!$isEdit ? 'required' : null}}>{{ $product->descriptions ?? null }}</textarea>
                            </div>
                            
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Shipping <span class="text-danger"> * </span></label>
                                        <input type="text" name="shipping" value="{{ $product->shipping ?? old('shipping') ?? null }}"
                                            class="form-control" placeholder="Shipping" >
                                        @if ($errors->has('shipping'))
                                            <div class="error">{{ $errors->first('shipping') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Stock <span class="text-danger"> * </span></label>
                                          
                                        <select class="custom-select " id="inputGroupSelect01" name="in_stock">
                                            <option value="" class="dropdown-item" disabled selected>Select Stock</option>
                                            <option value="1" class="dropdown-item" >Yes</option>
                                            <option value="0" class="dropdown-item" >No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Size QTY <span class="text-danger"> * </span></label>
                                        <input type="text" name="size_qty" value="{{ $product->size_qty ?? old('size_qty') ?? null }}"
                                            class="form-control" placeholder="Size QTY" >
                                        @if ($errors->has('size_qty'))
                                            <div class="error">{{ $errors->first('size_qty') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Fabric <span class="text-danger"> * </span></label>
                                        <input type="text" name="fabric" value="{{ $product->fabric ?? old('fabric') ?? null }}"
                                            class="form-control" placeholder="Fabric" >
                                        @if ($errors->has('fabric'))
                                            <div class="error">{{ $errors->first('fabric') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Meta Title <span class="text-danger"> * </span></label>
                                        <input type="text" name="meta_title" 
                                            class="form-control" placeholder="Meta Title" required value="{{ $product->meta_title ?? old('meta_title') ?? null }}">
                                        @if ($errors->has('meta_title'))
                                            <div class="error">{{ $errors->first('meta_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Meta Description <span class="text-danger"> * </span></label>
                                        <input type="text" name="meta_des" 
                                            class="form-control" placeholder="Meta Description" required value="{{ $product->meta_des ?? old('meta_des') ?? null }}">
                                        @if ($errors->has('meta_des'))
                                            <div class="error">{{ $errors->first('meta_des') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Meta Keywords <span class="text-danger"> * </span></label>
                                        <input type="text" name="meta_keyword" 
                                            class="form-control" placeholder="Meta Keywords" required value="{{ $product->meta_keyword ?? old('meta_keyword') ?? null }}">
                                        @if ($errors->has('meta_keyword'))
                                            <div class="error">{{ $errors->first('meta_keyword') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Keyword <span class="text-danger"> * </span></label>
                                        <input type="text" name="keyword" 
                                            class="form-control" placeholder="keyword" required value="{{ $product->keyword ?? old('keyword') ?? null }}">
                                        @if ($errors->has('keyword'))
                                            <div class="error">{{ $errors->first('keyword') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if($isEdit)

                            <div class="col-md-12 mt30">
                                <div class="custom-file-container" data-upload-id="galleryImages">
                                    <label>Gallery Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" name="multi_images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                     @php
                                if ($product->product_images !="") {
                                $product_images = $product->product_images;
                                $img3 = explode(',', $product_images);
                                foreach($img3 as $product_images){
                                    if($product_images != '')
                                    {
                                @endphp
                                   
                                    <div class="custom-file-container__image-multi-preview" data-upload-token="c83aznuntollow3fc9m91" style="background-image: url('{{url('')}}/uploads/{{$product_images}}'); ">
                                        
                                            <span class="custom-file-container__image-multi-preview__single-image-clear ">
                                                <span class="custom-file-container__image-multi-preview__single-image-clear__icon remove" data-upload-token="c83aznuntollow3fc9m91" id="{{$product_images}}">×</span>
                                            </span>

                                    </div>
                                    @php }
                                }
                                } 
                                @endphp 
                                    
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

             $(document).on("click", ".browse1", function() {
            var file = $(this).parents().find(".file1");
            file.trigger("click");
            });
            $('.file1').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            
            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview1").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
            });

             $(document).on("click", ".browse2", function() {
            var file = $(this).parents().find(".file2");
            file.trigger("click");
            });
            $('.file2').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            
            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview2").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
            });

            var secondUpload = new FileUploadWithPreview('galleryImages');

            var num = 1;

            $(document).on('click' , '.add_more1' , function(){
                $('.addMore_btn').append(
                `<div class="row addmore_cont1 ml30">
                    
                    <input type="hidden" value="1" class="radio_counter1" />
                    
                    <div class="form-group col-md-8">
                        <input type="text" name="feature_name[]" value=""
                            class="form-control" placeholder="Feature Name...">
                        @if ($errors->has('feature_name'))
                            <div class="error">{{ $errors->first('feature_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" name="feature_value[]" value=""
                            class="form-control" placeholder="Value...">
                        @if ($errors->has('feature_value'))
                            <div class="error">{{ $errors->first('feature_value') }}</div>
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
            @if($isEdit)
            $('.remove').click(function () {
                    var image = $(this).attr('id');
                    var projectId = {{$product->id}};
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
                          .post('{{route("projectImage.destroy")}}', {
                            _method: 'delete',
                            _token: '{{csrf_token()}}',
                            image: image,
                            projectId: projectId
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
                        // location.reload(true)
                      });

                    $(this).parent().parent().remove();
                    // alert($(this).attr('id'));
                });
            @endif

            var selectedType = $('.property-type').find(":selected").val(); 
                if(selectedType == 'Villa' || selectedType == 'Townhouse' || selectedType == 'Mansion' )
                {
                    $('.areasqft').css('display', 'none')
                    $('.bultsqft').css('display', 'block')
                    $('.plotsqft').css('display', 'block')

                }
                else
                {
                    $('.areasqft').css('display', 'block')
                    $('.bultsqft').css('display', 'none')
                    $('.plotsqft').css('display', 'none')

                }

 
            $('.property-type').on('change', function(){
                var selectedType = $('.property-type').find(":selected").val(); 
                if( selectedType == 'Villa' || selectedType == 'Townhouse' || selectedType == 'Mansion' )
                {
                    $('.areasqft').css('display', 'none')
                    $('.bultsqft').css('display', 'block')
                    $('.plotsqft').css('display', 'block')

                }
                else
                {
                    $('.areasqft').css('display', 'block')
                    $('.bultsqft').css('display', 'none')
                    $('.plotsqft').css('display', 'none')

                }
            });
        });

    </script>


    <script>
  // Get the first and second dropdown elements
    var firstDropdown = document.getElementById("category");
    var secondDropdown = document.getElementById("sub_category");
    var thirdDropdown = document.getElementById("sub_category_name");

      // Add an onchange event to the first dropdown
    firstDropdown.onchange = function() {
        // Get the selected value of the first dropdown
        var selectedValue = firstDropdown.value;

        // Clear the options of the second dropdown
        secondDropdown.value = "";
        thirdDropdown.value = "";

        // Check the selected value of the first dropdown
        @foreach ($menus as $parentMenus)  
            @if($parentMenus->parent_id == 0)                                        
                if (selectedValue == {{$parentMenus->id}}) {
                  // Add new options to the second dropdown
                    secondDropdown.innerHTML = 
                    "<option selected disabled>Select Sub Category</option>" +
                        @foreach($menus as $subMenus)
                            @if ($subMenus->parent_id == $parentMenus->id)  
                                "<option value='{{$subMenus->id}}'>{{$subMenus->name}}</option>" +
                            @endif
                        @endforeach
                                "";
                } 
            @endif
        @endforeach
      };

      secondDropdown.onchange = function() {
        // Get the selected value of the first dropdown
        var selectedValue = secondDropdown.value;

        // Clear the options of the second dropdown
        thirdDropdown.value = "";

        // Check the selected value of the first dropdown
        @foreach ($menus as $subMenus)                                        
                if (selectedValue == "{{$subMenus->id}}") {
                  // Add new options to the second dropdown
                    thirdDropdown.innerHTML = 
                    "<option selected disabled>Select Sub Category Name</option>" +
                        @foreach($menus as $subMenusName)
                            @if ($subMenusName->parent_id == $subMenus->id)  
                                "<option value='{{$subMenusName->id}}'>{{$subMenusName->name}}</option>" +
                            @endif
                        @endforeach
                                "";
                } 
        @endforeach
      };
    </script>

    <script>
  function validateForm() {
    var select = document.getElementById("category");
    if (select.value == "") {
      alert("Please select an option");
      return false;
    }
  }
</script>
<script>
$(document).ready(function(){
    $('#shirt_add').click(function(){
        $(".shirt_add").toggle();
    });
    $('#jeans_add').click(function(){
        $(".jeans_add").toggle();
    });
    $('#skirts_add').click(function(){
        $(".skirts_add").toggle();
    });
    $('#blouse_tops_add').click(function(){
        $(".blouse_tops_add").toggle();
    });
    $('#shorts_add').click(function(){
        $(".shorts_add").toggle();
    });
    $('#hoodies_sweatshirts_add').click(function(){
        $(".hoodies_sweatshirts_add").toggle();
    });
    $('#pants_add').click(function(){
        $(".pants_add").toggle();
    });
    $('#jerseys_add').click(function(){
        $(".jerseys_add").toggle();
    });
    $('#t_shirt_add').click(function(){
        $(".t_shirt_add").toggle();
    });
    $('#jackets_add').click(function(){
        $(".jackets_add").toggle();
    });
});
</script>

@endsection