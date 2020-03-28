<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\Providers\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller  {
    private $service;

    public function __construct(AuthService $service) {
        $this->service = $service;
    }
    
    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     * 
     * @param  \App\User   $user 
     * @return mixed
     */
    public function authenticate(Request $request) {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        return $this->service->authenticate($email, $password);
    }
}