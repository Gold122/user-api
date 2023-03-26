<?php

namespace App\Http\Requests\Authentication;

use App\Http\Requests\AbstractApiRequest;

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
