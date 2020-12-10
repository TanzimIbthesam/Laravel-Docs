<?php

namespace App\Models;

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
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
    public static function boot()
    {
        parent::boot();

        static::deleting(function (Blog $blog) {
            $blog->comment()->delete();
        });
        static::restoring(function (Blog $blog) {
            $blog->comment()->delete();
        });
    }
}
