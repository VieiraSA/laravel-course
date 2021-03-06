@extends('layout')
@section('content')
<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="form-group">
    <label>Name</label>
  <input name="name" value="{{ old('name') }}" required class="form-control">
  </div>
  <div class="form-group">
    <label>E-mail</label>
    <input name="email" value="" required class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="password" value="" required class="form-control">
  </div>
  <div class="form-group">
    <label>Retyped Password</label>
    <input name="password_confirmation" value="" required class="form-control">
  </div>
</form>
@endsection