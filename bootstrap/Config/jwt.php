<?php

return [

    /*
    |--------------------------------------------------------------------------
    | JWT Secret Key
    |--------------------------------------------------------------------------
    |
    | The secret key used for signing the JWT token. You can generate a key
    | by running the `php artisan jwt:secret` command.
    |
    */
    'secret' => env('JWT_SECRET', 'your-secret-key'),

    /*
    |--------------------------------------------------------------------------
    | JWT Time to Live (TTL)
    |--------------------------------------------------------------------------
    |
    | The default time to live (TTL) for the token in minutes. By default,
    | it will expire in 60 minutes, but you can change this based on your
    | app's requirements.
    |
    */
    'ttl' => env('JWT_TTL', 60), // Time to live in minutes

    /*
    |--------------------------------------------------------------------------
    | Refresh Time to Live (TTL)
    |--------------------------------------------------------------------------
    |
    | The TTL for the refresh token. By default, it expires in 20160 minutes (14 days).
    |
    */
    'refresh_ttl' => env('JWT_REFRESH_TTL', 20160), // Refresh token TTL in minutes

    /*
    |--------------------------------------------------------------------------
    | JWT Hash Algorithm
    |--------------------------------------------------------------------------
    |
    | The algorithm used to sign the JWT token. 
    | You can choose from the following algorithms: 
    | HS256, HS384, HS512, RS256, RS384, RS512.
    |
    */
    'algo' => env('JWT_ALGO', 'HS256'), // HS256 is the default

    /*
    |--------------------------------------------------------------------------
    | JWT Keys
    |--------------------------------------------------------------------------
    |
    | The keys that will be used to sign and verify the JWT token. If you're using
    | an asymmetric signing algorithm (e.g., RS256), you'll need to provide the 
    | public and private keys here.
    |
    */
    'keys' => [
        'public' => env('JWT_PUBLIC_KEY'),
        'private' => env('JWT_PRIVATE_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | JWT Blacklist
    |--------------------------------------------------------------------------
    |
    | Whether or not to use the blacklist feature. Enabling this will allow
    | you to invalidate a token before it expires.
    |
    */
    'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | JWT Cache
    |--------------------------------------------------------------------------
    |
    | Enable or disable the cache for storing the token. If this is enabled,
    | it will cache the JWT tokens in memory for quicker lookup.
    |
    */
    'cache' => [
        'enabled' => env('JWT_CACHE_ENABLED', true),
        'driver' => env('JWT_CACHE_DRIVER', 'file'),
    ],

    /*
    |--------------------------------------------------------------------------
    | JWT User
    |--------------------------------------------------------------------------
    |
    | The user model to be used by JWT. Make sure that this is set correctly.
    |
    */
    'user' => 'App\Models\User', // Update with your User model

    /*
    |--------------------------------------------------------------------------
    | JWT Authentication Guards
    |--------------------------------------------------------------------------
    |
    | The name of the guard to be used for the JWT authentication. This is 
    | typically set to 'api' if you're using the `api` guard.
    |
    */
    'guard' => env('JWT_GUARD', 'api'),

];
