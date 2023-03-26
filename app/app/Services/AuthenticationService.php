<?php

namespace App\Services;

use App\Exceptions\Authentication\EmailOrPasswordIsIncorrectException;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationService extends AbstractService
{

    /**
     * Register new account.
     *
     * @param RegisterRequest $request
     *
     * @return void
     */
    public function register(RegisterRequest $request): void
    {
        User::create([
            'email' => $request->email,
            'password' => $request->password,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName
        ]);
    }

    /**
     * Login to account.
     *
     * @param LoginRequest $request
     * @return void|string
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = User::where(['email' => $request->email])->first();

            return $user->createToken('token')->plainTextToken;
        }

        $this->throw(EmailOrPasswordIsIncorrectException::class);
    }

    /**
     * Logout from account.
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
    }
}
