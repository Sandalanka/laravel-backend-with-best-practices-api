<?php

namespace App\Services\Auth;

use App\Classes\Common\ApiCatchErrors;
use App\Repositories\Auth\AuthRepository;
use Exception;
use Illuminate\Http\Request;

class AuthService
{
    protected AuthRepository $authRepository;

    /**
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

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

            return $this->authRepository->register($request);

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while register a auth-(service): '
            );

            throw $exception;
        }
    }
}
