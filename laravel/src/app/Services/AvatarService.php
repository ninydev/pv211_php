<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class AvatarService
{

    /**
     * Download an avatar from Gravatar for the user.
     *
     * @param $user
     */
    public function downloadAvatarFromGravatar($user): void
    {
        $emailHash = md5(strtolower(trim($user->email)));
        $avatarUrl = "https://www.gravatar.com/avatar/{$emailHash}?s=128&d=identicon&r=PG";
        $avatarContents = file_get_contents($avatarUrl);

        Storage::disk('avatars')->put("{$user->id}/avatar.original", $avatarContents);

        $this->convertAndSaveAvatar($user); // , $avatarContents);
    }

    /**
     * Generate an avatar for the user.
     *
     * @param $user
     */
    public function generateAvatarByUser($user): void
    {
        $name = strtolower($user->name);
        $name = str_replace(' ', '', $name);
        $name = substr($name, 0, 2);
        $name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);

        $avatarUrl = "https://ui-avatars.com/api/?name={$name}&color=7F9CF5&background=EBF4FF&size=128&format=webp";
        $avatarContents = file_get_contents($avatarUrl);

        Storage::disk('avatars')->put("{$user->id}/avatar.original", $avatarContents);
        $this->convertAndSaveAvatar($user);
    }

    /**
     * Convert a file to webp format and resize it.
     *
     * @param $user
     */
    public function convertAndSaveAvatar($user): void
    {
        $filePath = Storage::disk('avatars')->path("{$user->id}/avatar.original");
        $image = Image::make($filePath)->resize(128, 128)->encode('webp', 90);
        Storage::disk('avatars')->put("{$user->id}/avatar.webp", (string) $image);
    }

    public function uploadAvatar(array|\Illuminate\Http\UploadedFile|null $file, mixed $user)
    {
        $filePath = $file->storeAs("avatars/{$user->id}", 'avatar.original', 'public');
        $this->convertAndSaveAvatar($user);
    }


}
