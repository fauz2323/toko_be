<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserApps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userApps = UserApps::where('email', $request->email)->first();

        if (!$userApps || !Hash::check($request->password, $userApps->password)) {
            return response(
                [
                    'message' => ['These credentials do not match our records.'],
                ],
                404,
            );
        }

        $token = $userApps->createToken('myapptoken')->plainTextToken;

        return response(
            [
                'user' => $userApps,
                'token' => $token,
            ],
            200,
        );
    }

    function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user_apps,username',
            'email' => 'required|email|unique:user_apps,email',
            'password' => 'required',
        ]);

        $userApps = new UserApps();
        $userApps->name = $request->name;
        $userApps->username = $request->username;
        $userApps->email = $request->email;
        $userApps->password = Hash::make($request->password);
        $userApps->save();

        $token = $userApps->createToken('myapptoken')->plainTextToken;

        return response(
            [
                'user' => $userApps,
                'token' => $token,
            ],
            201,
        );
    }
}
