@extends('layout')
@section('content')

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<p>{{ $post->created_at->diffForHumans() }}</p>

@endsection