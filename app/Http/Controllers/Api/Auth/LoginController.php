<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($login)) {
            return response([
                'message' => 'Invalid Login Info'
            ]);
        }

        $access_token = Auth::user()->createToken('authToken')->accessToken;

        return response([
            'user' => Auth::user(),
            'accessToken' => $access_token,
        ]);

    }


}
