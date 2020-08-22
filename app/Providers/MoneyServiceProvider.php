<?php

namespace App\Providers;

use App\Contracts\Currency\ConverterFactory as ConverterFactoryContract;
use App\Currency\ConverterFactory;
use Illuminate\Support\ServiceProvider;
use Money\Converter;

class MoneyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ConverterFactoryContract::class, ConverterFactory::class);

        $this->app->singleton(Converter::class, function ($app) {
            return $app[ConverterFactoryContract::class]->make();
        });
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
}
