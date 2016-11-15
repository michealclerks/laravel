<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;

class AuthenticateController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    /**
     * All users with in the database
     */
    public function index()
    {      
        $users = User::all();

        return $users;
    }

    /**
     * Return a json output with authenication
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'wrong login details'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'try again. couldnot ctreate token'], 500);
        }
        return response()->json(compact('token'));
    }
}
