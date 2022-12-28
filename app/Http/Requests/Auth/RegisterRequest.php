<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'exists:codes,email',
                'max:255',
            ],
            'code' => [
                'required',
                'exists:codes,code',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                'max:30',
            ],
        ];
    }
}
