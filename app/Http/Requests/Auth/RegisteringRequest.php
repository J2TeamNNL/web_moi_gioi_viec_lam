<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisteringRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => [
                'required',
                'string',
                'min:0',
                'max:255',
            ],
            'role'     => [
                'required',
                Rule::in(UserRoleEnum::getRolesForRegister()),
            ],
        ];
    }
}
