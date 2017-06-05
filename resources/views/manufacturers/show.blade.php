@extends('admin.layouts.admin')

@section('title', $manufacturer->name)

@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('admin.layouts.partials.messages')
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Manufacturer: {{ $manufacturer->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('manufacturers.index') }}">Manufacturers</a>
      </li>
      <li class="active">
        <strong>{{ $manufacturer->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('manufacturers.index') }}"><i class="fa fa-arrow-left"></i> View All</a>
      <a class="btn btn-warning" href="{{ route('manufacturers.edit', $manufacturer->id) }}"><i class="fa fa-plus"></i> Edit</a>
      <form action="{{ route('manufacturers.destroy', $manufacturer->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $manufacturer->id }}" class="btn btn-danger">
              <i class="fa fa-trash-o"></i> Delete
          </button>
      </form>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>{{ $manufacturer->name }}</h5>
            </div>
            <div class="ibox-content">
              <table class="table datatable">
                <tbody>
                <tr>
                    <td>
                        <a class="btn btn-danger m-r-sm" href="#manufacturer-brands">{{ $manufacturer->brands->count() }}</a>
                        Total Brands
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary m-r-sm">0</button>
                        Total Products
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
  </div>

  <div class="row animated fadeInRight">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>A list of product brands owned by {{ $manufacturer->name }}</h5>
        </div>
        <div class="ibox-content ">
          @if ($manufacturer->brands->count())
          <table class="table table">
            <thead>
              <tr>
                <th>Brand</th>
                <th>Products #</th>
              </tr>
            </thead>
            <tbody>
              @foreach($manufacturer->brands as $brand)
              <tr>
                <td><a href="{{ route('brands.show', $brand->id) }}">{{ $brand->name }}</a></td>
                <td>0</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>No brands associated with this manufacturer</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  @parent
  <script type="text/javascript">
    $(document).ready(function() {
      $('.datatable').dataTable();
    });
  </script>
@endsection