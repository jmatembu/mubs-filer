@extends('admin.layouts.admin')

@section('title', $brand->name)

@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('admin.layouts.partials.messages')
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Brand: {{ $brand->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('brands.index') }}">Brands</a>
      </li>
      <li class="active">
        <strong>{{ $brand->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('brands.index') }}"><i class="fa fa-arrow-left"></i> View All</a>
      <a class="btn btn-warning" href="{{ route('brands.edit', $brand->id) }}"><i class="fa fa-plus"></i> Edit</a>
      <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $brand->id }}" class="btn btn-danger">
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
              <h5>{{ $brand->name }}</h5>
            </div>
            <div class="ibox-content">
              <div class="row">
                <div class="col-xs-6">
                  <span class="btn btn-primary m-r-sm">0</span>
                  Total Products
                </div>
                <div class="col-xs-6">
                  <a class="btn btn-primary m-r-sm" href="{{ route('manufacturers.show', $brand->manufacturer->id) }}">{{ $brand->manufacturer->name }}</a>
                  Manufacturer
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>

  <div class="row animated fadeInRight">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>A list of products in this brand</h5>
        </div>
        <div class="ibox-content ">
          @if ($brand->products->count())
          <table class="table datatable">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Brief</th>
                <th>Manufacturer</th>
              </tr>
            </thead>
            <tbody>
              @foreach($brand->products as $product)
              <tr>
                <td></td>
                <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->brief }}</td>
                <td>
                  <a href="{{ route('manufacturers.show', $product->brand->manufacturer->id) }}">{{ $product->brand->manufacturer->name }}</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>No product present in this brand</p>
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