<?php

namespace Tests\Feature\user;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $user = User::factory()->create();
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(
            ['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']
        );
    }

    public function test_login_email_failed(): void
    {
        $user = User::factory()->create();
        $response = $this->postJson('/login', [
            'email' => $user->email . "1",
            'password' => 'password',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'ユーザ名もしくはパスワードが正しくありません。']);
    }

    public function test_login_password_failed(): void
    {
        $user = User::factory()->create();
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password1',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'ユーザ名もしくはパスワードが正しくありません。']);
    }
}
