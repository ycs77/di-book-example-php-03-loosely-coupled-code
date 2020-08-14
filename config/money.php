<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Laravel money
     |--------------------------------------------------------------------------
     */

    'locale' => config('app.locale'),
    'defaultCurrency' => config('app.currency', 'TWD'),
    'currencies' => [
        'iso' => 'all',
        'bitcoin' => 'all',
        'custom' => [
            // 'MY1' => 2,
            // 'MY2' => 3,
        ],
    ],

];
