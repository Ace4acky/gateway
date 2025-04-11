<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// Public route for testing
$router->get('/', function () {
    return app()->version();  // This returns the Lumen app version
});

$router->post('/login', 'AuthController@login');

$router->get('/public', 'GatewayController@getPublicData');

// Group of routes that require JWT Authentication (using 'jwt.auth' middleware)
$router->group(['middleware' => 'jwt.auth'], function () use ($router) {
    // Protected routes that fetch data from Site1 and Site2
    $router->get('/site1', 'GatewayController@getSite1Data');
    $router->get('/site2', 'GatewayController@getSite2Data');
});

