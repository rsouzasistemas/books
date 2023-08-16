<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateAuthorsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    function prepareForValidation() : void
    {
        $zipCode = preg_replace("/[^0-9]/", "", $this->get('zip_code'));

        $this->merge([
            'zip_code' => $zipCode
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:150'],
            'email' => ['required', 'min:3', 'max:150', 'email', Rule::unique('authors', 'email')->ignore($this->id, 'id')],
            'zip_code' => ['required', 'min:8', 'max:9'],
            'address' => ['required', 'min:3', 'max:150'],
            'address_number' => ['required', 'min:1', 'max:150'],
            'address_complement' => ['nullable', 'min:3', 'max:150'],
            'district' => ['required', 'min:3', 'max:50'],
            'city' => ['required', 'min:3', 'max:50'],
            'federative_unity' => ['required', 'min:2', 'max:2']
        ];
    }
}
