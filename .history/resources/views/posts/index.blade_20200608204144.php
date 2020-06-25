@extends('layout')
@section('content')

  @foreach ($posts as $post)
      <p>
      <h3>{{ $post->title }}</h3>
      </p>
  @endforeach

@endsection