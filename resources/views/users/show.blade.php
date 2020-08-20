@extends('layout')
@section('content')
<div class="row">
  <div class="col-4">
    <img src="{{ $user->image ? $user->image->url() : '' }}" class="img-thumbnail avatar" />
  </div>
  <div class="col-8">
    <h3>{{ $user->name }}</h3>
    <h4>Comments</h4>
    <x-comment-form :route="route('users.comments.store',['user' => $user->id ])">
    </x-comment-form>
    <x-commentList :comments="$user->commentsOn">
    </x-commentList>
  </div>
 
</div>
@endsection
