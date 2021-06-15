<?php

namespace App\Listeners;

use App\Jobs\NotifyUsersPostWasCommented;
use App\Jobs\ThrottleMail;
use App\Mail\CommentPostedMarkDown;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsersAboutComment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        ThrottleMail::dispatch(new CommentPostedMarkDown($event->comment),$event->comment->commentable->user)
        ->onQueue('low');
        NotifyUsersPostWasCommented::dispatch($event->comment)
        ->onQueue('high');
    }
}
