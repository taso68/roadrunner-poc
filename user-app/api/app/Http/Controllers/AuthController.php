<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only(['email', 'password']))) {
           return $this->error(null, 'Invalid credentials', 401);
        }

        $user = User::where('email', $request->get('email'))->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of '. $user->name)->plainTextToken,
        ], 'top');

    }

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->success(
            [
                'user' => $user,
                'token'=> $user->createToken('API Token of '. $user->name)->plainTextToken,
            ],'ok');
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success('','logged out');
    }
}

