@extends('layouts.master')

@section('top-styles')
<style type="text/css">
    .default-btn {
      display: inline-block;
      border: 1px solid #66bf01;
      padding: 10px 30px;
      -webkit-transition: 0.5s;
      transition: 0.5s;
      text-transform: uppercase;
      background-color: #66bf01;
      color: #ffffff;
      font-size: 14px;
      font-weight: 600;
    }

    .default-btn:hover {
      background-color: transparent;
      color: #000000;
      border-color: #000000;
    }

    .default-btn-active {
      display: inline-block;
      border: 1px solid #000000;
      padding: 10px 30px;
      -webkit-transition: 0.5s;
      transition: 0.5s;
      text-transform: uppercase;
      background-color: transparent;
      color: #000000;
      font-size: 14px;
      font-weight: 600;
    }

    .default-btn-active:hover {
      background-color: #66bf01;
      color: #ffffff;
      border-color: 1px solid #66bf01 !important;
    }
</style>
@endsection

@section('content')  

        <main class="main">
            <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Wishlist<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <wishlist-detail :wishlist="wishlist" link="{{ route('get_activity', ['slug' => 'arg']) }}"></wishlist-detail>
                    <!-- End .table table-wishlist -->
                    
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
@endsection