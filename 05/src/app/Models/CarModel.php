<?php

namespace App\Models;

use App\Traits\GeneratesUuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarModel extends Model
{

    /**
     * Отношение: Каждая машина принадлежит одному цвету
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(ColorModel::class, 'color_id'); // 'color_id' - внешний ключ в таблице cars
    }


    use GeneratesUuidTrait;


    // User --> users
    // Man -->men
    // UserPost --> user_posts

    protected $table = 'cars';
    // Тип ключа
    protected $keyType = 'string';

    // Отключаем автоинкремент
    public $incrementing = false;
}