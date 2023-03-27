<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title' => ['required', 'min:4', 'max:20', 'alpha'], 
            'isbn' => ['required', 'min:4', 'integer'],
            'writer' => ['required', 'min:4', 'max:20']
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'This is a custom message'
        ];
    }
}
