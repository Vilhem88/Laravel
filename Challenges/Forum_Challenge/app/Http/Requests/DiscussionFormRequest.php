<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscussionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:2', 'max:150', 'string'],
            'file' => ['required','mimes:jpeg,png,jpg,gif,svg', 'max:5120', 'image'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['required', 'max:1000'],
        ];
    }
}
