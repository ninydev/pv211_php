<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CarColorModel extends Model
{
    protected $table = 'car_colors';

    protected $fillable = ['name', 'url', 'car_id', 'color_id'];

    public function colors(): HasMany
    {
        return $this->hasMany(CarColorModel::class, 'car_id'); // 'car_id' - внешний ключ в таблице car_colors
    }

    //public $timestamps = false;
    //
}
