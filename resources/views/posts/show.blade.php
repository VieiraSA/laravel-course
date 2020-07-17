@extends('layout')
@section('content')

<h1>
  {{ $post->title }}
  <x-badge type="primary" :show="now()->diffInMinutes($post->created_at) < 30">
    Brand New Post!
  </x-badge>
</h1>
<p>{{ $post->content }}</p>
<x-updated :date="$post->created_at" :name="$post->user->name">
</x-updated>
<x-updated :date="$post->updated_at">
  Updated 
</x-updated>


<h4>Comments</h4>

@forelse($post->comments as $comment)
<p>
  {{ $comment->content }}
  <x-updated :date="$comment->created_at">
  </x-updated>

</p>
@empty
<p>No comments yet!</p>
@endforelse

@endsection
