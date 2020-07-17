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
      @if($post->comments_count)
      <p>{{ $post->comments_count }} comments</p>
      @else
      <p>No comments yet!</p>
      @endif

      {{-- @cannot('delete', $post)
    <p> You can't delete this post</p>
  @endcannot --}}

      @can('update', $post)
      <a href="{{ route('posts.edit', ['post' => $post->id ])  }}" class="btn btn-primary">
        Edit
      </a>
      @endcan
      @if (!$post->trashed())
      @can('delete', $post)
      <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id ]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete!" class="btn btn-primary">
      </form>
      @endcan
      @endif

      @empty
      <p>No blog posts yet!</p>

      @endforelse
  </div>
  <div class="col-4">
    <div class="container">
      <div class="row">
        <x-card 
        title="Most Commented">
          @slot('subtitle')
            What people are currently talking about
          @endslot
          @slot('items')
            @foreach ($mostCommented as $post)
            <li class="list-group-item">
              <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                {{ $post->title }}
              </a>
            </li>
            @endforeach
          @endslot
        </x-card>
      </div>
      <div class="row mt-4">
        <x-card 
        title="Most Active">
          @slot('subtitle')
            Writers with most posts written
          @endslot
          @slot('items',collect($mostActive)->pluck('name'))
        </x-card>
      </div>
      <div class="row mt-4">
        <x-card 
        title="Most Active last month">
          @slot('subtitle')
          Users with most posts written in the month
          @endslot
          @slot('items',collect($mostActiveLastMonth)->pluck('name'))
        </x-card>
      </div>
    </div>
  </div>
</div>
@endsection
