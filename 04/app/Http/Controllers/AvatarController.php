<?php

namespace App\Http\Controllers;

use App\Facades\Log;
use App\Http\Requests\UploadAvatarRequest;

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
        $request->validate();

        $avatar = $request->file('avatar');

        var_dump($avatar);

    }



}