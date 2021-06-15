<?php

namespace App\Listeners;

use App\Events\BlogPosted;
use App\Jobs\ThrottleMail;
use App\Mail\BlogAdded;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminWhenBlogPostCreated
{
    
     
    public function handle(BlogPosted $event)
    {
        //
        User::thatIsAnAdmin()->get()
        ->map((function(User $user){
            ThrottleMail::dispatch(
              new BlogAdded(),
              $user
            );

        }));
    }
}
