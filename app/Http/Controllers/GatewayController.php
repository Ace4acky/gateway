<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use GuzzleHttp\Client; // If you're using Guzzle to fetch data from Site1 or Site2

class GatewayController extends Controller
{
    /**
     * Fetch data from Site 1.
     * This route is protected by JWT authentication.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSite1Data()
    {
        try {
            \Log::info('Attempting to fetch data from Site 1...');
            
            // Example Guzzle request (replace with actual URL)
            $client = new Client();
            $response = $client->get('https://example.com/api/site1'); // Replace with actual Site1 URL
            
            // Log the response to ensure Site 1 data is fetched correctly
            $data = json_decode($response->getBody()->getContents(), true);
            \Log::info('Data fetched from Site 1: ' . json_encode($data));
    
            // Return the response data
            return response()->json(['data' => $data], 200);
        } catch (\Exception $e) {
            // Log any exception that occurs
            \Log::error('Error fetching data from Site 1: ' . $e->getMessage());
    
            // Return a 500 Internal Server Error
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    /**
     * Fetch data from Site 2.
     * This route is protected by JWT authentication.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSite2Data()
    {
        try {
            // Example: Fetch data from Site 2 using Guzzle (replace with actual Site2 URL)
            $client = new Client();
            $response = $client->get('https://example.com/api/site2'); // Replace with actual Site2 API URL
            $data = json_decode($response->getBody()->getContents(), true);

            // Return the data from Site 2
            return response()->json(['data' => $data], 200);
        } catch (\Exception $e) {
            // Log the error and return a 500 error if something goes wrong
            \Log::error('Error fetching data from Site 2: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    /**
     * Fetch public data.
     * This route is open to everyone, no authentication required.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPublicData()
    {
        // Example of public data, no authentication needed
        return response()->json(['data' => 'Public data available for everyone.'], 200);
    }
}
