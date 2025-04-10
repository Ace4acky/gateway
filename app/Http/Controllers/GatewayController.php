<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; // Using Guzzle for making HTTP requests to Site1 and Site2

class GatewayController extends Controller
{
    // Fetch data from Site1
    public function getSite1Data(Request $request)
    {
        $client = new Client();  // Instantiate Guzzle client

        // Call Site1's API (adjust URL and method as needed)
        $response = $client->get(env('SITE1_API_URL')); // Assuming you have the API URL in .env

        return response()->json(json_decode($response->getBody()->getContents()));
    }

    // Fetch data from Site2
    public function getSite2Data(Request $request)
    {
        $client = new Client();  // Instantiate Guzzle client

        // Call Site2's API (adjust URL and method as needed)
        $response = $client->get(env('SITE2_API_URL')); // Assuming you have the API URL in .env

        return response()->json(json_decode($response->getBody()->getContents()));
    }

    // Public data route (optional)
    public function getPublicData()
    {
        return response()->json(['message' => 'Public data available']);
    }
}
