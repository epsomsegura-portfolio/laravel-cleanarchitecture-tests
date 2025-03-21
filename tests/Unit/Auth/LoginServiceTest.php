<?php

namespace Tests\Unit\Auth;

use App\Models\User;
use App\Src\Auth\Application\AuthService;
use App\Src\Auth\Infrastructure\Persistence\EloquentAuthRepository;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginServiceTest extends TestCase
{
    use RefreshDatabase;

    private EloquentAuthRepository $authRepository;
    private AuthService $authService;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $authRepository = new EloquentAuthRepository();
        $this->authService = new AuthService($authRepository);
        $this->user = User::factory()->create(['password' => bcrypt('password')]);
    }
    
    public function test_login_service_user_does_not_exists()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('El usuario no existe');
        $this->authService->login('noexists@user.com','password');
    }
    public function test_login_service_password_is_wrong()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage('La contraseña es incorrecta');
        $this->authService->login($this->user->email,'honiuhsdif');
    }

    public function test_login_service_ok()
    {
        $loginService = $this->authService->login($this->user->email,'password');
        $this->assertTrue($loginService);
    }
    
}