@extends('layouts.master')

@section('top-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
    .btn-cart::before{content:''}

    .product-details-action1 form .btn-cart, .product-details-action1 form .btn-cart {
        padding: 1rem 5rem;
        background-color: transparent;
    }

    .product-details-action2 form .btn-cart, .product-details-action2 form .btn-cart {
        padding: 1rem 5rem;
        background-color: transparent;
    }

    .product-details-action1 form .btn-cart:hover, .product-details-action1 form .btn-cart:focus {
        background-color: #00ff00;
        border-color: #00ff00;
    }

    .product-details-action2 .btn-cart:hover, .product-details-action2 .btn-cart:focus {
        background-color: #ff0000;
        border-color: #ff0000;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@endsection

@section('content')  
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Feedback</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <article class="entry single-entry">

                            <div class="entry-body">

                                <h2 class="entry-title">
                                    Leave us your Valuable Feedback & Help us to Improve!!! 
                                </h2><!-- End .entry-title -->

                                <div class="entry-content editor-content">
                                    <div class="row">
                                        <div class="col-lg-6 mb-6 mb-lg-0" style="text-align: center;">
                                            <i class="fa-solid fa-face-smile" style="font-size: 12em;width: 100%;height: 180px;line-height: 1; color: lime;"></i>
                                            <div class="product-details-action product-details-action1" style="justify-content: center;">
                                                <!-- <a href="#" class="btn-product btn-cart"><span>Liked It</span></a> -->
                                                <form action="{{ route('increment') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="disliked_value" value="1">

                                                    <button type="submit" class="btn-product btn-cart"><span>Liked It</span></button>
                                                    <!-- <button type="submit">Increment</button> -->
                                                </form>

                                            </div><!-- End .product-details-action -->
                                        </div><!-- End .col-lg-6 -->

                                        <div class="col-lg-6 mb-6 mb-lg-0" style="text-align: center;">
                                            <i class="fa-sharp fa-solid fa-face-sad-tear" style="font-size: 12em;width: 100%;height: 180px;line-height: 1; color: red;"></i>
                                            <div class="product-details-action product-details-action2" style="justify-content: center;">
                                                <!-- <a href="#" class="btn-product btn-cart"><span>Didn't Like</span></a> -->

                                                <form action="{{ route('disincrement') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="disliked_value" value="1">
                                                    <button type="submit" class="btn-product btn-cart"><span>Didn't Like</span></button>
                                                </form>
                                            </div><!-- End .product-details-action -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->

                                    
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .col-lg-12 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script> 
<script>
    var copiedLink = '';
        function copyToClipboard(element, btnElem) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            $temp.remove();
            $(btnElem).html(`<i class="fa fa-link"> </i> `);
            setTimeout(() => {
                $(btnElem).html(`<i class="far fa-clipboard"> </i> `);
            }, 2000);
        }
        $(document).ready(function() {
            copiedLink = $('#share_url').val();
            $('#shareWithTwitter').click(function () {
            window.open("https://twitter.com/intent/tweet?url=" + copiedLink);
        });
        $('#shareWithFb').click(function () {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + copiedLink, 'facebook-share-dialog', "width=626, height=436");
        });
        $('#shareWithWhatsapp').click(function () {
            var win = window.open('https://api.whatsapp.com/send?text=' + copiedLink, '_blank');
            win.focus();
        });
        $(document).on('click', '.ctoCb', function () {
            copyToClipboard($(this).parent().parent().find('input'), $(this));
        });
    });
    document.getElementById("share_url").value = window.location.href;
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
// Initialize Toastr
toastr.options = {
    closeButton: true,
    progressBar: true,
};

// Display Toastr notifications
@if(Session::has('success'))
    toastr.success('{{ Session::get("success") }}');
@endif

// Display Toastr notifications
@if(Session::has('error'))
    toastr.error('{{ Session::get("error") }}');
@endif
</script>
@endsection