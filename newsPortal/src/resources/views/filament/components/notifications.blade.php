<div>
    <button type="button" wire:click="markAllAsRead">
        Notifications ({{ $unreadNotificationsCount }} unread)
    </button>

    <ul>
        @foreach ($notifications as $notification)
            <li>
                {{ $notification->data['message'] }}
                <button type="button" wire:click="markAsRead('{{ $notification->id }}')">Mark as read</button>
            </li>
        @endforeach
    </ul>
</div>
