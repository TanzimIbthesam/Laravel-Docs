<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         Blog::class => 'App\Policies\BlogPolicy',
         
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //define an ability that someone can update a blog post
        // Gate::define('update-post',function($user,$blog){
        //     return $user->id==$blog->user_id;

        // });
        // Gate::define('delete-post',function($user,$blog){
        //     return $user->id==$blog->user_id;

        // });
       
    
        //If we want admin to enjoy all privilages 
        // Gate::before(function ($user, $ability) {
        //     // if ($user->is_admin && in_array($ability, ['update-post'])) {
        //     //     return true;
        //     // }
        //     if ($user->is_admin) {
        //         return true;
        //     }
        // });
      //If we want admin to enoy any specific privilages 
        // Gate::before(function($user,$ability){
        //     if($user->is_admin && in_array($ability,['blog.update'])){
        //         return true;
        //     }

        // });
        //after gate check
        // Gate::after(function($user,$ability,$result){
        //     if($user->is_admin ){
        //         return true;
        //     }

        // });

        //
    }
}
