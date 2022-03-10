<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600995902/careerguild/blogpost/7ca25224848822ec24b3c6c8351481cd_kjzfdg.gif" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ session('name') }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('admin') }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="{{ route('home') }}"><i class="fa fa-circle-o"></i> Home</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-wikipedia-w"></i>
            <span> Blog Section</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('blogpost') }}"><i class="fa fa-circle-o"></i> Create Blog</a></li>
            <li><a href="{{ route('blogview') }}"><i class="fa fa-circle-o"></i> View Blog Posts</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-wikipedia-w"></i>
            <span> CSS5 Section</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('css5post') }}"><i class="fa fa-circle-o"></i> Create CSS5</a></li>
            <li><a href="{{ route('css5view') }}"><i class="fa fa-circle-o"></i> View CSS5 Posts</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('createevent') }}"><i class="fa fa-circle-o"></i> Create Event</a></li>
            <li><a href="{{ route('viewevent') }}"><i class="fa fa-circle-o"></i> View Events</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Team</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('createteam') }}"><i class="fa fa-circle-o"></i> Create Team</a></li>
            <li><a href="{{ route('allteam') }}"><i class="fa fa-circle-o"></i> View Team</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bell"></i> <span>Subscribers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('subscriber') }}"><i class="fa fa-circle-o"></i> All Subscribers</a></li>
            <li><a href="{{ route('messagesubscriber') }}"><i class="fa fa-circle-o"></i> Create Message</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Account Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="$('#change_pass').click()"><i class="fa fa-circle-o"></i> Change Password</a></li>
            <li><a href="{{ route('lockscreen') }}"><i class="fa fa-circle-o"></i> Lock Screen</a></li>
            <li>

                <a href="#" onclick="$('.form').submit()"><i class="fa fa-circle-o"></i> Logout</a>

                <form action="{{ route('adminlogout') }}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="username" value="{{ session('username') }}">
                </form>
            </li>
          </ul>
        </li>





      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
