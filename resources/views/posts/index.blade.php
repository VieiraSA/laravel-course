@extends('layout')
@section('content')
<div class="row">
  <div class="col-8">
    @forelse ($posts as $post)
    <p>
      <h3>

        <a class="{{ $post->trashed() ? 'text-muted' : ''}}" href="{{ route('posts.show', ['post' => $post->id ])  }}">
          @if($post->trashed())
          <del>
            @endif
            {{ $post->title }}
            @if($post->trashed())
          </del>
          @endif
        </a>
      </h3>
      <x-updated :date="$post->created_at" :name="$post->user->name">
      </x-updated>
      <x-tags :tags="$post->tags">
      </x-tags>
      @if($post->comments_count)
      <p>{{ $post->comments_count }} comments</p>
      @else
      <p>No comments yet!</p>
      @endif

      {{-- @cannot('delete', $post)
    <p> You can't delete this post</p>
  @endcannot --}}
      @auth
      @can('update', $post)
      <a href="{{ route('posts.edit', ['post' => $post->id ])  }}" class="btn btn-primary">
        Edit
      </a>
      @endcan
      @endauth
      @auth
      @if (!$post->trashed())
      @can('delete', $post)
      <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id ]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete!" class="btn btn-primary">
      </form>
      @endcan
      @endif
      @endauth

      @empty
      <p>No blog posts yet!</p>

      @endforelse
  </div>
  <div class="col-4">
    @include('posts._activity')
  </div>
</div>
@endsection
