<?php

namespace App\Http\Requests\Auth;

use App\Src\Auth\Infrastructure\Traits\LoginRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use LoginRequestTrait;
    
    public function authorize(): bool
    {
        return true;
    }
}
