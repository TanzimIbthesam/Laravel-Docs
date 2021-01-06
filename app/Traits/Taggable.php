<?php

namespace App\Traits;

 use App\Models\Tag;

trait Taggable{
    protected static function bootTaggable(){
        static::updating(function($model){
            $model->tag()->sync(static::findTagsInContent($model->content));

        });
        static::created(function($model){
            $model->tag()->sync(static::findTagsInContent($model->content));
        });

    }
    public function tag()
    {
        // return $this->belongsToMany(Tag::class);
         return $this->morphToMany(Tag::class, 'taggable');
        // return $this->morphToMany('App\Models\Tag', 'taggable');
    }
    private static function findTagsInContent($content){
        // preg_match_all('/@([^@]+)@/m',$content,$tag);
        preg_match_all('/@([^@]+)@/m', $content, $tag);

        return Tag::whereIn('name',$tag[1] ?? [])->get();

    }
}



?>
