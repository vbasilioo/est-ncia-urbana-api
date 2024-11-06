<?php

namespace App\Services\Auth;

use App\Exceptions\ApiException as ExceptionsApiException;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService{
    public function login(array $data): array{
        $user = User::where('email', $data['email'])->first();

        if($user && Auth::attempt(["email" => $data["email"], "password" => $data["password"]])){
            $customClaims = [
                'exp' => Carbon::now()->addYear()->timestamp
            ];

            $token = JWTAuth::claims($customClaims)->fromUser(Auth::user());
            $user = User::find(Auth::id());

            return ["user" => $user, "token" => $token];
        }

        throw new ExceptionsApiException("Usuário ou senha inválido", 401);
    }
}