<?php

namespace Tests\Unit\Services;

use App\Helpers\Avatar\AvatarHelper;
use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Mockery\MockInterface;
use Tests\TestCase;

class ProfileServiceTest extends TestCase
{
    use RefreshDatabase;

    private readonly MockInterface $avatarHelperMock;
    private readonly ProfileService $profileService;
    private readonly User $user;
    protected function setUp(): void
    {
        parent::setUp();

        $this->avatarHelperMock = $this->mock(AvatarHelper::class);
        $this->profileService = app(ProfileService::class);
        $this->user = User::factory()->createOne(['password' => 'test1234']);
    }

    public function testShouldUpdateAvatar()
    {
        $avatarName = 'test.jpg';

        $this->avatarHelperMock->shouldReceive('saveAvatar')
            ->andReturn($avatarName)
            ->once();

        $this->profileService->update($this->user, [
            'avatar' => UploadedFile::fake()->image($avatarName)
        ]);

        $this->assertSame($avatarName, $this->user->avatar);
    }
}
