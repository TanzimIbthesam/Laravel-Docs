<?php

namespace App\Models;

use App\Scopes\DeletedAdminScope;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function comment()
    {
        return $this->hasMany(Comment::class)->latest();
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

    public function scopeMostCommented(Builder $query)
    {
        //    return $query->orderBy(static::CREATED_AT,'desc');
           return $query->withCount('comment')->orderBy('comment_count','desc');
    }
    public static function boot()
    {
        static::addGlobalScope(new DeletedAdminScope);
        parent::boot();
        // static::addGlobalScope(new LatestScope);


        static::deleting(function (Blog $blog) {
            $blog->comment()->delete();
        });
        static::restoring(function (Blog $blog) {
            $blog->comment()->delete();
        });
    }
}
