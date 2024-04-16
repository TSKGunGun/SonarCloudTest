<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return response()->json(auth()->user());
        }

        return response()->json([
            'message' => 'ユーザ名もしくはパスワードが正しくありません。'
        ], 401);
    }
}
