<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @param ProfileService $profileService
     */
    public function __construct(private readonly ProfileService $profileService) {}

    /**
     * Update user.
     *
     * @OA\Post(
     *     path="/users/me",
     *     operationId="updateProfile",
     *     tags={"User"},
     *     security={ {"sanctum": {} }},
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *          ref="#/components/schemas/UpdateProfileRequest"
     *       )
     *      ),
     *     ),
     *     @OA\Response(
     *      response=401,
     *      description="Unauthenticated."
     *     )
     * )
     *
     * @param UpdateProfileRequest $request
     * @return JsonResponse
     */
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $this->profileService->update(Auth::user(), $request->validated());

        return $this->msg('user.updateUser');
    }
}
