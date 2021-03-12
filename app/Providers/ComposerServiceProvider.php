<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('welcome', \App\Http\Viewcomposers\HomepageServer::class);
        View::composer('*', \App\Http\Viewcomposers\Languaged::class);
        View::composer(['server.buy', 'advertising.advertising', 'advertising.text', 'advertising.banner'], \App\Http\Viewcomposers\Usermoney::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
