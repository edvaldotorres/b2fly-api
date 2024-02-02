<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        return $this->authService->authenticate($credentials);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}
