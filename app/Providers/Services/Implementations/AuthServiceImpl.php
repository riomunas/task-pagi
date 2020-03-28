<?php

namespace App\Providers\Services\Implementations;

use Illuminate\Http\Request;
use App\User;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;

use App\Providers\Services\AuthService;

class AuthServiceImpl implements AuthService {
	private function jwt(User $user) {
		$payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60*60 // Expiration time
        ];
        
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
	}

	public function authenticate($email, $password) {
        // Find the user by email
        $user = User::where('email', $email)->first();

        if (!$user) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'error' => 'Email does not exist.'
            ], 400);
        }

        // Verify the password and generate the token
        if (Hash::check($password, $user->password)) {
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        }

        // Bad Request response
        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 400);
	}
}