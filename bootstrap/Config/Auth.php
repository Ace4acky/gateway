<?php

return [

    'defaults' => [
        'guard' => 'api', // Make sure 'api' is the default guard
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt', // Use the JWT driver for the API guard
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Make sure the User model is correct
        ],
    ],

];
