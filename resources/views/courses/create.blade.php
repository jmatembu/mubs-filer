@extends('layouts.default')

@section('title', 'Add Course')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Add Product Course</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('courses.index') }}">Courses</a>
      </li>
      <li class="active">
        <strong>Add</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('courses.index') }}"><i class="fa fa-arrow-left"></i> View Courses</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">

    <div class="col-sm-12 col-md-6 col-md-offset-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Course</h5>
            </div>
            <div class="ibox-content">
            
                @include('layouts.partials.errors')

                {!! Form::open(['route' => 'courses.store']) !!}
                  <p>Fill the form below to add a Course. </p>
                    <div class="form-group">
                      <label>Name</label>
                      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Course name']) !!}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Abbreviation</label>
                            {!! Form::text('name_code', null, ['class' => 'form-control', 'placeholder' => 'e.g EBWD']) !!}
                        </div>
                        <div class="col-sm-6">
                            <label>Course Code</label>
                            {!! Form::text('course_code', null, ['class' => 'form-control', 'placeholder' => 'e.g BUC3101']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Year of Study</label>
                            {!! Form::select('year_of_study', ['' => 'Select', 'One' => 'One', 'Two' => 'Two', 'Three' => 'Three'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            <label for="program_id">Program</label>
                            {!! Form::select('program_id', $programsList, null, ['class' => 'form-control', 'id' => 'program_id']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
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