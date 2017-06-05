@extends('admin.layouts.admin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>List of Product Categories</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="active">
        <strong>Categories</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-primary" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> Create Category</a>
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
                <h5>A list of product categories</h5>
            </div>
            <div class="ibox-content ">
              @if ($categories->count())
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Brief Description</th>
                    <th>Products #</th>
                    <th>Parent Category</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td><p>{{ $category->briefDescription() }}</p></td>
                    <td>{{ $category->products->count() }}</td>
                    <td>
                      @if ($category->parent)
                      <a href="{{ route('categories.show', $category->parent->id) }}">{{ $category->parent->name}}</a>
                      @else
                      
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p>No category present</p>
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