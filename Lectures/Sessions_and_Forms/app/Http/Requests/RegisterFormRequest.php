<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:30'],
            'surname' => ['required', 'min:2', 'max:30'],
            'email' => ['required', 'min:2', 'max:30', 'email'],
            'password' => ['required', 'min:2', 'max:30']
        ];
    }
}
