@extends('layouts.default')

@section('title', $program->name)

@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('layouts.partials.messages')
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Program: {{ $program->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('faculties.show', $program->department->faculty->id) }}">{{ $program->department->faculty->name }}</a>
      </li>
      <li>
        <a href="{{ route('departments.show', $program->department->id) }}">{{ $program->department->name }}</a>
      </li>
      <li class="active">
        <strong>{{ $program->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('faculties.show', $program->department->faculty->id) }}"><i class="fa fa-arrow-left"></i> Back to Faculty</a>
      <a class="btn btn-white" href="{{ route('departments.show', $program->department->id) }}"><i class="fa fa-arrow-left"></i> Back to Department</a>
      <!-- <a class="btn btn-warning" href="{{ route('faculties.edit', $program->id) }}"><i class="fa fa-plus"></i> Edit</a>
      <form action="{{ route('faculties.destroy', $program->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $program->id }}" class="btn btn-danger">
              <i class="fa fa-trash-o"></i> Delete
          </button>
      </form> -->
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <!-- <div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>{{ $program->name }}</h5>
            </div>
        </div>
    </div>
  </div> -->

  <div class="row animated fadeInRight">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Courses in {{ $program->name }}</h5>
        </div>
        <div class="ibox-content ">
          @if ($program->courses->count())
          <table class="table">
            <thead>
              <tr>
                <th>Code</th>
                <th>Title</th>
                <th>Abbr</th>
                <th>Year</th>
              </tr>
            </thead>
            <tbody>
              @foreach($program->courses as $course)
              <tr>
                <td><a href="{{ route('courses.show', $course->id) }}">{{ $course->course_code }}</a></td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->name_code }}</td>
                <td>{{ $course->year_of_study }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>No courses associated with this program</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection