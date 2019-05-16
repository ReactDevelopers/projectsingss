@extends('layouts.admin.master')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <b>{{ config('app.name', 'AIPRO') }}</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form action="{{ url('/login') }}" method="post" autocomplete="off">
      {{ csrf_field() }}
       @if(Session::has('error'))
          <div class="alert alert-error alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('error') }}
          </div>
        @endif

      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="text" autocomplete="off" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" autocomplete="off" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection