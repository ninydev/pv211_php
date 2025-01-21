<?php

namespace App\Http\Controllers;

use App\Services\AvatarService;
use Illuminate\Http\Request;

class AvatarController extends Controller
{

    public function generateAvatarByUser(Request $request, AvatarService $avatarService)
    {
        // $avatarService->generateAvatarByUser($request->user());
        $avatarService->downloadAvatarFromGravatar($request->user());
        return redirect()->back();
    }
}
