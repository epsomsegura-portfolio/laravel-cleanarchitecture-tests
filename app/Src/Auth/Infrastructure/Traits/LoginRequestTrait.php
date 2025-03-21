<?php

namespace App\Src\Auth\Infrastructure\Traits;

trait LoginRequestTrait 
{
    public function rules() : array
    {
        return [
            'email' => ['required','email'],
            'password' => ['required'],
            'remember_me' => ['nullable']
        ];
    }

    public function messages() : array
    {
        return [
            'email.required' => 'El campo de correo electrónico es requerido',
            'email.email' => 'El campo de correo electrónico no tiene la estructura correcta',
            'password.required' => 'El campo de contraseña es requerido'
        ];
    }
}
