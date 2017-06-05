@extends('admin.layouts.admin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Edit {{ $category->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('categories.index') }}">Categories</a>
      </li>
      <li class="active">
        <strong>Edit {{ $category->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('categories.show', $category->id) }}"><i class="fa fa-arrow-left"></i> Back to Category</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>You are editing the <strong>{{ $category->name }}</strong> category</h5>
        </div>
        <div class="ibox-content">
        
          @include('admin.layouts.partials.errors')

          {!! Form::model($category, ['route' => ['categories.update', $category->id], 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
            <p>Fill the form below to create a category. Categories are necessary to categorize products.</p>
            <div class="form-group">
              <label>Parent Category</label>
              {{ Form::select('category_id', $categoryList, null, ['placeholder' => 'Select parent category', 'class' => 'form-control']) }}
              <span class="help-block m-b-none">The category you create will be a sub-category of the category you select above.</span>
            </div>
            <div class="form-group">
              <label>Name</label>
              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category name']) !!}
            </div>
            <div class="form-group">
              <label>Description</label>
              {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Describe the category', 'rows' => '10']) !!}
            </div>
            <div class="form-group">
              <label>Category Image</label>
              {!! Form::file('category_image', ['class' => 'form-control', 'accept' => 'image/png, image/jpeg']) !!}
              <span class="help-block m-b-none">You can only upload images in <code>.png</code> or <code>.jpeg</code> format</span>
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

@section('scripts')
@parent
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: "#ckeditor",
      theme: "modern",
      plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern imagetools"
      ],
      toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      toolbar2: "print preview media | forecolor backcolor emoticons",
      image_advtab: true
  });
</script>
@endsection