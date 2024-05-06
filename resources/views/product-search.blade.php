@extends('layouts.master')

@section('title')@if(request()->segment(2)) {{ ucfirst(request()->segment(2)) }} {{ ucfirst(request()->segment(3)) }} | @endif @endsection

@section('top-styles')
    <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
@endsection

@section('content') 
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Desert Safari 4x4<span>Activities</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Activities</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span>{{$activites_count}}</span> Activities
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @foreach($activites as $activity)
                                    <div class="col-6 col-md-3 col-lg-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href="{{route('get_activity',$activity->slug)}}">
                                                    <img src="{{config('fashion.file_path').$activity->featured_image}}" alt="{{$activity->name}}"  style="height: 200px;" class="product-image">
                                                    <img src="{{config('fashion.file_path').$activity->featured_image}}" alt="{{$activity->name}}"  style="height: 200px;" class="product-image-hover">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <add-to-wishlist-button product-id="{{ $activity->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                                </div><!-- End .product-action-vertical -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{route('get_activity',$activity->slug)}}">{{$activity->name}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    AED {{number_format($activity->price)}}.00
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->
                                @endforeach

                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        <!-- <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item-total">of 6</li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                    </div><!-- End .col-lg-9 -->

                    
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
    <script src="{{url('')}}/assets/js/wNumb.js"></script>
    <script src="{{url('')}}/assets/js/bootstrap-input-spinner.js"></script>
    <script src="{{url('')}}/assets/js/nouislider.min.js"></script>

<script type="text/javascript">
    var mq = window.matchMedia("(max-width: 768px)");

function screenTest(mq) {
  if (mq.matches) {
    document.getElementById("my-element").classList.add("sidebar-shop");
    document.getElementById("my-element").classList.add("sidebar-filter");
    document.getElementById("filterz").style.visibility = "visible";
  } else {
    document.getElementById("my-element").classList.remove("sidebar-shop");
    document.getElementById("my-element").classList.remove("sidebar-filter");
    document.getElementById("filterz").style.visibility = "collapse";
  }
}

mq.addListener(screenTest);
screenTest(mq);
</script>
@endsection