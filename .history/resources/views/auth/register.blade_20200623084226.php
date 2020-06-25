@extends('layout')
@section('content')
<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="form-group">
    <label>Name</label>
    <input name="" value="" required class="form-control">
  </div>
  <div class="form-group">
    <label>E-mail</label>
    <input name="" value="" required class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="" value="" required class="form-control">
  </div>
  <div class="form-group">
    <label>Retyped Password</label>
    <input name="" value="" required class="form-control">
  </div>
</form>
@endsection