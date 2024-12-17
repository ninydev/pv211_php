<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ColorModel extends Model
{
    protected $table = 'colors';

    /**
     * Отношение: Один цвет может иметь много машин
     */
    public function cars(): HasMany
    {
        return $this->hasMany(CarModel::class, 'color_id'); // 'color_id' - внешний ключ в таблице cars
    }

}