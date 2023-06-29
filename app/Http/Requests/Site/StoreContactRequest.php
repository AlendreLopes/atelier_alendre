<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:30'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'string', 'min:10', 'max:14'],
            'message' => ['required', 'string', 'min:30', 'max:255'],
            // 'permissions' => ['Sometimes', 'array'],
        ];
    }
}