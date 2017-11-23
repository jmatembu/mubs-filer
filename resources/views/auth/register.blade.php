@extends('layouts.minimal')

@section('content')
<div class="row">
    <div class="col-md-offset-4 col-md-4 text-center">
        <hr>
        <h3>Register for an Account</h3>
        @include('layouts.partials.errors')
        <hr>
        <form class="m-t text-left" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group row">
                <div class="col-md-6{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name" class="control-label">First Name</label>
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name" class="control-label">Last Name</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('first_name') }}" required>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label for="gender" class="control-label">Gender</label>
                    {!! Form::select('gender', [
                            'Female' => 'Female',
                            'Male' => 'Male'
                        ],
                        null, ['class' => 'form-control', 'id' => 'gender', 'placeholder' => 'Select gender']) !!}
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6{{ $errors->has('position') ? ' has-error' : '' }}">
                    <label for="position" class="control-label">Position</label>
                    {!! Form::select('position', [
                            'Professor' => 'Professor',
                            'Associate Professor' => 'Associate Professor',
                            'Senior Lecturer' => 'Senior Lecturer',
                            'Lecturer' => 'Lecturer',
                            'Assistant Lecturer' => 'Assistant Lecturer',
                            'Teaching Assistant' => 'Teaching Assistant'
                        ],
                        null, ['class' => 'form-control', 'id' => 'position', 'placeholder' => 'Select Position', 'required']) !!}
                    @if ($errors->has('position'))
                        <span class="help-block">
                            <strong>{{ $errors->first('position') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                <label for="department_id" class="control-label">Department <small>- The one you belong to.</small></label>
                {!! Form::select('department_id', [
                        '1' => 'Business Computing'
                    ],
                    null, ['class' => 'form-control', 'id' => 'department_id', 'placeholder' => 'Select Department', 'required']) !!}
                @if ($errors->has('department_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('department_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row">
                <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="password-confirm" class="control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
            <hr>
            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>
        </form>
    </div>
</div>
@endsection
