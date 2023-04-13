<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\DataResponse;
use App\Http\Responses\MessageResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): DataResponse
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return new DataResponse([
            'access_token' => $token,
        ]);
    }

    public function login(LoginRequest $request): DataResponse|MessageResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            /** @var User $user */
            $user = Auth::user();
        } else {
            return new MessageResponse('Unauthenticated.', false, 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return new DataResponse([
            'access_token' => $token,
        ]);
    }

    public function logout(): MessageResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return new MessageResponse('Successfully logout.');
    }
}
