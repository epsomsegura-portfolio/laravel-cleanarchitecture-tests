<?php 

namespace App\Src\Auth\Domain\Repositories;

use App\Src\Auth\Domain\Entities\AuthEntity;

interface AuthRepositoryInterface
{
    public function findByEmail(string $email) : ?AuthEntity;
}