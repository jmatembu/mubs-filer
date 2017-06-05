@extends('admin.layouts.admin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Profile</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="active">
        <strong>Profile</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('password.create') }}"><i class="fa fa-lock"></i> Change Password</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">
    <div class="col-md-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Profile Detail</h5>
        </div>
        <div>
        <div class="ibox-content no-padding border-left-right">
          <img alt="image" class="img-responsive" src="img/profile_big.jpg">
        </div>
        <div class="ibox-content profile-content">
          <h4><strong>{{ Auth::user()->name }}</strong></h4>
        </div>
      </div>
    </div>
        </div>
    <div class="col-md-8">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Activites</h5>
          <div class="ibox-tools">
              <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
              </a>
              <a class="dropdown-toggle" data-toggle="dropdown" href="profile.html#">
                  <i class="fa fa-wrench"></i>
              </a>
          </div>
        </div>
        <div class="ibox-content">

          <p>User activity here</p>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection
