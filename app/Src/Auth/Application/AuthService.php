<?php 

namespace App\Src\Auth\Application;

use App\Src\Auth\Domain\Repositories\AuthRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private AuthRepositoryInterface $authRepository;
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function login(string $email, string $password) : bool
    {
        $authUser = $this->authRepository->findByEmail($email);
        if(!$authUser){
            throw new Exception('El usuario no existe',404);
        }
        if(!Hash::check($password,$authUser->password)){
            throw new Exception('La contraseña es incorrecta',401);
        }
        return TRUE;
    }
}