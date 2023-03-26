<?php

namespace App\Http\Requests\Authentication;

use App\Http\Requests\AbstractApiRequest;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

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
