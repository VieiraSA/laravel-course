@forelse($comments as $comment)
<p>
  {{ $comment->content }}
  <x-tags :tags="$comment->tags">
  </x-tags>
  <x-updated :date="$comment->created_at" :name="$comment->user->name" :userId="$comment->user->id" >
  </x-updated>

</p>
@empty
<p>No comments yet!</p>
@endforelse
