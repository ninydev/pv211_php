<?php

namespace App\Listeners;

use App\Events\CreateArticleEvent;
use App\Models\User;
use App\Notifications\CreateArticleNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class CreateArticleListener implements ShouldQueue
{


    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateArticleEvent $event): void
    {

        // Notify subscribers
        $subscribers = $event->author->subscribers;
        foreach ($subscribers as $subscriber) {
            $subscriber->notify(new CreateArticleNotification($event));
        }

        // Notify admins
        $admins = Role::where('name', 'admin')->first()->users;
        foreach ($admins as $admin) {
            $admin->notify(new CreateArticleNotification($event));
        }

//        Log::info('Article created', [
//            'author' => $event->author->name,
//            'article' => $event->article->title,
//        ]);
    }
}
