@extends('admin.layouts.admin')

@section('title', 'Add Manufacturer')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Add Product Manufacturer</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('manufacturers.index') }}">Manufacturers</a>
      </li>
      <li class="active">
        <strong>Add</strong>
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
                <h5>Add product manufacturer</h5>
            </div>
            <div class="ibox-content">
            
                @include('admin.layouts.partials.errors')

                {!! Form::open(['route' => 'manufacturers.store']) !!}
                  <p>Fill the form below to add a manufacturer. Manufacturers are necessary to categorize products according to who manufactured them.</p>
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