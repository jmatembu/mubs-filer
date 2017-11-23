@extends('layouts.default')

@section('title', $faculty->name)

@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('layouts.partials.messages')
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Faculty: {{ $faculty->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('faculties.index') }}">Faculties</a>
      </li>
      <li class="active">
        <strong>{{ $faculty->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('faculties.index') }}"><i class="fa fa-arrow-left"></i> View All</a>
      <!-- <a class="btn btn-warning" href="{{ route('faculties.edit', $faculty->id) }}"><i class="fa fa-plus"></i> Edit</a>
      <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $faculty->id }}" class="btn btn-danger">
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
              <h5>{{ $faculty->name }}</h5>
            </div>
        </div>
    </div>
  </div> -->

  <div class="row animated fadeInRight">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Departments in {{ $faculty->name }}</h5>
        </div>
        <div class="ibox-content ">
          @if ($faculty->departments->count())
          <table class="table">
            <thead>
              <tr>
                <th>Department</th>
                <th>Programs #</th>
              </tr>
            </thead>
            <tbody>
              @foreach($faculty->departments as $department)
              <tr>
                <td><a href="{{ route('departments.show', $department->id) }}">{{ $department->name }}</a></td>
                <td>{{ $department->programs->count() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>No departments associated with this faculty</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection