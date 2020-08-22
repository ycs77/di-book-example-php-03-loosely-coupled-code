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

    'exchange' => [
        'default' => 'fixed',

        'fixed' => [
            'list' => [
                'TWD' => [
                    'TWD' => 1,
                    'USD' => 0.0339581,
                ],
                'USD' => [
                    'TWD' => 29.4481,
                    'USD' => 1,
                ],
            ],
        ],
    ],

];
