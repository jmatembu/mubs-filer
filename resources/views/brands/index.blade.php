@extends('admin.layouts.admin')

@section('title', 'Brands')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>List of Product Brands</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="active">
        <strong>Brands</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-primary" href="{{ route('brands.create') }}"><i class="fa fa-plus"></i> Add Brand</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">
    </div>
    <div class="col-xs-12">
      @include('admin.layouts.partials.messages')
    </div>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>A list of product brands</h5>
            </div>
            <div class="ibox-content ">
              @if ($brands->count())
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Brand</th>
                    <th>Products #</th>
                    <th>Manufacturer</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($brands as $brand)
                  <tr>
                    <td><a href="{{ route('brands.show', $brand->id) }}">{{ $brand->name }}</a></td>
                    <td>{{ $brand->products->count() }}</td>
                    <td>{{ $brand->manufacturer->name }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p>No brand present</p>
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