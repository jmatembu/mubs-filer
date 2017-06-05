<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="side-menu">
      <li class="nav-header">
        <div class="dropdown profile-element">
          <span>
            <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
           </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> {{ Auth::user()->name }}</strong>
          </span> <span class="text-muted text-xs block">User role here<b class="caret"></b></span> </span> </a>
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
        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
      </li>
      <li>
        <a href="#"><i class="fa fa-barcode"></i> <span class="nav-label">Product Management</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li><a href="#"><i class="fa fa-barcode"></i> Products</a></li>
          <li><a href="#"><i class="fa fa-briefcase"></i> Categories</a></li>
          <li><a href="#"><i class="fa fa-wrench"></i> Specifications</a></li>
          <li><a href="#"><i class="fa fa-wrench"></i> Manufacturers</a></li>
          <li><a href="#"><i class="fa fa-wrench"></i> Brands</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>