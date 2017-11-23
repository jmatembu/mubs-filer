@extends('admin.layouts.admin')

@section('title', $manufacturer->name)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Edit {{ $manufacturer->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('manufacturers.index') }}">Manufacturers</a>
      </li>
      <li class="active">
        <strong>Edit {{ $manufacturer->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('manufacturers.index') }}"><i class="fa fa-arrow-left"></i> View Manufacturers</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>You are editing the <strong>{{ $manufacturer->name }}</strong> manufacturer</h5>
        </div>
        <div class="ibox-content">
        
          @include('admin.layouts.partials.errors')

          {!! Form::model($manufacturer, ['route' => ['manufacturers.update', $manufacturer->id], 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
            <p>Use the form below to edit details of the manufacturer. Manufacturers are necessary to categorize products according to who manufactured them.</p>
            <div class="form-group">
              <label>Name</label>
              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Manufacturer name']) !!}
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
