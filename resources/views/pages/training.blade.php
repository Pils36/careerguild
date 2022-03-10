

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
                        <h1 class="text-white mb-0">Trainings</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                <li class="list-inline-item breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">Trainings</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->

    <!--blog section start-->
    <section class="our-blog-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-heading mb-5">
                        <h2>Upcoming Programs</h2>
                        <p class="lead">
                            Enthusiastically drive revolutionary opportunities before emerging leadership. Phosfluorescently cultivate emerging alignments time methods of empowerment.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">

                @if (count($data) > 0)

                    @foreach ($data as $training)

                        <div class="col-md-6 col-lg-4">
                            <div class="single-blog-card card border-0 shadow-sm">
                                <div class="blog-img">
                                    <a href="#"><span class="category position-absolute">Career</span></a>
                                    <a href="#"><img src="{{ $training->image_url }}" class="card-img-top position-relative img-fluid" alt="blog"></a>
                                </div>
                                <div class="card-body">
                                    <h3 class="h5 mb-2 card-title"><a href="#">{{ $training->event_name }}</a></h3>
                                    <p class="card-text">{!! $training->event_description !!}</p>
                                </div>
                                <div class="card-footer border-0 d-flex align-items-center justify-content-between">
                                    <div class="author-meta d-flex align-items-center">
                                        <span class="fa fa-user mr-2 p-3 bg-white rounded-circle border"></span>
                                        <div class="author-content">
                                            <a href="#" class="d-block">Date & Time</a>
                                            <small style="font-weight: bold;">{{ date('M d, Y', strtotime($training->event_start_date)) }} - {{ date('M d, Y', strtotime($training->event_end_date)) }}</small> <br>
                                            <small style="font-weight: bold;">{{ $training->event_start_time }} - {{ $training->event_end_time }}</small>
                                        </div>
                                    </div>
                                    <div class="author-like">
                                        {{-- <a href="#"><span class="fa fa-share-alt"></span></a> --}}
                                        <a href="{{ $training->event_url }}" target="_blank" class="btn btn-primary">Attend</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                    
                @else
                    <div class="col-md-12 col-lg-12">
                    <div class="single-blog-card card border-0 shadow-sm">
                        <div class="blog-img">
                            <a href="#"><span class="category position-absolute">No Training</span></a>
                            <a href="#"><img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601533224/careerguild/team/work-in-progress-road-icon-vector-20883624-1000x640_pywtzu.jpg" class="card-img-top position-relative img-fluid" alt="blog"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 mb-2 card-title"><a href="#">No training available at the moment</a></h3>
                        </div>
                    </div>
                </div>
                @endif
                
                
            </div>


            <!--pagination start-->
            <div class="row">
                <div class="col-md-12">
                    <nav class="custom-pagination-nav mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                {{ $data->links() }}
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--pagination end-->

        </div>
    </section>
    <!--blog section end-->

</div>
<!--body content wrap end-->

@endsection