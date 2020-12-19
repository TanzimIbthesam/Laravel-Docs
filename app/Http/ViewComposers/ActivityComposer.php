<?php

namespace App\Http\ViewComposers;

use App\Models\Blog;
use App\Models\User;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ActivityComposer{

    public function compose(View $view)
    {
        $mostCommented = Cache::remember('blog-commented', 60, function () {
            return Blog::mostCommented()->take(5)->get();
        });
        $mostActive = Cache::remember('users-most-active', 60, function () {
            return User::WithMostBlogPosts()->take(5)->get();
        });
        $mostActiveLastMonth = Cache::remember('users-most-active-last-month', 60, function () {
            return User::WithMostBlogPosts()->take(5)->get();
        });
        $view->with('mostCommented',$mostCommented);
        $view->with('mostActive',$mostActive);
        $view->with('mostActiveLastMonth',$mostActiveLastMonth);
    }
}
