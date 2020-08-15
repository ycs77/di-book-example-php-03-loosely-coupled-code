<?php

namespace App\Providers;

use App\Contexts\UserContext;
use App\Contracts\Repositories\ProductRepository as ProductRepositoryContract;
use App\Contracts\Services\ProductService as ProductServiceContract;
use App\Contracts\UserContext as UserContextContract;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
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
        // Bind services
        $this->app->bind(ProductServiceContract::class, ProductService::class);
        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);

        // Bind contexts
        $this->app->bind(UserContextContract::class, UserContext::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
