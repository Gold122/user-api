<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;

class AuthenticationController extends Controller
{
    public function __construct(private readonly AuthenticationService $authenticationService) {}

    /**
     * Register new account.
     *
     * @OA\Post(
     *     path="/register",
     *     operationId="register",
     *     tags={"Authorization"},
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="email",
     *           example="test@gmail.com",
     *           description="Email address field <br /> The field is required.",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="password",
     *           example="test1234",
     *           description="Password field <br /> The field is required.",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="firstName",
     *           example="Jan",
     *           description="First name field <br /> The field is optional.",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="lastName",
     *           example="Kowalski",
     *           description="Last name field <br /> The field is optional.",
     *           type="string"
     *         ),
     *       ),
     *      ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Content"
     *     )
     * )
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $this->authenticationService->register($request);

        return $this->msg('auth.successfulRegisterAccount');
    }

    /**
     * Login to account.
     *
     * @OA\Post(
     *     path="/login",
     *     operationId="login",
     *     tags={"Authorization"},
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="email",
     *           example="test@gmail.com",
     *           description="Email address field <br /> The field is required.",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="password",
     *           example="test1234",
     *           description="Password field <br /> The field is required.",
     *           type="string"
     *         ),
     *       ),
     *      ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *          description="",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="accessToken",
     *                  description="",
     *                  type="string",
     *                  example="id|token"
     *              ),
     *          )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden.",
     *     )
     * )
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->success([
            'accessToken' => $this->authenticationService->login($request)
        ]);
    }

    /**
     * Logout from account.
     *
     * @OA\Delete(
     *     path="/logout",
     *     operationId="logout",
     *     tags={"Authorization"},
     *     security={ {"sanctum": {} }},
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated."
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authenticationService->logout(request());

        return $this->msg('auth.successfulLogout');
    }
}
