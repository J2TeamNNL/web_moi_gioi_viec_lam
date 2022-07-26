<?php

namespace App\Http\Requests\Company;

use App\Enums\CompanyCountryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
            'country' => [
                'required',
                'string',
                Rule::in(CompanyCountryEnum::getKeys()),
            ],
            'city' => [
                'required',
                'string',
            ],
            'distinct' => [
                'nullable',
                'string',
            ],
            'address' => [
                'nullable',
                'string',
            ],
            'address2' => [
                'nullable',
                'string',
            ],
            'zipcode' => [
                'nullable',
                'string',
            ],
            'phone' => [
                'nullable',
                'string',
            ],
            'email' => [
                'nullable',
                'string',
            ],
            'logo' => [
                'nullable',
                'file',
                'image',
                'max:5000',
            ],
        ];
    }
}
