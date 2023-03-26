<?php

namespace App\Http\Requests\User;

use App\Http\Requests\AbstractApiRequest;

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
 *  ),
 */
class UpdateUserRequest extends AbstractApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => [
                'nullable',
                'string',
                'min:3',
                'max:20'
            ],
            'lastName' => [
                'nullable',
                'string',
                'min:3',
                'max:20'
            ]
        ];
    }
}
