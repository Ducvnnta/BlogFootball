<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
        $this->registerRepository();
    }

    public function registerServices() //user
    {
        $this->app->bind(
            \App\Services\Post\PostServiceInterface::class,
            \App\Services\Post\PostService::class,
        );

        $this->app->bind(
            \App\Services\User\UserServiceInterface::class,
            \App\Services\User\UserService::class,
        );
    }

    public function registerRepository() //admin
    {
        $this->app->bind(
            \App\Repositories\Post\PostRepositoryInterface::class,
            \App\Repositories\Post\PostReponsitory::class,
        );

        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class,
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Paginator::useBootstrap();
      view() -> share('name', 'Laravel');
    }
}
