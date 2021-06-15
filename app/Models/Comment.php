<?php

namespace App\Models;

use App\Scopes\LatestScope;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use HasFactory, SoftDeletes,Taggable;
    protected $guarded=[];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function commentable()
    {
        return $this->morphTo();
    }
    // public function tag()
    // {
    //     // return $this->belongsToMany(Tag::class);
    //     return $this->morphToMany(Tag::class, 'taggable');
    // }

    public static function boot()
    {
        # code...
          parent::boot();
        //   static::addGlobalScope(new LatestScope);
        static::creating(function (Comment $comment) {

            // if($comment->commentable_type=Blog::class){
            //     Cache::tags(['blog'])->forget("blog-{$comment->commentable_id}");
            //     Cache::tags(['blog'])->forget('mostCommented');

            // }

        });
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
