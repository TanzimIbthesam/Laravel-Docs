<?php

namespace App\Providers;

use App\Http\ViewComposers\ActivityComposer;
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

        view()->composer(['blogs.index','blogs.show'],ActivityComposer::class);
    }
}
