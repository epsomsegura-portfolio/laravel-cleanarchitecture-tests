<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['password' => bcrypt('password')]);
    }

    public function test_api_login_user_does_not_exists()
    {
        $this->user = User::factory()->create(['password' => bcrypt('password')]);
        $response = $this->postJson('/api/auth/login', [
            'email' => 'ouo@ui.o',
            'password' => 'password',
        ]);

        $response->assertStatus(404);
    }
    public function test_api_login_password_is_wrong()
    {
        $this->user = User::factory()->create(['password' => bcrypt('password')]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => 'ghndoiaghondif',
        ]);

        $response->assertStatus(401);
    }
    public function test_api_login_ok()
    {
        $this->user = User::factory()->create(['password' => bcrypt('password')]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)->assertJsonStructure(['message','code']);
    }
}