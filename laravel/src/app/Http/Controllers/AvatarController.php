<?php

namespace App\Http\Controllers;

use App\Services\AvatarService;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function uploadAvatar(Request $request, AvatarService $avatarService)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
        ]);

        $avatarService->uploadAvatar($request->file('avatar'), $request->user());
        return redirect()->back()->with('success', 'Avatar uploaded successfully.');
    }


    public function generateAvatarByUser(Request $request, AvatarService $avatarService)
    {
        // $avatarService->generateAvatarByUser($request->user());
        $avatarService->downloadAvatarFromGravatar($request->user());
        return redirect()->back();
    }
}
