<?php

namespace Tests\Unit\Helpers\Avatar;

use App\Helpers\Avatar\AvatarHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AvatarHelperTest extends TestCase
{
    private readonly AvatarHelper $avatarHelper;
    protected function setUp(): void
    {
        parent::setUp();

        $this->avatarHelper = app(AvatarHelper::class);
    }

    public function testShouldSaveAvatar(): void
    {
        Storage::fake('public');

        $path = $this->avatarHelper->saveAvatar(
            UploadedFile::fake()->image('test.jpg')
        );

        Storage::disk('public')->assertExists($path);
    }
}
