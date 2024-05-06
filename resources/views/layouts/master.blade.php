<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="user" content="{{ Auth::user()->id ?? 0 }}">

        <!-- Favicon -->
        <!-- <link rel="apple-touch-icon" sizes="180x180" href="{{url('')}}/assets/images/icons/apple-touch-icon.png"> -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('')}}/assets/img/icon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/assets/img/icon.png">


        <!-- <link rel="shortcut icon" href="{{url('')}}/assets/images/icons/favicon.ico"> -->
        <meta name="apple-mobile-web-app-title" content="Desert Safari">
        <meta name="application-name" content="Desert Safari">
        <meta name="msapplication-TileColor" content="#cc9966">

        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="{{url('')}}/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
        <!-- Plugins CSS File -->
        <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="{{url('')}}/assets/css/plugins/jquery.countdown.css">
        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{url('')}}/assets/css/style.css">
        <link rel="stylesheet" href="{{url('')}}/assets/css/skins/skin-demo-2.css">
        <link rel="stylesheet" href="{{url('')}}/assets/css/demos/demo-2.css">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
      $route = Route::getCurrentRoute()->getName();
      $currentMenu = getCurrentMenu($route);

      if($currentMenu == null){
        $explodedPath = explode('/',Request::getPathInfo());
        
      }

      if($route == 'more_info'){
        $name = 'More Information';
      }else{
        $name = 'Blogs';
      }
        $abc= ' Desert Safari'
    @endphp
    
    <title>@yield('title'){{$currentMenu->meta_title ?? $currentService->meta_title ?? $currentBlog->meta_title ?? $blog->meta_title ??  $abc ?? null}}</title>
    <meta name="description" content="@yield('description'){{$currentMenu->meta_description ?? $currentService->meta_description ?? $currentBlog->meta_description ?? null}}">
    <meta name="keywords" content="@yield('keywords'){{$currentMenu->keywords ?? $currentService->keywords ?? $currentBlog->keywords ?? null}}">

        @yield('top-styles')
    </head>
    <body>

      <div id="app">
            @section('header')
              @include('layouts/header')
            @show

              @yield('content')

            @section('footer')
              @include('layouts/footer')
            @show
      </div>
      <!-- Mobile Menu -->
        

        <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


    <!-- Plugins JS File -->
        <script src="{{url('')}}/assets/js/jquery.min.js"></script>
        <script src="{{url('')}}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('')}}/assets/js/jquery.hoverIntent.min.js"></script>
        <script src="{{url('')}}/assets/js/jquery.waypoints.min.js"></script>
        <script src="{{url('')}}/assets/js/superfish.min.js"></script>
        <script src="{{url('')}}/assets/js/owl.carousel.min.js"></script>
        <script src="{{url('')}}/assets/js/jquery.plugin.min.js"></script>
        <script src="{{url('')}}/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="{{url('')}}/assets/js/jquery.countdown.min.js"></script>
        <!-- Main JS File -->
        <script src="{{url('')}}/assets/js/main.js"></script>
        <script src="{{url('')}}/assets/js/demos/demo-2.js"></script>
        <script src="{{asset('js/app.js')}}"></script>

        <script type="text/javascript">
        $(document).ready(function () {
            var myDiv = document.getElementById('product_list');
            var searchInput = document.querySelector('input[name="product_brand_search"]');

            if (searchInput != null) {
                $(searchInput).on('keyup', function () {
                    var query = $(this).val();
                    $.ajax({
                        url: '{{ route('search') }}',
                        type: 'GET',
                        data: {
                            'product_brand_search': query
                        },
                        success: function (data) {
                            $('#product_list').html(data);
                        }
                    });
                });
            }

            $(document).on('click', 'li', function () {
                var value = document.querySelector('input[name="product_brand_search"]').text();
                $(searchInput).val(value);
                $('#product_list').html("");
            });
        });
    </script>
        @yield('bottom-mid-scripts')

        @yield('bottom-bot-scripts')
    </body>
</html>