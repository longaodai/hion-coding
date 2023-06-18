<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Globals\OpenGraph;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('OpenGraph', function ($app) {
            return new OpenGraph();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Facades\OpenGraph::setFacadeApplication($this->app);
    }
}
