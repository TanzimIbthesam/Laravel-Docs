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
        Gate::define('blogs.contact',function($user){
             return $user->is_admin ;


        });
        Gate::define('contact.secret', function ($user) {
            return $user->is_admin;
        });
        Gate::before(function($user,$ability){
            if($user->is_admin && in_array($ability,['update','view'])){
                return true;
            }

        });

    }
}

