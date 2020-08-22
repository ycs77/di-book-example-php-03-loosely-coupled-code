<?php

namespace App\Currency;

use App\Contracts\Currency\CurrencyConverter as CurrencyConverterContract;
use Money\Converter;

class CurrencyConverter implements CurrencyConverterContract
{
    protected Converter $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function exchange(Money $money, Currency $targetCurrency): Money
    {
        $money = $money->toPHPMoney();
        $currency = $targetCurrency->toPHPCurrency();

        $contertedMoney = $this->converter->convert($money, $currency);

        return Money::fromPHPMoney($contertedMoney);
    }
}
