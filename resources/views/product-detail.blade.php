@extends('layouts.master')

@section('title'){{$product->meta_title}}@endsection
@section('description'){{$product->meta_des}}@endsection
@section('keywords'){{$product->meta_keyword}}@endsection

@section('top-styles')
@endsection

@section('content')  
<!-- Start Page Title -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>{{ $product->name }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Start Product Details Area -->
        <section class="product-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="products-details-image">
                            <ul class="products-details-image-slides">
                                @if ($product->product_images !="") 
                                    @foreach(explode(',', $product->product_images) as $image)
                                        @if($image != '')
                                            <li><img src="{{config('fashion.file_path').$image}}" alt="image"></li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>

                            <div class="slick-thumbs">
                                <ul>
                                    @if ($product->product_images !="")
                                        @foreach(explode(',', $product->product_images) as $image)
                                            @if($image != '')
                                                <li><img src="{{config('fashion.file_path').$image}}" alt="image"></li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="products-details-desc">
                            <h3> {{ $product->name }} </h3>

                            <div class="price">
                                <span class="new-price">AED {{ $product->price }}.00</span>
                            </div>

                            <ul class="products-info">
                                <li><span>SKU:</span> <b>{{ $product->sku }}</b></li>
                                <li><span>Brand:</span> <b>{{ $product->brand_name }}</b></li>
                                <li><span>Brand Size:</span> <b>{{ $product->brand_size }}</b></li>
                                <li><span>Chart Size:</span> <b>{{ $product->chart_size }}</b></li>
                                <li><span>Weight:</span> <b>{{ $product->weight }}Kg</b></li>
                                <li><span>Condition:</span> <b>{{ $product->condition }}</b></li>
                            </ul>

                            <div class="products-size-wrapper">
                                <span>Size:</span>

                                <ul>
                                    @if($product->size != '')
                                        @foreach(explode(', ', $product->size) as $size)
                                            @if($size != '')
                                                <li><a href="#">{{$size}}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                            <div class="products-info-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsShippingModal"><i class='bx bxs-truck' ></i> Shipping</a>
                                <a href="#"><i class='bx bx-envelope'></i> Ask about this products</a>
                            </div>

                            <div class="wishlist-compare-btn">
                                <a href="{{ route('size-guide') }}" class="optional-btn" target="_blank"><i class='bx bx-ruler'></i> Chart Size Guide</a>
                            </div>

                            <div class="buy-checkbox-btn">
                                <div class="item">
                                    <input class="inp-cbx" id="cbx" type="checkbox">
                                    <label class="cbx" for="cbx">
                                        <span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span>I agree with the terms and conditions</span>
                                    </label>
                                </div>

                                <div class="item">
                                    <add-to-cart-button-detail product-id="{{ $product->id }}" user-id="{{ Auth::user()->id ?? 0 }}">asdsda</add-to-cart-button-detail>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab products-details-tab">
                    <ul class="tabs">
                        <li><a href="#">
                            <div class="dot"></div> Description
                        </a></li>

                        <li><a href="#">
                            <div class="dot"></div> Condition
                        </a></li>
                        
                        <li><a href="#">
                            <div class="dot"></div> Additional Information
                        </a></li>

                        <li><a href="#">
                            <div class="dot"></div> Shipping
                        </a></li>

                        <li><a href="#">
                            <div class="dot"></div> Measurements
                        </a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tabs-item">
                            <div class="products-details-tab-content">
                                <p>{{ $product->descriptions }}</p>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li>Fabric 1: 100% {{$product->fabric}}</li>
                                            <li>Fabric 2: 100% {{$product->fabric}}, Lining: 100% {{$product->fabric}}</li>
                                            <li>Fabric 3: 75% {{$product->fabric}}, 20% Viscose, 5% Elastane</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <ol>
                                            <li>Fabric 3: 75% {{$product->fabric}}, 20% Viscose, 5% Elastane</li>
                                            <li>Fabric 2: 100% {{$product->fabric}}, Lining: 100% {{$product->fabric}}</li>
                                            <li>Fabric 1: 100% {{$product->fabric}}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tabs-item">
                            <div class="products-details-tab-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Excellent</td>
                                                <td>Previously worn, with only very slight wash wear. No flaws.</td>
                                            </tr>

                                            <tr>
                                                <td>Very Good</td>
                                                <td>Previously worn, with minor wash wear and/or fade, but no visible flaw(s).</td>
                                            </tr>

                                            <tr>
                                                <td>Good</td>
                                                <td>Previously worn, with significant wash wear and/or fade, and minor visible flaw(s). Any button or zipper is still fully functional.</td>
                                            </tr>

                                            <tr>
                                                <td>Fair</td>
                                                <td>Previously worn, with heavy wash wear and/or fade, and significant visible flaw(s).</td>
                                            </tr>

                                            <tr>
                                                <td>Poor</td>
                                                <td>Previously worn, with excessive wash wear and/or fade and/or stains. The item is not in perfect appearance. May also need some repair.</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <span>*Flaws might include spots, stains, pin holes, tear, fabric irregularities, problem with button, zippers, snaps etc.</span>
                                </div>
                            </div>
                        </div>

                        <div class="tabs-item">
                            <div class="products-details-tab-content">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Color:</td>
                                                <td>{{ $product->colors }}</td>
                                            </tr>
                                            <tr>
                                                <td>Size:</td>
                                                <td>{{ $product->size }}</td>
                                            </tr>
                                            <tr>
                                                <td>Material:</td>
                                                <td>100% {{ $product->fabric }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>Free</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tabs-item">
                            <div class="products-details-tab-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>This item {{ $product->shipping != 'yes' ? 'Does Not' : null }} Ship to USA</td>
                                            </tr>

                                            <tr>
                                                <td>Delivery</td>
                                                <td>
                                                    Estimated between Wednesday 07/31/2021 and Monday 08/05/2021 <br>
                                                    Will usually ship within 1 bussiness day.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tabs-item">
                            <div class="products-details-tab-content">
                                <div class="table-responsive">
                                	<p>*All measurements are approximate and are provided for informational purposes only.</p>
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Sleeve:</td>
                                                <td>21 cm</td>
                                                <td>8 in</td>
                                            </tr>
                                            <tr>
                                                <td>Length:</td>
                                                <td>77 cm</td>
                                                <td>30 in</td>
                                            </tr>
                                            <tr>
                                                <td>Pit to Pit:</td>
                                                <td>49 cm</td>
                                                <td>19 in</td>
                                            </tr>
                                            <tr>
                                                <td>Chest:</td>
                                                <td>98 cm</td>
                                                <td>39 in</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <p><b>Fabric</b></p>
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Cotton:</td>
                                                <td>100%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details Area -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript">
    
    // Products Details Image Slides
    $('.products-details-image-slides').slick({
        dots: true,
        speed: 500,
        fade: false,
        slide: 'li',
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: false,
        nextArrow: false,
        responsive: [{
            breakpoint: 800,
            settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                variableWidth: false,
                slidesToShow: 1,
                dots: true
            },
            breakpoint: 1200,
            settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                variableWidth: false,
                slidesToShow: 1,
                dots: true
            }
        }],
        customPaging: function (slider, i) {
            return '<button class="tab">' + $('.slick-thumbs li:nth-child(' + (i + 1) + ')').html() + '</button>';
        }
    });
</script>
@endsection