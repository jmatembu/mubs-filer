@extends('layouts.minimal')

@section('content')
<hr>
<h3>Sign into your Account</h3>
<form class="m-t" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
   
    <button type="submit" class="btn btn-info block full-width m-b">Login</button>
    <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
    <hr>
    <p class="text-muted text-center"><small>Do not have an account?</small></p>
    <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
</form>
                
@endsection
