@extends('layouts.default')

@section('title', $exam->exam_type)

@section('styles')
  @parent
  {!! Charts::styles() !!}
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
    <h2>{{ $exam->exam_type }} for {{ $exam->course->name }}</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('courses.show', $exam->course->id) }}">{{ $exam->course->name }}</a>
      </li>
      <li class="active">
        <strong>{{ $exam->exam_type }}</strong>
      </li>
    </ol>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="title-action">
      <a class="btn btn-white" href="{{ route('courses.show', $exam->course->id) }}"><i class="fa fa-arrow-left"></i> Back to Course</a>
      <!-- <a class="btn btn-warning" href="{{ route('faculties.edit', $exam->id) }}"><i class="fa fa-plus"></i> Edit</a>
      <form action="{{ route('faculties.destroy', $exam->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" id="delete-task-{{ $exam->id }}" class="btn btn-danger">
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
              <h5>{{ $exam->name }}</h5>
            </div>
        </div>
    </div>
  </div> -->

  <div class="row animated fadeInRight">
    <div class="col-md-8">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>{{ $exam->exam_type }} Files</h5>
          <div class="pull-right">
            <button type="button" class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#addExamFile"><i class="fa fa-upload"></i> Upload File</button>
          </div>
        </div>
        <div class="ibox-content">
          @if($exam->getMedia()->count())
          <div class="table-responsive">
            <table class="table table-striped table-collapsed">
              <thead>
                <tr>
                  <th>File Category</th>
                  <th>Filename</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($exam->getMedia() as $media)
                <tr>
                  <td>{{ $media->custom_properties['file_category'] }}</td>
                  <td>
                    {{ Form::open(['route' => 'exams.media.download', 'class' => 'form__inline']) }}
                      <input type="hidden" name="file_path" value="{{ $media->getPath() }}">
                      <button type="submit" class="btn btn-link btn-xs text-info">{{ $media->file_name . ' - (' . $media->human_readable_size }}) <i class="fa fa-download"></i></button>
                    {{ Form::close() }}
                  </td>
                  <td>{{ $media->custom_properties['status'] }}</td>
                  <td>
                    {{ Form::open(['route' => ['exams.media.remove', $exam->id, $media->id], 'class' => 'form__inline']) }}
                      <button type="submit" class="btn btn-outline btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                    {{ Form::close() }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <div class="hr-line-dashed"></div>
          <p>No files have been added for this exam.</p>
          @endif     
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Marking Info</h5>
          <div class="pull-right">
            <button type="button" class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#addMarkingInfo"><i class="fa fa-plus"></i> Add Info</button>
          </div>
        </div>
        <div class="ibox-content">
          @if ($exam->markers->count())
          <div class="table-responsive">
            <table class="table table-striped table-collapsed">
              <thead>
                <tr>
                  <th>Facilitator's Name</th>
                  <th class="text-right">No. of Scripts</th>
                </tr>
              </thead>
              <tbody>
                @foreach($exam->markers as $facilitator)
                <tr>
                  <td><a href="{{ route('users.show', $facilitator->id) }}">{{ $facilitator->first_name . ' ' . $facilitator->last_name }}</a></td>
                  <td class="text-right">{{ $facilitator->pivot->quantity }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <div class="hr-line-dashed"></div>
          <p>No facilitators associated with this exam</p>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="row animated fadeInRight">
    <div class="col-md-8">
      {!! $chart->html() !!}
    </div>
  </div>
</div>

<div class="modal inmodal" id="addMarkingInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content animated bounceInRight">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="fa fa-user modal-icon"></i>
              <h4 class="modal-title">Add Marking Information</h4>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('markers.store', $exam->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                  <div class="col-md-8">
                    <label>Facilitator</label>
                    {{ Form::select('user_id', $facilitatorList, null, ['class' => 'form-control', 'placeholder' => 'Select facilitator']) }}
                  </div>
                  <div class="col-md-4">
                    <label>Scripts Marked</label>
                    {{ Form::number('quantity', null, ['class' => 'form-control']) }}
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
<div class="modal inmodal" id="addExamFile" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content animated bounceInRight">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="fa fa-file-o modal-icon"></i>
              <h4 class="modal-title">Upload Exam File</h4>
              <p>For: {{ $exam->course->name }}</p>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('exams.media.upload', $exam->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>File Category</label>
                    {{ Form::select('file_category', $fileCategoryList, null, ['class' => 'form-control', 'placeholder' => 'Select file category', 'required']) }}
                  </div>
                  <div class="col-md-6">
                    <label>Select file</label>
                    {{ Form::file('exam_file', null, ['class', 'form-control', 'required', 'accept' => '.xls, .xlsx, .doc, .docx']) }}
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

  {!! Charts::scripts() !!}
  {!! $chart->script() !!}
@endsection