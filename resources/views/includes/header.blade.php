  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        {{-- <h1 class="text-light"><a href="{{ route('home') }}"><span>Career Guild</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('home') }}"><img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1602023398/careerguild/site/Career_Guild_Logo_1_umo88i.jpg" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('home') }}">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#details">Resource</a></li>
          {{-- <li><a href="#gallery">Gallery</a></li> --}}
          <li><a href="{{ route('teammember') }}">Team</a></li>
          <li><a href="{{ route('careerstater') }}">CSS5</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li class="drop-down"><a href="">Join Us</a>
            <ul>
              <li><a href="https://forms.gle/hF3uECz4nqUS3w1G9" target="_blank">Join Volunteer Team</a></li>
              <li><a href="https://forms.gle/5gihmund8EDbZt848" target="_blank">Join as a Coach</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
