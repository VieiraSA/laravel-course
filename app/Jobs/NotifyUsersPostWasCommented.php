<?php

namespace App\Jobs;

use App\Comment;
use App\Mail\CommentPostedOnPostWatched;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUsersPostWasCommented implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $comment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::thatHasCommentedOnPost($this->comment->commentable)
        ->get()
        ->filter(function(User $user){
            return $user->id != $this->comment->user_id; // excludes the author of the post
        })->map(function(User $user){
            ThrottledMail::dispatch(
                new CommentPostedOnPostWatched($this->comment, $user),
                $user
            );
            // Mail::to($user)->send(
            //     $now->addSeconds(10),
            //     new CommentPostedOnPostWatched($this->comment, $user) 
            // );
        });
    }
}
