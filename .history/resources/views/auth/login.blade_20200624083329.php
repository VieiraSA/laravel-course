@extends('layout')
@section('content')
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group">
    <label>E-mail</label>
    <input name="email" value="{{ old('email') }}" required class="form-control {{ $errors->has('email') ? 'is-invalid' : null }}">
    @if ($errors->has('email'))
    <span class="invalid-feedback">
      <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="password" type="password" value="" required class="form-control {{ $errors->has('password') ? 'is-invalid' : null }}">
    @if ($errors->has('password'))
    <span class="invalid-feedback">
      <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
  </div>
  <div class="form-group">
    <label>Retyped Password</label>
    <input name="password_confirmation" type="password" value="" required class="form-control">
  </div>
  <button type="submit" class="btn btn-primary btn-block">Register</button>
</form>
@endsection