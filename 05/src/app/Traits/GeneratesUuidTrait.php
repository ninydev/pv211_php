<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait GeneratesUuidTrait
{
    /**
     * Генерация UUID для модели перед созданием записи.
     *
     * @return void
     */
    protected static function bootGeneratesUuid(): void
    {
        static::creating(function ($model) {
            // Если поле ID пустое, генерируем новый UUID
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
            }
        });
    }
}