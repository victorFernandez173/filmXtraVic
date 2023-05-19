<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:25'],
            'email' => ['required', 'max:60', 'email', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }


    /**
     * Mensages de error
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Introduzca nombre',
            'name.max' => 'Nombre: máximo 25 caracteres.',
            'email.required' => 'Introduzca email.',
            'email.email' => 'Formato de email',
            'email.max' => 'Email: máximo 60 caracteres',
            'email.unique' => 'Email ya existente',
            'password.required' => 'Introduzca contraseña',
            'password.confirmed' => 'Confirmación fallida',
            'password.min' => 'Reglas: al menos 8 caracteres'
        ];
    }
}
