<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Blog;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.partials.meta_dynamiq', 'layouts.partials.navigation'], function($view){
            $view->with('blogs', Blog::where('status', 1)->latest()->get());
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
