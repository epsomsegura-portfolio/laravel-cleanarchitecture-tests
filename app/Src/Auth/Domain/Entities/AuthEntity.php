<?php

namespace App\Src\Auth\Domain\Entities;

class AuthEntity
{
    public string $email;
    public string $password;
    public ?bool $remember_me = null;

    public function __construct(string $email, string $password, ?bool $remember_me = NULL)
    {
        $this->email = $email;
        $this->password = $password;
        $this->remember_me = $remember_me;
    }
}