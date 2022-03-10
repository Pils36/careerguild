

@extends('layouts.other')

@section('content')


<style>
    .disp-0{
        display: none !important;
    }
</style>

<!--body content wrap start-->
<div class="main">

    <!--header section start-->
    <section class="hero-section ptb-100 gradient-overlay"
             style="background: url('{{ asset("other/img/header-bg-5.jpg") }}')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">Career Starter Series</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                <li class="list-inline-item breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">Career Starter Series</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->

    <!--blog section start-->
    <div class="module ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    @if (count($data[0]['css5data']) > 0)

                    @foreach ($data[0]['css5data'] as $blog)

                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><a href="#"><img src="{{ $blog->image }}" alt="blog"/></a></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h2 class="post-title"><a href="/careerstaterdetail/{{ $blog->id }}">{{ $blog->subject }}</a></h2>
                                <ul class="post-meta">
                                    <li>{{ date('F d, Y', strtotime($blog->created_at)) }}</li>
                                    <li><a href="#"><i class="far fa-thumbs-up"></i> {{ $blog->likes }} Likes</a></li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <?php $string = $blog->message; $output = strlen($string) > 300 ? substr($string,0,300)."..." : $string;?>{!! $output !!}
                            </div>
                            <div class="post-more pt-4 align-items-center d-flex"><a href="/careerstaterdetail/{{ $blog->id }}" class="btn secondary-solid-btn">Continue reading <span class="ti-arrow-right"></span></a></div>
                        </div>
                    </article>
                    <!-- Post end-->

                    @endforeach

                    @else

                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><a href="#"><img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601533224/careerguild/team/work-in-progress-road-icon-vector-20883624-1000x640_pywtzu.jpg" alt="blog"/></a></div>
                        <div class="post-wrapper">
                            <br>
                            <div class="post-content">
                                <center><h3>No post here yet</h3></center>
                            </div>
                        </div>
                    </article>
                    <!-- Post end-->

                    @endif



                    <!-- Page Navigation-->
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="custom-pagination-nav">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        {{ $data[0]['css5data']->links() }}
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Navigation end-->
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="sidebar-right pl-4">

                        <!-- Search widget-->
                        <aside class="widget widget-search disp-0">
                            <form>
                                <input class="form-control" type="search" placeholder="Type Search Words">
                                <button class="search-button" type="submit"><span class="ti-search"></span></button>
                            </form>
                        </aside>

                        <!-- Recent entries widget-->
                        <aside class="widget widget-recent-entries-custom">
                            <div class="widget-title">
                                <h6>Recent Posts</h6>
                            </div>
                            <ul>
                                @if (count($data[0]['css5data']) > 0)

                                @foreach ($data[0]['css5data'] as $recent)
                                   <li class="clearfix">
                                        <div class="wi"><a href="/careerstaterdetail/{{ $recent->id }}"><img src="{{ $recent->image }}" alt="recent post" class="img-fluid rounded"/></a></div>
                                        <div class="wb"><a href="/careerstaterdetail/{{ $recent->id }}">
                                            <?php $string = $recent->message; $output = strlen($string) > 100 ? substr($string,0,100)."..." : $string;?>{!! $output !!}</a><span class="post-date">{{ date('F d, Y', strtotime($recent->created_at)) }}</span></div>
                                    </li>
                                @endforeach

                                @else

                                @endif


                            </ul>
                        </aside>

                        <!-- Subscribe widget-->
                        <aside class="widget widget-categories">
                            <div class="widget-title">
                                <h6>Newsletter</h6>
                            </div>
                            <p>Enter your email address below to subscribe to our newsletter</p>
                            <form action="{{ route('subscribe') }}" method="post"
                                  class="d-none d-md-block d-lg-block">
                                  @csrf
                                <input type="text" class="form-control input" id="email-footer" name="email"
                                       placeholder="abc@example.com" required>
                                <button type="submit" class="btn secondary-solid-btn btn-block btn-not-rounded mt-3">Subscribe</button>
                            </form>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section end-->

</div>
<!--body content wrap end-->

@endsection

