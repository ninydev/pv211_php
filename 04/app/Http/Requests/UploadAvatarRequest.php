<?php

namespace App\Http\Requests;

use App\Http\Requests\Interfaces\ValidateRequestInterface;

class UploadAvatarRequest
    extends BaseRequest
implements ValidateRequestInterface
{

    public function validate(bool $die = true): bool
    {
        if (isset($_FILES['avatar'])) {
            return true;
        }

        if ($die) {
            die ("Validate: File upload");
        }

        return false;
    }
}