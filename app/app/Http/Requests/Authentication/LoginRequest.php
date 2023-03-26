<?php

namespace App\Http\Requests\Authentication;

use App\Http\Requests\AbstractApiRequest;

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
 *  ),
 */
class LoginRequest extends AbstractApiRequest
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
                'email'
            ],
            'password' => [
                'required',
                'string',
                'min:5',
                'max:30'
            ],
        ];
    }
}
