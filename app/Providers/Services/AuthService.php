<?php

namespace App\Providers\Services;

use App\User;

interface AuthService {
	public function authenticate($email, $password);
}