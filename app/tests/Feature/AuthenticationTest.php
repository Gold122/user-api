<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function testShouldRegister(): void
    {
        $response = $this->post('/api/register', [
            'email' => 'test@gmail.com',
            'password' => 'test1234'
        ]);

        $response->assertStatus(200);
    }

    public function testShouldThrowErrorWhenTryRegisterWithIncorrectEmail(): void
    {
        $response = $this->post('/api/register', [
            'email' => 'testgmail.com',
            'password' => 'test1234'
        ]);

        $response->assertStatus(422);
    }

    public function testShouldLogin()
    {
        $user = User::factory()->createOne([
            'password' => 'test1234'
        ]);

        $response = $this->post('api/login', [
            'email' => $user->email,
            'password' => 'test1234'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'accessToken'
            ]
        ]);
    }
}
