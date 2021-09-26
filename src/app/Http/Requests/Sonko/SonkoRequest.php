<?php

namespace App\Http\Requests\Sonko;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SonkoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'workers' => ['nullable', 'numeric'],
            'head' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ];
    }
}
