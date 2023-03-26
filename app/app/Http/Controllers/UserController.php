<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(private readonly UserService $userService) {}

    /**
     * Get all users.
     *
     * @OA\Get(
     *     path="/users",
     *     operationId="users",
     *     tags={"User"},
     *     security={ {"sanctum": {} }},
     *     @OA\Response(
     *      response=401,
     *      description="Unauthenticated."
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success($this->userService->index());
    }

    /**
     * Update user.
     *
     * @OA\Put(
     *     path="/users/{user_id}",
     *     operationId="updateUser",
     *     tags={"User"},
     *     security={ {"sanctum": {} }},
     *     @OA\Parameter(
     *      name="user_id",
     *      in="path",
     *      required=true,
     *      description="User id",
     *      example="1"
     *     ),
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
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
     *     @OA\Response (
     *      response=401,
     *      description="Unauthenticated."
     *     )
     * )
     *
     * @param User $user
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update(User $user, UpdateUserRequest $request): JsonResponse
    {
        $this->userService->update($user, $request);

        return $this->msg('user.updateUser');
    }

    /**
     * Remove user.
     *
     * @OA\Delete (
     *     path="/users/{user_id}",
     *     operationId="removeUser",
     *     tags={"User"},
     *     security={ {"sanctum": {} }},
     *     @OA\Parameter(
     *      name="user_id",
     *      in="path",
     *      required=true,
     *      description="User id",
     *      example="1"
     *     ),
     *     @OA\Response (
     *      response=401,
     *      description="Unauthenticated."
     *     )
     * )
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $this->userService->destroy($user);

        return $this->msg('user.removeUser');
    }
}
