@extends('layout')
@section('content')

<form action="POST" action={{ route('posts.store') }}>
  <p>
    <label for="title"> Title </label>
    <input type="text" name="title" />
  </p>
  <p>
    <label for="content"> Content </label>
    <input type="text" name="content" />
  </p>
</form>

@endsection