<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class ThrottleMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;
    public $mailable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Mailable $mailable,User $user)
    {
        //
        $this->mailable=$mailable;
        $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Redis::throttle('mailtrap')->allow(2)->every(12)->then(function () {
            Mail::to($this->user)->send($this->mail);
        }, function () {
            return $this->release(5);
        });
    }
}
