<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.User.login');
    }
    public function loginUser(Request $request)
    {
        try {
            $validateUser= Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Bad Request',
                    'errors' => $validateUser->erros()
                ], 401);
            }
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email and Passowrd does not exist'
                ], 401);
            }
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'status' =>true,
                'message' => 'user logged in successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' =>true,
            'message' => 'user logged out successfully',
        ], 200);
    }
}
