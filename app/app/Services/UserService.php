<?php

namespace App\Services;

use App\Http\Resources\UserCollection;
use App\Models\User;

class UserService extends AbstractService
{

    /**
     * Get all users.
     */
    public function index(): UserCollection
    {
        return new UserCollection(User::all());
    }

    /**
     * Update user.
     *
     * @param User $user
     * @param array $request
     * @return void
     */
    public function update(User $user, array $request): void
    {
        $user->update([
            'first_name' => $request['firstName'] ?? $user->first_name,
            'last_name' => $request['lastName'] ?? $user->last_name
        ]);
    }

    /**
     * Destroy user.
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user): void
    {
        $user->delete();
    }
}
