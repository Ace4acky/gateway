<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User; // Adjust based on your user model

class AuthController extends Controller
{
    /**
     * Handle user login and return JWT token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate incoming request
        $credentials = $request->only('email', 'password');
        
        // Check if the credentials are valid
        if (empty($credentials['email']) || empty($credentials['password'])) {
            return response()->json(['error' => 'Email and password are required'], 400);
        }

        // Attempt to verify the credentials and create a JWT token
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (JWTException $e) {
            // Could not create a token
            return response()->json(['error' => 'Could not create token'], 500);
        }

        // Return the token
        return response()->json(compact('token'));
    }

    /**
     * Get the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'User not found'], 404);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token is invalid'], 401);
        }

        return response()->json(compact('user'));
    }
}
