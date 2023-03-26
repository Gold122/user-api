<?php

namespace App\Helpers\Avatar;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AvatarHelper
{
    /**
     * Save avatar.
     *
     * @param UploadedFile $file
     * @return string
     */
    public function saveAvatar(UploadedFile $file): string
    {
        return Storage::disk('public')->putFile('avatars', $file);
    }
}
