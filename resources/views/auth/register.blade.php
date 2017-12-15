@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-sm-10 offset-md-2 offset-sm-1">
    <div class="row">
      <div class="col-12">
        <h2>Register new account</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="row">
              <label for="name" class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                  <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                  </div>
                @endif
              </div>
            </div>
            <div class="row">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
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
              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Register
                </button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
