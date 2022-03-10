@extends('layouts.other')

@section('content')
    


<!--body content wrap start-->
<div class="main">

    <!--header section start-->
    <section class="hero-section ptb-100 gradient-overlay"
             style="background: url('{{ asset("other/img/header-bg-5.jpg") }}')no-repeat top center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">Our Great Team</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                <li class="list-inline-item breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">Our Great Team</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->

    <!--team two section start-->
    <section class="team-two-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="section-heading text-center mb-4">
                        <h2>Meet Our Great Team</h2>
                        <p class="lead">Distinctively grow go forward manufactured products and optimal networks. Enthusiastically
                            disseminate user-centric outsourcing through.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @if (count($data[0]['teamdata']) > 0)
                    @foreach ($data[0]['teamdata'] as $data)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="staff-member my-lg-3 my-md-3 my-sm-0">
                                <div class="card gray-light-bg text-center border-0">
                                    <img src="{{ $data->image }}" alt="team image" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="teacher mb-0">{{ $data->name }}</h5>
                                        <span>{{ $data->position }}</span>
                                        <ul class="list-inline pt-2 social">

                                            @if ($data->facebook != "")
                                                <li class="list-inline-item"><a href="{{ $data->facebook }}" target="_blank"><span
                                                    class="ti-facebook"></span></a></li>
                                            @endif

                                            @if ($data->twitter != "")
                                                <li class="list-inline-item"><a href="{{ $data->twitter }}" target="_blank"><span
                                                    class="ti-twitter"></span></a></li>
                                            @endif

                                            @if ($data->instagram != "")
                                                <li class="list-inline-item"><a href="{{ $data->instagram }}" target="_blank"><span
                                                    class="ti-instagram"></span></a></li>
                                            @endif

                                            @if ($data->youtube != "")
                                                <li class="list-inline-item"><a href="{{ $data->youtube }}" target="_blank"><span
                                                    class="ti-youtube"></span></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <div class="overlay-inner">
                                        <p class="teacher-quote">{!! $data->fav_quote !!} </p><a
                                            href="#" class="teacher-name">
                                        <h5 class="mb-0 teacher text-white">{{ $data->name }}</h5></a>
                                        <span class="teacher-field text-white">{{ $data->position }}</span>
                                        <ul class="list-inline py-4 social">

                                            @if ($data->facebook != "")
                                                <li class="list-inline-item"><a href="{{ $data->facebook }}" target="_blank"><span
                                                    class="ti-facebook"></span></a></li>
                                            @endif

                                            @if ($data->twitter != "")
                                                <li class="list-inline-item"><a href="{{ $data->twitter }}" target="_blank"><span
                                                    class="ti-twitter"></span></a></li>
                                            @endif

                                            @if ($data->instagram != "")
                                                <li class="list-inline-item"><a href="{{ $data->instagram }}" target="_blank"><span
                                                    class="ti-instagram"></span></a></li>
                                            @endif

                                            @if ($data->youtube != "")
                                                <li class="list-inline-item"><a href="{{ $data->youtube }}" target="_blank"><span
                                                    class="ti-youtube"></span></a></li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="staff-member my-lg-3 my-md-3 my-sm-0">
                                <div class="card gray-light-bg text-center border-0">
                                    <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601533224/careerguild/team/work-in-progress-road-icon-vector-20883624-1000x640_pywtzu.jpg" alt="team image" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="teacher mb-0">Team post available soon</h5>
                                        <span>&nbsp;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                @endif

                
                
                
                
            </div>
        </div>
    </section>
    <!--team two section end-->






</div>
<!--body content wrap end-->

@endsection