<?php

namespace App\Models;

use App\Scopes\DeletedAdminScope;
use App\Scopes\LatestScope;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Cache;

class Blog extends Model
{
    use HasFactory,SoftDeletes,Taggable;
    // use SoftDeletes;
    protected $guarded=[];
    public function comment()
    {
        // return $this->hasMany(Comment::class)->latest();
        return $this->morphMany(Comment::class,'commentable')->latest();
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
    public function scopeLatest(Builder $query)
    {
           return $query->orderBy(static::CREATED_AT,'desc');
    }
      public function scopeLatestWithRelations(Builder $query)
      {
          # code...
          return
          $query
          ->latest()
          ->withCount('comment')
          ->with('user','tag');


      }
    //   public function imageable()
    //   {
    //     # code...
    //     return $this->morphTo();
    //   }
      public function image()
      {
          # code...
          return $this->morphOne(Image::class,'imageable');
      }
    public function scopeMostCommented(Builder $query)
    {
        //    return $query->orderBy(static::CREATED_AT,'desc');
           return $query->withCount('comment')->orderBy('comment_count','desc');
    }

    // public function tag()
    // {
    //     // return $this->belongsToMany(Tag::class);
    //     return $this->morphToMany(Tag::class, 'taggable');
    // }

    public static function boot()
    {
        static::addGlobalScope(new DeletedAdminScope);
        parent::boot();
        // static::addGlobalScope(new LatestScope);


        static::deleting(function (Blog $blog) {
            $blog->comment()->delete();
            $blog->image()->delete();
            //remove cache element when blog post is deleted
            Cache::tags(['blog'])->forget("blog-{$blog->id}");
        });
        static::updating(function(Blog $blog){
           Cache::tags(['blog'])->forget("blog-{$blog->id}");

        });
        static::restoring(function (Blog $blog) {
            $blog->comment()->delete();
        });
    }
}
