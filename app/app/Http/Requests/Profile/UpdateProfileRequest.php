<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\User\UpdateUserRequest;

/**
 *  @OA\Schema(
 *    @OA\Property(
 *      property="firstName",
 *      example="Jan",
 *      description="First name field <br /> The field is optional.",
 *      type="string"
 *    ),
 *    @OA\Property(
 *      property="lastName",
 *      example="Kowalski",
 *      description="Last name field <br /> The field is optional.",
 *      type="string"
 *    ),
 *    @OA\Property(
 *      property="avatar",
 *      description="file to upload",
 *      type="file",
 *      format="file"
 *    ),
 *  ),
 */
class UpdateProfileRequest extends UpdateUserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            ...parent::rules(),
            'avatar' => [
                'nullable',
                'image'
            ]
        ];
    }
}
