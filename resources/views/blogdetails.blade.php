@extends('layouts.master')

@section('description') {{$meta_description}} @endsection
@section('keywords') {{$keywords}} @endsection

@section('top-styles')
@endsection

@section('content')  

    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title"><span>{{ $blog->name }}</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog->name }}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <article class="entry single-entry">
                            <figure class="entry-media">
                                <img src="{{config('fashion.file_path').$blog->image}}" alt="{{ $blog->name }}">
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by {{ $blog->by }}
                                    </span>
                                    <span class="meta-separator">|</span>
                                    {{ Carbon\Carbon::parse($blog->date)->format('F d,Y') }}
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    {{$blog->name}}
                                </h2><!-- End .entry-title -->

                                <p>{!!$blog->description!!}</p>

                                <div class="entry-footer row no-gutters flex-column flex-md-row">
                                    <div class="col-md">
                                        
                                    </div><!-- End .col -->

                                    <div class="col-md-auto mt-2 mt-md-0">
                                        <div class="social-icons social-icons-color">
                                            <span class="social-label">Share this post:</span>
                                            <input type="text" class="filter" id="share_url" placeholder="Blog Post URL" readonly style="display: none;">
                                        <a class="social-icon" id="shareWithFb" title="Facebook"><i class="icon-facebook-f"></i></a>
                                        <a class="social-icon" id="shareWithTwitter" title="Twitter"><i class="icon-twitter"></i></a>
                                        <a class="social-icon" id="shareWithWhatsapp" title="Whatsapp"><i class="icon-whatsapp"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .entry-footer row no-gutters -->
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