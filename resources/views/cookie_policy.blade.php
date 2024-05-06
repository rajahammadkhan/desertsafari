@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Cookie Policy</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cookie Policy</li>
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
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing
                                </h2><!-- End .entry-title -->

                                <div class="entry-content editor-content">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>

                                    <p><b>1. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    <p><b>2. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    <p><b>3. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    <p><b>4. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    <p><b>5. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    <p><b>6. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    <p><b>7. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>


                                    <p><b>8. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    <p><b>9. Lorem ipsum dolor sit amet</b></p>

                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>

                                    
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
@endsection