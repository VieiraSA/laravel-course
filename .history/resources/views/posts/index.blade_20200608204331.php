@extends('layout')
@section('content')

@forelse ($posts as $post)
<p>
  <h3>{{ $post->title }}</h3>
</p>
@empty
  <p>No blog posts yet!</p>

@endforelse

@endsection
