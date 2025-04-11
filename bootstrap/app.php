<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

/*
|--------------------------------------------------------------------------|
| Create The Application                                                   |
|--------------------------------------------------------------------------|
|
| Here we will load the environment and create the application instance   |
| that serves as the central piece of this framework. We'll use this      |
| application as an "IoC" container and router for this framework.         |
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();
$app->withEloquent();

/*
|--------------------------------------------------------------------------|
| Register Container Bindings                                               |
|--------------------------------------------------------------------------|
|
| Register exception handler and console kernel. You can add custom bindings|
| below if needed.                                                         |
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------|
| Register Config Files                                                     |
|--------------------------------------------------------------------------|
|
| Register configuration files.                                            |
*/
$app->configure('app');

$app->configure('auth');

/*
|--------------------------------------------------------------------------|
| Register Middleware                                                       |
|--------------------------------------------------------------------------|
|
| Register middleware that can run globally or be assigned to specific routes|
*/

$app->routeMiddleware([
    'jwt.auth' => \Tymon\JWTAuth\Middleware\Authenticate::class,
    'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,
]);

/*
|--------------------------------------------------------------------------|
| Register Service Providers                                                |
|--------------------------------------------------------------------------|
|
| Register the application's service providers, including JWT.            |
*/
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(Illuminate\Auth\AuthServiceProvider::class);

/*
|--------------------------------------------------------------------------|
| Load The Application Routes                                              |
|--------------------------------------------------------------------------|
|
| Load the application routes here.                                        |
*/
use Tymon\JWTAuth\Facades\JWTAuth;

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {  
    require __DIR__.'/../routes/web.php';  
});

return $app;
