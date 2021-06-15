<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Facades\Cache;
class BlogObservor

{
    
   
     public function updating(Blog $blog)
     {
         # code...
        //  $blog->comment()->delete();
         Cache::tags(['blog'])->forget("blog-{$blog->id}");
     }
    /**
     * Handle the Blog "deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
  
    public function deleting(Blog $blog)
    {
    //  dd("I am deleted");
    $blog->comment()->delete();
    $blog->image()->delete();
    //remove cache element when blog post is deleted
    Cache::tags(['blog'])->forget("blog-{$blog->id}");
        

    }
   
   public function restoring(Blog $blog){
        $blog->comment()->delete();
    }
  
    
    
}
