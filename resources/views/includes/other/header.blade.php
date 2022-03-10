<!--header section start-->
<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1602023398/careerguild/site/Career_Guild_Logo_1_umo88i.jpg" alt="logo" class="img-fluid" style="width: 140px !important;"/>
                {{-- <h3 class="text-white"><a href="{{ route('home') }}" class="text-white"><span>Career Guild</span></a></h3> --}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu">

                    <li><a  href="{{ route('home') }}">Home</a></li>
                    <li><a  href="{{ url('/#about') }}">About Us</a></li>
                    <li><a  href="{{ url('/#details') }}">Resource</a></li>
                    <li><a  href="{{ route('teammember') }}">Team</a></li>

                    <li><a  href="{{ route('careerstater') }}">CSS5</a></li>
                    <li><a  href="{{ route('blog') }}">Blog</a></li>

                    <li><a  href="{{ url('/#contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--header section end-->
