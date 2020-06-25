@extends('layout')
@section('content')

<form method="POST" action="{{ route('posts.store') }}">
  @csrf
  <p>
    <label for="title"> Title </label>
  <input type="text" name="title" value="{{ old('title') }}"/>
  </p>
  <p>
    <label for="content"> Content </label>
    <input type="text" name="content" value="{{ old('content') }}" />
  </p>
  <button type="submit"> Create! </button>
  
</form>
@if ($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

@endsection
