<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email:filter','max:255'],
            'password' => ['required', 'string', 'min:7', 'max:50'],
//          'remember' => ['nullable','boolean'],
        ];
    }
}
