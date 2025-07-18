<?php

return [
    'tripay' => [
        'merchant_kode' => env('MERCHANT_CODE'),
        'api_key' => env('API_KEY'),
        'private_key' => env('PRIVATE_KEY'),
    ],
    'midtrans' => [
        'merchant_id' => env('MERCHANT_ID'),
        'client_key' => env('CLIENT_KEY'),
        'server_key' => env('SERVER_KEY'),
        'is_production' => env('ISPRODUCTION'),
        'is_sanitized' => env('ISSANITIZED'),
        'is_3ds' => env('IS3DS'),
    ],

];
