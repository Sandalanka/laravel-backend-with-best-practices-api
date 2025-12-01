<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Common\ApiCatchErrors;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected AuthService $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            Log::info('User register request received', ['request_data' => $request->all()]);

            DB::beginTransaction();

            $register = $this->authService->register($request);

            DB::commit();

            return $this->successResponse(
                data: $register,
                message: 'User registered successfully.',
                statusCode: 201
            );

        } catch (Exception $exception) {
            ApiCatchErrors::rollback($exception, 'An error occurred while register a auth-(controller): ');

            return $this->errorResponse(
                exception: $exception,
                message: 'Something went wrong'
            );
        }
    }
}
