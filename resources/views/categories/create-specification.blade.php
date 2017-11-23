@extends('admin.layouts.admin')

@section('title', 'Add Specification to ' . $category->name)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Add Product Specification</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('categories.index') }}">Categories</a>
      </li>
      <li>
        <a href="{{ route('categories.show', $category->name) }}">{{ $category->name }}</a>
      </li>
      <li class="active">
        <strong>Add Specification</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('categories.show', $category->id) }}"><i class="fa fa-arrow-left"></i> Back to Category</a>
      <a class="btn btn-white" href="{{ route('specifications.index') }}"><i class="fa fa-arrow-up"></i> View Specifications</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">

    <div class="col-sm-12 col-md-6 col-md-offset-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add product specification to {{ $category->name }}</h5>
            </div>
            <div class="ibox-content">
            
                @include('admin.layouts.partials.errors')

                {!! Form::open(['route' => ['categories.store-specification', $category->id]]) !!}
                  <p>Fill the form below to add a specification to the {{ $category->name }} category. Adding specifications to a category is necessary to show the same specifications for products in the same category.</p>
                    <div class="form-group">
                      <label>Specification</label>
                      {{ Form::select('specification_id', $specificationList, null, ['placeholder' => 'Select specification', 'class' => 'form-control', 'required' => 'true']) }}
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