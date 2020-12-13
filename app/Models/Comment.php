<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public static function boot()
    {
        # code...
          parent::boot();
        //   static::addGlobalScope(new LatestScope);
    }
}
