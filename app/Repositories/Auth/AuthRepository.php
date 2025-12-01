<?php

namespace App\Repositories\Auth;

use App\Classes\Common\ApiCatchErrors;
use App\Contracts\Auth\AuthContract;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthContract
{
    /**
     *
     * Summery: User register
     *
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function register(Request $request): array
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            $token = $user->createToken('Personal Access Token')->plainTextToken;

            return [
                'user' => $user,
                'token' => $token
            ];

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while register a auth-(repository): '
            );

            throw $exception;
        }
    }
}
