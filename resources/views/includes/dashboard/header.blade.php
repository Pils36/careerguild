<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>G</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Career</b> Guild</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600995902/careerguild/blogpost/7ca25224848822ec24b3c6c8351481cd_kjzfdg.gif" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ session('name') }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600995902/careerguild/blogpost/7ca25224848822ec24b3c6c8351481cd_kjzfdg.gif" class="img-circle" alt="User Image">

                <p>
                  {{ session('name') }}
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div>
                  <a href="#" class="btn btn-danger btn-block" onclick="$('.form').submit()">Sign out</a>
                  <form action="{{ route('adminlogout') }}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="username" value="{{ session('username') }}">
                </form>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>