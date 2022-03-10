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
                        <h1 class="text-white mb-0">{{ $data[0]['blogdetails'][0]->subject }}</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                <li class="list-inline-item breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">Blog Detail</a></li>
                                <li class="list-inline-item breadcrumb-item active">{{ $data[0]['blogdetails'][0]->subject }}</li>
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
                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><img src="{{ $data[0]['blogdetails'][0]->image }}" alt="article" class="img-fluid"/></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h1 class="post-title">{{ $data[0]['blogdetails'][0]->subject }}</h1>
                                <ul class="post-meta">
                                    <li>{{ date('F d, Y', strtotime($data[0]['blogdetails'][0]->created_at)) }}</li>
                                    <li><a href="#"><i class="fas fa-comments"></i> {{ count($data[0]['blogcomment']) }} Comments</a></li>
                                    <li><a href="#"><i class="far fa-thumbs-up"></i> <b id="likey{{ $data[0]['blogdetails'][0]->id }}">{{ $data[0]['blogdetails'][0]->likes }}</b> Likes</a></li>
                                </ul>
                            </div>
                            <div class="post-content">
                                {!! $data[0]['blogdetails'][0]->message !!}
                            </div>
                            <div class="post-footer">
                                <div class="post-tags"><a style="cursor: pointer;" type="button" class="btn btn-primary" onclick="likeBlog('{{ $data[0]['blogdetails'][0]->id }}')"><i class="far fa-thumbs-up"></i> Like</a><a style="cursor: pointer;" type="button" class="btn btn-secondary" onclick="socialShare('eventshare', 'blog', '{{ $data[0]['blogdetails'][0]->subject }}', '{{ $data[0]['blogdetails'][0]->id }}')"><i class="fas fa-share"></i> Share</a></div>
                            </div>
                        </div>
                    </article>
                    <!-- Post end-->

                    <!-- Comments area-->
                    <div class="comments-area mb-5">
                        <h5 class="comments-title">{{ count($data[0]['blogcomment']) }} Comments</h5>
                        <div class="comment-list" @if(count($data[0]['blogcomment']) > 0) style="height: 500px; overflow-y: auto;" @else style="" @endif>

                            @if (count($data[0]['blogcomment']) > 0)

                                @foreach ($data[0]['blogcomment'] as $comments)

                                <div class="comment">
                                    <div class="comment-author"><img class="avatar img-fluid rounded-circle" src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601509170/careerguild/team/undraw_profile_pic_ic5t_ygfmbw.png" alt="comment"/></div>
                                    <div class="comment-body">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author"><a href="#">{{ $comments->name }}</a></div>
                                            <div class="comment-meta-date"><a href="#">{{ date('F d, Y', strtotime($comments->created_at)).' at '.date('h:i a', strtotime($comments->created_at)) }}</a></div>
                                        </div>
                                        <div class="comment-content">
                                            {!! $comments->message !!}
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <!-- Comment-->

                            @else

                            <div class="comment">
                                    <div class="comment-author"><img class="avatar img-fluid rounded-circle" src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601509170/careerguild/team/undraw_profile_pic_ic5t_ygfmbw.png" alt="comment"/></div>
                                    <div class="comment-body">
                                        <div class="comment-content">
                                            <p>Be the first to comment below</p>
                                        </div>
                                    </div>
                                </div>

                            @endif





                        </div>
                        <div class="comment-respond">
                            <h5 class="comment-reply-title">Leave a Reply</h5>
                            <p class="comment-notes">Your email address will not be published. Required fields are marked</p>

                            <form class="comment-form row" action="{{ route('blogcomment') }}" method="POST">
                                @csrf
                                <div class="form-group col-md-6">
                                    <input class="form-control" type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input class="form-control" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" rows="8" name="message" placeholder="Comment" required></textarea>
                                </div>
                                <div class="form-submit col-md-12">
                                    <input type="hidden" name="blog_id" value="{{ $data[0]['blogdetails'][0]->id }}">
                                    <button class="btn secondary-solid-btn" type="submit">Post Comment</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- Comments area end-->
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
                                @if (count($data[0]['recentblog']) > 0)

                                @foreach ($data[0]['recentblog'] as $recent)
                                   <li class="clearfix">
                                        <div class="wi"><a href="/blogdetail/{{ $recent->id }}"><img src="{{ $recent->image }}" alt="recent post" class="img-fluid rounded"/></a></div>
                                        <div class="wb"><a href="/blogdetail/{{ $recent->id }}">
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
