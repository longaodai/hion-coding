<?php

namespace App\Providers;

use App\Services\Categories\CategoryService;
use App\Services\Categories\CategoryServiceInterface;
use App\Services\Posts\PostService;
use App\Services\Posts\PostServiceInterface;
use Illuminate\Support\ServiceProvider;

class InternalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(PostServiceInterface::class, PostService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides()
    {
        return [
            CategoryServiceInterface::class,
            PostServiceInterface::class,
        ];
    }
}
