<?php

namespace App\Http\Requests\Authentication;

use App\Http\Requests\AbstractApiRequest;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

/**
 *  @OA\Schema(
 *    @OA\Property(
 *      property="email",
 *      example="test@gmail.com",
 *      description="Email address field <br /> The field is required.",
 *      type="string"
 *    ),
 *    @OA\Property(
 *      property="password",
 *      example="test1234",
 *      description="Password field <br /> The field is required.",
 *      type="string"
 *    ),
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
class RegisterRequest extends AbstractApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                new Unique(User::class, 'email')
            ],
            'password' => [
                'required',
                'string',
                'min:5',
                'max:30'
            ],
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
