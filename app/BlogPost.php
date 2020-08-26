<?php

namespace App;

use App\Scopes\DeletedAdminScope;
use App\Scopes\LatestScope;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class BlogPost extends Model
{
    //protected $table = 'blog_posts';

    use SoftDeletes, Taggable;

    protected $fillable = ['user_id', 'title', 'content'];

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable')->latest();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }
    public function scopeMostCommented(Builder $query)
    {
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }
    public function scopeLatestWithRelations(Builder $query)
    {
        return $query->latest()
            ->withCount('comments')
            ->with('user', 'tags');
    }
    public static function boot()
    {
        static::addGlobalScope(new DeletedAdminScope);
        parent::boot();

        //static::addGlobalScope(new LatestScope);

        static::updating(function (BlogPost $blogPost) {
            Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}");
        });

        static::deleting(function (BlogPost $blogPost) {
            $blogPost->comments()->delete();
            Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}");
        });

        static::restoring(function (BlogPost $blogPost) {
            $blogPost->comments()->restore();
        });
    }
}
