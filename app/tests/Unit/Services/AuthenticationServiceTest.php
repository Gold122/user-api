<?php

namespace Tests\Unit\Services;

use App\Exceptions\Authentication\EmailOrPasswordIsIncorrectException;
use App\Models\User;
use App\Services\AuthenticationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationServiceTest extends TestCase
{
    use RefreshDatabase;

    private readonly AuthenticationService $authenticationService;
    private readonly string $password;
    private readonly User $user;
    protected function setUp(): void
    {
        parent::setUp();

        $this->authenticationService = app(AuthenticationService::class);
        $this->password = 'test1234';
        $this->user = User::factory()->createOne(['password' => $this->password]);
    }

    public function testShouldRegister()
    {
        $this->authenticationService->register([
            'email' => 'test@gmail.com',
            'password' => 'test1234'
        ]);

        $this->assertDatabaseHas(User::class, [
            'email' => 'test@gmail.com'
        ]);
    }

    public function testShouldCreateTokenWhenLogin(): void
    {
        $login = $this->authenticationService->login([
            'email' => $this->user->email,
            'password' => $this->password
        ]);

        $this->assertIsString($login);
    }

    public function testShouldThrowExceptionWhenProvideIncorrectLoginData(): void
    {
        $this->expectException(EmailOrPasswordIsIncorrectException::class);

        $this->authenticationService->login([
            'email' => 'test',
            'password' => $this->password
        ]);
    }
}
