@extends('layout')
@section('content')

<form method="POST" action="{{ route('posts.update', ['post' => $post->id ]) }}">
  @csrf
  @method('PUT')


  <button type="submit"> Update </button>
</form>

@endsection