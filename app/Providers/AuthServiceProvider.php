<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
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
         User::class=>'App\Policies\UserPolicy'

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
            if($user->is_admin && in_array($ability,['delete'])){
                return true;
            }

        });

    }
}

