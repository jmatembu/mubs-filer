@extends('admin.layouts.admin')
@section('title', 'Register Customer')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Register Customer</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('customers.index') }}">Customers</a>
      </li>
      <li class="active">
        <strong>Register Customer</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('customers.index') }}"><i class="fa fa-arrow-left"></i> All Customers</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Register Customer</h5>
        </div>
        <div class="ibox-content">
          @include('admin.layouts.partials.errors')
          {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
            <p>Fill the form below to edit customer details.</p>
            <div class="form-group row">
              <div class="col-sm-12 col-md-6">
                <label>First Name</label>
                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First name', 'required']) !!}
              </div>
              <div class="col-sm-12 col-md-6">
                <label>Last Name</label>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last name', 'required']) !!}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 col-md-6">
                <label>Email *</label>
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'e.g you@example.org', 'required']) !!}
              </div>
              <div class="col-sm-12 col-md-6">
                <label>Phone</label>
                {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone number']) !!}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 col-md-6">
                <label>Password *</label>
                {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => '*******', 'required']) !!}
              </div>
              <div class="col-sm-12 col-md-6">
                <label>Confirm Password *</label>
                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Save Changes</button>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
