<?php

namespace App\Contracts\Currency;

use Money\Converter;

interface ConverterFactory
{
    public function make(string $name = null): Converter;
}
