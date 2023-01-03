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
            \App\Services\News\NewsServiceInterface::class,
            \App\Services\News\NewsService::class,
        );

        $this->app->bind(
            \App\Services\User\UserServiceInterface::class,
            \App\Services\User\UserService::class,
        );

        $this->app->bind(
            \App\Services\Category\CategoryServiceInterface::class,
            \App\Services\Category\CategoryService::class,
        );
    }

    public function registerRepository() //admin
    {
        $this->app->bind(
            \App\Repositories\News\NewsRepositoryInterface::class,
            \App\Repositories\News\NewsReponsitory::class,
        );

        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class,
        );

        $this->app->bind(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryReponsitory::class,
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
