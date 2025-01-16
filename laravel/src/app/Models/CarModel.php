<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Colors
class CarModel extends Model
{
    protected $table = 'cars';

    protected $fillable = ['name'];

    public function colors(): HasMany
    {
        return $this->hasMany(CarColorModel::class, 'car_id');
    }
}
