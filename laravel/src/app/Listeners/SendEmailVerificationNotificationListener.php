<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationNotificationListener implements ShouldQueue
{

    public $queue = 'send-email';

    use InteractsWithQueue;


    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Log::info('SendEmailVerificationNotificationListener');
        Log::info($event->user);
        // kosie_ruki_kodera();
//        Mail::to($event->user->email)
//            ->send(new EmailVerification($event->user));
    }
}
