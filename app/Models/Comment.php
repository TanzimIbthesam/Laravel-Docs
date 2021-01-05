<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class);
    // }
    public function commentable()
    {
        return $this->morphTo();
    }
    public static function boot()
    {
        # code...
          parent::boot();
        //   static::addGlobalScope(new LatestScope);
        static::creating(function (Comment $comment) {

            if($comment->commentable_type=Blog::class){
                Cache::tags(['blog'])->forget("blog-{$comment->commentable_id}");
                Cache::tags(['blog'])->forget('mostCommented');

            }

        });
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
