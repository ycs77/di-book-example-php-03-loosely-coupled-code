<?php

namespace App\Currency;

use App\Contracts\Currency\ConverterFactory as ConverterFactoryContract;
use Cknow\Money\Money;
use Illuminate\Contracts\Foundation\Application;
use InvalidArgumentException;
use Money\Converter;
use Money\Exchange;
use Money\Exchange\FixedExchange;

class ConverterFactory implements ConverterFactoryContract
{
    public Application $app;

    /** @var array|\Money\Converter[string] */
    public array $drivers = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function make(string $name = null): Converter
    {
        $name = $name ?? $this->getDefaultDriver();

        if (isset($this->drivers[$name])) {
            return $this->drivers[$name];
        }

        if (method_exists($this, 'create'.ucfirst($name).'Driver')) {
            return $this->drivers[$name] = $this->{'create'.ucfirst($name).'Driver'}();
        }

        throw new InvalidArgumentException("Driver [$name] is not supported.");
    }

    protected function createFixedDriver(): Converter
    {
        return $this->getConverter(new FixedExchange($this->app['config']['money.exchange.fixed.list']));
    }

    protected function getConverter(Exchange $exchange): Converter
    {
        return new Converter(Money::getCurrencies(), $exchange);
    }

    protected function getDefaultDriver()
    {
        return $this->app['config']['money.exchange.default'];
    }
}
