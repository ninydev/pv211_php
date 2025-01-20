<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendAdminInformationListener implements ShouldQueue
{


    public $queue = 'send-email';

    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Log::info('SendAdminInformationListener');
        Log::info($event->user);
    }
}
