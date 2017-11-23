@extends('layouts.default')

@section('title', 'Courses')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>List of Courses</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="active">
        <strong>Courses</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-primary" href="{{ route('courses.create') }}"><i class="fa fa-plus"></i> Add Course</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row animated fadeInRight">
    </div>
    <div class="col-xs-12">
      @include('layouts.partials.messages')
    </div>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>A list of Courses</h5>
            </div>
            <div class="ibox-content ">
              @if ($courses->count())
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Course</th>
                    <th>Exams #</th>
                    <th>Facilitators</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($courses as $course)
                  <tr>
                    <td><a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a></td>
                    <td>{{ $course->exams->count() }}</td>
                    <td>
                        @foreach($course->facilitators as $facilitator)
                        <span>{{ $facilitator->fullName() }}</span>
                        @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p>No course present</p>
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