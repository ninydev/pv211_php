<?php

namespace App\Http\Controllers;

use App\Enums\StorageTypeEnum;
use App\Facades\Log;
use App\Facades\Storage;
use App\Http\Requests\UploadAvatarRequest;
use App\Services\AzureStorageService;
use App\Services\LocalStorageService;

class AvatarController extends BaseWebController
{

    public function __construct()
    {
    }


    public function get()
    {
        $this->templateName = 'avatars/form';
    }

    public function post(UploadAvatarRequest $request)
    {
        $this->templateName = 'avatars/form';

        $request->validate();

        $avatar = $request->file('avatar');

        var_dump($avatar);

//        $storage = new LocalStorageService();
//        $storage->upload('avatars', $avatar);

//        $azStore = new AzureStorageService();
//        $azStore->upload('avatars', $avatar);

        Storage::disk(StorageTypeEnum::Azure)
            ->upload('avatar', $avatar);

    }



}