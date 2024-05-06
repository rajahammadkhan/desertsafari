@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Blogs</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        @foreach($blogs as $blog)
                            <article class="entry">
                                <figure class="entry-media">
                                    <a href="{{route('blog.post',$blog->slug)}}">
                                        <img src="{{config('fashion.file_path').$blog->image}}" alt="{{ $blog->name }}">
                                    </a>
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
                                        <a href="{{route('blog.post',$blog->slug)}}">{{ $blog->name }}</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-content">
                                        <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, uctus metus libero eu augue.</p>
                                        <a href="{{route('blog.post',$blog->slug)}}" class="read-more">Continue Reading</a>
                                    </div><!-- End .entry-content -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                        @endforeach


                        <!-- <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        <div class="sidebar">

                            <div class="widget">
                                <h3 class="widget-title">Latest Blogs</h3><!-- End .widget-title -->

                                <ul class="posts-list">
                                    @foreach($recent_blogs as $recent_blog)
                                    <li>
                                        <figure>
                                            <a href="{{route('blog.post',$recent_blog->slug)}}">
                                                <img src="{{config('fashion.file_path').$recent_blog->image}}" alt="{{ $recent_blog->name }}">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>{{ Carbon\Carbon::parse($recent_blog->date)->format('F d,Y') }}</span>
                                            <h4><a href="{{route('blog.post',$recent_blog->slug)}}">{{ $recent_blog->name }}</a></h4>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul><!-- End .posts-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
@endsection