<?php

use Illuminate\Support\Facades\Auth;

// Define the route to return the authenticated user
$router->get('/user', function () {
    return Auth::user(); // Ensure the user is correctly authenticated
});
