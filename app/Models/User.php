<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function blog(){
        return $this->hasMany(Blog::class);
    }
    public function phone()
    {
        return $this->hasOne('App\Models\Phone');
    }
    public function scopeWithMostBlogPosts(Builder $query)
    {
        # code...
        return $query->withCount('blog')->orderBy('blog_count','desc');
    }
    public function scopeWithMostBlogPostsLastMonth(Builder $query)
    {
        # code...
        return $query->withCount(['blog'=>function(Builder $query){
            $query->whereBetween(static::CREATED_AT,[now()->subMonths(1),now()]);

        }])->has('blog', '>=', 2)
        ->orderBy('blog_count','desc');
    }
    public function comment()
    {
        # code...
        return $this->hasMany(Comment::class);
    }
    public function image()
    {
        # code...
        return $this->morphOne(Image::class, 'imageable');
    }

}
