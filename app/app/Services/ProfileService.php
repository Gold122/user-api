<?php

namespace App\Services;

use App\Helpers\Avatar\AvatarHelper;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;

class ProfileService extends AbstractService
{
    /**
     * @param AvatarHelper $avatarHelper
     */
    public function __construct(private readonly AvatarHelper $avatarHelper) {}

    /**
     * Update user.
     *
     * @param User $user
     * @param UpdateProfileRequest $request
     * @return void
     */
    public function update(User $user, UpdateProfileRequest $request): void
    {
        if ($request->avatar) {
            $avatarFile = $this->avatarHelper->saveAvatar($request->avatar);
        }

        $user->update([
            'first_name' => $request->firstName ?? $user->first_name,
            'last_name' => $request->lastName ?? $user->last_name,
            'avatar' => $request->avatar ? $avatarFile : $user->avatar
        ]);
    }
}
