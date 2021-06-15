<?php

namespace App\Providers;

use App\Http\ViewComposers\ActivityComposer;
use App\Models\Blog;
use App\Models\Comment;
use App\Observers\BlogObservor;
use App\Observers\CommentObservor;
use App\View\Components\Badge;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Blade::component('badge', Badge::class);
        Blade::aliasComponent('components.badge', 'badge');
        Blade::aliasComponent('components.update', 'update');
        Blade::aliasComponent('components.tags', 'tags');
        Blade::aliasComponent('components.tags', 'tags');
        Blade::aliasComponent('components.comment_form','commentForm');
        Blade::aliasComponent('components.comment_list','commentList');

        view()->composer(['blogs.index','blogs.show'],ActivityComposer::class);
         Blog::observe(BlogObservor::class);
         Comment::observe(CommentObservor::class);
         
    }
}
