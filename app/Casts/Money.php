<?php

namespace App\Casts;

use App\Currency\Currency;
use App\Currency\Money as AppMoney;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class Money implements CastsAttributes
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $value
     */
    public function get($model, string $key, $value, array $attributes): AppMoney
    {
        return new AppMoney((float) $value, new Currency(config('money.defaultCurrency')));
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  \App\Currency\Money  $value
     */
    public function set($model, string $key, $value, array $attributes): string
    {
        if (! $value instanceof AppMoney) {
            throw new InvalidArgumentException('The given value is not an App\Currency\Money instance.');
        }

        return (string) $value->amount();
    }
}
