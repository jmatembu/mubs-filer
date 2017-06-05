@extends('admin.layouts.admin')

@section('title', 'Manufacturers')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>List of Product Manufacturers</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="active">
        <strong>Manufacturers</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-primary" href="{{ route('manufacturers.create') }}"><i class="fa fa-plus"></i> Add Manufacturer</a>
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
                <h5>A list of product manufacturers</h5>
            </div>
            <div class="ibox-content ">
              @if ($manufacturers->count())
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Manufacturer</th>
                    <th>Brands #</th>
                    <th>Products #</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($manufacturers as $manufacturer)
                  <tr>
                    <td><a href="{{ route('manufacturers.show', $manufacturer->id) }}">{{ $manufacturer->name }}</a></td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p>No manufacturer present</p>
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