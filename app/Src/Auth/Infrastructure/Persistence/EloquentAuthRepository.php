<?php

namespace App\Src\Auth\Infrastructure\Persistence;

use App\Models\User;
use App\Src\Auth\Domain\Entities\AuthEntity;
use App\Src\Auth\Domain\Repositories\AuthRepositoryInterface;

class EloquentAuthRepository implements AuthRepositoryInterface
{
    
    public function findByEmail(string $email): ?AuthEntity
    {
        $authUser = User::where('email',$email)->first();
        return $authUser ? new AuthEntity($authUser->email, $authUser->password) : NULL;
    }
}