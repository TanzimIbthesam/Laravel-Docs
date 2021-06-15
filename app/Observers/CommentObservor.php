<?php

namespace App\Observers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;

class CommentObservor
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        //
        if($comment->commentable_type=Blog::class){
            Cache::tags(['blog'])->forget("blog-{$comment->commentable_id}");
            Cache::tags(['blog'])->forget('mostCommented');

        }
    }

   
}
