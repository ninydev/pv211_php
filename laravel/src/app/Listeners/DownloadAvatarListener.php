<?php

namespace App\Listeners;

use App\Notifications\AvatarReadyNotification;
use App\Services\AvatarService;
use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DownloadAvatarListener implements ShouldQueue
{
    public $queue = 'avatars';

    public function __construct(
        private readonly AvatarService $avatarService)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $this->avatarService->downloadAvatarFromGravatar($event->user);
        $event->user->notify(new AvatarReadyNotification());
    }
}
