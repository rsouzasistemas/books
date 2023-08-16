<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateBooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'author_id' => ['required', 'numeric'],
            'title' => ['required', 'min:3', 'max:150', Rule::unique('books', 'title')->ignore($this->id, 'id')],
            'publication_year' => ['required', 'numeric', 'min:1800', 'max:' . date('Y')],
            'img_path' => ['nullable', 'max:3000', 'mimes:jpg,jpeg,png'],
            'description' => ['required']
        ];
    }
}
