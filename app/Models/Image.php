<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function blog()
    {
        # code...
        return $this->belongsTo(Blog::class);
    }
    public function imageable()
    {
        # code...
        return $this->morphTo();

    }
}

