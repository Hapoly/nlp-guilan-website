@extends('layouts.app')
@section('title')
  Login
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-sm-10 offset-md-2 offset-sm-1">
    <div class="row">
      <div class="col-12">
        <h2>Login to account</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="row">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                    <div class="invalid-feedback">
                      {{ $errors->first('email') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="password" class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                    <div class="invalid-feedback">
                      {{ $errors->first('password') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Login
                  </button>
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
@endsection
