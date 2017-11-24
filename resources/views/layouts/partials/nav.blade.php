<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="side-menu">
      <li class="nav-header">
        <div class="dropdown profile-element">
          <span>
            <i class="fa fa-user fa-3x"></i>
           </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> {{ Auth::user()->name }}</strong>
          </span> <span class="text-muted text-xs block">{{ Auth::user()->first_name }}<b class="caret"></b></span> </span> </a>
          <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="#">Profile</a></li>
            <li class="divider"></li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
          </ul>
        </div>
        <div class="logo-element">
          <img src="{{ asset('img/logo.png') }}">
        </div>
      </li>
      <li>
        <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
      </li>
      <li>
        <a href="#"><i class="fa fa-building"></i> <span class="nav-label">Administration</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li><a href="{{ route('faculties.index') }}"><i class="fa fa-building"></i> Faculties</a></li>
          <li><a href="{{ route('departments.show', Auth::user()->department_id) }}"><i class="fa fa-building"></i> Departments</a></li>
          <li><a href="{{ route('programs.index') }}"><i class="fa fa-book"></i> Programs</a></li>
          <li><a href="{{ route('courses.index') }}"><i class="fa fa-book"></i> Courses</a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-file-o"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li><a href="#"><i class="fa fa-file-o"></i> Marking</a></li>
          <li><a href="#"><i class="fa fa-file-o"></i> Academic Files</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>