<?php

namespace App\Filament\Admin\Resources\ArticleResource\Pages;

use App\Events\CreateArticleEvent;
use App\Filament\Admin\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Filament\Notifications\Notification;

class CreateArticle extends CreateRecord
{
    protected function afterCreate(): void
    {
        Log::info('Article created', ['article' => $this->record, 'user' => Auth::user()]);
        event(new CreateArticleEvent(
            Auth::user(),
            $this->record));

    }

    protected static string $resource = ArticleResource::class;
}
