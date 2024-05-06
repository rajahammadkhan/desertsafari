<style>

    .header-intro-clearance .header-bottom .container::after{
        background-color: transparent;
    }
</style>
        <div class="page-wrapper">
<header class="header header-2 header-intro-clearance">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p>24x7 Service Available </p>&nbsp;&nbsp;&nbsp;<a href="tel:{{ getSettings('contact_no') }}">{{ getSettings('contact_no') }}</a></a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">Helpline</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="tel:{{ getSettings('contact_no') }}">{{ getSettings('contact_no') }}</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <!-- <li><a href="#">My Booking</a></li> -->
                                    @guest
                                    @if (Route::has('login'))
                                        <li><a href="{{ route('login') }}">Sign in / Sign up</a></li>
                                    @endif
                                    @else         
                                        <li>
                                        <div class="header-dropdown">
                                            <a href="#">{{ Auth::user()->name }}</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="{{ route('user.edit', [Auth::user()->id]) }}">Profile</a></li>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                 Logout 
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>  
                                    @endguest                        
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{config('fashion.file_path').getSettings('site_logo_header_dark')}}" alt="{{ getSettings('site_name') }}" width="105" height="25" style="width: 50%;">
                        </a>
                    </div><!-- End .header-left -->

                    <!-- <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form class="search-form">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="product_brand_search" class="sr-only">Search</label>
                                    <input type="search" class="form-control typeahead search-field" name="product_brand_search" id="product_brand_search" placeholder="Search Package ..." autocomplete="on">
                                </div>
                                    <div id="product_list"></div>
                            </form>
                        </div>
                    </div> -->

                    <div class="header-right">
                        @guest
                        @if (Route::has('login'))
                            <div class="account">
                                <a href="{{ route('login') }}" title="My account">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <p>Account</p>
                                </a>
                            </div><!-- End .compare-dropdown -->
                        @endif
                        @else 
                            <div class="account">
                                <a href="{{ route('user.edit', [Auth::user()->id]) }}" title="My account">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <p>My Profile</p>
                                </a>
                            </div><!-- End .compare-dropdown -->
                        @endguest   

                        <div class="wishlist">
                            <a href="{{ route('wishlist') }}" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge"><wishlist-count :wishcount="itemCount"></wishlist-count></span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <!-- <a href="{{ route('cart') }}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"> -->
                            <a href="{{ route('cart') }}" class="dropdown-toggle">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">{{ count((array) session('cart')) }}</span>
                                </div>
                                <p>Cart</p>
                            </a>

                            <!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Explore by Services">
                                Explore by Services
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <form action="{{route('typeactivity.search')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="activity_type" value="Best Selling Activities - Dubai">
                                            <li class="item-lead">
                                                <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;font-size: 1.3rem;"><span>Best Selling Activities - Dubai</span></button>
                                            </li>
                                            <!-- <li class="item-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                        </form>

                                        <form action="{{route('typeactivity.search')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="activity_type" value="Adventure Tours & Activities">
                                            <li class="item-lead">
                                                <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;font-size: 1.3rem;"><span>Adventure Tours & Activities</span></button>
                                            </li>
                                            <!-- <li class="item-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                        </form>

                                        <form action="{{route('typeactivity.search')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="activity_type" value="Best Vacation Packages - UAE">
                                            <li class="item-lead">
                                                <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;font-size: 1.3rem;"><span>Best Vacation Packages - UAE</span></button>
                                            </li>
                                            <!-- <li class="item-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                        </form>

                                        <form action="{{route('typeactivity.search')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="activity_type" value="Hoiday packages">
                                            <li class="item-lead">
                                                <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;font-size: 1.3rem;"><span>Hoiday packages</span></button>
                                            </li>
                                            <!-- <li class="item-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                        </form>

                                        <form action="{{route('typeactivity.search')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="activity_type" value="Combo packages">
                                            <li class="item-lead">
                                                <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;font-size: 1.3rem;"><span>Combo packages</span></button>
                                            </li>
                                            <!-- <li class="item-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                        </form>

                                        <form action="{{route('typeactivity.search')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="activity_type" value="Tours">
                                            <li class="item-lead">
                                                <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;font-size: 1.3rem;"><span>Tours</span></button>
                                            </li>
                                            <!-- <li class="item-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                        </form>

                                        <form action="{{route('typeactivity.search')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="activity_type" value="Best Saver Combo Tours">
                                            <li class="item-lead">
                                                <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;font-size: 1.3rem;"><span>Best Saver Combo Tours</span></button>
                                            </li>
                                            <!-- <li class="item-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                        </form>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center" id="header-center_id" style="flex: auto !important; margin: 0; max-width: 100%;">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li>
                                    <a href="{{ route('product') }}" class="sf-with-ul">Latest Activities</a>

                                    <div class="megamenu megamenu-md">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="menu-title">Activity List</div><!-- End .menu-title -->
                                                            <ul>
                                                                @foreach(getCurrentActivity() as $activity)
                                                                    <li><a href="{{route('get_activity',$activity->slug)}}">{{$activity->name}}</a></li>
                                                                @endforeach
                                                                <!-- <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li> -->
                                                            </ul>
                                                        </div><!-- End .col-md-12 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->

                                            <div class="col-md-4">
                                                <div class="banner banner-overlay">
                                                    <a href="{{ route('product') }}" class="banner banner-menu">
                                                        <img src="{{url('')}}/assets/img/town/town2.webp" alt="Banner">

                                                        <div class="banner-content banner-content-top">
                                                            <div class="banner-title text-white"><span><strong>Dubai</strong></span></div><!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner banner-overlay -->
                                            </div><!-- End .col-md-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-md -->
                                </li>
                                <li>
                                    <a href="{{ route('visa') }}" class="sf-with-ul">Visa</a>

                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="menu-col">
                                                    <div class="menu-title">UAE Visa</div><!-- End .menu-title -->
                                                    <ul>
                                                        @foreach(getCurrentVisa() as $visa)
                                                            <li><a href="{{route('get_visa',$visa->slug)}}">{{$visa->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-6 -->

                                            <div class="col-md-6">
                                                <div class="banner banner-overlay">
                                                    <a href="#">
                                                        <img src="{{url('')}}/assets/img/visa1.webp" alt="Banner">

                                                        <div class="banner-content banner-content-bottom">
                                                            <div class="banner-title text-white">New Visa<br><span><strong>Apply 2023</strong></span></div><!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner -->
                                            </div><!-- End .col-md-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-sm -->
                                </li>
                                <li>
                                    <a href="{{ route('packages') }}" class="sf-with-li">Packages</a>
                                </li>
                                <li>
                                    <a href="{{ route('tours') }}" class="sf-with-li">Tours</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}" class="sf-with-li">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}" class="sf-with-li">Blogs</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}" class="sf-with-li">Contact Us</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->



    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
        <div class="mobile-menu-container mobile-menu-light">
            <div class="mobile-menu-wrapper">
                <span class="mobile-menu-close"><i class="icon-close"></i></span>
                
                <!-- <form action="#" method="get" class="mobile-search">
                    <label for="mobile-search" class="sr-only">Search</label>
                    <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search Package ..." required>
                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                </form> -->

                <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Services</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                        <nav class="mobile-nav">
                            <ul class="mobile-menu">
                                <li class="active">
                                    <a href="{{ route('product') }}">Latest Activities</a>

                                    <ul>
                                        @foreach(getCurrentActivity() as $activity)
                                            <li><a href="{{route('get_activity',$activity->slug)}}">{{$activity->name}}</a></li>
                                        @endforeach
                                    </ul>   
                                </li>

                                <li class="active">
                                    <a href="javascript:void(0)">Visa</a>

                                    <ul>
                                        @foreach(getCurrentVisa() as $visa)
                                            <li><a href="{{route('get_visa',$visa->slug)}}">{{$visa->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('packages') }}" class="sf-with-li">Packages</a>
                                </li>
                                <li>
                                    <a href="{{ route('tours') }}" class="sf-with-li">Tours</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}" class="sf-with-li">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}" class="sf-with-li">Blogs</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}" class="sf-with-li">Contact Us</a>
                                </li>
                            </ul>
                        </nav><!-- End .mobile-nav -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                        <nav class="mobile-cats-nav">
                            <ul class="mobile-cats-menu">
                                <form action="{{route('typeactivity.search')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity_type" value="Best Selling Activities - Dubai">
                                    <li class="mobile-cats-lead">
                                        <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;"><span>Best Selling Activities - Dubai</span></button>
                                    </li>
                                    <hr style="margin: 0;">
                                    <!-- <li class="mobile-cats-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                </form>

                                <form action="{{route('typeactivity.search')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity_type" value="Adventure Tours & Activities">
                                    <li class="mobile-cats-lead">
                                        <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;"><span>Adventure Tours & Activities</span></button>
                                    </li>
                                    <hr style="margin: 0;">
                                    <!-- <li class="mobile-cats-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                </form>

                                <form action="{{route('typeactivity.search')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity_type" value="Best Vacation Packages - UAE">
                                    <li class="mobile-cats-lead">
                                        <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;"><span>Best Vacation Packages - UAE</span></button>
                                    </li>
                                    <hr style="margin: 0;">
                                    <!-- <li class="mobile-cats-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                </form>

                                <form action="{{route('typeactivity.search')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity_type" value="Hoiday packages">
                                    <li class="mobile-cats-lead">
                                        <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;"><span>Hoiday packages</span></button>
                                    </li>
                                    <hr style="margin: 0;">
                                    <!-- <li class="mobile-cats-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                </form>

                                <form action="{{route('typeactivity.search')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity_type" value="Combo packages">
                                    <li class="mobile-cats-lead">
                                        <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;"><span>Combo packages</span></button>
                                    </li>
                                    <hr style="margin: 0;">
                                    <!-- <li class="mobile-cats-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                </form>

                                <form action="{{route('typeactivity.search')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity_type" value="Tours">
                                    <li class="mobile-cats-lead">
                                        <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;"><span>Tours</span></button>
                                    </li>
                                    <hr style="margin: 0;">
                                    <!-- <li class="mobile-cats-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                </form>

                                <form action="{{route('typeactivity.search')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="activity_type" value="Best Saver Combo Tours">
                                    <li class="mobile-cats-lead">
                                        <button type="submit" style="background: none;border: none;padding: 1rem 4.5rem 1rem 2rem;"><span>Best Saver Combo Tours</span></button>
                                    </li>
                                    <hr style="margin: 0;">
                                    <!-- <li class="mobile-cats-lead"><a type="submit">Best Selling Activities - Dubai</a></li> -->
                                </form>
                            </ul><!-- End .mobile-cats-menu -->
                        </nav><!-- End .mobile-cats-nav -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->

                <div class="social-icons">
                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                </div><!-- End .social-icons -->
            </div><!-- End .mobile-menu-wrapper -->
        </div><!-- End .mobile-menu-container -->