@extends('layouts.master')

@section('title')@if(request()->segment(2)) {{ ucfirst(request()->segment(2)) }} {{ ucfirst(request()->segment(3)) }} | @endif @endsection

@section('top-styles')
    <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <style type="text/css">
        .product-price #amount{
            font-size: 2.3rem;
            font-weight: 900;
        }

        .product-price #amount_code{
            font-size: 1.3rem;
            font-weight: 600;
            color: #e97b12;
        }
        .product-price{
            gap: 5px;
            justify-content: end;

        }
        .product-content{
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    </style>
@endsection

@section('content') 
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Desert Safari 4x4<span>Visa</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visa</li>
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
                                    Showing <span>{{$visas_count}}</span> Visa
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            @foreach($visas as $visa)
                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href="{{route('get_visa',$visa->slug)}}">
                                                    <img src="{{config('fashion.file_path').$visa->featured_image}}" alt="{{$visa->name}}" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-2 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                     <span id="amount">{{number_format($visa->price)}}.00</span> 
                                                     <span id="amount_code"> AED</span>
                                                </div><!-- End .product-price -->

                                                <a href="{{route('get_visa',$visa->slug)}}" class="btn-product btn-cart" style="border-color: #001433;"><span>add to cart</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-7">
                                            <div class="product-body product-action-inner">
                                                <add-to-wishlist-button product-id="{{ $visa->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                                <div class="product-cat">
                                                    <a href="javascript::void()">Visa</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{route('get_visa',$visa->slug)}}">{{$visa->name}}</a></h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p>{!! $visa->description !!}</p>
                                                </div><!-- End .product-content -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .products -->
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