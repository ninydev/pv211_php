<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Notifications\DatabaseNotification;

class Notifications extends Component
{
public $unreadNotificationsCount;
public $notifications;

public function mount()
{
$this->unreadNotificationsCount = auth()->user()->unreadNotifications->count();
$this->notifications = auth()->user()->notifications;
}

public function markAsRead($notificationId)
{
$notification = DatabaseNotification::find($notificationId);
if ($notification) {
$notification->markAsRead();
$this->mount();
}
}

public function markAllAsRead()
{
auth()->user()->unreadNotifications->markAsRead();
$this->mount();
}

public function render()
{
return view('filament.components.notifications');
}
}
