<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => [
                'required',
                'min:8',
                'max:30',
            ],
            'new_password' => [
                'required',
                'min:8',
                'max:30',
            ],
            'new_confirm_password' => [
                'required',
                'same:new_password',
                'min:8',
                'max:30',
            ],
        ];
    }
}
