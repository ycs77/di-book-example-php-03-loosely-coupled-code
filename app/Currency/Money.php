<?php

namespace App\Currency;

use Money\Currency as PHPCurrency;
use Money\Money as PHPMoney;

// ---- Code Listing 4.6 ----
class Money
{
    protected float $amount;
    protected Currency $currency;

    public function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function calcAmount(callable $callback)
    {
        $this->amount = $callback($this->amount);

        return $this;
    }

    public function toPHPMoney(): PHPMoney
    {
        $amount = (int) ($this->amount() * 100);
        $currency = new PHPCurrency($this->currency()->code());

        return new PHPMoney($amount, $currency);
    }

    public static function fromPHPMoney(PHPMoney $money)
    {
        $amount = ((int) $money->getAmount()) / 100;
        $currencyCode = $money->getCurrency()->getCode();

        return new static($amount, new Currency($currencyCode));
    }

    public function amount()
    {
        return $this->amount;
    }

    public function currency()
    {
        return $this->currency;
    }
}
