<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\StoreUserRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class AuthController extends Controller
{
    public function user() : JsonResource
    {
        return new UserResource(Auth::user());
    }

    public function login(LoginRequest $request) : JsonResource
    {
        $credentials = $request->validated();

        if ($request->has('username')) {
            $user = User::all()->where('username', $credentials['username'])->first();
        } else {
            $user = User::all()->where('email', $credentials['email'])->first();
        }

        if (!$user || !Hash::check($credentials['password'], $user->password)) throw ValidationException::withMessages([]);

        return new AuthResource($user);
    }

    public function register(StoreUserRequest $request) : JsonResource
    {
        $credentials = $request->validated();

        $user = User::firstOrCreate([
            'display_name' => $credentials['display_name'],
            'username' => $credentials['username'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);

        return new AuthResource($user);
    }

    public function logout() : array
    {
        Auth::user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
