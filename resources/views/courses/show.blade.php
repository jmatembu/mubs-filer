@extends('layouts.default')

@section('title', $course->name)

@section('styles')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bs-datepicker/build/css/bootstrap-datetimepicker.css') }}">
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('layouts.partials.messages')
    @include('layouts.partials.errors')
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-xs-12 col-sm-6 col-md-7">
    <h2>Course: {{ $course->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('faculties.show', $course->program->department->faculty->id) }}">{{ $course->program->department->faculty->name }}</a>
      </li>
      <li>
        <a href="{{ route('departments.show', $course->program->department->id) }}">{{ $course->program->department->name }}</a>
      </li>
      <li>
        <a href="{{ route('programs.show', $course->program->id) }}">{{ $course->program->name }}</a>
      </li>
      <li class="active">
        <strong>{{ $course->name }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('programs.show', $course->program->id) }}"><i class="fa fa-arrow-left"></i> Back to Program</a>
      <!-- <a class="btn btn-warning" href="{{ route('faculties.edit', $course->id) }}"><i class="fa fa-plus"></i> Edit</a>
      <form action="{{ route('faculties.destroy', $course->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $course->id }}" class="btn btn-danger">
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
              <h5>{{ $course->name }}</h5>
            </div>
        </div>
    </div>
  </div> -->

  <div class="row animated fadeInRight">
    <div class="col-md-7">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Exams scheduled for {{ $course->name }}</h5>
        </div>
        <div class="ibox-content">
          <div class="text-right">
            <button type="button" class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#addExam"><i class="fa fa-plus"></i> Add Exam</button>
          </div>
          <div class="hr-line-dashed"></div>
          @if ($course->exams->count())
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Exam</th>
                  <th>A/Y</th>
                  <th>Sem</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($course->exams as $exam)
                <tr>
                  <td><a href="{{ route('exams.show', $exam->id) }}">{{ $exam->exam_type }}</a></td>
                  <td>{{ $exam->academic_year }}</td>
                  <td>{{ $exam->semester }}</td>
                  <td>{{ $exam->exam_schedule }}</td>
                  <td>{{ $exam->status }}</td>
                  <td>
                    <button type="button" class="btn btn-outline btn-primary btn-xs"><i class="fa fa-check"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <p>No examinations associated with this course</p>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Facilitators assigned to {{ $course->name }}</h5>
        </div>
        <div class="ibox-content">
          <div class="text-right">
            <button type="button" class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#assignFacilitator"><i class="fa fa-plus"></i> Assign Facilitator</button>
          </div>
          <div class="hr-line-dashed"></div>
          @if ($course->facilitators->count())
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Facilitator</th>
                  <th>A/Y</th>
                  <th>Sem</th>
                  <th>Team Leader</th>
                </tr>
              </thead>
              <tbody>
                @foreach($course->facilitators as $facilitator)
                <tr>
                  <td><a href="{{ route('users.show', $facilitator->id) }}">{{ $facilitator->first_name . ' ' . $facilitator->last_name }}</a></td>
                  <td>{{ $facilitator->pivot->academic_year }}</td>
                  <td>{{ $facilitator->pivot->semester }}</td>
                  <td>{{ $facilitator->pivot->team_leader }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <p>No facilitators associated with this course</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="assignFacilitator" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content animated bounceInRight">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="fa fa-user modal-icon"></i>
              <h4 class="modal-title">Assign Facilitator</h4>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('facilitators.store', $course->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                  <div class="col-md-8">
                    <label>Facilitator</label>
                    {{ Form::select('user_id', $facilitatorList, null, ['class' => 'form-control', 'placeholder' => 'Select facilitator']) }}
                  </div>
                  <div class="col-md-4">
                    <label>Is Team Leader?</label>
                    {{ Form::select('team_leader', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control', 'id' => 'team-leader']) }}
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Academic Year</label>
                    {{ Form::select('academic_year', $academicYearList, null, ['class' => 'form-control']) }}
                  </div>
                  <div class="col-md-6">
                    <label>Semester</label>
                    {{ Form::select('semester', ['1' => '1', '2' => '2'], null, ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="text-right">
                  <div class="hr-line-dashed"></div>
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> <button class="btn btn-success" type="submit" id="form-cancel-order"><i class="fa fa-check"></i> Save Changes</button>
                </div>
              </form>                
          </div>
      </div>
  </div>
</div>
<div class="modal inmodal" id="addExam" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content animated bounceInRight">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="fa fa-file-o modal-icon"></i>
              <h4 class="modal-title">Add Scheduled Exam</h4>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('courses.exams.store', $course->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Exam Type</label>
                    {{ Form::select('exam_type', ['cw1' => 'Coursework One', 'cw2' => 'Coursework Two', 'final' => 'Final Examination'], null, ['class' => 'form-control', 'placeholder' => 'Select exam type']) }}
                  </div>
                  <div class="col-md-6">
                    <label>Date and Time</label>
                    <div class='input-group date' id='exam_schedule'>
                      {{ Form::text('exam_schedule', null, ['class' => 'form-control']) }}
                      <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                      </span>
                  </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-8">
                    <label>Academic Year</label>
                    {{ Form::select('academic_year', $academicYearList, null, ['class' => 'form-control']) }}
                  </div>
                  <div class="col-md-4">
                    <label>Semester</label>
                    {{ Form::select('semester', ['1' => '1', '2' => '2'], null, ['class' => 'form-control']) }}
                  </div>
                </div>
                
                
                <div class="text-right">
                  <div class="hr-line-dashed"></div>
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> <button class="btn btn-success" type="submit" id="form-cancel-order"><i class="fa fa-check"></i> Save Changes</button>
                </div>
              </form>                
          </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('../node_modules/moment/moment.js') }}"></script>
  <script src="{{ asset('vendor/bs-datepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script type="text/javascript">
    $(function () {
        $('#exam_schedule').datetimepicker();
    });
  </script>
@stop