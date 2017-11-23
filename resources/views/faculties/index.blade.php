@extends('layouts.default')

@section('title', 'Faculties')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>List of Faculties</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="active">
        <strong>Faculties</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-primary" href="{{ route('faculties.create') }}"><i class="fa fa-plus"></i> Add Faculty</a>
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
                <h5>A list of faculties</h5>
            </div>
            <div class="ibox-content ">
              @if ($faculties->count())
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Faculty</th>
                    <th>Departments #</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($faculties as $faculty)
                  <tr>
                    <td><a href="{{ route('faculties.show', $faculty->id) }}">{{ $faculty->name }}</a></td>
                    <td>{{ $faculty->departments->count() }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p>No faculty present</p>
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