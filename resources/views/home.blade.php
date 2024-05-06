@extends('layouts.master')

@section('top-styles')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
<style type="text/css">
    .ts-control{
        border: 0px solid #d0d0d0;
        padding: 0px !important;
    }
    .ts-dropdown-content{
        max-height: 150px;
    }
    #product-img{
        height: 200px;
    }
    @media (max-width: 800px) {
        #mobile-view{
            width: 100%;
            margin: 8px 0;
        }

        .mobile-view-btn{
            width: 100%;
            background-color: #001433 !important;
            border-color: #001433 !important;
        }

        #mobile-view-btn{
            width: 100%;
        }

        #product-img{
            height: 130px;
        }

        .ts-dropdown-content{
            max-height: 130px;
        }

        .heading.heading-center{
            text-align: left;
        }
        .title-lg{
            font-size: 2.0rem;
        }
    }

    @media (min-device-width: 1250px) and (max-device-width: 1500px) {
    
    }

    @media (min-device-width: 1501px) and (max-device-width: 2400px) {
    
    }
/* Style the countdown container */
    .countdown-container {
      text-align: center;
    }

    /* Style the countdown digits */
    .countdown-digit {
        display: inline;
        font-size: 28px;
        font-weight: 600;
        padding: 5px 15px;
        background-color: #001433;
        color: #fff;
        border-radius: 5px;
        margin: 5px;
    }
  </style>
@endsection

@section('content')  
        <main class="main">
            <div class="intro-slider-container">
                <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
                    <div class="intro-slide" style="background-image: url({{url('')}}/assets/img/banner1.jpg);">
                        <div class="container intro-content">
                            <h1 class="intro-title">Find Activity <br>And Book Now.</h1><!-- End .intro-title -->
                            <form action="{{route('activity.search')}}" method="post">
                            @csrf
                                <div class="input-group">
                                    <!-- <input type="date" class="form-control" placeholder="Select Date" aria-label="Select Date" aria-describedby="newsletter-btn" required> -->
                                    <select id="select-state" placeholder="Search Services..." class="form-control" name="service">
                                        <option value="">Select a state...</option>
                                        
                                        @foreach($services as $service)
                                            <option value="{{$service->name}}">{{$service->name}} <b style="color:red !important">({{$service->activity_type}})</b></option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="date" class="form-control" placeholder="Select Date" aria-label="Select Date" name="date" id="mobile-view"> -->
                                    <div class="input-group-append" id="mobile-view-btn">
                                        <button class="btn btn-primary mobile-view-btn" type="submit" id="newsletter-btn" style="height: 40px;"><span>Search Now</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .owl-carousel owl-simple -->

                <span class="slider-loader text-white"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->
            
            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Best Selling Activities - Dubai</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "480": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "768": {
                                        "items":3,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "992": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach($activites as $activity)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('get_activity',$activity->slug)}}">
                                            <img src="{{config('fashion.file_path').$activity->featured_image}}" alt="{{$activity->name}}" id="product-img" class="product-image">
                                            <img src="{{config('fashion.file_path').$activity->featured_image}}" alt="{{$activity->name}}" id="product-img" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <add-to-wishlist-button product-id="{{ $activity->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('get_activity',$activity->slug)}}">{{$activity->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{number_format($activity->price)}}.00 AED
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="{{route('get_activity',$activity->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                        <div class="more-container text-center">
                            <form action="{{route('typeactivity.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="activity_type" value="Best Selling Activities - Dubai">
                                <button class="btn btn-outline-darker btn-more" type="submit" id="newsletter-btn" style="height: 40px;"><span>View More</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div><!-- End .more-container -->
                    </div><!-- .End .tab-pane -->                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->
            
            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Adventure Tours & Activities</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "480": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "768": {
                                        "items":3,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "992": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach($activites_adventures as $activites_adventure)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('get_activity',$activites_adventure->slug)}}">
                                            <img src="{{config('fashion.file_path').$activites_adventure->featured_image}}" alt="{{$activites_adventure->name}}" id="product-img" class="product-image">
                                            <img src="{{config('fashion.file_path').$activites_adventure->featured_image}}" alt="{{$activites_adventure->name}}" id="product-img" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <add-to-wishlist-button product-id="{{ $activites_adventure->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('get_activity',$activites_adventure->slug)}}">{{$activites_adventure->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{number_format($activites_adventure->price)}}.00 AED
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="{{route('get_activity',$activites_adventure->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                        <div class="more-container text-center">
                            <form action="{{route('typeactivity.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="activity_type" value="Adventure Tours & Activities">
                                <button class="btn btn-outline-darker btn-more" type="submit" id="newsletter-btn" style="height: 40px;"><span>View More</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div><!-- End .more-container -->
                    </div><!-- .End .tab-pane -->                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb-5 -->

            <div class="bg-light deal-container pt-5 pb-3 mb-5">
                <div class="container">
                    <div class="row">
                        @foreach($activites_one as $activite_one)
                            <div class="col-lg-12">
                                <div class="deal">
                                    <div class="deal-content">
                                        <h4>Limited Quantities</h4>
                                        <h2>Deal of the</h2>

                                        <h3 class="product-title"><a href="{{route('get_activity',$activite_one->slug)}}">{{$activite_one->name}}</a></h3><!-- End .product-title -->

                                        <div class="product-price">
                                            <span class="new-price">AED {{number_format($activite_one->price)}}.00</span>
                                            <span class="old-price">Was AED {{number_format($activite_one->price + 20)}}.00</span>
                                        </div><!-- End .product-price -->

                                        <!-- <div class="deal-countdown" data-until="+10h"></div> -->

                                        <div class="countdown-container">
                                            <div class="countdown-digit" id="days">00</div>
                                            <div class="countdown-digit" id="hours">00</div>
                                            <div class="countdown-digit" id="minutes">00</div>
                                            <div class="countdown-digit" id="seconds">00</div>
                                        </div>

                                        <a href="{{route('get_activity',$activite_one->slug)}}" class="btn btn-primary mt-2">
                                            <span>Shop Now</span><i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .deal-content -->
                                    <div class="deal-image">
                                        <a href="{{route('get_activity',$activite_one->slug)}}">
                                            <img src="{{config('fashion.file_path').$activite_one->featured_image}}" alt="{{$activite_one->name}}">
                                        </a>
                                    </div><!-- End .deal-image -->
                                </div><!-- End .deal -->
                            </div><!-- End .col-lg-12 -->
                        @endforeach

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-light -->
            
            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Best Vacation Packages - UAE</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "480": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "768": {
                                        "items":3,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "992": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach($activites_packages as $activites_package)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('get_activity',$activites_package->slug)}}">
                                            <img src="{{config('fashion.file_path').$activites_package->featured_image}}" alt="{{$activites_package->name}}" id="product-img" class="product-image">
                                            <img src="{{config('fashion.file_path').$activites_package->featured_image}}" alt="{{$activites_package->name}}" id="product-img" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <add-to-wishlist-button product-id="{{ $activites_package->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('get_activity',$activites_package->slug)}}">{{$activites_package->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{number_format($activites_package->price)}}.00 AED
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="{{route('get_activity',$activites_package->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                        <div class="more-container text-center">
                            <form action="{{route('typeactivity.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="activity_type" value="Best Vacation Packages - UAE">
                                <button class="btn btn-outline-darker btn-more" type="submit" id="newsletter-btn" style="height: 40px;"><span>View More</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div><!-- End .more-container -->
                    </div><!-- .End .tab-pane -->                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Hoiday packages</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "480": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "768": {
                                        "items":3,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "992": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach($activites_holidays as $activites_holiday)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('get_activity',$activites_holiday->slug)}}">
                                            <img src="{{config('fashion.file_path').$activites_holiday->featured_image}}" alt="{{$activites_holiday->name}}" id="product-img" class="product-image">
                                            <img src="{{config('fashion.file_path').$activites_holiday->featured_image}}" alt="{{$activites_holiday->name}}" id="product-img" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <add-to-wishlist-button product-id="{{ $activites_holiday->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('get_activity',$activites_holiday->slug)}}">{{$activites_holiday->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{number_format($activites_holiday->price)}}.00 AED
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="{{route('get_activity',$activites_holiday->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                        <div class="more-container text-center">
                            <form action="{{route('typeactivity.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="activity_type" value="Hoiday packages">
                                <button class="btn btn-outline-darker btn-more" type="submit" id="newsletter-btn" style="height: 40px;"><span>View More</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div><!-- End .more-container -->
                    </div><!-- .End .tab-pane -->                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Combo packages</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "480": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "768": {
                                        "items":3,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "992": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach($activites_combos as $activites_combo)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('get_activity',$activites_combo->slug)}}">
                                            <img src="{{config('fashion.file_path').$activites_combo->featured_image}}" alt="{{$activites_combo->name}}" id="product-img" class="product-image">
                                            <img src="{{config('fashion.file_path').$activites_combo->featured_image}}" alt="{{$activites_combo->name}}" id="product-img" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <add-to-wishlist-button product-id="{{ $activites_combo->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('get_activity',$activites_combo->slug)}}">{{$activites_combo->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{number_format($activites_combo->price)}}.00 AED
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="{{route('get_activity',$activites_combo->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                        <div class="more-container text-center">
                            <form action="{{route('typeactivity.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="activity_type" value="Combo package">
                                <button class="btn btn-outline-darker btn-more" type="submit" id="newsletter-btn" style="height: 40px;"><span>View More</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div><!-- End .more-container -->
                    </div><!-- .End .tab-pane -->                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="bg-light banner-group pt-5 pb-5" >
            <div class="container">
                <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="products-featured-link" >Top Adventure Towns</a>
                    </li>
                </ul>
            </div><!-- End .container -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            <div class="banner banner-large banner-overlay banner-overlay-light">
                                <img src="{{url('')}}/assets/img/town/town1.webp" alt="Banner">

                                <div class="banner-content banner-content-top" style="background: rgba(255,255,255,0.7); padding: 20px;border-radius: 10px;">
                                    <h4 class="banner-subtitle">{{ $activites_count_abu_dhabi->count() }} Activities</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title">Abu Dhabi</h3><!-- End .banner-title -->
                                    <form action="{{route('activity.search')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="state" value="Abu Dhabi">
                                        <div class="input-group">
                                            <div class="input-group-append" id="mobile-view-btn">
                                                <button class="btn btn-outline-gray banner-link" type="submit" id="newsletter-btn" style="height: 40px;"><span>View All Activities</span><i class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- .End .input-group -->
                                    </form>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-5 -->

                        <div class="col-md-6 col-lg-3">
                            <div class="banner banner-overlay">
                                <img src="{{url('')}}/assets/img/town/town2.webp" alt="Banner">

                                <div class="banner-content banner-content-bottom" style="background: rgba(0,0,0,0.4); padding: 20px;border-radius: 10px;">
                                    <h4 class="banner-subtitle text-grey">{{ $activites_count_dubai->count() }} Activities</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white">Dubai</h3><!-- End .banner-title -->
                                    <form action="{{route('activity.search')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="state" value="Dubai">
                                        <div class="input-group">
                                            <div class="input-group-append" id="mobile-view-btn">
                                                <button class="btn btn-outline-white banner-link" type="submit" id="newsletter-btn" style="height: 40px;"><span>View All Activities</span><i class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- .End .input-group -->
                                    </form>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay">
                                <img src="{{url('')}}/assets/img/town/town3.webp" alt="Banner">

                                <div class="banner-content banner-content-top" style="background: rgba(0,0,0,0.4); padding: 20px;border-radius: 10px;">
                                    <h4 class="banner-subtitle text-grey">{{ $activites_count_ajman->count() }} Activities</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white">Ajman</h3><!-- End .banner-title -->
                                    <form action="{{route('activity.search')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="state" value="Ajman">
                                        <div class="input-group">
                                            <div class="input-group-append" id="mobile-view-btn">
                                                <button class="btn btn-outline-white banner-link" type="submit" id="newsletter-btn" style="height: 40px;"><span>View All Activities</span><i class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- .End .input-group -->
                                    </form>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->

                            <div class="banner banner-overlay banner-overlay-light">
                                <img src="{{url('')}}/assets/img/town/town4.webp" alt="Banner">

                                <div class="banner-content banner-content-top" style="background: rgba(255,255,255,0.7); padding: 20px;border-radius: 10px;">
                                    <h4 class="banner-subtitle">{{ $activites_count_sharjah->count() }} Activities</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title">Sharjah</h3><!-- End .banner-title -->
                                    <form action="{{route('activity.search')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="state" value="Sharjah">
                                        <div class="input-group">
                                            <div class="input-group-append" id="mobile-view-btn">
                                                <button class="btn btn-outline-gray banner-link" type="submit" id="newsletter-btn" style="height: 40px;"><span>View All Activities</span><i class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- .End .input-group -->
                                    </form>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .banner-group -->
            
            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Tours</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "480": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "768": {
                                        "items":3,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "992": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach($activites_tours as $activites_tour)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('get_activity',$activites_tour->slug)}}">
                                            <img src="{{config('fashion.file_path').$activites_tour->featured_image}}" alt="{{$activites_tour->name}}" id="product-img" class="product-image">
                                            <img src="{{config('fashion.file_path').$activites_tour->featured_image}}" alt="{{$activites_tour->name}}" id="product-img" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <add-to-wishlist-button product-id="{{ $activites_tour->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('get_activity',$activites_tour->slug)}}">{{$activites_tour->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{number_format($activites_tour->price)}}.00 AED
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="{{route('get_activity',$activites_tour->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                        <div class="more-container text-center">
                            <form action="{{route('typeactivity.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="activity_type" value="Tours">
                                <button class="btn btn-outline-darker btn-more" type="submit" id="newsletter-btn" style="height: 40px;"><span>View More</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div><!-- End .more-container -->
                    </div><!-- .End .tab-pane -->                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Best Saver Combo Tours</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "480": {
                                        "items":2,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "768": {
                                        "items":3,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "992": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach($activites_combo_tours as $activites_combo_tour)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('get_activity',$activites_combo_tour->slug)}}">
                                            <img src="{{config('fashion.file_path').$activites_combo_tour->featured_image}}" alt="{{$activites_combo_tour->name}}" id="product-img" class="product-image">
                                            <img src="{{config('fashion.file_path').$activites_combo_tour->featured_image}}" alt="{{$activites_combo_tour->name}}" id="product-img" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <add-to-wishlist-button product-id="{{ $activites_combo_tour->id }}" :user-id="{{ Auth::user()->id ?? 0 }}"></add-to-wishlist-button>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{route('get_activity',$activites_combo_tour->slug)}}">{{$activites_combo_tour->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{number_format($activites_combo_tour->price)}}.00 AED
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="{{route('get_activity',$activites_combo_tour->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                        <div class="more-container text-center">
                            <form action="{{route('typeactivity.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="activity_type" value="Best Saver Combo Tours">
                                <button class="btn btn-outline-darker btn-more" type="submit" id="newsletter-btn" style="height: 40px;"><span>View More</span><i class="icon-long-arrow-right"></i></button>
                            </form>
                        </div><!-- End .more-container -->
                    </div><!-- .End .tab-pane -->                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->
        </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>
<script>
   new TomSelect("#select-state",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
  </script>

 <script>
  // Set the date we're counting down to
  var countDownDate = new Date("Aug 14, 2023 00:00:00").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get today's date and time
    var now = new Date().getTime();
      
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
      
    // Time calculations for days, hours, minutes, and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
    // Output the result in the element with class "countdown-container"
    var countdownElement = document.querySelector('.countdown-container');
    if (distance > 0) {
      // Update the countdown elements with the corresponding IDs
      document.getElementById('days').innerHTML = days+"<span style='font-size: 11px'> Days</span>";
      document.getElementById('hours').innerHTML = hours+"<span style='font-size: 11px'> Hours</span>";
      document.getElementById('minutes').innerHTML = minutes+"<span style='font-size: 11px'> Minutes</span>";
      document.getElementById('seconds').innerHTML = seconds+"<span style='font-size: 11px'> Seconds</span>";
    } else {
      countdownElement.innerHTML = "EXPIRED";
    }
      
    // If the count down is over, clear the interval
    if (distance < 0) {
      clearInterval(x);
    }
  }, 1000);
</script>
@endsection