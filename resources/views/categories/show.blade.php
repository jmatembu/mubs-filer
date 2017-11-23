@extends('admin.layouts.admin')

@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('admin.layouts.partials.messages')
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Category: {{ $category->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('categories.index') }}">Categories</a>
      </li>
      <li class="active">
        <strong>{{ $category->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('categories.index') }}"><i class="fa fa-arrow-left"></i> View Categories</a>
      <a class="btn btn-warning" href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-pencil"></i> Edit Category</a>
      <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $category->id }}" class="btn btn-danger">
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
          <h5>{{ $category->name }}</h5>
        </div>
        <div class="ibox-content">
            @if ($category->getImageUrl())
            <img src="{{ asset($category->getImageUrl()) }}" class="img-responsive img-thumbnail">
            @endif
          <div>
          {!! $category->description !!}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row animated fadeInRight">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>A list of products in this category</h5>
        </div>
        <div class="ibox-content ">
          @if ($category->products->count())
          <table class="table datatable">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Summary</th>
                <th>Brand</th>
                <th>Orders #</th>
              </tr>
            </thead>
            <tbody>
              @foreach($category->products as $product)
              <tr>
                <td>
                  <img src="{{asset(($product->getImageUrl()) ? $product->getImageUrl() : 'img/pipe-fittings.png') }}" class="img-list" /> 
                </td>
                <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                <td class="text-right">${{ $product->price }}</td>
                <td class="text-right">{{ $product->quantity }}</td>
                <td>{{ $product->brief }}</td>
                <td>
                  <a href="{{ route('brands.show', $product->brand->id) }}">{{ $product->brand->name }}</a>
                </td>
                <td>{{ $product->orders->count() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>No product present in this category</p>
          @endif
        </div>
      </div>
    </div>
  </div>
  
  <div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Specifications <small>- Showing number of products per specification.</small></h5>
              <div class="ibox-tools">
                <a href="{{ route('categories.specification', $category->id) }}"><i class="fa fa-plus"></i> Add</a>
              </div>
            </div>
            <div class="ibox-content">
              @if ($category->specifications->count())
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Specification</th>
                    <th>Products #</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($category->specifications as $specification)
                  <tr>
                    <td><a href="{{ route('specifications.show', $specification->id) }}">{{ $specification->name }}</a></td>
                    <td>{{ $specification->products->count() }}</td>
                    <td>
                      <form action="{{ route('categories.destroy-specification', $category->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="specification_id" value="{{ $specification->id }}">
                        <button type="submit" class="btn btn-danger btn-xs">
                          <i class="fa fa-trash-o"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p>No specification present for this category</p>
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