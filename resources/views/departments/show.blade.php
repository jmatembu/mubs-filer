@extends('layouts.default')

@section('title', $department->name)

@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('layouts.partials.messages')
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Department: {{ $department->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('faculties.show', $department->faculty->id) }}">Faculty</a>
      </li>
      <li class="active">
        <strong>{{ $department->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('faculties.show', $department->faculty->id) }}"><i class="fa fa-arrow-left"></i> Back to Faculty</a>
      <!-- <a class="btn btn-warning" href="{{ route('faculties.edit', $department->id) }}"><i class="fa fa-plus"></i> Edit</a>
      <form action="{{ route('faculties.destroy', $department->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $department->id }}" class="btn btn-danger">
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
              <h5>{{ $department->name }}</h5>
            </div>
        </div>
    </div>
  </div> -->

  <div class="row animated fadeInRight">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Programs in {{ $department->name }}</h5>
        </div>
        <div class="ibox-content ">
          @if ($department->programs->count())
          <table class="table">
            <thead>
              <tr>
                <th>Program</th>
                <th>Courses #</th>
              </tr>
            </thead>
            <tbody>
              @foreach($department->programs as $program)
              <tr>
                <td><a href="{{ route('programs.show', $program->id) }}">{{ $program->name }}</a></td>
                <td>{{ $program->courses->count() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>No programs associated with this department</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection